<?php

/*
 * Signup and Login Funtionality
 */

function main() {
    debug("hello world");

    $address = "198.71.225.59";
    $username = "Noah";
    $password = "1x8sf^H0";

    // Create connection
    $conn = new mysqli($address, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    $sql = "USE AllTheData;";
    $conn->query($sql);
    signup($conn,"noahherrin@gmail.com","havocnh","secretword");
    login($conn,"noahherrin@gmail.com","notthesecretword");
    $conn->close();
}
function login($conn,$email,$password) {
//get unique id and compare passwords
    $sql = "SELECT password FROM Account WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($result->num_rows>0 && password_verify($password,$row["password"])) {
        debug("Athentication Granted");
    } else {

        debug("Authentication denied ");

    }

}

function signup($connection,$email, $uuid, $pwd) {
    debug("Attempting Signup");

        $stmt = $connection->prepare("INSERT INTO Account (email, username, password) VALUES (?, ?, ?)");
        $options = [ 'cost'=>9,];
        $hash = password_hash($pwd,PASSWORD_BCRYPT,$options);
        $stmt->bind_param("sss", $email, $uuid, $hash);
        $stmt->execute();
        $stmt->close();
        debug("Signup Complete!");


}

function debug($message) {
    echo"<script>console.log('$message');</script>";
}
main();
?>
