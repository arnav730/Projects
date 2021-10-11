<?php
include_once("./constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
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

            if($conn->query($sql1)){
              echo "
                    <script>alert('Edited Sucessfuly');</script>
                  ";
                } else {
                  echo "
                    <script>alert('jkgj');</script>
                  ";
                }
  
         }
        }
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit Profile</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
<?php include_once("./header.php"); ?>


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="category_form" method="post" action="welcome.php">
          <div class="form-group">
            <label>RENAME</label>
            <input type="text" class="form-control" name="profile_name" id="profile_name" aria-describedby="emailHelp" placeholder="NEW NAME">
            <small id="cat_error" class="form-text text-muted"></small>
          </div>
          <button type="submit" name="add_category"class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
