<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $f_name = $_POST['fname'];
   $l_name =$_POST['lname'];
   $phone =$_POST['phone'];
   $email = $_POST['email'];
   $p_address = $_POST['paddress'];
   $p_date =date('Y-m-d', strtotime($_POST['pdate']));
   $d_address = $_POST['daddress'];
   $d_date = date('Y-m-d', strtotime($_POST['ddate']));
   $services = $_POST['cservices'];
   $sql = "INSERT INTO orders (cfname,clname,tpnumber,email,paddress,pdate,daddress,ddate,cservices) VALUES ('$f_name','$l_name','$phone','$email', '$p_address','$p_date','$d_address','$d_date','$services')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: admin.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Admin Pannel</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      Admin Pannel
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Order</h3>
         <p class="text-muted">Complete the form below to add a order</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="fname">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="lname">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email">
        </div>

            <div class="mb-3">
          <label class="form-label">Phone number:</label>
          <input type="phone" class="form-control" name="phone">
        </div>
        <div class="mb-3">
          <label class="form-label">Picking Address:</label>
          <input type="text" class="form-control" name="paddress">
        </div>
        <div class="mb-3">
          <label class="form-label">Picking Date:</label>
          <input type="date" class="form-control" name="pdate">
        </div>
        <div class="mb-3">
          <label class="form-label">Delivery Address:</label>
          <input type="text" class="form-control" name="daddress">
        </div>
        <div class="mb-3">
          <label class="form-label">Delivery Date:</label>
          <input type="date" class="form-control" name="ddate">
        </div>

        <div class="form-group mb-3">
          <label>Service Type:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="cservices" id="dry_cleaning" value="Dry_Cleaning,">
          <label for="Dry_Cleaning," class="form-input-label">Dry Cleaning</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="cservices" id="iorning" value="Iorning">
          <label for="Iorning" class="form-input-label">Iorning</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="cservices" id="pressing" value="Pressing">
          <label for="Pressing" class="form-input-label">Pressing</label>
        </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="admin.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>