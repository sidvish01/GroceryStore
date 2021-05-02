<!DOCTYPE html>
<html>

<head>
  <title>Order List</title>
  <link rel="stylesheet" type="text/css" href="stylep11.css">
</head>

<body>
  <header>
    <a href="index.html" >
      <img src="banner.png" alt="banner" class="bannerr">
    </a>
    <ul class="navbar">
      <li><a href="backstore.html">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="User list.php">Users</a></li>
      <li><a href="orderlist.php">Orders</a></li>
    </ul>
  </header>

      <div class = "main-area">

        <h2> Order List</h2>
        <table id="tableee" class="tablee" style="width:70%">
          <tr><th class="name">Email</th><th class="name">First Name</th><th class="name">Last Name</th><th class="name">Address</th><th class="name">List</th><th class="name">Action</th></tr>


          <?php
        if (! empty( $_POST["email"]) && ! empty( $_POST["address"]) && ! empty( $_POST["name"]) && ! empty( $_POST["last-name"])){
        $email = $_POST["email"];
        $addresis = $_POST["address"];
        $namee = $_POST["name"];
        $lastNamee = $_POST["last-name"];
        }
       

        $xml=simplexml_load_file("clients.xml") or die("Error: Cannot create object");
for ($count =0 ;$count < sizeof($xml) ;$count++){
  if (! empty( $_POST["email"])){ 
  if ($xml->client[$count]->email==$email){
    while ($xml->client[$count]->name != $namee){
      $name = $xml->client[$count]->name=$namee;
      //echo $name;
    }
    while ($xml->client[$count]->lastName != $lastNamee){
      $lastName = $xml->client[$count]->lastName=$lastNamee;
      //echo $lastName;
    }
    while ($xml->client[$count]->address != $addresis){
      $address = $xml->client[$count]->address=$addresis;
      //echo $address;
    }
    $xml->asXML("clients.xml"); //this saves the changes inside the actual xml file
  }
}

    $name= $xml->client[$count]->name;
    $lastName= $xml->client[$count]->lastName;
    $email= $xml->client[$count]->email;
    $address= $xml->client[$count]->address;
    
    $num = sizeof($xml->client[$count]->products);

    $openingLine='<tr><td>';
    $hidden1='<input type="hidden" name="';
    $hidden2='" value="';
    $hidden3='">';
    $middle='</td><td>';
    $end='</td></tr>';
    

    echo '<form action="editClient.php" method="post">';
    echo "$openingLine $email $hidden1";
    echo 'email';
    echo "$hidden2 $email $hidden3 $middle $name $hidden1";
    echo 'name';
    echo "$hidden2 $name $hidden3 $middle $lastName $hidden1";
    echo 'lastName';
    echo "$hidden2 $lastName $hidden3 $middle $address $hidden1";
    echo 'address';
    echo "$hidden2 $address $hidden3";
    //now it is the table of all the products
    echo '<td class="changepadding"><table class="innertable" style="width:100%">
    <tr><th>Product</th><th>Quantity</th></tr>';
    for ($countt=0;$countt<$num;$countt++){
        echo "$openingLine";
        echo $xml->client[$count]->products[$countt]->produceName;
        echo "$middle";
        echo $xml->client[$count]->products[$countt]->quan;
        echo "$end";
    }
    echo '</table>';
        echo "$middle";
    echo '<button type="submit" class="greybutton" name="edit">Edit</button><br>';
    // onclick="saveData(\'';
    // echo "$name";
    // echo '\',\'';
    // echo"$email";
    // echo'\',\'';
    // echo "$lastName";
    // echo '\',\'';
    // echo "$address";
     //echo '\')"';
    //echo ' class="greybutton" name="edit">Edit</button><br>';
    echo '</form>';
    echo '<button value="Delete" class="redbutton" onclick="deleteRow(this)" name="delete">Delete</button><br>
    <form method="post"><button class="greenbutton" name="completed">Completed</button></form><br>';
    //echo '</form>';
    echo "$end";
   // <a href="#nothingyet">
    }
?> 
        </table>
        <a href="addClient.php"> <button id="addbutton">Add Client</button></a>
        <script async>
         function deleteRow(r) {
     console.log(r);
  var i = r.parentNode.parentNode.rowIndex;
  console.log(i);
  document.getElementById("tableee").deleteRow(i);
}
</script>

<!-- <?php
    //     if(array_key_exists('completed', $_POST)) {
    //       completed();
    //     }
    //     function completed() {
    //       $xml=simplexml_load_file("clients.xml") or die("Error: Cannot create object");
    //       //$email = $_POST["email"];
    //      // $address = $_POST["address"];
    //      // $name = $_POST["name"];
    //      // $lastName = $_POST["lastName"];   

    //       for ($count =0 ;$count < sizeof($xml) ;$count++){ 
    //         if ($xml->client[$count]->email==$email){
    //         $xml->client[$count]->name=null;
    //         $xml->client[$count]->lastName=null;
    //         $xml->client[$count]->address=null;
    //         $xml->client[$count]->email=null;
    //     }
    //   }
    // }

    ?> -->

    </div>
    <footer>
      <p> SOEN287 Course Project- Concordia SuperMarket</p>
    </footer>
    </body>
</html>
