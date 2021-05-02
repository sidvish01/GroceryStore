<!DOCTYPE html>
<html>

	<head>
	
	<link rel="stylesheet" type="text/css" href="navbar.css">
		<title>User Edit</title>
	</head>
	
	<body class="background">
		<header>		
	        <img class="banner" src="images/banner.png" alt="banner" >
			
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
				

				<?php 
				if(empty($_GET['Id'])){
				echo "<p>";
				echo "<form  method=\"post\">";							
				echo	"Name:<input  type=\"text\"  name=\"name\" id=\"name\" class=\"form-display\" value=\"\">";			
				echo	"Email:<input  type=\"email\" name=\"email\" id=\"email\"  class=\"form-display\" value=\"\">";			
				echo	"Address:<input  type=\"text\"  name=\"address\" id=\"address\" class=\"form-display\" value=\"\">";
				echo	"<a a href=\"User List.php\"><input type=\"submit\" name=\"submit\" value=\"Submit\"></a>";
				echo "</form>";
				echo "</p>";
				}
				else{
				echo "<p>";
				echo "<form  method=\"post\" >";							
				echo	"Name:<input  type=\"text\"  name=\"name\" id=\"name\" class=\"form-display\" value=\"";
				echo $xml->client[(int)$_GET['Id']-1]->Name;
				echo "\">";			
				echo	"Email:<input  type=\"email\" name=\"email\" id=\"email\"  class=\"form-display\" value=\"";
				echo $xml->client[(int)$_GET['Id']-1] ->Email; ;
				echo "\">";			
				echo	"Address:<input  type=\"text\"  name=\"address\" id=\"address\" class=\"form-display\" value=\"";
				echo  $xml->client[(int)$_GET['Id']-1] ->Address; ;
				echo "\">";
				echo	"<a a href=\"User List.php\"><input type=\"submit\" name=\"submit\" value=\"Submit\"></a>";
				echo "</form>";
				echo "</p>";
				}



				?>

			



				<?php
				
			    
			    if (isset($_POST['submit'])&&(!empty($_GET['Id']))){
			    	$user=$xml->client[(int)$_GET['Id']-1];
			    	$user ->Name= $_POST['name'];
				    $user ->Email=$_POST['email'];
				    $user ->Address=$_POST['address'];
				    file_put_contents("user.xml", $xml->saveXML());
				    echo "User has been Modified";
			    }
			    else if(isset($_POST['submit']))
			    {
			    	$userbase=$xml;

					$client=$userbase->addchild('client');
					$client->addchild("Name", $_POST['name']);
					$client->addchild("Email",$_POST['email']);
					$client->addchild ("Address",$_POST['address']);
					$client->addchild("Username", $_POST['email']);
					$client->addchild("Password", "00000000");
					file_put_contents("user.xml", $xml->saveXML());
					echo "user has beed added";
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