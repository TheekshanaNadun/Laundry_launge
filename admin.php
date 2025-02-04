<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LAUNDRYLODGE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!--fontawesome icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>

<body>
    <!-- header Start -->
    <Div class="header">
        <div class="main">
            <div class="linkcontent">
                <div class="logo">
                    <img src="./img/logo1.jpg" alt="" srcset="">
                    <h1>LAUNDRYLODGE</h1>
                </div>
                <div class="login">
                    <button class=" btn1"><a href="login.html">LOG IN</a></button>
                    <button class=" btn1"><a href="signup.html">SIGN UP</a></button>
                    <button class=" btn1"><a href="#">PROFILE</a></button>
                </div>
            </div>
            <div class="navlinks">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="service.html">SERVICES</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="loyalty.html">LOYALITY</a></li>
                    <li><a href="branches.html">BRANCHES</a></li>
                </ul>
            </div>
        </div>
    </Div>
   <!-- header end -->

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    
    <a href="add-new.php" class="btn btn-light mb-3">Add New</a>
         
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">TP Number</th>
          <th scope="col">Picking Address</th>
          <th scope="col">Picking Date</th>
          <th scope="col">Delivery Address</th>
          <th scope="col">Delivery Date</th>
          <th scope="col">Service</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["oid"] ?></td>
            <td><?php echo $row["cfname"] ?></td>
            <td><?php echo $row["clname"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["tpnumber"] ?></td>
            <td><?php echo $row["paddress"] ?></td>
            <td><?php echo $row["pdate"] ?></td>
            <td><?php echo $row["daddress"] ?></td>
            <td><?php echo $row["ddate"] ?></td>
            <td><?php echo $row["cservices"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["oid"] ?>" class="link-dark">Edit</a>
              <a href="delete.php?id=<?php echo $row["oid"] ?>" class="link-dark">Delete</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  <!-- Footer Start -->
  <section class="footer">
        <div class="contact">
            <img src="./img/logo1.jpg" alt="" srcset="">
            <p>
                Welcome to Laundrylodge, your ultimate <br>
                destination for impeccable laundry services! <br>
                We take pride in providing top-quality and <br>
                hassle-free laundry solutions tailored to  <br>
                your needs. </p>
            <div class="social-buttons">
                <ul>
                    <li><a href="google.com"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="coustomersupport">
            <h1>Contact</h1>
            <p>Got Question Contact us 24/7. </p>
            <p>+94 78 524 6102</p>
            <p>+94 76 855 6161</p>
            <p>laundrylodge@gmail.com</p>
            <p>59/2 Bandaranayake Mawatha <br>Katubedda</p>
        </div>
        <div class="company">
            <h1>Quick Links</h1>
            <a href="index.html">Home</a>
            <a href="contact.html">Contact Us</a>
            <a href="about.html">About Us</a>
            <a href="loyalty.html">Loyalty</a>
            <a href="pricing.html">Branches</a>
            <a href="service.html">Services</a>
        </div>

    </section>
    <section class="footer">
        <h1 class="copyright">Copyright <i class="fa-regular fa-copyright"></i> LAUNDRYLODGE. All Rights Reserved | Contact
            Us:+91 90000 123221.</h1>
    </section>
    <!-- Footer End -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>