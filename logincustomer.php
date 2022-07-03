 <?php
include("conn.php");
extract($_REQUEST);
session_start();

if(isset($submit))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  ;
  $a=("SELECT * FROM login WHERE username='$username' AND password='$password'");
  $query=mysqli_query($con,$a) or die ("sql error".$a);
  $result=mysqli_fetch_array($query);

  if(mysqli_num_rows($query)>0)
  {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $result['role'];
    

    if($_SESSION['role']=="STAFF")
    {
      header("location:listbooking.php");
    }

    else if ($_SESSION['role']=="CUSTOMER")
    {
      header("location:booking.php");
    }

    else
    {
      header("location:mainmenu.php");
    }
  }

  else
  {
    echo "<script type='text/javascript'>";
    echo "alert('UNAUTHORIZED USER!')";
    echo "</script>";
  }
}

?>
<!DOCTYPE html>
<html>

  <head>
    <title>MYS LAUNDRY</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="js/modernizr.custom.63321.js"></script>
    <style>
			
			body {
				background: url(bg.jpg);
      }

      .container {
        padding-right: 20pt;
        padding-left: 20pt;
        padding-top: 20pt;
        padding-bottom: 20pt;
      }
	
		</style>
  </head>
  <body>
  <header class="codrops-header">
        <h1>MYS LAUNDRY </h1>
      </header>
      <div class="container">
	  <br><br><br>
	  <center>
        <header>
           
        </header>
		</center>

        <section class="main">
          <form class="form-3" action="" method="post" role="form">
              <p class="clearfix">
                  <label for="login">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
              </p>
              <p class="clearfix">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
              </p>

              <p class="clearfix">
                  <input type="checkbox" name="remember" id="remember">
                  <label for="remember">Remember me</label>
              </p>

              <p class="clearfix">
                  <input type="submit" name="submit" value="Sign in">
              </p> 
          </form>​
        </section>
      </div>
  </body>
</html>
