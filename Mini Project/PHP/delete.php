
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

if (isset($_GET['order_id'])) {
	$id = $_GET['order_id'];

	$deleteData = "DELETE FROM order_received WHERE order_id=$id";
	$result = $conn->query($deleteData);
         if ($result){
         	header("location:new_order.php?msg=Deleted");
         } else{
         	echo "<script>alert('Not Deleted')</script>";
         }
}

?>