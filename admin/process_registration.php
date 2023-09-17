<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the submitted username and password
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm_password"];

  // Validate the input
  if ($password !== $confirmPassword) {
    echo "Password and confirm password do not match.";
    exit;
  }

  // Replace with your actual registration logic
  // Here, we'll assume you have a user table in your database
  // with columns 'username' and 'password' for storing user credentials
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "accounting_system_db";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      echo "Username already exists. Please choose a different username.";
      exit;
    }

    // Insert the user into the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->execute();

    echo "Registration successful. You can now login.";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
?>
