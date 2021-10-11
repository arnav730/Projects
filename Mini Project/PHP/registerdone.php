<?php
    $errMsg = null;

    if($_SERVER['REQUEST_METHOD']=='POST')  {
      $hostName = "localhost";
      $userName = "root";
      $password = "";
      $dbName = "storedb";

      $conn = new mysqli($hostName,$userName,$password,$dbName);

      if($conn->connect_error)
          die('Connection failed lol');

      $name = $_POST['Name'];
      $emailId = $_POST['Email'];
      $passwd = $_POST['Password'];
      $confpasswd = $_POST['ConfPassword'];
      $address = $_POST['Address'];
      $phone = $_POST['Phone'];
      $adminpass = $_POST['Adminpass'];
      // $photo= $_POST['photo'];
      // $path= "..\wall\ ";
      // $img=$path.$photo;
    //   echo $passwd."   ".$confpasswd;

      // $image =$_POST['photo'];
      // $img=addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
    
      if($passwd != $confpasswd)  {
        $errMsg = "Pass";
        header("Location: register.php?err=$errMsg");
      }
      else  {
        $sql2 = "SELECT PASSWORD FROM ADMIN WHERE PASSWORD = '$adminpass'";  
        
        $result1 = $conn->query($sql2);

        $r = mysqli_num_rows($result1);
        
        if($r > 0)  {
        
            $sql = "INSERT INTO ADMIN(NAME,EMAIL,PHONE,ADDRESS,PASSWORD) VALUES('$name','$emailId','$phone','$address','$passwd')";

          $conn->query($sql);

          $sql1 = "SELECT MAX(ADMIN_ID) AS AIDS FROM ADMIN";

          $result = $conn->query($sql1);

          $row = $result->fetch_assoc();

          $admin_id = $row['AIDS'];
        }
        else    {
            $errMsg = "Admin";
            header("Location: register.php?err=$errMsg");
        }

    }
    
}


  ?>


  <html>
    <head>
      <title>Registration done</title>
</head>
<body>
  <h1>Thank you for registration</h1>
  <h3>click here to<a href="./index.php">login</a><h3>
</body>
</html>