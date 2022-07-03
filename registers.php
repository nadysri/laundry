<?php include('conn.php') ?>

<?php 
  $cfullname = "";
  $cphone = "";
  $username = "";
  $password = "";
  if (isset($_POST['register'])) {
    $cfullname = $_POST['cfullname'];
    $cphone = $_POST['cphone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_u = "SELECT * FROM customer WHERE username='$username'";
    $res_u = mysqli_query($con, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
      $name_error = "Sorry, username already taken";  
    }else{
          $query    = "INSERT into `customer` (cfullname, cphone, username, password)
                     VALUES ('$cfullname','$cphone', '$username', '" . md5($password) . "')";
           $results = mysqli_query($con, $query);
           echo "<script>alert('Successfully register your account.');window.location.href='login.php';
</script>";
           exit();
    }
  }
?>

<html>
<head>
  <title>MYS LAUNDRY</title>
  <link rel="stylesheet" href="style.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
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
          <li ><a href="index2.php">Home</a></li>
          <li class="active"><a id="login" href="login.php" class="button">Login</a></li>


        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <br><br>
  <form method="post" action="registers.php" id="register_form">
    <h1>Register</h1>
    <div>
      <span class="form-label">Name:</span>   
      <input type="text" name="cfullname" placeholder="Enter your fullname">
    </div>
    <div>
      <span class="form-label">Phone Number:</span>
      <input type="text" name="cphone" placeholder="Enter your phone number">
    </div>
    <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
      <span class="form-label">Username:</span>
    <input type="text" name="username" placeholder="Enter your username" value="<?php echo $username; ?>">
    <?php if (isset($name_error)): ?>
      <span><?php echo $name_error; ?></span>
    <?php endif ?>
    </div>
    <div>
      <span class="form-label">password:</span>
      <input type="password"  placeholder="Enter your password" name="password">
    </div>
    <div>
      <button type="submit" name="register" id="reg_btn">Register</button>
      <center><br>Already have an account?<a href="login.php"> <u>Login</u></center>
    </div>
  </form>
  </body>
</html>
<style type="text/css">
#register_form h1 {
  text-align: center;
  font-family: "Lucida Handwriting", cursive;
  padding: 14px;
  color: #666;
}
body {
  background: url("bgg.jpg");
  background-size:cover; padding:10px;
}
#register_form {
  width: 37%;
  margin: 100px auto;
  padding-bottom: 30px;
  border: 1px solid #918274;
  border-radius: 5px;
  background: #b4dcde;
}
#register_form input {
  width: 80%;
  height: 35px;
  margin: 10px 10%;
  font-size: 1.1em;
  padding: 4px;
  font-size: .9em;
}
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 14px;
  color: #D83D5A;
}
.form-label{
  color: #000;
  font-size: 15px;
  font-weight: 400;
  padding: 0px 45px;
  display: block;
  text-transform: uppercase;
  font-family: -webkit-pictograph;
}

.form_error input {
  border: 1px solid #D83D5A;
}
#reg_btn {
  height: 35px;
  width: 80%;
  margin: 5px 10%;
  color: white;
  background: #f0ad4e;
  border: none;
  border-radius: 5px;

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