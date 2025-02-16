document.addEventListener('DOMContentLoaded', function () {
    loadYears();
    updateTable("All", "All");

    document.getElementById('yearSelect').addEventListener('change', function() {
        updateTable(this.value, document.getElementById('monthSelect').value);
    });

    document.getElementById('monthSelect').addEventListener('change', function() {
        updateTable(document.getElementById('yearSelect').value, this.value);
    });
});

// Load years into the dropdown
function loadYears() {
    fetch('../Manage/Summary/fetch_years.php')
        .then(response => response.json())
        .then(years => {
            let yearSelect = document.getElementById('yearSelect');
            yearSelect.innerHTML = `<option value="All" selected>All Years</option>`;
            years.forEach(year => {
                yearSelect.innerHTML += `<option value="${year}">${year}</option>`;
            });
        })
        .catch(error => console.error('Error fetching years:', error));
}

function updateTable(year, month) {
    let container = document.getElementById('transactionsContainer');
    container.innerHTML = `<p class="text-info">Loading data...</p>`;

    fetch(`../Manage/Summary/fetch_sales_summary.php?year=${year}&month=${month}`)
        .then(response => response.json())
        .then(data => {
            container.innerHTML = "";
            if (!data || data.length === 0) {
                container.innerHTML = "<p class='text-danger'>No data found.</p>";
                return;
            }

            let yearlyData = {};
            let yearlyTotals = {};

            data.forEach(item => {
                let yearKey = item.order_year;
                let monthKey = `${item.order_year}-${item.order_month}`;
                
                // Initialize yearly structure if not exists
                if (!yearlyData[yearKey]) {
                    yearlyData[yearKey] = {};
                    yearlyTotals[yearKey] = 0;
                }

                // Initialize month structure if not exists
                if (!yearlyData[yearKey][monthKey]) {
                    yearlyData[yearKey][monthKey] = [];
                }

                yearlyData[yearKey][monthKey].push(item);
                yearlyTotals[yearKey] += parseFloat(item.total_amount);
            });

            Object.keys(yearlyData).sort().reverse().forEach(yearKey => {
                let monthsHtml = Object.keys(yearlyData[yearKey]).sort().map(monthKey => {
                    let [orderYear, orderMonth] = monthKey.split('-');
                    let monthName = new Date(orderYear, orderMonth - 1).toLocaleString('default', { month: 'long' });
                    let totalAmount = yearlyData[yearKey][monthKey].reduce((sum, row) => sum + parseFloat(row.total_amount), 0);

                    return `
                        <h4 class="mt-3 d-flex justify-content-between align-items-center">
                            ${monthName} 
                            <span class="fw-bold text-primary fs-5">
                                Monthly Sales: ${formatPeso(totalAmount)}
                            </span>
                        </h4>
                        <table class='table table-bordered table-hover'>
                            <thead class='table-dark'>
                                <tr>
                                    <th>Day</th>
                                    <th>Total Orders</th>
                                    <th>Total Quantities</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${yearlyData[yearKey][monthKey].map(row => 
                                    `<tr>
                                        <td>${row.order_day}</td>
                                        <td>${row.total_orders}</td>
                                        <td>${row.total_quantities}</td>
                                        <td>${formatPeso(row.total_amount)}</td>
                                    </tr>`).join('')}
                            </tbody>
                        </table>
                    `;
                }).join('');

                container.innerHTML += `
                    <div class="year-section mb-3">
                        <h3 class="mt-4 d-flex justify-content-between align-items-center">
                            ${yearKey} 
                            <span class="fw-bold text-success fs-5">
                                Annual Sales: ${formatPeso(yearlyTotals[yearKey])}
                            </span>
                        </h3>
                        ${monthsHtml}
                    </div>
                `;
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            container.innerHTML = "<p class='text-danger'>Error loading data.</p>";
        });
}

// Function to format as PHP Peso
function formatPeso(amount) {
    return new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(amount || 0);
}