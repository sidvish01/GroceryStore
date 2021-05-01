<?php include_once("mysqlconnection.php");
if (isset($_POST['SignUp'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
    $errors=array();
    if ($c_password!=$password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    elseif($email!=$username){
        echo "<script>alert('Emails do not match')</script>";
    }
    else{
        $email_check=$dbcon->query("SELECT email FROM signup WHERE email='$email'");
        if($email_check->num_rows==0){
            $Query=$dbcon->query("INSERT INTO signup (email, username, password, c_password) VALUES ('$email', '$username', '$password', '$c_password')");
    if($Query){
        echo "<script>alert('Your Account has been successfully created')</script>";
        header("location: P5.php");
    }
    else{
        echo "<script>alert('Query did not work')</script>";
    }
        }
        else{
            echo "<script>alert('This Email is already occupied')</script>";
        }
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
                <li><a href="P5.php">Log In</a></li>
                <li><a href="P6.php" class="active">Sign Up</a></li>
            </ul>
        </header>
        <div class="registerouterbox">
            <span>Personal Information</span><br><br>
            <div class="registerouterbox1">
                <span class="categories1">TITLE</span><br><br><br>
                <select class="selectcategory1">
                    <option value="">Select your title</option>
                    <option value="">Mr.</option>
                    <option value="">Mrs.</option>
                    <option value="">Miss</option>
                    <option value="">Ms.</option>
                </select><br><br><span class="categories2">FIRST NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LAST NAME</span>&nbsp;&nbsp;&nbsp;<br><br>
                <input class="input1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="input2">
            </div><br>
            <div class="whiteline"></div>
            <br><span>Contact Information</span><br><br>
            <div class="registerouterbox2">
                <span class="categories1">ADDRESS (NO,STREET)</span><br><br><br>
                <input class="input3">
                <span class="categories3">APARTMENT</span><br><br><br><br><br>
                <input class="input4">
                <span class="categories4">CITY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COUNTRY</span><br><br><br><br><br>
                <input class="input5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="selectcategory2">
                    <option>Canada</option>
                </select>
                <span class="categories4">PROVINCE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POSTAL CODE</span><br><br><br><br><br>
                <select class="selectcategory3">
                    <option value="">Ontario</option>
                    <option value="">Alberta</option>
                    <option value="">British Columbia</option>
                    <option value="">Manitoba</option>
                    <option value="">New Brunswick</option>
                    <option value="">Newfoundland and Labrador</option>
                    <option value="">Northwest Territories</option>
                    <option value="">Nova Scotia</option>
                    <option value="">Nunavut</option>
                    <option value="">Prince Edward Island</option>
                    <option value="">Quebec</option>
                    <option value="">Saskatchewan</option>
                    <option value="">Yukon</option>
                </select><input class="input6"><br>
                <span class="categories5">PHONE NUMBER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOBILE PHONE</span><br><br><br><br>
                <input placeholder="555-555-5555" class="input7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input placeholder="555-555-5555" class="input8">
                <span class="categories5">EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONFIRM EMAIL</span>
                <br><br><br><br><br><br>
                <input class="input9" id="username" required type="email" name="username">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="input10" type="email" id="email" required name="email">
                <span class="categories4">PASSWORD</span><br><br><br>
                <input type="password" id="password" required name="password" class="input11">
                <span class="categories4">CONFIRM PASSWORD</span><br><br><br>
                <input type="password" id="c_password" required name="c_password" class="input12">
            </div>
            <div class="whitelinebottom"><input type="submit" value="Create Account" name="SignUp" class="createaccountbutton"><button type="reset" class="resetbutton" onclick="reset();">Reset</button></div>
        </div>
        <footer>
            <a href="backstore.html">Admin Page</a>
            <p> SOEN287 Course Project- Concordia SuperMarket</p>
        </footer>
    </form>
</body>

</html>
