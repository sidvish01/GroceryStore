<?php
session_start();
?>
<html>
<head>
  <meta charset="utf-8">
  <title> Concordia SuperMarket Backstore</title>
  <link rel="stylesheet" type="text/css" href="styleAddProd.css">
  <!--Google Fonts & Material Icons-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <header>
    <div class="csm-banner">
      <img src="banner.png" height="auto" width="100%">
    </div>
    <ul class="navbar">
      <li><a href="backstore.html">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="User List.html">Users</a></li>
      <li><a href="orderlist.html">Orders</a></li>
    </ul>
  </header>
  <div class="main-area">
    <h2>Add Product</h2>
    <div class="add">
      <form action="addProduct.php" method="POST">
        <button class="save-button" name="save" type="submit" style="vertical-align:middle"><span>Save</span></button>
        <div class="add-image">
          <label>Image File:</label>
          <input type="text" name="image" id="addP" style="background-color:white">
        </div>
        <div class="add-name">
          <label>Product Name:</label>
          <input type="text" name="productname" id="productname" style="background:white">
        </div>
        <div class="add-description">
          <label>Inventory:</label>
          <input type="text" name="inventory" id="inventory" style="background-color:white">
        </div>
    </form>
    </div>
  </div>
</body>
</html>
<?php
//create database
 $file = fopen('backstore.txt', 'a');

//if submit info
if(isset($_POST['save'])) {
    $_SESSION['prodname'] = $_POST['productname'];
    $_SESSION['prodinventory'] = $_POST['inventory'];
    $_SESSION['prodimage'] = $_POST['image'];

    fwrite($file, "ImageFile: ");
    fwrite($file, $_SESSION['prodimage'] . "\n");
    fwrite($file, "ProductName: ");
    fwrite($file,  $_SESSION['prodname'] . "\n");
    fwrite($file, "Inventory: ");
    fwrite($file, $_SESSION['prodinventory'] . "\n");
}
fclose($file);
?>