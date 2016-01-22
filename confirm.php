<?php
 include('db.php');
 $passkey = $_GET['passkey'];
 $sql = "UPDATE accounts SET token=NULL WHERE token='$passkey'";
 $result = mysqli_query($dbconn,$sql) or die(mysqli_error());
 if($result)
 {
  echo '<div>Your account is now active. You may now <a href="http://localhost/reminder/index.php">Log in</a></div>';
}
 else
 {
  echo "Some error occur.";
 }
?>
