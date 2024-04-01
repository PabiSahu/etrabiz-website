<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $Name = $_POST['Name'];
  $Email = $_POST['Email'];
  $Organization = $_POST['Organization'];
  $Contact = $_POST['Contact'];
  $Help = $_POST['Help'];
  $con = new mysqli('localhost', 'root', '', 'test1');

  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }

  // Use backticks (`) instead of single quotes (') for table and column names
  $sql = "INSERT INTO `contact_table` (Name, Email, Organization, Contact,Help) VALUES ('$Name', '$Email', '$Organization', '$Contact','$Help')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "Data Inserted Successfully";
  } else {
    // Use mysqli_error($con) to get the specific MySQL error
    die("Error: " . mysqli_error($con));
  }

  // Close the database connection
  $con->close();
}
?>