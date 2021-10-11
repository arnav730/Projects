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

          $sql = "SELECT * FROM product_info";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "id: " . $row["pname"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              }
          }

?>