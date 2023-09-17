<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS for Login Form */
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
      max-width: 400px;
      margin: 0 auto;
      padding: 40px;
      background-color: #B2BEB5; /* Light gray background */
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
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

    .alert {
      margin-top: 20px;
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
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fas fa-calculator"></i> Expense Manager</a>
    </div>
  </nav>

  <div class="container">
    <h2>Login</h2>
    <form action="process_login.php" method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <?php
        // Display error message if password is invalid
        if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
          echo '<div class="alert alert-danger" role="alert">Invalid password. Please try again.</div>';
        }
      ?>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container text-center">
      <a href="#"><i class="fab fa-facebook social-icons"></i></a>
      <a href="#"><i class="fab fa-twitter social-icons"></i></a>
      <a href="#"><i class="fab fa-instagram social-icons"></i></a>
      <a href="#"><i class="fab fa-linkedin social-icons"></i></a>
      <p>&copy; 2023 Expense Management System. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
