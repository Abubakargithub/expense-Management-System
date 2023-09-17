<?php
require_once 'config.php';

// Query to fetch total expenses
$query = "SELECT SUM(amount) AS total_expenses FROM expenses";
$result = mysqli_query($conn, $query);

if ($result) {
  // Fetch the total expenses
  $row = mysqli_fetch_assoc($result);
  $totalExpenses = $row['total_expenses'];

  // Prepare the response data
  $response = array(
    'totalExpenses' => $totalExpenses
  );

  // Return the JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  // Error handling
  $response = array(
    'error' => 'Failed to fetch total expenses'
  );
  header('Content-Type: application/json');
  http_response_code(500);
  echo json_encode($response);
}

mysqli_close($conn);
?>
