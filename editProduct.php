<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Concordia SuperMarket-Backstore</title>
  <link rel="stylesheet" type="text/css" href="stylep8.css">
  <!-- Google Fonts & Material Icons-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>
  <header>
    <div class="csm-banner">
      <a href="index.html"><img src="banner.png" height="auto" width="100%"></a>
    </div>
    <ul class="navbar">
      <li><a href="backstore.html">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="User List.php">Users</a></li>
      <li><a href="orderlist.php">Orders</a></li>
    </ul>
  </header>
  <div class="main-area">
    <h2>Edit Product</h2>
    <div class="edit">
      <form action="editProduct.php" method="POST">
        <div class="edit-name">
          <label>Product Name: </label>
          <input type="text" name="productnameEdit" value=<?php echo $_SESSION['prodname']?> style="background:white">
        </div>
        <div class="edit-inventory">
          <label>Inventory: </label>
          <input type="text" name="inventoryEdit" value=<?php echo $_SESSION['prodinventory']?> style="background:white">
        </div>
        <div class="edit-image">
          <label>Image File: </label>
          <input type="text" name="imageEdit" value=<?php echo $_SESSION['prodimage']?> style="background-color:white">
        </div>
        <input type="submit" name="edit" class="save-button">
      </form>
      </div>
  </div>
</body>
<?php
if(isset($_POST['edit'])){

  $filename = 'backstore.txt';
  $contents = file($filename);

  foreach($contents as $line){
    if(str_contains($line, $_SESSION['prodimage'])){
      $str = str_replace($line, "ImageFile: ".$_POST['imageEdit']."\n", file_get_contents($filename));
      file_put_contents($filename, $str);
      $_SESSION['prodimage'] = $_POST['imageEdit'];
    }
    else if(str_contains($line, $_SESSION['prodname'])){
      $str = str_replace($line,"ProductName: ".$_POST['productnameEdit']."\n", file_get_contents($filename));
      file_put_contents($filename, $str);
      $_SESSION['prodname'] = $_POST['productnameEdit'];
    }
    else if(str_contains($line, $_SESSION['prodinventory'])) {
      $str = str_replace($line, "Inventory: ".$_POST['inventoryEdit']."\n", file_get_contents($filename));
      file_put_contents($filename, $str);
      $_SESSION['prodinventory'] = $_POST['inventoryEdit'];
    }
  }
}
?>
</html>
