<?php 
include ("../conn.php");



// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$fullname = $_POST['fullname'];
		$phoneNo = $_POST['phoneNo'];
		$gen = $_POST['gen'];
		$username = $_POST['username'];
		$password = $_POST['password'];
	

		//write sql query

		$sql = "INSERT INTO `staff`(`fullname`, `phoneNo`, `gen`, `username`, `password`) VALUES ('$fullname','$phoneNo','$gen','$username','$password')";

		// execute the query

		$result = $con->query($sql);

		if ($result == TRUE) {
			echo "<script>alert('Successfully registered new Staff');window.location.href='viewstaff.php';
</script>";
		}else{
			echo  "<script type='text/javascript'>alert('Field missing)</script>";
		}

		$con->close();

	}

?>