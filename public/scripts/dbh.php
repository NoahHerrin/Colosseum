<?php
  $address = "198.71.225.59";
  $username = "Noah";
  $password = "1x8sf^H0";

  // Create connection
  global $conn;
$conn = new mysqli($address, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "USE AllTheData;";
  $conn->query($sql);

?>
