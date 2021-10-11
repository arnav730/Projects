<?php
include_once("./constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
if($_SERVER['REQUEST_METHOD']=='POST')  {
                      $hostName = "localhost";
                      $userName = "root";
                      $password = "";
                      $dbName = "storedb";

                      $conn = new mysqli($hostName,$userName,$password,$dbName);

                      if($conn->connect_error)
                            die('Connection failed lol');
                          else
                            echo "connected";


                          $did = $_POST['id'];
                 $sql ="DELETE FROM category_info WHERE c_name = '$did'";
                 $conn->query($sql);
                 echo $conn->error;
                
                
                }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Store Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/manage.js"></script>
 </head>
<body>
	<!-- Navbar -->
	<?php include_once("./header.php"); ?>
	<br/><br/>
  <h1 class="container"><div style="margin-left:400px;margin-bottom:50px;"> CATEGORIES </div></h1>
	<div class="container">
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Category</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		     
  <?php

         $errMsg = null;
         $hostName = "localhost";
         $userName = "root";
         $password = "";
         $dbName = "storedb";
   
         $conn = new mysqli($hostName,$userName,$password,$dbName);
   
         if($conn->connect_error)
             die('Connection failed lol'); 
   
             $sql = "SELECT * FROM category_info";
             $result = $conn->query($sql);
             $i=0;
             
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {

                  $categoryName =  $row["c_name"];
                  
                  $i=$i+1;

                  echo "
                  <tr class='container'>
                  
                  <td>$i</td>
                  <td>$categoryName</td>
                  <td><input type=submit name=submit value=Available class='btn btn-success btn-sm del_brand'></td>
                  <td><form method=post>
                    <input name=id type=hidden value='".$categoryName."';>
                    <input type=submit name=submit value=Delete class='btn btn-danger btn-sm del_brand'>
                    </form></td>
                  </tr>
                  
                  ";
                 }
             }

       ?>
			
		  </table>
	</div>


	
	
</body>
</html>