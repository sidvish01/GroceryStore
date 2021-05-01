<!DOCTYPE html>
<html>

	<head>
	<link rel="stylesheet" type="text/css" href="navbar.css">
	<script type="User List.js"></script>

		<title>User List</title>
	</head>

	<body class="background">
	  	
		<header>
			<a href="orderlist.html">
        	<img class="banner" src="Images/Banner.png" alt="banner" >
      		</a>
			
		</header>
		<div>
			<ul class="navbar">
		        <li><a href="backstore.php">Home</a></li>
		        <li><a href="products.php">Product</a> </li>
		        <li><a class="active" >User</a></li>
		        <li><a href="orderlist.php">Order</a></li>
	      	</ul>
      </div>

		<div class="backstore_area">
			<h1>User List</h1>

			<div class="backstore_background">

					<table>
						<thead>
							<tr>
								<th>ID</th>
							<?php
							$file="user.xml";
					$xml= simplexml_load_file($file) or die("no load");
					$element_name=array();
					foreach ($xml->children()->children() as $value) {
					 	$element_name[]=$value->getName();
					}
					unset($element_name[3]);
					unset($element_name[4]);
							foreach ($element_name as $value ) {
								echo "<th>{$value}</th>";
							}
							?>
							<th>Edit User</th>
							</tr>	
						</thead>

						
					<tbody>
						
						<?php
						
							$count=1;

						 	foreach ($xml->children() as $value) {
						  	 	echo "<tr>";	 	
						  	 	echo "<td>$count</td>";
						  	 	

						  	 	for ($i=0; $i <count($element_name); $i++) { 
						  	 		$element=$element_name[$i];
						  	 		$data=$value ->children()->$element;
						  	 		$sData=(String)$data;
						  	 		echo "<td>{$data}</td>";
						  	 	}
						  	 	echo "<td> 
						  	 				<a href=\"User Edit.php?Id=$count\">
						  	 					<button class=\"add\" style=\"vertical-align:middle\" >
						  	 						<span>Edit</span></button>
						  	 				</a>
						  	 				<form method=\"post\">
						  	 				<input type=\"submit\" class=\"add\"  style=\"vertical-align:middle\" name=\"$count\" value=\"Delete\"  onclick=\"deleteUser()\">
						  	 				</form>
						  	 				

						  	 		</td>";
						  	 	echo "</tr>";
						  	 	$count++;
						  	}
						  	for ($i=0; $i < $count; $i++) { 
						  		if(isset($_POST[$i])){
						  		deleteUser($i);
						  	}
						  	}
						  	
 

						  	function deleteUser($num){
						      
						      $file="user.xml";
						      $xml= simplexml_load_file($file) or die("no load");
						      
						      unset($xml->client[$num-1]);
						      file_put_contents("user.xml", $xml->saveXML());
						      
						 	}
						  	 	
						?>

						
					</tbody>		
				  	</table>
					

					
			  	</div>

		</div>
  
  </div>
  <hr>
    <a href="p6.php"><button class="add">Add User</button></a>
   

</body>	


	</body>

	<div>
		<footer>
        <p> SOEN287 Course Project- Concordia SuperMarket</p>
        <p><a href="index.html">main page</a></p>

    </footer>
    <script >
		
		</script>
	</div>
</html> 