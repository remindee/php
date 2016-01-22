
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/remindee/css/master/style.css">
</head>

<body>
<form action="php/login.php" method="post">
  <p>
  <label for="email">Email</label>
  <input type="email" id="email" name="email"/>
  <span>Please enter your email address</span>
  </p>
  <p>
  <label for="password">Password</label>
  <input type="password" id="pass" name="pass" />
  <span>Please enter your password</span>
  </p>
  <p><a href="php/forgetpass.php">Forget Password?</a></p>
  <p>
  <input type="submit" value="Submit" id="submit" name="login"/>
  </p>
</form>
  
<?php 
 include 'php/regvalid.php'
?>
<div class="signup_form">
<form action="php/register.php" method="post" >
 <p>
  <label for="fullname">Full Name:</label>
  <input name="fullname" type="text" id="fname" size="30"/>
 </p>
 <p>
  <label for="email">E-mail:</label>
  <input name="email" type="text" id="email" size="30"/>
 </p>
 <p>
  <label for="password">Password:</label>
  <input name="password" type="password" id="pass" size="30 "/>
 </p>
 <p>
  <input name="submit" type="submit" value="Submit"/>
 </p>
</form>
<script src="http://code.jquery.com/jquery-2.2.0.js"></script>
<script src="https://raw.githubusercontent.com/remindee/js/master/index.js"></script>	
</body>
</html>
