<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $parking_space = $_POST['parking-space'];
  $start_time = $_POST['start-time'];
  $end_time = $_POST['end-time'];

  // Validate the form data
  // ...

  // Store the data in a database or a file
  $data = "$name,$email,$parking_space,$start_time,$end_time\n";
  file_put_contents('reservations.csv', $data, FILE_APPEND);

  // Redirect the user to a confirmation page or display a success message
  header('Location: index.php?message=Reservation%20successful.');
  exit;
}
?>