<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Sales Summary</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php include('navbar.php'); ?>

    <main class="container py-4">
        <h2 class="mb-4 fw-bold mt-5">Sales Summary</h2>

        <div class="card p-4 shadow-sm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="fw-bold me-2">Year:</label>
                    <select id="yearSelect" class="form-select w-50">
                        <option value="All" selected>All Years</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                <div class="col-md-6 text-end">
                    <label class="fw-bold fs-5">Annual Salary:</label>
                    <span id="annualSalary" class="fw-bold text-success fs-4">$0</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="fw-bold me-2">Month:</label>
                    <select id="monthSelect" class="form-select w-50">
                        <option value="All" selected>All Months</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <div class="col-md-6 text-end">
                    <label class="fw-bold fs-5">Monthly Salary:</label>
                    <span id="monthlySalary" class="fw-bold text-primary fs-4">$0</span>
                </div>
            </div>
        </div>

        <div id="transactionsContainer" class="mt-4"></div>
    </main>

    <script>
        const data = {
            "2024": {
                "January": { salary: 1000, transactions: [[1, 5, 38, 107], [2, 3, 62, 479]] },
                "February": { salary: 920, transactions: [[1, 4, 50, 200], [2, 5, 75, 600]] }
            },
            "2025": {
                "January": { salary: 1100, transactions: [[1, 6, 40, 150], [2, 4, 70, 500]] },
                "February": { salary: 1050, transactions: [[1, 7, 50, 200], [2, 6, 65, 550]] }
            }
        };

        function updateTable(year, month) {
            let container = document.getElementById('transactionsContainer');
            container.innerHTML = "";
            let totalAnnualSalary = 0;
            let totalMonthlySalary = 0;

            if (year === "All") {
                let yearsArray = Object.keys(data).sort().reverse();
                yearsArray.forEach(y => {
                    let yearSalary = 0;
                    let yearMonths = Object.keys(data[y]);

                    // Ensure "2025" is positioned below "February" and above "January"
                    yearMonths.sort((a, b) => {
                        if (y === "2025" && a === "February") return 1;
                        if (y === "2025" && b === "February") return -1;
                        return Object.keys(data[y]).indexOf(a) - Object.keys(data[y]).indexOf(b);
                    });

                    let monthsHtml = yearMonths.map(m => {
                        let salary = data[y][m].salary;
                        yearSalary += salary;
                        return createMonthTable(y, m, salary);
                    }).join("");

                    let yearSection = `
                        <div class="year-section mb-3">
                            <h3 class="mt-4 d-flex justify-content-between align-items-center">
                                ${y} <span class="fw-bold text-success fs-5">Annual Salary: $${yearSalary}</span>
                            </h3>
                            ${monthsHtml}
                        </div>
                    `;
                    container.innerHTML += yearSection;
                    totalAnnualSalary += yearSalary;
                });
            } else if (month === "All") {
                let yearSalary = 0;
                let yearMonths = Object.keys(data[year]);

                let monthsHtml = yearMonths.map(m => {
                    let salary = data[year][m].salary;
                    yearSalary += salary;
                    return createMonthTable(year, m, salary);
                }).join("");

                let yearSection = `
                    <div class="year-section mb-3">
                        <h3 class="mt-4 d-flex justify-content-between align-items-center">
                            ${year} <span class="fw-bold text-success fs-5">Annual Salary: $${yearSalary}</span>
                        </h3>
                        ${monthsHtml}
                    </div>
                `;
                container.innerHTML = yearSection;
                totalAnnualSalary = yearSalary;
            } else {
                totalMonthlySalary = data[year][month]?.salary || 0;
                container.innerHTML = createMonthTable(year, month, totalMonthlySalary);
            }

            document.getElementById('annualSalary').textContent = `$${totalAnnualSalary}`;
            document.getElementById('monthlySalary').textContent = month !== "All" ? `$${totalMonthlySalary}` : "$0";
        }

        function createMonthTable(year, month, salary) {
            return `
                <div class="month-section mb-4">
                    <h4 class="mt-3 d-flex justify-content-between align-items-center">
                        ${month} <span class="fw-bold text-primary fs-5">Monthly Salary: $${salary}</span>
                    </h4>
                    <table class='table table-bordered table-hover'>
                        <thead class='table-dark'>
                            <tr>
                                <th>Day</th>
                                <th>Total Order</th>
                                <th>Total Quantities</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${data[year][month].transactions.map(([day, orders, quantities, amount]) => 
                                `<tr><td>${day}</td><td>${orders}</td><td>${quantities}</td><td>$${amount}</td></tr>`
                            ).join('')}
                        </tbody>
                    </table>
                </div>
            `;
        }

        document.getElementById('yearSelect').addEventListener('change', function() {
            updateTable(this.value, document.getElementById('monthSelect').value);
        });

        document.getElementById('monthSelect').addEventListener('change', function() {
            updateTable(document.getElementById('yearSelect').value, this.value);
        });

        updateTable("All", "All");
    </script>
</body>
