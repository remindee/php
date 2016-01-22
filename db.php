<?php

$host ="localhost";
$username ="root";
$password ="";
$dbname ="reminderdb";

$dbconn =  mysqli_connect($host,$username,$password) or die(mysqli_error());

mysqli_select_db($dbconn,$dbname) or die(mysqli_error());

?>
