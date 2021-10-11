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

          if(isset($_POST['add_supplier'])){

            $supplier_name = $_POST['supplier_name'];  

            $sql1 = "INSERT INTO supplier_info(s_name) VALUES('$supplier_name')";

            if($conn->query($sql1)){
              echo "
                    <script>alert('Inserted Sucessfuly');</script>
                  ";
                } else {
                  echo "
                    <script>alert('jkgj');</script>
                  ";
                }
  
         }
        }
  ?>
    



<div class="modal fade" id="form_supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="brand_form" method="POST" action="">
          <div class="form-group">
            <label>Supplier Name</label>
            <input type="text" class="form-control" name="supplier_name" id="brand_name" placeholder="Enter Supplier Name">
            <small id="brand_error" class="form-text text-muted"></small>
          </div>
          <button type="submit" name="add_supplier" class="btn btn-primary">Add</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>