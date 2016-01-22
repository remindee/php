<?PHP

session_start();
if ($_SESSION['login'] != "38h484493asd") {
header ("Location: ../index.php");
session_destroy();

}
	require_once('db.php');
	$sql = "SELECT * FROM accounts WHERE email = '" . $_SESSION['email'] . "'";
	$result = mysqli_query($dbconn,$sql);
	$data = mysqli_fetch_row($result);
	
	$remindsql = "SELECT * FROM status WHERE aid = '" . $_SESSION['id'] . "'";
	$remindresult = mysqli_query($dbconn,$remindsql);
	
	
	if(isset($_POST['logout'])) {
	header ("Location: ../index.php");
	session_destroy();
	}
	
	if(isset($_POST['statuspost'])) {
	$status = $_REQUEST['status'];
	$aid = $_SESSION['id'];
	$sql = "INSERT INTO status(aid,status) VALUES ('" . $aid . "','" . $status . "')";
	$result = mysqli_query($dbconn,$sql);
	header ("Location: post.php");
	}


	include	'remindline.php';
	
?>
