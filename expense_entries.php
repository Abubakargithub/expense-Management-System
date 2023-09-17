<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Expense Entries</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Custom CSS for Expense Entries */
    body {
      background-color: #ffffff; /* White background */
    }

    .navbar {
      background-color: #007BFF; /* Blue navbar */
    }

    .navbar .navbar-brand {
      color: #fff; /* Text color for navbar brand */
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 40px;
      background-color: #B2BEB5; /* Light gray background */
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      color: #007BFF; /* Blue header text color */
    }

    .table {
      background-color: #fff; /* White table background */
    }

    .btn-primary {
      background-color: #007BFF; /* Blue button background color */
      border: none;
    }

    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    .social-icons {
      font-size: 24px;
      margin-right: 20px;
      color: #fff;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="fas fa-calculator"></i> Expense Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php"><i class="fas fa-chart-line"></i> Expense Entry</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fas fa-list"></i> Expense Entries</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-5">
    <h1>Expense Entries</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Date</th>
          <th>Description</th>
          <th>Amount</th>
          <th>Associated Site or Truck</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Retrieve expense entries from the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accounting_system_db";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $stmt = $conn->query("SELECT * FROM expenses");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          $totalExpense = 0;

          while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['associated']."</td>";
            echo "</tr>";

            $totalExpense += $row['amount'];
          }
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        ?>
      </tbody>
    </table>

    <div class="text-right">
      <p><strong>Total Daily Expense:</strong> <?php echo $totalExpense; ?></p>
      <button class="btn btn-primary" onclick="window.print()">Print Report</button>
      <!-- Export button -->
      <a href="export.php" class="btn btn-primary">Export to CSV</a>
      <!-- Your script and styling code -->
      <canvas id="expenseChart" width="400" height="200"></canvas>
    </div>
  </div>

  <footer class="mt-5">
    <div class="container text-center">
      <a href="#"><i class="fab fa-facebook social-icons"></i></a>
      <a href="#"><i class="fab fa-twitter social-icons"></i></a>
      <a href="#"><i class="fab fa-instagram social-icons"></i></a>
      <a href="#"><i class="fab fa-linkedin social-icons"></i></a>
      <p>&copy; 2023 Expense Tracker. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Include Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // Retrieve expense data from the server
    <?php
    // Fetch and store expense data in an array
    $expenseData = [];
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->query("SELECT * FROM expenses");
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      while ($row = $stmt->fetch()) {
        $expenseData[] = $row;
      }
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;

    // Convert the expense data array to a JSON string
    $expenseDataJson = json_encode($expenseData);
    ?>

    // Parse the expense data JSON string
    var expenseData = <?php echo $expenseDataJson; ?>;

    // Process the expense data to calculate totals for each day
    var dailyExpenseTotals = {};
    expenseData.forEach(function(entry) {
      var date = entry.date;
      var amount = parseFloat(entry.amount);

      if (dailyExpenseTotals[date]) {
        dailyExpenseTotals[date] += amount;
      } else {
        dailyExpenseTotals[date] = amount;
      }
    });

    // Extract the dates and expense totals for the chart
    var dates = Object.keys(dailyExpenseTotals);
    var expenseTotals = Object.values(dailyExpenseTotals);

    // Create the chart
    var ctx = document.getElementById('expenseChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: dates,
        datasets: [{
          label: 'Total Expense',
          data: expenseTotals,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              precision: 0
            }
          }
        }
      }
    });
  </script>
</body>
</html>
