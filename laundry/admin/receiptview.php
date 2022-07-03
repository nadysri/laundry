<?php
include("authstaff.php");
// Connect to MySQL database
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'myslaundry';
    try {
      return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
      // If there is an error with the connection, stop the script and display the error.
      exit('Failed to connect to database!');
    }
}


$pdo = pdo_connect_mysql();

// Get the page via GET request (URL param: page), if non exists default the page to 1

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Number of records to show on each page
$records_per_page = 10;

$stmt = $pdo->prepare('SELECT * FROM receipt ORDER BY receiptID LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records 
$receipt = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of record, we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM receipt')->fetchColumn();
?>

<script type="text/javascript">
  
function check (nilai)
{
  //alert("masuk")
  if(confirm('Are you sure to delete this record?'))
  {
    document.location.href="delreceipt.php?id_delete="+nilai;
  }
}

</script>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <form action="" method="GET">
            <input type="text" class="form-control search-input" placeholder="Search Here" name="search">
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
                <div class="text-right">
                  <button class="btn btn-primary" value="Search">Search</button>
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
          <div class="dropdown-menu dropdown-menu-right">
            <div class="notification-list mx-h-350 customscroll">
              <ul>
                <li>

                </li>
              </ul>
            </div>
          </div>
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
              <li><a href="indexstaff.php" >View Booking</a></li>
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

  <div class="main-container">
            <div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2><b>LIST OF RECEIPT</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="addrunner.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Runner</span></a>          
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Inv.</th>
                <th>StaffID</th>
                <th>Name</th>
                <th>Phone No</th>
                <th>Address</th>
                <th>Service</th>
                <th>Dates</th>
                <th>Weight</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($receipt as $contact): ?>
            <tr>
                <td><?=$contact['receiptID']?></td>
                <td><?=$contact['staffID']?></td>
                <td><?=$contact['cfullname']?></td>
                <td><?=$contact['cphone']?></td>
                <td><?=$contact['address']?></td>
                <td><?=$contact['services']?></td>
                <td><?=$contact['timedates']?></td>
                <td><?=$contact['weight']?></td>
                <td><?=$contact['totalPrice']?></td>
                <td class="actions">

                <a href="javascript:check(<?php echo $contact ['receiptID'];?>)"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
  </div>        
</div>


      
    </div>
  </div>
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
</body>
</html>
<STYLE TYPE="text/css">
body {
  color: #566787;
  background: #f5f5f5;
  font-family: 'Varela Round', sans-serif;
  font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
  background: #fff;
  padding: 20px 25px;
  border-radius: 3px;
  min-width: 1000px;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
  padding-bottom: 15px;
  background: #435d7d;
  color: #fff;
  padding: 16px 30px;
  min-width: 100%;
  margin: -20px -25px 10px;
  border-radius: 3px 3px 0 0;
}
.table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
}
.table-title .btn-group {
  float: right;
}
.table-title .btn {
  color: #fff;
  float: right;
  font-size: 13px;
  border: none;
  min-width: 50px;
  border-radius: 2px;
  border: none;
  outline: none !important;
  margin-left: 10px;
}
.table-title .btn i {
  float: left;
  font-size: 21px;
  margin-right: 5px;
}
.table-title .btn span {
  float: left;
  margin-top: 2px;
}
table.table tr th, table.table tr td {
  border-color: #e9e9e9;
  padding: 12px 15px;
  vertical-align: middle;
}
table.table tr th:first-child {
  width: 60px;
}
table.table tr th:last-child {
  width: 100px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table-striped tbody tr:nth-of-type(odd) {
  background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
}
table.table th i {
  font-size: 13px;
  margin: 0 5px;
  cursor: pointer;
} 
table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
  margin: 0 5px;
}
table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
}
table.table td a:hover {
  color: #2196F3;
}
table.table td a.edit {
  color: #FFC107;
}
table.table td a.delete {
  color: #F44336;
}
table.table td i {
  font-size: 19px;
}
table.table .avatar {
  border-radius: 50%;
  vertical-align: middle;
  margin-right: 10px;
}
.pagination {
  float: right;
  margin: 0 0 5px;
}
.pagination li a {
  border: none;
  font-size: 13px;
  min-width: 30px;
  min-height: 30px;
  color: #999;
  margin: 0 2px;
  line-height: 30px;
  border-radius: 2px !important;
  text-align: center;
  padding: 0 6px;
}
.pagination li a:hover {
  color: #666;
} 
.pagination li.active a, .pagination li.active a.page-link {
  background: #03A9F4;
}
.pagination li.active a:hover {        
  background: #0397d6;
}
.pagination li.disabled i {
  color: #ccc;
}
.pagination li i {
  font-size: 16px;
  padding-top: 6px
}
.hint-text {
  float: left;
  margin-top: 10px;
  font-size: 13px;
}    

/* Modal styles */
.modal .modal-dialog {
  max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
  padding: 20px 30px;
}
.modal .modal-content {
  border-radius: 3px;
  font-size: 14px;
}
.modal .modal-footer {
  background: #ecf0f1;
  border-radius: 0 0 3px 3px;
}
.modal .modal-title {
  display: inline-block;
}
.modal .form-control {
  border-radius: 2px;
  box-shadow: none;
  border-color: #dddddd;
}
.modal textarea.form-control {
  resize: vertical;
}
.modal .btn {
  border-radius: 2px;
  min-width: 100px;
} 
.modal form label {
  font-weight: normal;
} 
table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
</style>
<script>
$(document).ready(function(){
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();
  
  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").click(function(){
    if(this.checked){
      checkbox.each(function(){
        this.checked = true;                        
      });
    } else{
      checkbox.each(function(){
        this.checked = false;                        
      });
    } 
  });
  checkbox.click(function(){
    if(!this.checked){
      $("#selectAll").prop("checked", false);
    }
  });
});
</scrip

</STYLE>