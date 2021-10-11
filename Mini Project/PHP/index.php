<?php 

  $errMsg = null;
  if($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "storedb";  

    $conn = new mysqli($hostName,$userName,$password,$dbName);

    $emailId = $_POST['Email'];
    $passwd = $_POST['Password'];

    $sql = "SELECT * FROM ADMIN WHERE EMAIL = '$emailId'";

    $result = $conn->query($sql);

    $r = mysqli_num_rows($result);

    if($r>0)  {
      $row = $result->fetch_assoc();
      $pass = $row['PASSWORD'];
      if($passwd === $pass) {
          session_start();
          $_SESSION['authenticated'] = 'true';
          $_SESSION['uname'] = $row['NAME'];
          $_SESSION['email'] = $row['EMAIL'];
          $_SESSION['userid'] = $row['ADMIN_ID'];
          $errMsg = null;
          header("Location: Welcome.php");
      }
      else{
        $errMsg = "Password error!";
        header("Location: index.php?err=$errMsg");
      }

    }
    else{
      $errMsg = "Wrong username";
      header("Location: index.php?err=$errMsg");
    }
  }
    else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Managment</title>
    
    <link rel="stylesheet" type="text/css" href="../../Mini Project/Assets/CSS/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../Mini Project/Assets/CSS/allinone.css" />
  
</head>
<body>
 <div class="register"> 
    <div class="col-sm">
    <h1><a href="./register.php" target="_blank" style="color: crimson;margin-left:200px";>Register</a></h1>
    </div>
    

</div>    
</div> 
 
    <div class="container"> 
        <h1>Admin Login</h1> 
        <form method="post">          
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

<?php
    }
    ?>




