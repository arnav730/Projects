<?php
include_once("./constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/manage.js"></script>
 </head>
<body>
	
	<?php include_once("./header.php"); ?>
	<br/><br/>
	<div class="container">
		<h1><center> RECEIVED ORDER</center> </h1>
		<br></br>
		<table class="table table-hover table-bordered">
		    <thead>
		    	<?php
		    		if (isset($_GET['msg'])) {
		    			$msg = $_GET['msg'];
		    			
		    		}
		    	?>
		      <tr>
		        <th>#</th>
		        <th>CUST_NAME</th>
		        <th>ORDER_ID</th>
		        <th>PROD_ID</th>
		        <th>PRICE</th>
		        <th>QUANTITY</th>
		        <th>ADDRESS</th>
		        <th>PHONE</th>
		        <th>DELETE</th>
		      </tr>
		    </thead>
		    <tbody>

		        <?php
						// session_start();
						 $errMsg = null;
						 $hostName = "localhost";
						 $userName = "root";
						 $password = "";
						 $dbName = "storedb";
				   
						 $conn = new mysqli($hostName,$userName,$password,$dbName);
				   
						 if($conn->connect_error)
							 die('Connection failed lol'); 
				?> 
		        
		        <?php
		        // $i = 0;
		        	$getData = "SELECT * FROM order_received";

		        	$result = $conn->query($getData);
             
		            if ($result->num_rows > 0) {
		            	$i = 1;
		                while($rowFetchData = $result->fetch_assoc()) {

		        	// $run_getData = mysqli_connect($conn,$getData);
		        	// $rowFetchData = mysqli_fetch_array($run_getData);

					        	$order_id = $rowFetchData['order_id'];
					        	$p_id = $rowFetchData['p_id'];
					        	$price = $rowFetchData['price'];
					        	$unit = $rowFetchData['unit'];
					        	$cName = $rowFetchData['CUST_NAME'];
					        	$phone = $rowFetchData['phone'];
					        	$address = $rowFetchData['address'];
		        	

					        	echo "

					        		<tr>
								        <th>$i</th>
								        <th>$cName</th>
								        <th>$order_id</th>
								        <th>$p_id</th>
								        <th>$price</th>
								        <th>$unit</th>
								        <th>$address</th>
								        <th>$phone</th>
								        	<th><a href='delete.php?order_id=$order_id'><input type='submit' value='DELETE'></a></th>
								    </tr>

					        	";
					        	$i++;
					        }
					    }

		        ?>
		        
		      
		    </tbody>
		  </table>
	</div>



	
	
</body>
</html>