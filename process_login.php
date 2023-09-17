<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the submitted username and password
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Replace with your actual authentication logic
  // Here, we'll assume you have a user table in your database
  // with columns 'username' and 'password' for storing user credentials
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "accounting_system_db";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a SQL statement to fetch user details based on the submitted username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // Check if a matching user is found
    if ($stmt->rowCount() > 0) {
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // Verify the submitted password against the stored password hash
      if (password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit;
      } else {
        // Invalid password
        header("Location: index.php?error=invalid");
        exit;
      }
    } else {
      // User not found
      header("Location: index.php?error=invalid");
      exit;
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
?>
