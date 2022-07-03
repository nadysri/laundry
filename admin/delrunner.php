<?php
include("../conn.php");

//to retrieve delete id
$id_delete = $_GET['id_delete'];
echo $id_delete;

//to delete
if($id_delete !=""){
    $a = "DELETE from runner where runnerID='$id_delete'";
    $b = mysqli_query($con, $a) or die (mysqli_error().$a);
}

header("location:viewrunner.php?msg=del");
?>