<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $number = $_POST['tpnumber'];
  $p_address = $_POST['paddress'];
  $p_date = $_POST['pdate'];
  $d_address = $_POST['daddress'];
  $d_date = $_POST['ddate'];
  $service = $_POST['cservices'];

  $sql = "UPDATE `orders` SET `cfname`='$first_name',`clname`='$last_name',`email`='$email',`tpnumber`='$number',`paddress`='$p_address',`pdate`='$p_date',`daddress`='$d_address',`ddate`='$d_date',`cservices`='$service' WHERE oid = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: admin.php?msg=Data updated successfully");
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

  <title>update data</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Update Form
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `orders` WHERE oid = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="<?php echo $row['cfname'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="<?php echo $row['clname'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Phone number:</label>
          <input type="phone" class="form-control" name="tpnumber" value="<?php echo $row['tpnumber'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Picking Address:</label>
          <input type="text" class="form-control" name="paddress" value="<?php echo $row['paddress'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Picking Date:</label>
          <input type="date" class="form-control" name="pdate" value="<?php echo $row['pdate'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Delivery Address:</label>
          <input type="text" class="form-control" name="daddress" value="<?php echo $row['daddress'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Delivery Date:</label>
          <input type="date" class="form-control" name="ddate" value="<?php echo $row['ddate'] ?>">
        </div>

        <div class="form-group mb-3">
          <label>Service Type:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="cservices" id="dry_cleaning" value="Dry_Cleaning," <?php echo ($row["cservices"] == 'Dry_Cleaning,') ? "checked" : ""; ?>>
          <label for="Dry_Cleaning," class="form-input-label">Dry Cleaning</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="cservices" id="iorning" value="Iorning" <?php echo ($row["cservices"] == 'Iorning') ? "checked" : ""; ?>>
          <label for="Iorning" class="form-input-label">Iorning</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="cservices" id="pressing" value="Pressing" <?php echo ($row["cservices"] == 'Pressing') ? "checked" : ""; ?>>
          <label for="Pressing" class="form-input-label">Pressing</label>
        </div>
      

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>