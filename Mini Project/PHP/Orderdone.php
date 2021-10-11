<?php

    session_start();
    $errMsg = null;
    if($_SERVER['REQUEST_METHOD']=='POST')  {
      $hostName = "localhost";
      $userName = "root";
      $password = "";
      $dbName = "storedb";

      $conn = new mysqli($hostName,$userName,$password,$dbName);

      if($conn->connect_error)
          die('Connection failed lol');

          // $custname=$_POST['custname'];    
          // $phone = $_POST['phone'];
          // $adress = $_POST['adress'];

          // $sql123 = "INSERT INTO ORDERS(CUST_NAME,PHONE_NO,ADDRESS) VALUES ('$custname','$phone','$adress')";
          // $conn->query($sql123);


            // $address = $_SESSION['address'];
            // $phone = $_SESSION['phone'];

            // $sql = "INSERT INTO order_received(p_id,price,unit,CUST_NAME) VALUES ('3','$phone','$adress')";
            // $conn->query($sql);


          date_default_timezone_set('Asia/Kolkata');
          error_reporting(E_ALL & ~E_NOTICE);


          

          $x = localtime(time(),true);
          // print_r($x);

          $t = time();
          $date = date("d-m-Y",$t);

          $sql = "SELECT * FROM PRODUCT_INFO";
          $result = $conn->query($sql);
          $productid = array();
          $productcost = array();

          $c_name = $_SESSION['custname'];
          $address = $_SESSION['address'];
          $phone = $_SESSION['phone'];
          $ord_id = $_SESSION['OrderId'];




          $index = 0;
          while($row = $result->fetch_assoc())  {
              $productid[$index] = $row['p_id'];
              $productcost[$index] = $row['p_price'];
              
              $index++;
            }
            // for($id=0;$id<=$index;$id++){
              
            //   $id++;
            // }

            $selected = array();
            // $produit = $productid
            // print_r($productid);
            // print_r($productcost);


          


          $oid = $_SESSION['OrderId'];
               
               
           $hour = $x['tm_hour'];
           $min = $x['tm_min'];
          if(strlen($hour)==1)
            $hour = "0".$hour;
          if(strlen($min)==1)
            $min = "0".$min;
          $time1 = $hour.":".$min;  
          // echo $oid;
          
        $sql="UPDATE ORDERS SET ORDER_DATE='$date' WHERE ORDER_ID ='$oid'";
        $conn->query($sql);

        $sql = "UPDATE ORDERS SET TIMESTAMP = '$t' WHERE ORDER_ID  = '$oid'";
          $conn->query($sql);

           $sql = "UPDATE ORDERS SET DELIVERY_INTERVAL= '7' WHERE ORDER_ID  = '$oid'";
          $conn->query($sql);

        $inputno = count($_POST);
        // echo $inputno;
        // print_r($_POST);
        // print_r($selected);
        $o = 0;

          for($i = 0; $i < $index; $i++) {
            $reqid = $productid[$i];
            $reqcost = $productcost[$i];
            $postindex = "Commodid".$reqid;
            $postquant = "Commodname".$reqid;



            // echo $postindex; 
            if(!empty($_POST[$postindex])) {
              $selected[$o] = $_POST[$postindex];
              $selectedquants[$o] = $_POST[$postquant];
              $sqlForInsert = "INSERT INTO order_received(order_id,p_id,price,unit,CUST_NAME,phone,address) VALUES ('$ord_id','$reqid','$reqcost','$selectedquants[$o]','$c_name','$phone','$address')";
                $q=$selectedquants[$o];
              $conn->query($sqlForInsert);
              $cost[$o] = $productcost[$i] * $selectedquants[$o];
              $o++; 
             $sql = "SELECT * FROM product_info where p_id='$reqid'";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
             $no =  $row["p_qty"];
             // echo "$reqid";
             // echo "$no";
             // echo "$q";
            
             $a= ($no - $q);

             // echo "$a";
             $sql1="UPDATE product_info set p_qty='$a' where p_id='$reqid'";
             $conn->query($sql1);             }
            // echo "Madarchod";  
             // echo "$reqid";
            // echo "\t";

          }
        // print_r($selectedquants);
        // print_r($cost);


        
        while($o>=0){
          $totalcost=$totalcost+$cost[$o];
         $o--;
          }
          // echo "$totalcost";
          if(count($selected)==0)
          {
           
          
             // $message = "Select atleast one item";
             //  echo "<script type='text/javascript'>alert('$message');</script>";

            echo '<script type="text/javascript">'; 
            echo 'alert("Select any one item");'; 
            echo 'window.location.href = "commodity.php";';
            echo '</script>';
          }
    }


  ?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="./js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="../Assets/CSS/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Assets/CSS/orderdone.css" />
    <title>Thank You</title>
</head>
<body>
  <div id="smiley"> 
<img src="../Assets/CSS/smiley.jpg" alt="Girl in a jacket" style="width:400px;height:400px">
  </div>
          <div class="jumbotron">
  <h1 class="display-4">Thank You</h1>
  <p class="lead"><h1>Your order_id is :<?php 
     session_start();
    $errMsg = null;
    if($_SERVER['REQUEST_METHOD']=='POST')  {
      $hostName = "localhost";
      $userName = "root";
      $password = "";
      $dbName = "storedb";

      $conn = new mysqli($hostName,$userName,$password,$dbName);

      if($conn->connect_error)
          die('Connection failed lol');

          $sql="SELECT max(order_id) FROM ORDERS ";
          $result1=$conn->query($sql);
          $oid=mysqli_fetch_array($result1);

        echo "$oid[0]"; } ?></h1>
      

      <?php



    date_default_timezone_set('Asia/Kolkata');
    $t = time();
    $time = localtime($t,true);
    

    $dod = 604800;
    $nt = $t + $dod;

    $del_time = localtime($nt,true);
    echo "             ";
   
    $date1 = date('d-m-Y',$nt);

?>

  <h1>Please pick your order on : <?php error_reporting(E_ALL & ~E_NOTICE); echo $date1; ?></h1></p>
  <h1>Your Total cost is: <?php echo "$totalcost Rs ";  ?></h1>
  <hr class="my-4">
  <p> <h3>Date of order : <?php error_reporting(E_ALL & ~E_NOTICE); echo $date."    ".$time1; ?> </h3></p>
  <a class="btn btn-primary btn-lg" href="./order.php" role="button">ORDER MORE</a>
  <div id="nice">
  <h1>Have a Nice day...</h1>
  </div>
</div>

</body>
</html>
         