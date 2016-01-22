<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Untitled Document</title>
</head>

<body>
<?PHP
echo "Welcome to Remindee" . " " .$data[1];
?>
<form method="post" id="formpost" >
<p>
  <input type="submit" value="Logout" id="logout" name="logout"/>
</p>
  <textarea id="status" name="status"></textarea>
  <input type="submit" value="Post" id="statuspost" name="statuspost"/>
  
  <?PHP
  echo "<textarea name='statusview' readonly>";
while ($statusdata = mysqli_fetch_assoc($remindresult)) {
    echo $statusdata["status"];
}

?></textarea>
</form>
<script src="../js/jquery-2.2.0.min.js"></script>
<script src="../js/post.js"></script>
</body>
</html>
