<?php
//send info to p2 page
$file_data = '<div class="item">
<a href="p3-' . $_SESSION['prodname'] . '.html">
<img src="' . $_SESSION['prodimage']. '" class="item-image"></a>
<div class="item-content">
  <p>'. $_SESSION['prodname'].'</p>
  <p>$7.62 avg ea.</p>
  <p>$6.35/ kg $2.88/ lb</p>
</div>
<div class="item-buttons">
  <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle(\'Chicken Drumsticks\')">Add to Cart</button>
</div>
</div>';
//$file_data .= file_get_contents('p2-MeatPoultry.php');

//file_put_contents('p2-MeatPoultry.php', $file_data);
echo $file_data;   //sends last item sent into session to P2, proper UI

$newp3info = '
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="stylep3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Faustina&family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <header>
    <a href="productpage.html">
      <img src="banner.png" alt="banner" height="150" class="csm-banner">
    </a>
    <ul class="navbar">
      <li><a href="index.html">Home</a></li>
      <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Aisles</a>
        <div class="dropdown-content">
          <a href="Bakery.html">Bakery</a>
          <a href="dairy.html">Dairy</a>
          <a href="fruit aisle.html">Fruits And Vegetables</a>
          <a href="frozen_aisle.html">Frozen</a>
          <a href="p2-MeatPoultry.php">Meat and Poultry</a>
          <a href="aisle_pantry.html">Pantry</a>
          <a href="oats.html">Oats</a>
        </div>
      </li>
      <li><a href="aboutUs.html">About Us</a></li>
      <li><a href="contact_us.html">Contact Us</a></li>
      <li><a href="shopping_cart.html"><span id = "cart-tab">Shopping Cart</span></a></li>
      <li><a href="P5.php">Log In</a></li>
      <li><a href="p6.php">Sign Up</a></li>
    </ul>
  </header>
    <div class="main-area">
      <div class="row">
        <div class="column">
            <div class="item-image">
              <img id="image"src="'. $_SESSION['prodimage'] .'" width=100%>
              <div class="zoom">
                <span class="material-icons">zoom_in</span>
                <span class="material-icons">zoom_out</span>
              </div>
            </div>
        </div>
        <div class="column">
            <div class="item-info">
              <h2 id="name">'. $_SESSION['prodname'] .'</h2>
              <p> <span id="price">$12.54</span> avg ea.</p>
              <p>$8.36/ kg $3.79/ lb.</p>
              <div class="buttons">
                <button id="add-to-cart" class="add-cart" onclick = "addtocartbutton()">Add to Cart</button>
                <button id="decrease" class="decrement" onclick = "decreaseQuantity()">-</button>
                <b style="width:20px; text-align:center"><span id="qty"> 1 </span></b>
                <button id="increase" class="increment" onclick = "increaseQuantity()">+</button>
              </div>
            </div>
            <div class="product-description">
              <h2> Product Description </h2>
              <p> Product of Quebec.</p>
              <p> Product Number: 0012999 </p>
              <button type="button" name="more description" class="more-info" style="vertical-align:middle"><span>More Description</span></button>
              <div class="text" style="font-size:16px; display:none"> Buy 2 get 1 Free! Offer Expires: 12/12/21 </div>
            </div>
        </div>
      </div>
    </div>

    <footer>
        <a href="backstore.html">Admin Page</a>
        <p> SOEN287 Course Project- Concordia SuperMarket</p>
    </footer>
    <script src="shoppingcart.js"> </script>
    </body>
    </html>';
//create new p3 page
$newp3page = file_put_contents("p3-" . $_SESSION['prodname'] . ".html", $newp3info);
?>