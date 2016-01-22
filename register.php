<?php
session_start();
include('/db.php');
if(isset($_POST['submit']))
{
 //whether the fname is blank
 if($_POST['fullname'] == '')
 {
  $_SESSION['error']['fname'] = "Full Name is required.";
 }
 //whether the email is blank
 if($_POST['email'] == '')
 {
  $_SESSION['error']['email'] = "E-mail is required.";
 }
 else
 {
  //whether the email format is correct
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST['email']))
  {
   //if it has the correct format whether the email has already exist
   $email= $_POST['email'];
   $sql1 = "SELECT * FROM accounts WHERE email = '$email'";
   $result1 = mysqli_query($dbconn,$sql1) or die(mysqli_error());
   if (mysqli_num_rows($result1) > 0)
            {
    $_SESSION['error']['email'] = "This Email is already used.";
   }
  }
  else
  {
   //this error will set if the email format is not correct
   $_SESSION['error']['email'] = "Your email is not valid.";
  }
 }
 //whether the password is blank
 if($_POST['password'] == '')
 {
  $_SESSION['error']['pass'] = "Password is required.";
 }
 //if the error exist, we will go to registration form
 if(isset($_SESSION['error']))
 {
  header("Location: ../index.php");
  exit;
 }
 else
 {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $token = md5(uniqid(rand()));

  $sql2 = "INSERT INTO accounts (fname, email, pass, token) VALUES ('$fullname', '$email', '$password', '$token')";
  $result2 = mysqli_query($dbconn,$sql2) or die('Error: ' . mysqli_error($dbconn));

  if($result2)
  {
	require("../phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer();
	
	$message ="Please click the link below to verify and activate your account.";
    $message .= "<a href=\"http://localhost/reminder/php/confirm.php?passkey=$token\">Log in</a>";

    $mail->CharSet="utf-8";
    $mail->IsSMTP();                                      // set mailer to use SMTP
    $mail->Host = "smtp.gmail.com ";  // specify main and backup server
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "autogenerateremindee@gmail.com";  // SMTP username
    $mail->Password = "lujiangwong"; // SMTP password

    $mail->From = "autogenerateremindee@gmail.com";
    $mail->FromName = "Remindee: AutoGenerateEmail";
    $mail->AddAddress($email, $fullname);

    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML (true) or plain text (false)

    $mail->Subject = "Remindee: E-mail Verification(Do-Not-Reply)";
    $mail->Body    = $message;
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients";    
    $mail->AddEmbeddedImage('images/logo.png', 'logo', 'logo.png');
    $mail->addAttachment('files/file.xlsx');

    if(!$mail->Send())
    {
       echo "Message could not be sent. <p>";
       echo "Mailer Error: " . $mail->ErrorInfo;
       exit;
    }

    echo "Message has been sent";

  }
 } 
}
?>
