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
    <a class="btn" href="./LoginMerchant.html">GO and Login</a>
<?php
    $password1 = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $pincode = $_POST["pincode"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $server = "localhost";
    $username = "root";
    $password2 = "";
    $con = mysqli_connect($server,$username,$password2);
    if(!$con){
        die("connection to this database is failed due to " . mysqli_connect_error());
    }
    $sql = "INSERT INTO `abc`.`merchant` ( `fname`,`lname`,`address`,`city`,`pincode`,`phone`,`password`) VALUES ( '$fname', '$lname','$address','$city','$pincode', '$phone', '$password1')";
    if($con->query($sql)==true){
        echo "Added to database.";
    }
    else{
        echo("ERROR : " . $con->error);
    }

    $con->close();
    ?>
</body>
</html>