<?php
include ("conn.php");
include("authstaff.php");

$total=0;
$totalPrice=0;
 $x= $_POST['services'];
 $y =$_POST['weight'];
if ($_POST['services'] == "Dry Clean")
{
$total = 5*$y;
}
elseif ($_POST['services'] == "Normal wash")
{
$total = 8*$y;

}
else
{
$total = 3*$y;
}
$totalPrice= $total+2;

   $cfullname = $_POST['cfullname'];
   $staffID = $_POST['staffID'];
   $receiptID = $_POST['receiptID'];
   $cphone = $_POST['cphone'];
   $address = $_POST['address'];
   $timedates = $_POST['timedates'];
   $services = $_POST['services'];
   $weight = $_POST['weight'];


	// write sql query
$sql = "INSERT INTO receipt (receiptID,staffID,cfullname,cphone, address, services, timedates,weight, totalPrice ) VALUES('$receiptID','$staffID', '$cfullname', '$cphone', '$address', '$services', '$timedates', '$weight',$totalPrice)";
$result = $con -> query ($sql);
   
?>
<?php
    $DB_HOST = "localhost"; 
    $DB_DBNAME = "myslaundry"; 
    $DB_USER = "root"; 
    $DB_PWD = "";
$mysqli = new mysqli ($DB_HOST,$DB_USER,$DB_PWD,$DB_DBNAME);
$result = $mysqli->query ( "SELECT * FROM receipt" );
$invoice = $result->fetch_assoc ();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<include"rceipt.php>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	

	
	<link rel='stylesheet' type='text/css' href='css/style,.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <id="address">MYS LAUNDRY</br>
02600 ARAU PERLIS</br>
myslaundry@gmail.com</br>

Phone: 04-5678910
</br>

            <div id="logo">

              <div id="logoctr">

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
              </div>
              <img id="image" src="images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
<?php
$result = $mysqli->query ( "SELECT *  FROM receipt WHERE receiptID = '{$invoice['receiptID']}' " );
$custInfo = $result->fetch_assoc ();
$totalPayment = 0;
?>
		
		<div id="customer">

            <?php echo $_POST['cfullname']?>
</br>
  <?php echo $_POST['address'] ?> 
</br>
<?php echo $_POST['cphone'] ?> 
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><?php echo $_POST['receiptID'] ?> </td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
            <td><?php echo date("d-m-Y")?></td>
                </tr>'


            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Services</th>
		      <th>Price</th>
		      <th>Weight</th>
		      <th>Total Price</th>
		  </tr>
		  
		  <tr class="item-row">
                     
		      <td ><?php echo $_POST['services'] ?>
<td><?php
if ($_POST['services'] == "Dry Clean")
{
echo "RM5";
}
elseif ($_POST['services'] == "Normal wash")
{
echo "RM8";
}
else
{
echo "RM3";
}
?>
		      <td><?php echo $_POST['weight'] ?></td>

<td> RM 
<?php
$total=0;
 $x= $_POST['services'];
 $y =$_POST['weight'];
if ($_POST['services'] == "Dry Clean")
{
$total = 5*$y;
echo $total;
}
elseif ($_POST['services'] == "Normal wash")
{
$total = 8*$y;
echo $total;

}
else
{
$total = 3*$y;
 echo $total;

}

?>
</td>
</br>	

		  </tr>

		  <tr id="hiderow">
		   
		  </tr>
		  <tr>
		      <td colspan="1" class="blank"> </td>
		      <td colspan="2" class="total-line">Shipping Amount</td>
<td class="total-value balance"><div class="due">RM2</div></td>

		  </tr>
		  <tr>
		      <td colspan="1" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total</td>

		      <td class="total-value balance"><div class="due" "id=totalPrice" name="totalPrice" >RM

<?php

$totalPrice=0;
 $totalPrice= $total+2;
echo $totalPrice;
?>

</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>