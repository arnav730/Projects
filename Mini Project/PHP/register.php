<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Assets/CSS/bootstrap.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="container">
    <form method="post" action='registerdone.php'>
    <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="Name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="Email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="Password" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="ConfPassword" id="exampleInputPassword1" placeholder="Type password again nigga" required>
            <?php
                error_reporting(E_ALL & ~E_NOTICE);
                
                $error = $_GET['err'];
                if($error === "Pass")   {
                  $error = "Passwords don't match.";
                  echo '<span style="color: red;">'.$error.'</span>';
                }

            ?>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number</label>
          <input type="number" class="form-control" id="exampleInputEmail1" name="Phone" aria-describedby="emailHelp" placeholder="Enter mobile number" required>
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Address</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="Address" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Existing Administrator Password</label>
          <input type="password" class="form-control" name="Adminpass" id="exampleInputPassword1" placeholder="Password of already existing admin" required>
          <?php
                error_reporting(E_ALL & ~E_NOTICE);
                
                $error = $_GET['err'];
                if($error === "Admin")   {
                  $error = "Admin authentication unsuccessful.";
                  echo '<span style="color: red;">'.$error.'</span>';
                }

            ?>
        </div>
        

      
          </form>
       
          

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
</body>
</html>