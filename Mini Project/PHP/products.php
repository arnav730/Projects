

<!-- Modal -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
            </div>
            <div class="form-group col-md-6">
              <label>Product Name</label>
              <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
            </div>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="select_category" name="select_category">
              <option>Choose any Option</option>
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
                  
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {

                      $categoryname =  $row["c_name"];
                      echo "
                      <option value='$categoryname'>$categoryname</option>

                      ";
                      }
                  }
              ?>              
              </select>
          </div>
          <div class="form-group">
            <label>Supplier</label>
            <select class="form-control" id="select_supplier" name="select_supplier" >
               <option>Choose any Option</option>
            <?php

              $errMsg = null;
              $hostName = "localhost";
              $userName = "root";
              $password = "";
              $dbName = "storedb";

              $conn = new mysqli($hostName,$userName,$password,$dbName);

              if($conn->connect_error)
                  die('Connection failed lol'); 

                  $sql = "SELECT * FROM supplier_info";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {

                      $suppliername =  $row["s_name"];
                      echo "
                      <option value='$suppliername'>$suppliername</option>


                      ";
                      }
                  }
              
      ?>
              
            </select>
          </div>
          <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price of Product" />
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Quantity" />
          </div>
          <input type="submit" class="btn btn-success" name="add_product" value="Add Product">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


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
        // code
        if(isset($_POST['add_product'])){

          $product_name = $_POST['product_name'];
          $product_category=$_POST['select_category'];
          $product_supplier=$_POST['select_supplier'];
          $product_price = $_POST['product_price'];
          $product_qty = $_POST['product_qty'];
          // $added_date=$_POST['date'];

          $added_date = date("Y-n-j");
         

          $sql = "INSERT INTO product_info(pname,p_category,p_supplier,p_price,p_qty,added_date) VALUES('$product_name','$product_category','$product_supplier','$product_price',
          '$product_qty','$added_date')";

          if($conn->query($sql)){
            echo "
                  <script>alert('Inserted Sucessfuly');</script>
                ";
              } else {
                echo "
                  <script>alert('done');</script>
                ";
              }

       }
      }
?>