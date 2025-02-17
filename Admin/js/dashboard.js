$(document).ready(function() {
    
    function fetchSalesSummary() {
        $.ajax({
            url: "../Manage/Summary/get_sales_summary.php",
            type: "GET",
            dataType: "json",
            success: function (response) {
                $(".sales-summary-orders").text(response.total_orders);
                $(".sales-summary-amount").text(
                    new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(response.total_sales || 0)
                );
                $(".sales-summary-month").text(response.month_year);
            },
            error: function () {
                $(".sales-summary-orders").text("0");
                $(".sales-summary-amount").text("₱0.00");
                $(".sales-summary-month").text("N/A");
            },
            complete: function() {
                setTimeout(fetchSalesSummary, 5000); // Update every 5 seconds
            }
        });
    }

    function fetchTotal() {
        $.ajax({
            url: '../Manage/Orders/fetch_total.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response) {
                    $('#orderTotal').text(response.order_count || 0);
                    $('#grandTotal').text(
                        new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(response.total_amount || 0)
                    );
                }
            },
            error: function() {
                console.error("Error fetching total orders.");
            },
            complete: function() {
                setTimeout(fetchTotal, 5000); // Update every 5 seconds
            }
        });
    }

    function updateStockCounts(type) {
        let url = type === "ingredients" 
            ? "../Manage/Ingredients/getStockCount.php" 
            : "../Manage/Products/getStockCount.php";

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function(data) {
                const stockContainer = type === "ingredients" ? "#ingredientsStock" : "#productsStock";
                let stockHtml = `
                    <div class="col-md-6 my-1">
                        <div class="card bg-success text-white shadow">
                            <div class="card-body text-center">
                                <h6>In Stock</h6>
                                <h2 class="fw-bold">${data.inStock || 0}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 my-1">
                        <div class="card bg-warning text-dark shadow">
                            <div class="card-body text-center">
                                <h6>Moderate</h6>
                                <h2 class="fw-bold">${data.moderate || 0}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 my-1">
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body text-center">
                                <h6>Low Stock</h6>
                                <h2 class="fw-bold">${data.lowStock || 0}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 my-1">
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body text-center">
                                <h6>Critical</h6>
                                <h2 class="fw-bold">${data.critical || 0}</h2>
                            </div>
                        </div>
                    </div>
                    `;
                $(stockContainer).html(stockHtml);
            },
            error: function() {
                console.error(`Error fetching ${type} stock counts.`);
            },
            complete: function() {
                setTimeout(() => updateStockCounts(type), 5000);
            }
        });
    }

    fetchTotal();
    fetchSalesSummary(); 
    updateStockCounts("ingredients");
    updateStockCounts("products");
});
