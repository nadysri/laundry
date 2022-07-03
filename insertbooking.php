<?php
require('conn.php');
include("auth.php");
$username = $_SESSION['username'];
?>



<!DOCTYPE html>
<html>
<head>
        <style type="text/css">
body {
    background:url("bggs.jpg");
    background-size:cover;
    padding:10px;

}
.form {
    margin: 50px auto;
    width: 345px;
    height: 340px;
    border-radius: 20px;
    padding: 53px 22px;
    background: #b4dcde;
}
h1.login-title {
    font-family: "Lucida Handwriting", cursive;
    color: #666;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 26px;
    height: 37px;
    padding: 0px 11px;
    width: calc(134% - 100px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #f0ad4e none repeat scroll 0 0;
    border-color: #f0ad4e;
    border: 0;
    outline: 0;
    width: 100%;
    height: 45px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
    border-radius: 4px;
    padding: 0;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}
h3 {
    font-weight: normal;
    text-align: center;
}
.button {
  background-color: #e7e7e7;
  color: black;
  border: 2px solid #555555;
}

.button:hover {
  background-color: #555555;
  color: white;
}

    </style>
    <meta charset="utf-8"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <title>MYS LAUNDRY</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-clock-time"></i> <a href="">We are open from 8.00 am to 6.00 pm</a>
        <i class="icofont-phone"></i> 04-5678910
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">MysLaundry<span>.</span></a></h1>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index2.php">Home</a></li>
          <li class="active"><a id="login" href="insertbooking.php">Booking</a></li>
          <li><a href="viewcustbooking.php">Status</a></li>
          <li>Hi, <?php echo $_SESSION['username']; ?>.</li>
          <li><a id="logout" href="logout.php" class="button">Logout</a></li>



        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

    <br><br> <br><br>

<?php
include ("conn.php");



// if the form's submit button is clicked, we need to process the form
  if (isset($_POST['submit'])) {
    // get variables from the form
    $cfullname = $_POST['cfullname'];
    $cphone = $_POST['cphone'];
    $address = $_POST['address'];
    $services = $_POST['services'];
    $timedates = $_POST['timedates'];


    //write sql query

    $sql = "INSERT INTO `booking`(`cfullname`, `cphone`, `address`, `services`, `timedates`) VALUES ('$cfullname','$cphone','$address','$services','$timedates')";

    // execute the query

    $result = $con->query($sql);

    if ($result == TRUE) {
      echo '<script>alert("New record created successfully.")</script>';
    }else{
      echo "Error:". $sql . "<br>". $con->error;
    }

    $con->close();

  }

?>

    <form action="" method="POST">
<body>
  <div id="booking" class="section">
    <div class="section-center">
      <div class="container">
        <div class="row">
          <div class="booking-form">
            <div class="form-header">
              <h1>CUSTOMER BOOKING</h1>
            </div>
            <form>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <span class="form-label">Name</span>
                    <input class="form-control" type="text" name="cfullname" placeholder="Enter your name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <span class="form-label">Phone Number</span>
                    <input class="form-control" type="text" name="cphone" placeholder="Enter your Phone Number">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <span class="form-label">Address</span>
                <input class="form-control" type="text" name="address" placeholder="Enter your Address">
              </div>
              <div class="form-group">
                <span class="form-label">Services</span>
                <select class="form-control" type="radio"  name="services" >
                          <option>Washing  RM15</option>
                          <option>Dry Cleaning  RM20</option>
                          <option>Ironing  RM30</option>
                        </select>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <span class="form-label">Date&Time </span>
                    <input class="form-control" type="datetime-local" id="timedates" name="timedates" required>
                  </div>
                </div>
                <div class="col-sm-7">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">

                        <span class="select-arrow"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-btn">
                <button class="submit-btn" name="submit">BOOKING</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</body>
<style type="text/css">
  .section {
  position: relative;
  height: 100vh;
}

.section .section-center {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}


#booking::before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background: rgba(0, 0, 0, 0.6);
}


.booking-form .form-header {
  text-align: center;
  margin-bottom: 25px;
}

.booking-form .form-header h1 {
  font-size: 58px;
  text-transform: uppercase;
  font-weight: 700;
  color: #a1e1ed;
  margin: 0px;
}

.booking-form>form {
  background-color: #101113;
  padding: 30px 20px;
  border-radius: 3px;
}

.booking-form .form-group {
  position: relative;
  margin-bottom: 15px;
}
form-group>label {
    font-weight: 500;
    font-size: 14px;
    font-color: #fff;
}
.booking-form .form-control {
  background-color: #f5f5f5;
  border: none;
  height: 45px;
  border-radius: 3px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-weight: 400;
  color: #101113;
}

.booking-form .form-control::-webkit-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control::placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form select.form-control {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.booking-form select.form-control+.select-arrow {
  position: absolute;
  right: 0px;
  bottom: 6px;
  width: 32px;
  line-height: 32px;
  height: 32px;
  text-align: center;
  pointer-events: none;
  color: #a1e1ed;
  font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
  content: '\279C';
  display: block;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.booking-form .form-label {
  color: #fff;
  font-size: 12px;
  font-weight: 400;
  margin-bottom: 5px;
  display: block;
}

.booking-form .submit-btn {
  color: #101113;
  background-color: #a1e1ed;
  font-weight: 700;
  height: 50px;
  border: none;
  width: 100%;
  display: block;
  border-radius: 3px;
  text-transform: uppercase;
}

.section {
  position: relative;
  height: 100vh;
}

.section .section-center {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#booking::before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background: rgba(0, 0, 0, 0.6);
}

.booking-form {
  position: relative;
  max-width: 640px;
  width: 100%;
  margin-bottom: 9%;
  margin-left: auto;
  margin-right: 22%;
}

.booking-form .form-header {
  text-align: center;
  margin-bottom: 25px;
}

.booking-form .form-header h3 {
  font-size: 58px;
  text-transform: uppercase;
  font-weight: 700;
  color: #a1e1ed;
  margin: 0px;
}

.booking-form>form {
  background-color: #101113;
  padding: 30px 20px;
  border-radius: 3px;
}

.booking-form .form-group {
  position: relative;
  margin-bottom: 15px;
}

.booking-form .form-control {
  background-color: #f5f5f5;
  border: none;
  height: 45px;
  border-radius: 3px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-weight: 400;
  color: #101113;
}

.booking-form .form-control::-webkit-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control::placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form select.form-control {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.booking-form select.form-control+.select-arrow {
  position: absolute;
  right: 0px;
  bottom: 6px;
  width: 32px;
  line-height: 32px;
  height: 32px;
  text-align: center;
  pointer-events: none;
  color: #a1e1ed;
  font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
  content: '\279C';
  display: block;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}


.booking-form .submit-btn {
  color: #101113;
  background-color: #a1e1ed;
  font-weight: 700;
  height: 50px;
  border: none;
  width: 100%;
  display: block;
  border-radius: 3px;
  text-transform: uppercase;
}


</style>
</html>
