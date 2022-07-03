<?php 
require "../conn.php";
include("authstaff.php");

// if the form's submit button is clicked, we need to process the form
    if (isset($_POST['submit'])) {
        // get variables from the form
        $rname= $_POST['rname'];
        $rphone = $_POST['rphone'];
        

        //write sql query

        $sql = "INSERT INTO runner(`rname`, `rphone`) VALUES ('$rname','$rphone')";

        // execute the query

        $result = $con->query($sql); {
             echo "<script>alert('Data has been successfully saved !');window.location.href='viewrunner.php';
</script>";
}
        } else {
            $errTyp = "danger";
            echo "<script type='text/javascript'>alert('Data has not been successfully saved )</script>";
}



?>


<!DOCTYPE html>
<html>
<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8">
  <title>MYS LAUNDRY</title>
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
  </script>
</head>
<body>
  <div class="header">
    <div class="header-left">
      <div class="menu-icon dw dw-menu"></div>
      <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
      <div class="header-search">
        <form>
          <div class="form-group mb-0">
            <input type="text" class="form-control search-input" placeholder="Search Here">
            <div class="dropdown">
              <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-search2 search-icon"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">From</label>
                  <div class="col-sm-12 col-md-10">
                    <input class="form-control form-control-sm form-control-line" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">To</label>
                  <div class="col-sm-12 col-md-10">
                    <input class="form-control form-control-sm form-control-line" type="text">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                  <div class="col-sm-12 col-md-10">
                    <input class="form-control form-control-sm form-control-line" type="text">
                  </div>
                </div>
                <div class="text-right">
                  <button class="btn btn-primary">Search</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="header-right">
      <div class="dashboard-setting user-notification">
        <div class="dropdown">
          <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
          </a>
        </div>
      </div>
      <div class="user-notification">
        <div class="dropdown">
          <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
          </a>
        </div>
      </div>
      <div class="user-info-dropdown">
        <div class="dropdown">
          <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
            <span class="user-icon">
            <img src="vendors/images/user.png" alt="">
            </span>
            <span class="user-name"><?php echo $_SESSION['staffID']; ?></span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="left-side-bar">
    <div class="brand-logo">
      <a href="indexstaff.php">
        <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
        <img src="vendors/images/mys.svg" alt="" class="light-logo">
      </a>
      <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
      </div>
    </div>
 <div class="menu-block customscroll">
      <div class="sidebar-menu">
        <ul id="accordion-menu">
          <li>
            <div class="sidebar-small-cap">STAFF SITE</div>
          </li>
          <li>
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-edit-2"></span><span class="text">BOOKING</span>
            </a>
            <ul class="submenu">
              <li><a href="indexstaff.php">View Booking</a></li>
              <li><a href="search.php" >Receipt</a></li>
              <li><a href="receiptview.php">View Receipt</a></li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" class="dropdown-toggle">
              <span class="micon dw dw-edit-2"></span><span class="text">RUNNER</span>
            </a>
            <ul class="submenu">
              <li><a href="addrunner.php">Add runner</a></li>
              <li><a href="viewrunner.php" >View runner</a></li>
            </ul>
          </li>
          <li>
            <a href="logoutstaff.php" target="_blank" class="dropdown-toggle no-arrow">
              <span class="micon dw dw-logout"></span>
              <span class="mtext">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="mobile-menu-overlay"></div>


<!--------------------bODY-------------------->
<form action="receiptdetails.php" method ="post">
<br><br><br><br>
    <div class="section-center">
      <div class="container">
        <br><br><br>
        <div class="row">
          <div class="booking-form">
            <div class="form-header">
              <h3>RECEIPT</h3>
            </div>
         
            
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input class="form-control" type="text" name="bookingID" placeholder="Enter booking ID">
                  </div>
                </div>
              </div>
              <div class="form-btn">
                <button class="btn submit-btn" name="create">Submit</button>
              </div>
            </form>
  
    
  <!-- js -->
  <script src="vendors/scripts/core.js"></script>
  <script src="vendors/scripts/script.min.js"></script>
  <script src="vendors/scripts/process.js"></script>
  <script src="vendors/scripts/layout-settings.js"></script>
  <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
  <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
  <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
  <script src="vendors/scripts/dashboard.js"></script>
  <style type="text/css">
body {
    margin: 0;
    padding: 0;
    font-family: 'Inter',sans-serif;
    font-weight: 400;
    min-height: 100%;
    color: #031e23;
    background-image: url('vendors/images/bggs.jpg');
  }
}.section {
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

#booking {
  font-family: 'Montserrat', sans-serif;
  background-image: url('../img/4331288.jpg');
  background-size: cover;
  background-position: center;
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

#booking {
  font-family: 'Montserrat', sans-serif;
 background-image: url('vendors/images/bggs.jpg');
  background-size: cover;
  background-position: center;
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
  max-width: 642px;
  width: 100%;
  margin-left: auto;
  margin-right: 10%;
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
</body>
</html>