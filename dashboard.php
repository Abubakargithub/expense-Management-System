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
  <title>Expense Entry Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Custom CSS for Expense Entry Form */
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
      max-width: 600px;
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

    .form-group {
      text-align: left;
    }

    label {
      font-weight: bold;
    }

    .form-control {
      border-radius: 3px;
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="expense_entries.php"><i class="fas fa-file-alt"></i> Expense Entries</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
  <div class="container mt-5">
    <h1>Expense Entry Form</h1>
    <form action="php/process_form.php" method="post">
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="associated">Associated Site or Truck:</label>
        <input type="text" id="associated" name="associated" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container text-center">
      <a href="#"><i class="fab fa-facebook social-icons"></i></a>
      <a href="#"><i class="fab fa-twitter social-icons"></i></a>
      <a href="#"><i class="fab fa-instagram social-icons"></i></a>
      <a href="#"><i class="fab fa-linkedin social-icons"></i></a>
      <p>&copy; 2023 Expense Tracker. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
