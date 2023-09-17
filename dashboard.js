document.addEventListener("DOMContentLoaded", function() {
  // Fetch the necessary data from the server using AJAX or fetch API
  // Process the data and format it as per the chart requirements
  // Configure and render the charts using ApexCharts

  // Example: Total Expenses Chart
  fetch('fetch_total_expenses.php')
    .then(response => response.json())
    .then(data => {
      var totalExpensesOptions = {
        series: [{
          name: 'Total Expenses',
          data: data.expenses
        }],
        chart: {
          type: 'bar',
          height: 350
        },
        xaxis: {
          categories: data.categories
        }
      };
      var totalExpensesChart = new ApexCharts(document.querySelector("#totalExpensesChart"), totalExpensesOptions);
      totalExpensesChart.render();
    });

  // Example: Expense Trends Chart
  fetch('fetch_expense_trends.php')
    .then(response => response.json())
    .then(data => {
      var expenseTrendsOptions = {
        series: [{
          name: 'Expense Trends',
          data: data.expenses
        }],
        chart: {
          type: 'line',
          height: 350
        },
        xaxis: {
          categories: data.categories
        }
      };
      var expenseTrendsChart = new ApexCharts(document.querySelector("#expenseTrendsChart"), expenseTrendsOptions);
      expenseTrendsChart.render();
    });

  // Configure and render other charts for weekly, monthly, and yearly expenses

});
