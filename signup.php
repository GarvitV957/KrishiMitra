<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <h1>You have successfully registered!</h1>
    <a class="btn" href="./LoginFarmer.html">GO and Login</a>
<?php
    $password1 = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];

    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection to this database is failed due to " . mysqli_connect_error());
    }
    $sql = "INSERT INTO `abc`.`data` ( `fname`,`lname`, `password`,  `phone`) VALUES ( '$fname', '$lname', '$password1', '$phone')";
    if($con->query($sql)==true){
        // echo "Added to database.";
    }
    else{
        echo("ERROR : " . $con->error);
    }

    $con->close();
    ?>
</body>
</html>