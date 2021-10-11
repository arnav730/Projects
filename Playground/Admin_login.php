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
          $errMsg = null;
          header("Location: Welcome.php");
      }
      else{
        $errMsg = "Bhosdike password galat hai!";
        header("Location: Admin_login.php?err=$errMsg");
      }

    }
    else{
      $errMsg = "Bhosdike hai kaun tu madarchod?";
      header("Location: Admin_login.php?err=$errMsg");
    }
  }
    else{
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Assets/CSS/bootstrap.css" />
    <script src="main.js"></script>
</head>

<body>
<div class="container">
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

</body>
</html>

    <?php } ?>