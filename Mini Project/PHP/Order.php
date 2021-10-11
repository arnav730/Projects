

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../Assets/CSS/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../Assets/CSS/order.css" />
    <title>Order</title>
</head>
<body>
<div class="container">
<form method='post' action='commodity.php'>
  <div class="form-group">
    <label for="exampleInputEmail1">Customer_Name</label>
    <input type="text" class="form-control" name="Cust_name" id="exampleInputEmail1" placeholder="Enter Your Name" style="width:300px" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="number" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Enter Your Phone Number" style="width:300px"  required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address Of Delivery</label>
    <input type="text" class="form-control" name="Address" id="exampleInputPassword1" placeholder="Enter Your Address" style="width:500px;height:60px"  required>
  </div>

  <button type="submit" name="" class="btn btn-primary">Choose Product</button>
</form>
</div>
</body>
</html>

