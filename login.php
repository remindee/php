<?php
	$email = "";
	$pass = "";
	$errorMessage = "";
	$num_rows = 0;
	
	require_once('db.php');

	if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	}
	$sql = "SELECT * FROM accounts WHERE email = '" . $email . "' AND pass = '" . $pass . "'";
	$tokensql = "SELECT * FROM accounts WHERE token is NULL";
	$result = mysqli_query($dbconn,$sql);
	$tokenresult = mysqli_query($dbconn,$tokensql);
	$num_rows = mysqli_num_rows($result);
	$token_rows = mysqli_num_rows($tokenresult);
	$data = mysqli_fetch_row($result);
	$tokendata = $data[7];
	if($num_rows > 0)
	{ 
		if($tokendata < 1 )
		{
			session_start();
			$_SESSION['email']= $email; 
			$_SESSION['id'] = $data[0]; 
			$_SESSION['login']= "38h484493asd";
			header ("Location:post");
		}
		else
		{
			echo "Account is not activated.";
		}
		
	}

	else 
	{
		$errorMessage = "Incorrect email or password";
		echo $errorMessage;
		
	}
?>

