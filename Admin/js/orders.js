$(document).ready(function () {
    var selectedItems = {};
  
    function fetchTotal() {
      $.ajax({
        url: '../Manage/Orders/fetch_total.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
          // Update the Grand Total
          const totalAmount = response.total_amount;
          const orderCount = response.order_count;
  
          // Format total amount with a peso sign
          const formattedTotal = "₱" + totalAmount.toLocaleString();
  
          // Update the HTML elements
          $('#grandTotal').text(formattedTotal);
          console.log("Total Orders: " + orderCount);
        },
        error: function (error) {
          console.error("Error fetching data:", error);
        }
      });
    }
  
    function loadOrders() {
      $.ajax({
        url: '../Manage/Orders/fetch_orders.php',
        type: 'GET',
        success: function (data) {
          $('#ordersTable').html(data);
          fetchTotal();
        },
        error: function (xhr, status, error) {
          console.error('Error fetching orders:', error);
        }
      });
    }
    
    loadOrders();
    fetchTotal();
  
    $.ajax({
      url: '../Manage/Orders/fetch_products.php',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
        $.each(data, function (index, product) {
          $('#item-select').append(
            $('<option></option>')
              .val(product.product_id)
              .attr('data-price', product.product_price)
              .attr('data-name', product.product_name)
              .text(product.product_name + ' - ₱' + product.product_price)
          );
        });
      },
      error: function (xhr, status, error) {
        console.error('Error fetching products:', error);
      }
    });
  
    $('.addItem').on('click', function () {
      const selectedOption = $('#item-select').find(':selected');
      if (selectedOption.val() === '') {
        alert('Please select a product.');
        return;
      }
  
      const itemName = selectedOption.data('name');
      const itemPrice = parseFloat(selectedOption.data('price'));
      const productId = selectedOption.val();
  
      if (selectedItems[itemName]) {
        selectedItems[itemName].quantity++;
      } else {
        selectedItems[itemName] = { name: itemName, price: itemPrice, quantity: 1, product_id: productId };
      }
      renderItems();
    });
  
    function renderItems() {
      const itemsListContainer = $('#addItemsListContainer');
      itemsListContainer.empty();
  
      if (Object.keys(selectedItems).length === 0) {
        itemsListContainer.html('<p class="text-muted">No items added.</p>');
      } else {
        Object.keys(selectedItems).forEach(itemName => {
          const item = selectedItems[itemName];
          const itemDiv = $('<div>').addClass('d-flex justify-content-between align-items-center border p-2 mb-2');
          itemDiv.html(`
            <span>${item.name} - ₱${item.price.toFixed(2)} x <strong>${item.quantity}</strong></span>
            <div>
              <button class="btn btn-sm btn-secondary decreaseItem">-</button>
              <button class="btn btn-sm btn-secondary increaseItem">+</button>
              <button class="btn btn-danger btn-sm removeItem">Remove</button>
            </div>
          `);
  
          itemDiv.find('.increaseItem').on('click', function () {
            item.quantity++;
            renderItems();
          });
  
          itemDiv.find('.decreaseItem').on('click', function () {
            if (item.quantity > 1) {
              item.quantity--;
            } else {
              delete selectedItems[itemName];
            }
            renderItems();
          });
  
          itemDiv.find('.removeItem').on('click', function () {
            delete selectedItems[itemName];
            renderItems();
          });
  
          itemsListContainer.append(itemDiv);
        });
      }
      updateTotal();
    }
  
    function updateTotal() {
      let total = 0;
      Object.values(selectedItems).forEach(item => {
        total += item.price * item.quantity;
      });
      $('#addTotalAmount').val(total.toFixed(2));
    }
  
    $('#orderForm').on('submit', function (e) {
      e.preventDefault();
  
      const customerName = $("input[name='customerName']").val();
      const totalAmount = $('#addTotalAmount').val();
      const items = [];
  
      Object.values(selectedItems).forEach(item => {
        items.push({ product_id: item.product_id, qty: item.quantity });
      });
  
      $.ajax({
        url: '../Manage/Orders/process_order.php',
        type: 'POST',
        data: JSON.stringify({
          customerName: customerName,
          totalAmount: totalAmount,
          items: items
        }),
        contentType: 'application/json',
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            alert(response.message);
            location.reload();
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error('AJAX Error:', error);
        }
      });
    });
  
    $('#addOrderModal').on('hidden.bs.modal', function () {
      $(this).find('form')[0].reset();
      selectedItems = {};
      $('#addItemsListContainer').html('<p class="text-muted">No items added.</p>');
      $('#addTotalAmount').val('0.00');
    });
  
    $('#addOrderModal').on('shown.bs.modal', function () {
      if (Object.keys(selectedItems).length === 0) {
        $('#addItemsListContainer').html('<p class="text-muted">No items added.</p>');
        $('#addTotalAmount').val('0.00');
      }
    });
  
    window.viewOrder = function (orderId) {
      $.ajax({
        url: '../Manage/Orders/fetch_view_order.php',
        type: 'GET',
        data: { order_id: orderId },
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            $('#viewCustomerName').text(response.order.order_name);
            $('#viewOrderDate').text(response.order.order_date);
            $('#viewTotalAmount').text('₱' + parseFloat(response.order.order_amount).toFixed(2));
            $('#viewOrderItems').empty();
  
            response.items.forEach(function (item) {
              const row = `<tr>
                            <td>${item.product_name}</td>
                            <td>₱${parseFloat(item.product_price).toFixed(2)}</td>
                            <td>${item.qty}</td>
                            <td>₱${parseFloat(item.sub_total).toFixed(2)}</td>
                          </tr>`;
              $('#viewOrderItems').append(row);
            });
  
            $('#viewOrderModal').modal('show');
          } else {
            alert('Error: ' + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error('Fetch order error:', xhr.responseText);
        }
      });
    };
  });
  