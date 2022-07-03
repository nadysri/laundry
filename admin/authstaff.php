<?php
session_start();
if(!isset($_SESSION["staffID"])){
header("Location: ../loginstaff.php");
exit(); }
?>