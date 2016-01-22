<?PHP
session_start();
 if(isset($_SESSION['error']))
 {
  echo '<p>'.$_SESSION['error']['fname'].'</p>';
  echo '<p>'.$_SESSION['error']['email'].'</p>';
  echo '<p>'.$_SESSION['error']['pass'].'</p>';
  unset($_SESSION['error']);
 }
 ?>
