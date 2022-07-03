<?php 
include ("conn.php");



// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['book'])) {
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
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $con->error;
		}

		$con->close();

	}

?>