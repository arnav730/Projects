<?php
    require_once('authenticate.php');
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    
    $user = $_SESSION['uname'];
    ?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Store Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
<?php include_once("./header.php"); ?>   
    </ul>
  </div>
</nav>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4" >
				<div class="card mx-auto">
				  <!-- <img class="card-img-top mx-auto" style="width:35%;" src="../Assets/CSS/profile.jpg" alt="Card image cap"> -->
				  
				  <div class="card-body">
				    <h4 class="card-title">Profile Info</h4>


					<?php
						session_start();
						 $errMsg = null;
						 $hostName = "localhost";
						 $userName = "root";
						 $password = "";
						 $dbName = "storedb";
				   
						 $conn = new mysqli($hostName,$userName,$password,$dbName);
				   
						 if($conn->connect_error)
							 die('Connection failed lol'); 
							 $emailId = $_SESSION['email'];
							 $sql ="SELECT name FROM admin where EMAIL='$emailId'";

							 $result = $conn->query($sql);
							 $row = mysqli_fetch_array($result);
						?> 


				    <?php

						$error = false;

						  $errMsg = null;
						    if($_SERVER['REQUEST_METHOD']=='POST')  {
						      $hostName = "localhost";
						      $userName = "root";
						      $password = "";
						      $dbName = "storedb";

						      $conn = new mysqli($hostName,$userName,$password,$dbName);

						      if($conn->connect_error)
						          die('Connection failed lol');

						          if(isset($_POST['profile_name'])){

						            $profile_name= $_POST['profile_name'];  

						            $sql1 = "UPDATE ADMIN SET NAME = '$profile_name' WHERE EMAIL = '$emailId'";

						            $conn->query($sql1);
						           
						           $emailId = $_SESSION['email'];
							 $sql ="SELECT name FROM admin where EMAIL='$emailId'";

							 $result = $conn->query($sql);
							 $row = mysqli_fetch_array($result);

						          }
						        }
                              ?>



						

						<p class="card-text"><i class="fa fa-user">&nbsp;</i> <?php 
						{echo $row['name'];} ?></p>
						<p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
						<!-- <a href="profile.php"  class="btn btn-primary">Edit Profile</a> -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Edit Profile</button>






						<!--  -->


						<!-- Button trigger modal -->


							<!-- Modal -->
							<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <!--  -->
							        <form method="post" action="welcome.php">
							          <div class="form-group">
							            <label>RENAME</label>
							            <input type="text" class="form-control" name="profile_name" id="profile_name" placeholder="NEW NAME">
							            <small id="cat_error" class="form-text text-muted"></small>
							          </div>
							          <button type="submit" name="add_category"class="btn btn-primary">Save Changes</button>
							        </form>
							        <!--  -->
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
							      </div>
							    </div>
							  </div>
							</div>



						<!--  -->


		
				  </div>
				  				  
				</div>
				<div class="card mx-auto" style="margin-top: 10%">
					<div class="card-body">
				    <h4 class="card-title">Quotes</h4>
					<p class="card-text" id='quote'>
						</p></div></div>
			</div>

			<div class="col-md-8" ">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1 style="margin-top: -54px;margin-bottom: 36px;">Welcome Admin,</h1>
					<div class="row">
						<div class="col-sm-6">
							<!-- <iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe> -->

							<div class="cleanslate w24tz-current-time w24tz-middle" style="display: inline-block !important;padding: 24px 20px 32px!important; visibility: hidden !important; min-width:300px !important; min-height:145px !important;"><p><a href="//24timezones.com/world_directory/time_in_bangalore.php" style="text-decoration: none" class="clock24" id="tz24-1542478631-c1438-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMSIsInNob3dzZWNvbmRzIjoiMCIsImNvbnRhaW5lcl9pZCI6ImNsb2NrX2Jsb2NrX2NiNWJmMDViMjcwNDI0YiIsInR5cGUiOiJkYiIsImxhbmciOiJlbiJ9" title="World Clock :: Bangalore" target="_blank" rel="nofollow">Bangalore time</a></p><div id="clock_block_cb5bf05b270424b"></div></div>
							<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
						
						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">New Orders</h4>
						        <p class="card-text">Here you can see orders received</p>
						        <a href="new_order.php" class="btn btn-primary" >New Orders</a>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
						<a href="manage_categories.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Supplier</h4>
						<p class="card-text">Here you can manage your supplier and you add new supplier</p>
						<a href="#" data-toggle="modal" data-target="#form_supplier" class="btn btn-primary">Add</a>
						<a href="manage_brand.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your products and you add new products</p>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Add</a>
						<a href="manage_product.php" class="btn btn-primary">Manage</a>
						</div>
				</div>
			</div>
		</div>
	</div>


	
	<?php
	include_once("./category.php");
	 ?>
	 <?php
	
	include_once("./supplier.php");
	 ?>
	 <?php
	
	include_once("./products.php");
	
	 ?>

	 <script type="text/javascript">
	 	var span = document.getElementById('quote');
var quotes = [
  'Whatever the mind of man can conceive and believe, it can achieve',
  'Strive not to be a success, but rather to be of value',
  'The most difficult thing is the decision to act, the rest is merely tenacity',
  'Every strike brings me closer to the next home run',
  'Definiteness of purpose is the starting point of all achievement',
  'Either you run the day, or the day runs you',
  'Ask and it will be given to you; search, and you will find; knock and the door will be opened for you',
  'Go confidently in the direction of your dreams.  Live the life you have imagined',
  'Verything you’ve ever wanted is on the other side of fear',
  ' Start where you are. Use what you have.  Do what you can',
  'Whatever the mind of man can conceive and believe, it can achieve',
  'Strive not to be a success, but rather to be of value',
  'The most difficult thing is the decision to act, the rest is merely tenacity',
  'Every strike brings me closer to the next home run',
  'Definiteness of purpose is the starting point of all achievement',
  'Either you run the day, or the day runs you',
  'Ask and it will be given to you; search, and you will find; knock and the door will be opened for you',
  'Go confidently in the direction of your dreams.  Live the life you have imagined',
  'Verything you’ve ever wanted is on the other side of fear',
  ' Start where you are. Use what you have.  Do what you can',
  'Whatever the mind of man can conceive and believe, it can achieve',
  'Strive not to be a success, but rather to be of value',
  'The most difficult thing is the decision to act, the rest is merely tenacity',
  'Every strike brings me closer to the next home run',
  'Definiteness of purpose is the starting point of all achievement',
  'Either you run the day, or the day runs you',
  'Ask and it will be given to you; search, and you will find; knock and the door will be opened for you',
  'Go confidently in the direction of your dreams.  Live the life you have imagined',
  'Verything you’ve ever wanted is on the other side of fear',
  ' Start where you are. Use what you have.  Do what you can',
  'Whatever the mind of man can conceive and believe, it can achieve',
  'Strive not to be a success, but rather to be of value',
  'The most difficult thing is the decision to act, the rest is merely tenacity',
  'Every strike brings me closer to the next home run',
  'Definiteness of purpose is the starting point of all achievement',
  'Either you run the day, or the day runs you',
  'Ask and it will be given to you; search, and you will find; knock and the door will be opened for you',
  'Go confidently in the direction of your dreams.  Live the life you have imagined',
  'Verything you’ve ever wanted is on the other side of fear',
  ' Start where you are. Use what you have.  Do what you can'
];
var pos = 0;
span.textContent = quotes[pos];
setInterval(function(){
   if (pos >= quotes.length) pos = 1;
   pos++;
   span.textContent = quotes[pos];
}, 10000)
	 </script>



