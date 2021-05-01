<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Concordia Supermarket-Backstore</title>
  <link rel="stylesheet" type="text/css" href="stylep7.css">
  <!--Google Fonts & Materials Icons-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
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
    <h2>Products</h2>
    <a href="addProduct.php">
      <button class="add"><span>Add a Product</span></button></a>
    <table id="table">
    <thead>
      <tr>
        <th style="height:50px;width:100px">Product Name</th>
        <th style="height:50px;width:100px">Inventory</th>
        <th style="height:50px;width:100px">Edit</th>
        <th style="height:50px;width:100px">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $file_pointer = fopen('backstore.txt','r');
    if(isset($_SESSION['prodname'])) {
      while (!feof($file_pointer)) {
        $line = fgets($file_pointer);
        if(str_contains($line,"ImageFile:")) {
          $info = explode(" ", $line)[1];
          echo '<tr><td><img src="'. $info .'" height=50 width=90></img>';
        }
        else if(str_contains($line,"ProductName:")){
          $info2 = explode(" ", $line)[1];
          echo $info2 . '</td>';
        }
        else if(str_contains($line,"Inventory:" )) {
          $info3 = explode(" ", $line)[1];
          echo '<td>' . $info3 . '</td><td><a href="editProduct.php"><button type="button" name="edit" class="edit-button">edit</button></a></td>
          <td><form action="products.php"><input type="submit" name="delete" value="delete" class="delete-button"></form></td></tr>';
        }
      }
    }
    fclose($file_pointer);
  ?>
  </tbody>
  </table>
</div>
</body>
<?php
if(isset($_GET['delete'])){

  $filename = 'backstore.txt';
  $contents = file($filename);

  foreach($contents as $c){
    if(str_contains($c, $_SESSION['prodimage'])){
      $str = str_replace('ImageFile: '.$_SESSION['prodimage'], '', file_get_contents($filename));
      file_put_contents($filename, $str);
    }
    else if(str_contains($c, $_SESSION['prodname'])){
      $str = str_replace('ProductName: '.$_SESSION['prodname'], '', file_get_contents($filename));
      file_put_contents($filename, $str);
    }
    else if(str_contains($c, $_SESSION['prodinventory'])) {
      $str = str_replace('Inventory: '.$_SESSION['prodinventory'], '', file_get_contents($filename));
      file_put_contents($filename, $str);
      $delfile = "p3-" . $_SESSION['prodname'] . ".html";
      if(!unlink($delfile)){
        echo "<h3> Product page file ". $delfile. " cannot be deleted! Please refresh page and try again. </h3>";
      }
      else {
        echo "<h3> Product page file " .$delfile. " has succesfully been deleted </h3>";
      }
    }
  }
}
?>
</html>

