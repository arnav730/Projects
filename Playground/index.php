<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INDEX</title>
    <link rel="stylesheet" type="text/css" href="../Mini Project/Assets/CSS/allinone.css" />
    <link rel="stylesheet" type="text/css" href="../Mini Project/Assets/CSS/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./1.css" />
</head>
<body>
 <div class="register"> 
   <div class="row">
   <div class="col-sm">
    <h1><a href="./PHP/Order.php" target="_blank" style="color:chocolate" >Order items</a></h1>
    </div>
    <div class="col-sm">
    <h1><a href="./PHP/register.php" target="_blank" style="color: crimson">Register</a></h1>
    </div>
    

</div>    
</div> 
 
    <div class="container"> 
        <h1>Admin Login</h1>           
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="Email" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Password" placeholder="Password" required>
  </div>
  <?php
    error_reporting(E_ALL & ~E_NOTICE);
    $error = $_GET['err'];
    echo '<p><span style="color: red;">'.$error.'</span></p>';  ?>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>                       
         
</body>
</html>






