<?php
session_start();
include_once("mysqlconnection.php");
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query=$dbcon->query("SELECT * from signup WHERE email='$email' and password='$password'");
    if($query->num_rows==0){
        echo "<script>alert('Incorrect Email ID and/or Password')</script>";
    }
    else{
        $_SESSION['user_login']=$email;
        header("location: Bakery.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/SOEN287Project.css">
</head>

<body style="background-image: url(Images/Background.png);">
    <form method="post">
        <header>
            <a href="#">
                <img src="Images/Banner.png" alt="banner" width="1500" height="150" class="bannerr">
            </a>
            <ul class="navbar">
                <li><a href="index.html">Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Aisles</a>
                    <div class="dropdown-content">
                        <a href="Bakery.php">Bakery</a>
                        <a href="dairy.html">Dairy</a>
                        <a href="product page.html">Fruits And Vegetables</a>
                        <a href="frozen_aisle.html">Frozen</a>
                        <a href="p2-MeatPoultry.html">Meat and Poultry</a>
                        <a href="aisle_pantry.html">Pantry</a>
                        <a href="oats.html">Oats</a>
                    </div>
                </li>
                <li><a href="aboutUs.html">About Us</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="shopping_cart.html">Shopping Cart</a></li>
                <li><a href="P5.php" class="active">Log In</a></li>
                <li><a href="P6.php">Sign Up</a></li>
            </ul>
        </header>
        <div class="outerbox">
            <center>
                <div class="bx">
                    <img class="signinimg" src="Images/SignIn.jpg"><span class="signinimgtxt">HELLO</span>
                    <div class="email">EMAIL</div>
                    <input required class="inputs" name="email" type="text">
                    <div class="password">PASSWORD</div>
                    <input required class="inputs" name="password" type="Password">
                    <input type="checkbox" id="checkbox1"><label for="checkbox1"><span class="remember">Remember&nbsp;Me</span></label>
                    <a class="forgot" href="#">Forgot&nbsp;your&nbsp;Password?</a>
                    <div class="btnsignin">
                        <input type="submit" class="btnlogin" value="Login" name="login" onclicl = "addEmailToStorage()" >
                    </div>
                </div>
            </center>
        </div>
        <script>
            function addEmailToStorage{
                var email = getElementByName("email")
                console.log(email)
                sessionStorage.setItem("userId", email)
            }
            </script>
        <footer>
            <a href="backstore.html">Admin Page</a>
            <p> SOEN287 Course Project- Concordia SuperMarket</p>
        </footer>
    </form>
</body>

</html>
