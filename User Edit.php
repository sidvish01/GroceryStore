<!DOCTYPE html>
<html>

	<head>
	
	<link rel="stylesheet" type="text/css" href="navbar.css">
		<title>User Edit</title>
	</head>
	
	<body class="background">
		<header>		
	        <img class="banner" src="Images/banner.png" alt="banner" >
			
		</header>
	
	

		<div>
			
			<ul class="navbar">
		        <ul class="navbar">
		        <li><a href="backstore.html">Home</a></li>
		        <li><a href="products.html">Product</a> </li>
		        <li><a href="User List.php">User</a></li>
		        <li><a href="orderlist.html">Order</a></li>
	      	</ul>
	      	</ul>
      
      </div>
		<div  class="backstore_area">
			<h1>User Edit</h1>
			<div class="backstore_background">
			

			<?php
				$file="user.xml";
				$xml= simplexml_load_file($file) or die("no load");			
				$element_name=array();
					foreach ($xml->children()->children() as $value) {
					 	$element_name[]=$value->getName();
					}
					unset($element_name[3]);
					unset($element_name[4]);
				
					
				


				?>


			<p>
				<form  method="post" >								
					Name:<input  type="text"  name="name" id="name" class="form-display" value="<?php echo $xml->client[(int)$_GET['Id']-1] ->Name; ?>">			
					Email:<input  type="email" name="email" id="email"  class="form-display" value="<?php  echo $xml->client[(int)$_GET['Id']-1] ->Email; ?>">			
					Address:<input  type="text"  name="address" id="address" class="form-display" value="<?php echo $xml->client[(int)$_GET['Id']-1] ->Address; ?>">
					<a a href="User List.php"><input type="submit" name="submit" value="Submit"></a>
				</form>
				<?php
				$user=$xml->client[(int)$_GET['Id']-1];
			    
			    if (isset($_POST['submit'])){
			    	
			    	$user ->Name= $_POST['name'];
				    $user ->Email=$_POST['email'];
				    $user ->Address=$_POST['address'];
				    file_put_contents("user.xml", $xml->saveXML());
				    echo "User has been Modified";
			    }
			    ?>
        
			</p>
			</div>	
		</div>
		

	</body>
	<div>
		<footer>
        <p> SOEN287 Course Project- Concordia SuperMarket</p>
        <p><a href="index.html">main page</a></p>

    </footer>
	</div>
</html> 