<?php
/**
 * Created by PhpStorm.
 * User: noah
 * Date: 7/23/2017
 * Time: 1:19 PM
 */

function login($conn, $email, $password) {
    print_r("login attempt");
    $stmt = $conn->prepare('SELECT password FROM Accounts WHERE email= :email LIMIT 1');
    print_r("Prepared statement");
    $stmt->bindParam(':email',$email);
    $conn->execute();
    print_r("executed query");
    $user = $conn->fetch(PDO::FETCH_OBJ);
    if( hash_equals($user->password, crypt($password,$user->password))) {
        print_r("Successful Login");
    } else {
        print_r("unsuccessful Login");
    }
}

function register($conn,$email,$username,$password) {
    try {
        //prepare INSERT statement
        $stmt = $conn->prepare("INSERT INTO Accounts (email, username, password) VALUES (:email, :username, :password)");
        //bind parameters
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':username', $username);
        //hash and salt the password
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $password = crypt($password, $salt);
        $stmt->bindParam(':password',$password);
        //execute statment
        $stmt->execute();
        echo "New record entered!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function main() {
    //connect to database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $conn = null;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ACCOUNT", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    if($conn != null) {
        register($conn,"notnoah@gmail.com","userrrrr","paswrd");
        login($conn,"notnoah@gmail.com","paswrd");
    } else {

    }

}

main();