

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
      // if(isset($_POST['order'])){
        // $p_id=$_POST['p_id'];
        // $productQty=$_POST['Commodid$p_id'];
        $custname=$_POST['Cust_name'];    
        $phone = $_POST['phone'];
        $adress = $_POST['Address'];

        error_reporting(E_ALL & ~E_NOTICE);
        $sql = "INSERT INTO ORDERS(CUST_NAME,PHONE_NO,ADDRESS) VALUES ('$custname','$phone','$adress')";
        $conn->query($sql);

        $_SESSION['custname'] = $custname;
        $_SESSION['address'] = $adress;
        $_SESSION['phone'] = $phone;

        // echo "<form method='post' action='Orderdone.php' style='display:none;'>
        //   <input type='text' name='custname' value=$custname>
        //   <input type='text' name='phone' value=$phone>
        //   <input type='text' name='adress' value=$adress>
        // </form>
        // ";

        


        $sql1 = "SELECT MAX(ORDER_ID) AS OID FROM ORDERS";
        $result = $conn->query($sql1);

        $row = $result->fetch_assoc();
        $_SESSION['OrderId'] = $row['OID'];
      // }

      

         }
      ?>

         

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Mini Project/Assets/CSS/commodity.css" />
</head>
<body>
 

  <form action="orderdone.php" method="post">  

<div class="container">
  <h2>Items</h2>
  <p>Check the box to select</p>
  <table class="table">
    <thead>
      <tr>
         <th>Number</th>
        <th>Items</th>
        <th>Price</th>
        <th>Buying</th>
        <th>Unit</th>
      </tr>
    </thead>
    <tbody>      
         <?php

         $errMsg = null;
         $hostName = "localhost";
         $userName = "root";
         $password = "";
         $dbName = "storedb";
   
         $conn = new mysqli($hostName,$userName,$password,$dbName);
   
         if($conn->connect_error)
             die('Connection failed lol'); 
          

              $total = 0;
              $main = 0;
   
             $sql = "SELECT * FROM product_info";
             $result = $conn->query($sql);
             $i=0;
             
             if ($result->num_rows > 0) {
              
                 while($row = $result->fetch_assoc()) {

                  $p_id =  $row["p_id"];
                  $productName =  $row["pname"];
                  $productPrice =  $row["p_price"];
                  $productQty =  $row["p_qty"];

                  
                  $i=$i+1;

                  echo "
                  <tr class='success'>
                  
                  <td>$i</td>
                  <td>$productName</td>
                  <td>$productPrice</td>
                  
                  
                  <td><input type='checkbox' value=\"$p_id\" name=\"Commodid$p_id\">
                  <input type='text' value=\"$p_id\" name=\"p_id\" style='display:none;'></td>
                  ";
                  echo "<td><input class=\"w3-input w3 animate-input\" value=\"1\" name=\"Commodname$p_id\" type=\"number\" style=\"width:45px\"><td>
                       </tr>";

                  

                  // calculate
                  }

                  

                 
             }
             


             
         
        
         ?>

       
      
    </tbody>
  </table>
</div>
       


<div id="submit">
<button class="btn btn-primary btn-lg" type="submit" style="height:40px;width:150px;">Submit</button>
</div>
</form>

</body>
</html>


