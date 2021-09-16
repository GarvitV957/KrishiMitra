
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./../Farmer/nav.css">
    <link rel="stylesheet" href="./sell.css">
</head>
<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__start">
            <a href="#" class="brand">कृषिमित्र</a>
            <div class="search">
              <button class="search__toggle" aria-label="Open search">
                Search
              </button>
            </div>
          </div>
          <div class="site-header__end">
            <nav class="nav">
              <button class="nav__toggle" aria-expanded="false" type="button">
                menu
              </button>
              <ul class="nav__wrapper">
                <li class="nav__item ">
                  <a  href="http://localhost/Farmer's%20Buddy/Merchant/index.html" class="list-item">
                    <i style="font-size: 30px;" class="fas fa-home"></i>
                    <br>
                    <span>Home</span>
                  </a>
                </li>
                <li class="nav__item ">
                  <a  href="http://localhost/farmer's%20buddy/LoginMerchant.html" class="list-item">
                    <i style="font-size: 30px;" class="fas fa-sign-out-alt"></i>
                    <br>
                    <span>Sign Out</span>
                  </a>
                </li>
               </ul>
            </nav>
          </div>
        </div>
      </header>
      <!-- Header End -->
      <div class="main">
        <?php
            $pincode = $_POST['Pincode'];
            $server = "localhost";
            $username = "root";
            $password = "";
            $con = mysqli_connect($server,$username,$password);
            if(!$con){
                die("connection to this database is failed due to " . mysqli_connect_error());
            }
            $sql = "select * FROM `abc`.`farmer` where pincode=$pincode";
            $result = mysqli_query($con, $sql);

            $data = array();
            while(($row = mysqli_fetch_array($result))) {
                $fName[] = $row['fName'];
                $lName[] = $row['lName'];
                $city[]=$row['city'];
                $address[]=$row['address'];
                $pincode2[]=$row['pincode'];
                $contact[]=$row['phone'];
            }
            echo("<h1 style=\"text-align: center; font-size: 30px; padding-top:30px; color:white;\">List of Farmers available at Pincode: <b>". $pincode."</b></h1>");
            for ($i=0; $i < count($fName); $i++) { 
                echo("<div class=\"cardslist\"> <div class=\"card\"> <div class=\"head\"> <div class=\"position\">Farmer</div> <div class=\"org\">कृषिमित्र</div> </div> <div class=\"person-name\"> <i class=\"fas fa-user-circle\"></i>". $fName[$i]." ".$lName[$i] ." </div> <div class=\"location\"><i class=\"fas fa-map-marker-alt\"></i>". $city[$i] .", ". $pincode2[$i]. "</div> <div class=\"full-address\">". $address[$i] ."</div> <div class=\"contact-details\"><i class=\"fas fa-phone-square-alt\"></i>". $contact[$i] ."</div> </div> </div>");
                // echo($fName[$i]." ".$lName[$i]."<br>");
            }
            $con->close();
        ?>
      </div>




      <script src="../index1.js"></script>
</body>
</html>