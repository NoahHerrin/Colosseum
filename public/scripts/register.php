<?php

  require 'dbh.php';
  //check that all of the forms have been filled
  // need to validate that the email is valid and the username does not allready exist.
  if(!(empty($_POST['email']) && empty($_POST['username']) && empty($_POST['password'])) ) {


    $sql = "SELECT * FROM Account WHERE username="+$_POST['username']+";";
    $result = $conn->query($sql);

    //check if username is unique and the email is in the correct format.
    if($result->num_rows == 0 && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

    $connection = $conn;
    $email = $_POST['email'];
    $uuid = $_POST['username'];
    $pwd = $_POST['password'];

    $stmt = $connection->prepare("INSERT INTO Account (email, username, password) VALUES (?, ?, ?)");
    $options = [ 'cost'=>9,];
    $hash = password_hash($pwd,PASSWORD_BCRYPT,$options);
    $stmt->bind_param("sss", $email, $uuid, $hash);
    $stmt->execute();
    $stmt->close();
    echo "Account creation successfully!";
  } else {
    echo "Invalid Parameters";
  }
} else {
  echo "Invalid Parameters";
}
 ?>
