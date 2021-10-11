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

          if(isset($_POST['add_category'])){

            $category_name = $_POST['category_name'];  

            $sql1 = "INSERT INTO category_info(c_name) VALUES('$category_name')";

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




<div class="modal fade" id="form_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="category_form" method="post" action="">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="Enter category name">
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