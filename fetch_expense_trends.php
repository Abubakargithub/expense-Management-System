<?php
require_once 'config.php';

// Query to fetch expense trends
$query = "SELECT MONTH(date) AS month, SUM(amount) AS total_expenses FROM expenses GROUP BY MONTH(date)";
$result = mysqli_query($conn, $query);

if ($result) {
  // Fetch the expense trends data
  $expenseTrends = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $month = $row['month'];
    $totalExpenses = $row['total_expenses'];

    // Add the data to the expense trends array
    $expenseTrends[] = array(
      'month' => $month,
      'totalExpenses' => $totalExpenses
    );
  }

  // Prepare the response data
  $response = array(
    'expenseTrends' => $expenseTrends
  );

  // Return the JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  // Error handling
  $response = array(
    'error' => 'Failed to fetch expense trends'
  );
  header('Content-Type: application/json');
  http_response_code(500);
  echo json_encode($response);
}

mysqli_close($conn);
?>
