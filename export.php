<?php
session_start();
require_once 'config.php'; // Include your database connection configuration

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
  // Redirect to the login page
  header("Location: index.php");
  exit;
}

// Fetch the expense data from the database
$query = "SELECT * FROM expenses";
$result = mysqli_query($conn, $query);

// Create the CSV file
$filename = "expense_report.csv";
$file = fopen($filename, 'w');

// Write the column headers to the CSV file
$headers = array("Expense ID", "Expense Date", "Description", "Amount");
fputcsv($file, $headers);

// Write the expense data to the CSV file
while ($row = mysqli_fetch_assoc($result)) {
  $expenseData = array($row['id'], $row['date'], $row['description'], $row['amount']);
  fputcsv($file, $expenseData);
}

fclose($file);

// Set the appropriate headers for file download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $filename);
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
ob_clean();
flush();
readfile($filename);

// Delete the temporary CSV file
unlink($filename);
?>
