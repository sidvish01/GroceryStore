<?php
session_start();
?>
<html>
<head>
  <title>Concordia SuperMarket</title>
  <link rel="stylesheet" type="text/css" href="stylep2.css">
  <!-- - Google Fonts work sans:product titles; Playfair display:aisle title-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Faustina&family=Yeseva+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <header>
    <a href="productpage.html" >
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
          <a href="p2-MeatPoultry">Meat and Poultry</a>
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
      <div class = "main-area">
        <h2> Meat & Poultry </h2>
        <div class="aisle-items">
          <div class="item">
            <a href="p3-groundbeef.html">
              <img src="product-images/groundbeef.jpg" class="item-image"></a>
            <div class="item-content">
              <p>Lean Ground Beef</p>
              <p>$1.32/ 100g</p>
              <p>$13.21/ kg $5.99/ lb</p>
            </div>
            <div class="item-buttons">
              <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle('Lean Ground Beef')">Add to Cart</button>
            </div>
        </div>
        <div class="item">
          <a href="p3-peppersteaks.html">
            <img src="product-images/pepper-beef-steaks.jpg" class="item-image"></a>
          <div class="item-content">
            <p>Pepper Beef Steaks</p>
            <p>$16.04 avg ea.</p>
            <p>$22.91/ kg $10.39/ lb</p>
          </div>
          <div class="item-buttons">
            <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle('Pepper Beef Steaks')">Add to Cart</button>
          </div>
        </div>
        <div class="item">
          <a href="p3-tbone.html">
            <img src="product-images/tbone-steaks.jpg" class="item-image"></a>
          <div class="item-content">
            <p>T-Bone Steaks</p>
            <p>$26.44 avg ea.</p>
            <p>$35.25/ kg $15.99/ lb</p>
          </div>
          <div class="item-buttons">
            <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle('Tbone Steaks')">Add to Cart</button>
          </div>
        </div>
        <div class="item">
          <a href="p3-chicken.html">
            <img src="product-images/chicken.jpg" class="item-image"></a>
          <div class="item-content">
            <p>Fresh Whole Chicken</p>
            <p>$12.54 avg ea.</p>
            <p>$8.36/ kg $3.79/ lb</p>
          </div>
          <div class="item-buttons">
            <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle('Whole Chicken')">Add to Cart</button>
          </div>
        </div>
        <div class="item">
          <a href="p3-porkribs.html">
            <img src="product-images/pork-backribs.jpg" class="item-image"></a>
          <div class="item-content">
            <p>Pork Back Ribs</p>
            <p>$15.41 avg ea.</p>
            <p>$15.41/ kg $6.99/ lb</p>
          </div>
          <div class="item-buttons">
            <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle('Pork Backribs')">Add to Cart</button>
          </div>
        </div>
        <div class="item">
          <a href="p3-drumsticks.html">
            <img src="product-images/chicken-drumstick.jpg" class="item-image"></a>
          <div class="item-content">
            <p>Chicken Drumsticks</p>
            <p>$7.62 avg ea.</p>
            <p>$6.35/ kg $2.88/ lb</p>
          </div>
          <div class="item-buttons">
            <button type="button" name="add to cart" class="add-button" onclick="addToCartAisle('Chicken Drumsticks')">Add to Cart</button>
          </div>
        </div>
        <?php include ('appendnewprod.php'); ?>
      </div>
    </div>
    <footer>
        <p> SOEN287 Course Project- Concordia SuperMarket</p>
        <a href="../ConcordiaSupermarket-Backstore/backstore.html">Admin Page</a>
    </footer>
  <script type="text/javascript">
  var products = [
  {
    name: "Lean Ground Beef",
    price: 13.21,
    img: "product-images/groundbeef.jpg"
  },
  {
    name: "Pepper Beef Steaks",
    price: 16.04,
    img: "product-images/pepper-beef-steaks.jpg"
  },
  {
    name: "T-Bone Steaks",
    price: 26.44,
    img: "product-images/tbone-steaks.jpg"
  },
  {
    name: "Fresh Whole Chicken",
    price: 12.54,
    img: "product-images/chicken.jpg"
  },
  {
    name: "Pork Back Ribs",
    price: 15.41,
    img: "product-images/pork-backribs.jpg"
  },
  {
    name: "Chicken Drumsticks",
    price: 7.62,
    img: "product-images/chicken-drumstick.jpg"
  },
];
updateCartTab(0);
//var cartRow = document.createElement('tr')
var something = ``;
var firstthing = `<table class="cart">
<tr class="cart-fields">
  <th>Item</th>
  <th>Quantity</th>
  <th>Price</th>
</tr>`;
var nextthing = ``;
var lastthing = `</table>`;
for (var i = 0; i < sessionStorage.length; i++) {
for (var p = 0; p < products.length; p++) {
  if (
    products[p].name == sessionStorage.key(i) &&
    sessionStorage.getItem(products[p].name) != 0
  ) {
    nextthing =
      nextthing +
      `<tr class="cart-item">
  <td class="item-name"><img src="${
    products[p].img
  }" width="150"
          height="150"><br><span id = "productname">${products[p].name}</span>
  </td>
  <td>
      <button class="button-cart-remove" type="button">-</button> <span class="item-quantity">${sessionStorage.getItem(
        products[p].name
      )}</span>
      <button class="button-cart-add" type="button">+</button>
  </td>
  <td class="item-price">${products[p].price}</td>
</tr>`;
  }
}
}
something = firstthing + nextthing + lastthing;

var cart = document.getElementsByClassName("try")[0];
var cartRow = document.createElement("div");
var cartRowContent = something;
cartRow.innerHTML = cartRowContent;
cart.prepend(cartRow);

var removeQuantityButton = document.getElementsByClassName(
"button-cart-remove"
);
var addQuantityButton = document.getElementsByClassName("button-cart-add");
var itemQuantity = document.getElementsByClassName("item-quantity");
updateCartTotal();

for (var i = 0; i < removeQuantityButton.length; i++) {
var button = removeQuantityButton[i];
if (itemQuantity[i].innerHTML == 1) {
  button.addEventListener("click", function (event) {
    var removePrompt = confirm("Do you want to remove this item from cart?");
    if (removePrompt == true) {
      console.log(buttonClicked.parentNode.children[0].children[2].innerText, 0)
      sessionStorage.setItem(
        buttonClicked.parentNode.children[0].children[2].innerText,
        0
      );
      var buttonClicked = event.target;
      buttonClicked.parentNode.parentNode.remove();
      updateCartTab(-1);
      updateCartTotal();
      checkEmptyCart();
    }
  });
} else {
  button.addEventListener("click", function (event) {
    var buttonClicked = event.target.parentNode;
    if (buttonClicked.children[1].innerHTML == 1) {
      var removePrompt = confirm(
        "Do you want to remove this item from cart?"
      );
      if (removePrompt == true) {
        sessionStorage.setItem(
          buttonClicked.parentNode.children[0].children[2].innerText,
          0
        );
        buttonClicked.parentNode.remove();
        updateCartTab(-1);
        updateCartTotal();
        checkEmptyCart();
      }
    } else {
      sessionStorage.setItem(
        buttonClicked.parentNode.children[0].children[2].innerText,
        buttonClicked.children[1].innerHTML - 1
      );
      buttonClicked.children[1].innerHTML -= 1;
      updateCartTab(-1);
      updateCartTotal();
      checkEmptyCart();
    }
  });
}
}

for (var i = 0; i < addQuantityButton.length; i++) {
var button = addQuantityButton[i];
button.addEventListener("click", function (event) {
  var buttonClicked = event.target.parentNode;
  sessionStorage.setItem(
    buttonClicked.parentNode.children[0].children[2].innerText,
    parseInt(buttonClicked.children[1].innerHTML) + 1
  );
  buttonClicked.children[1].innerHTML =
    parseInt(buttonClicked.children[1].innerHTML) + 1;
    updateCartTab(1);
  updateCartTotal();
  checkEmptyCart();
});
}

function updateCartTotal() {
var cartItem = document.getElementsByClassName("cart-item");
var total = 0;
for (var i = 0; i < cartItem.length; i++) {
  var price = parseFloat(
    cartItem[i]
      .getElementsByClassName("item-price")[0]
      .innerText.replace("$", "")
  );
  var quantity = parseInt(
    cartItem[i].getElementsByClassName("item-quantity")[0].innerText
  );
  total = total + price * quantity;
}
document.getElementsByClassName("subtotal")[0].innerText = total.toFixed(2);
document.getElementsByClassName("qst")[0].innerText = (
  0.09975 * total
).toFixed(2);
document.getElementsByClassName("gst")[0].innerText = (0.05 * total).toFixed(
  2
);
document.getElementsByClassName("total")[0].innerText = (
  parseFloat(document.getElementsByClassName("subtotal")[0].innerText) +
  parseFloat(document.getElementsByClassName("qst")[0].innerText) +
  parseFloat(document.getElementsByClassName("gst")[0].innerText)
).toFixed(2);
}

function checkEmptyCart() {
var cartItem = document.getElementsByClassName("cart-item");
if (cartItem.length == 0) {
  alert(
    "Your cart is empty, let's take you to homepage and add some items!!"
  );
  location.replace("index.html");
}
}

function addtocartbutton() {
var key = document.getElementById("name").innerHTML;
var addItems = parseInt(document.getElementById("qty").innerHTML);
updateCartTab(addItems);
addToSessionStorage(key, addItems);
document.getElementById("qty").innerHTML = 1;
}

function increaseQuantity() {
document.getElementById("qty").innerHTML =
  parseInt(document.getElementById("qty").innerHTML) + 1;
}
function decreaseQuantity() {
if (parseInt(document.getElementById("qty").innerHTML) > 1)
  document.getElementById("qty").innerHTML =
    parseInt(document.getElementById("qty").innerHTML) - 1;
}


function addToCartAisle(name){
var itemName = ""+name
console.log(itemName)
addToSessionStorage(name, 1)
updateCartTab(1)

}

function addToSessionStorage(itemName, itemQuantity) {
  if (sessionStorage.getItem(itemName) != null) {
    sessionStorage.setItem(itemName, (parseInt(sessionStorage.getItem(itemName)) + parseInt(itemQuantity)));

  } else {
    sessionStorage.setItem(itemName, itemQuantity);
  }
}

function updateCartTab(value) {
if (sessionStorage.getItem("itemTotal") != null) {
  sessionStorage.setItem(
    "itemTotal",
    parseInt(sessionStorage.getItem("itemTotal")) + parseInt(value)
  );
} else {
  sessionStorage.setItem("itemTotal", value);
}
showShowCartTab();
}

function showShowCartTab() {
document.getElementById("cart-tab").innerHTML =
  "Shopping Cart (" + sessionStorage.getItem("itemTotal") + ")";
}
  </script>
  </body>
</html>
