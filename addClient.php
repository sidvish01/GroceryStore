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
  //$userId = $_POST["id"];
  //$address = $_POST["address"];
  //$name = $_POST["name"];
  //$lastName = $_POST["lastName"];    
     
  ?> 
        
        
      <div class = "main-area">
        <h1>Add New Order Manually</h1>
        <div class="boxing" >
          <form action="orderlist.php" method="post">
          <div class="clientinfo">
      <div class="info">
        Name:
        <input class="details" type="text" name="name">
      </div>
      <div class="info">
        Last Name:
        <input class="details" type="text" name="last-name">
      </div><br>
      <div class="info">
        Email:
        <input class="details" type="text" name="email">
      </div>
      <div class="info">
        Address:
        <input class="details" type="text" name="address">
      </div>
          </div>
</form>
         <table id="tablee" style="width:60%">
          <caption id="list">Product List</caption>
          <tr class="title"><th>Product</th><th>Quantity</th><th>Action</th></tr>
          <tr>
              <td><input class="details" type="text" name="productt"></td>
              <td>
          <div class="shop">
            <button onclick="Decrement()" class="adding">-</button>
            <div id="quan">1</div>
            <button onclick="increment()" class="adding">+</button>
          </div>
        
                 <!-- <input class="details" type="text" name="quant">-->
                </td>
                <td><button value="Delete"class="redbutton" onclick="deleteRow(this)" name="delete">Delete</button></td>
            </tr>
        </table><br>
        <button id="addbutton" type="button" onclick="addProduct()">Add another Product</button>
        <script>
            var n=0;
            function addProduct(){
                n++;
   var table = document.getElementById("tablee");
   var totalRowCount = table.rows.length;

   var row = table.insertRow(totalRowCount);
   var cell1 = row.insertCell(0);
   var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
   cell1.innerHTML = '<td><input class="details" type="text" name="productt"></td>';
   cell2.innerHTML = '<td><div class="shop"><button onclick="Decrement()" class="adding">-</button><div id="quan">1</div><button onclick="increment()" class="adding">+</button></div></td>';
   cell3.innerHTML = '<td><button class="redbutton" onclick="deleteRow(this)" name="delete">Delete</button></td>' ;
 }

 function deleteRow(r) {
     console.log(r);
  var i = r.parentNode.parentNode.rowIndex;
  console.log(i);
  document.getElementById("tablee").deleteRow(i);
}

function increment(){
  var value = parseInt(document.getElementById("quan").innerHTML) + 1;
  document.getElementById("quan").innerHTML = value;
  
}

function Decrement() {
    if (document.getElementById("quan").innerHTML==1){
      document.getElementById("quan").innerHTML = 1;
    }
    else{
      var value = parseInt(document.getElementById("quan").innerHTML) - 1;
      document.getElementById("quan").innerHTML = value;
    }
}
 </script>
        
        </div><br>
        <button href="orderlist.php" type="submit" id="addbutton" value="Save Changes">Save Changes</button>
        <button href="orderlist.php" class="redbutton" value="Discard Changes">Discard Changes</button>
        <!-- <a href="editlist.html"> <button id="addbutton">Save Changes</button></a>
        <a href="orderlist.html"><button class="redbutton">Discard Changes</button></a> -->
      <!--</form>-->
      <?php 
      function saveNewClient(){
        $xml=simplexml_load_file("clients.xml") or die("Error: Cannot create object");
        $num=sizeof($xml);
        $xml->client[$num+1]->id=$_POST["id"];
        $xml->client[$num+1]->name=$_POST["name"];
        $xml->client[$num+1]->name=$_POST["last-name"];
        $xml->client[$num+1]->name=$_POST["address"];
        $xml->client[$num+1]->products->produceName=$_POST["productt"];
        $xml->client[$num+1]->products->quan=$_POST["quan"];
        $xml->asXML("clients.xml");

         //$userId = $_POST["id"];
  //$address = $_POST["address"];
  //$name = $_POST["name"];
  //$lastName = $_POST["lastName"];  
      }
      
      ?>

    </div>

    </body>
</html>
<!--<input class="details" type="number"> -->