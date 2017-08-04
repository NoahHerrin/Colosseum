<? php
  require 'dbh.php';
  //check that all of the forms have been filled
  if(!(empty($_POST['email']) && empty($_POST['username']) && empty($_POST['password'])) ) {

            $conn;
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $conn->prepare('SELECT password FROM Account WHERE email = ? LIMIT 1');
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if($result->num_rows>0 && password_verify($password,$row["password"])) {
                debug("Athentication Granted");
            } else {

                debug("Authentication denied ");

            }


  } else {
    echo "Invalid Parameters";
  }

 ?>
