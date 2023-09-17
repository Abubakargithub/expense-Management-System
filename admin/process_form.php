<?php
// Retrieve form data
$date = $_POST['date'];
$description = $_POST['description'];
$amount = $_POST['amount'];
$associated = $_POST['associated'];

// Validate and sanitize the data
// ...

// Store the data in the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounting_system_db";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $sql = "INSERT INTO expenses (date, description, amount, associated) VALUES (:date, :description, :amount, :associated)";
  $stmt = $conn->prepare($sql);
  
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':amount', $amount);
  $stmt->bindParam(':associated', $associated);
  
  $stmt->execute();
  
  // Redirect back to the form or a success page
  header("Location: ../index.html");
  exit();
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
