 <?php
include_once 'conn.php';
 
session_start();
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>
    <style type="text/css">
body#LoginForm{ background-image:url("bgg.jpg"); background-repeat:no-repeat; 
background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h1{ color:#444444; font-size:18px; margin:0 0 8px 0;
font-family: "Lucida Handwriting", cursive;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 40px;
  line-height: 50px;
}
.main-div {
  background: #b4dcde none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}


    </style>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
  <form method="post" action="">
<body id="LoginForm">
<div class="container">
  <br><br><br>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h1>Staff Login</h1>
   <p>Please enter your username and password</p>
   </div>
    <form id="Login">

        <div class="form-group">
            <input type="text" class="form-control" id="inputid" placeholder="Id number" name="staffID">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
        <div class="forgot">
</div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
    </div>
</div></div></div>


</body>
 
<?php
    require('conn.php');
    // When form submitted, check and create user session.
    if (isset($_POST['staffID'])) {
        $staffID = stripslashes($_REQUEST['staffID']);    // removes backslashes
        $staffID = mysqli_real_escape_string($con, $staffID);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query    = "SELECT * FROM `staff` WHERE staffID='$staffID'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['staffID'] = $staffID;
            // Redirect to user dashboard page
            header("Location: admin/indexstaff.php");
        } else {
            echo '<script type="text/javascript">alert("Invalid username or password! Please try again");</script>';

        }
      }
?>
</html>
