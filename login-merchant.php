<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
      die('Could not connect!');
   }

   if(isset($_POST["phone"], $_POST["password"]))
    {

        $name = $_POST["phone"];
        $password = $_POST["password"];

        $result1 = mysqli_query($conn,"SELECT phone, password FROM abc.merchant WHERE phone = '".$name."' AND  password = '".$password."'");

        if(mysqli_num_rows($result1) > 0 )
        {
            $_SESSION["logged_in"] = true;
            $_SESSION["name"] = $name;
            header("Location: http://localhost/farmer's%20buddy/Merchant/index.html");
            exit();
        }
        else
        {
            echo 'The username or password are incorrect!';
        }

    }
    else {
        echo("Either Username or Password was Unset.");
    }

   mysqli_close($conn);
   ?>