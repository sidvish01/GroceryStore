<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="CSS/SOEN287Project.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="cart.js"></script>
    <script>
        function SaveProduct(id) {
            var name = id;
            sessionStorage.setItem(name, 1);
        }

    </script>
</head>

<body style="background-image: url(Images/Background.png)">
    <header>
        <a href="#">
            <img src="Images/Banner.png" alt="banner" width="1500" height="150" class="bannerr">
        </a>
        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Aisles</a>
                <div class="dropdown-content">
                    <a href="Bakery.php" class="active">Bakery</a>
                    <a href="dairy.html">Dairy</a>
                    <a href="fruit aisle.html">Fruits And Vegetables</a>
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
            <li><a href="P6.php">Sign Up</a></li>
        </ul>
    </header>
<?php
session_start();
if(isset($_SESSION['user_login']))
{
    echo "<h1><center>Welcome!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='P5.php'>Logout</a></center></h1>";
}
else
{
    header("location: P5.php");
}
?>
    <div class="main-area">
        <h2> BAKERY </h2>
        <div class="aisle-items">
            <div class="item">
                <a href="P3_1.html">
                    <img src="images/Image1.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Double Flax Sliced Bread</p>
                    <p>$2.99 ea.</p>
                    <p>600g</p>
                </div>
                <div class="item-buttons">
                    <div>
                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('Double Flax Sliced Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_2.html">
                    <img src="Images/Image2.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Sprouted Grains Sliced Bread</p>
                    <p>$4.99 ea.</p>
                    <p>500g</p>
                </div>
                <div class="item-buttons">
                    <div>

                        <button type="button" name="add to cart" id="add-to-cart" id="add-to-cart" onclick="SaveProduct('Sprouted Grains Sliced Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_3.html">
                    <img src="Images/Image3.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Regular Challah Bread</p>
                    <p>$4.29 ea.</p>
                    <p>425g</p>
                </div>
                <div class="item-buttons">
                    <div>
                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('Regular Challah Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_4.html">
                    <img src="Images/Image4.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Cheddar Cheese Bread</p>
                    <p>$6.79 ea.</p>
                    <p>675g</p>
                </div>
                <div class="item-buttons">
                    <div>

                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('Cheddar Cheese Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_5.html">
                    <img src="Images/Image5.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Italian Calabrese Bread</p>
                    <p>$2.99 ea.</p>
                    <p>500g</p>
                </div>
                <div class="item-buttons">
                    <div>

                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('Italian Calabrese Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_6.html">
                    <img src="Images/Image6.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Goodhearth Grain Bread</p>
                    <p>$3.49 ea.</p>
                    <p>450g</p>
                </div>
                <div class="item-buttons">
                    <div>

                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('Goodhearth Grain Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_7.html">
                    <img src="Images/Image7.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>Cinnamon Swirl Loaf Bread</p>
                    <p>$4.99 ea.</p>
                    <p>670g</p>
                </div>
                <div class="item-buttons">
                    <div>

                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('Cinnamon Swirl Loaf Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <a href="P3_8.html">
                    <img src="Images/Image8.jpg" class="item-image"></a>
                <div class="item-content">
                    <p>12 Grains Rye Sliced Bread</p>
                    <p>$3.99 ea.</p>
                    <p>454g</p>
                </div>
                <div class="item-buttons">
                    <div>

                        <button type="button" name="add to cart" id="add-to-cart" onclick="SaveProduct('12 Grains Rye Sliced Bread')" class="add-button">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <a href="backstore.html">Admin Page</a>
        <p> SOEN287 Course Project- Concordia SuperMarket</p>
    </footer>
</body>

</html>
