<!DOCTYPE html>
<html>

<head>
  <title>Edit List</title>
  <link rel="stylesheet" type="text/css" href="stylep12.css">
  <script src="jsforp11.js" async></script>
</head>

<body>
  <header>
    <a href="index.html" >
      <img src="banner.png" alt="banner" class="bannerr">
    </a>
    <ul class="navbar">
      <li><a href="backstore.html">Home</a></li>
      <li><a href="products.html">Products</a></li>
      <li><a href="User list.html">Users</a></li>
      <li><a href="orderlist.php">Orders</a></li>
    </ul>
  </header>
  
  <?php
  $email = $_POST["email"];
  $address = $_POST["address"];
  $name = $_POST["name"];
  $lastName = $_POST["lastName"];    
     
  ?> 
        
        
      <div class = "main-area">
        <h1>Edit Client</h1>
        <div class="boxing" >
          <form action="orderlist2.php" method="post">
          <div class="clientinfo">
      <div class="info">
        Name:
        <input class="details" type="text" name="name" value="<?php echo $name ?>" >
      </div>
      <div class="info">
        Last Name:
        <input class="details" type="text" name="last-name" value="<?php echo $lastName ?>">
      </div><br>
      <div class="info">
        Email:
        <input class="details" type="text" name="email" value="<?php echo $email ?>">
      </div>
      <div class="info">
        Address:
        <input class="details" type="text" name="address" value="<?php echo $address ?>">
      </div>
          </div>
        <!-- <table class="tablee" style="width:60%">
          <caption id="list">Product List</caption>
          <tr class="title"><th>Product</th><th>Quantity</th></tr>
          <tr><td><input class="details" type="text" name="productt"></td><td><input class="details" type="text" name="quant"></td></tr>
        </table><br> -->
        


        </div><br>
        <button type="submit" id="addbutton" value="Save Changes">Save Changes</button>
        <button type="submit" class="redbutton" value="Discard Changes">Discard Changes</button>
        <!-- <a href="editlist.html"> <button id="addbutton">Save Changes</button></a>
        <a href="orderlist.html"><button class="redbutton">Discard Changes</button></a> -->
      </form>

    </div>

    </body>
</html>
<!--<input class="details" type="number"> -->