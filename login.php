<?php include('server.php'); 
if(!empty($_SESSION['username'])){
	echo ("You are already logged in!");
	exit;
}?>
<!DOCTYPE html>
<html>
<head>
<title>User registration system using PHP and MySQL</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>


<form method="post" action="login.php">
<?php include('errors.php'); ?>
<div class ="input-group">
<label>User Name:</label>
<input type="text" name="username" />
</div>
<div class ="input-group">
<label>Password:</label> 
<input type="password" name="password" />
</div>
<div class ="input-group">
<button type="submit" name="login" class="btn">Login</button>
</div>
<p>
Not yet a member? <a href="register.php">Sign up</a>
</p>
</form>
</body>
</html>
<?php
 @mysql_select_db("project", mysql_connect("localhost","root",""));
$username = mysql_real_escape_string(@$_POST['username']);
$password = mysql_real_escape_string(@$_POST['password']);
$password = md5($password);
if($_POST){
    if($password=="" || $username==""){echo "<font color=blue><b>Please fill all the fields</font>";}
    else{
    $sql = mysql_query("SELECT * FROM account WHERE username='$username' and password='$password'");
    $dataCounter = mysql_num_rows($sql);
    if ($dataCounter>0){
        if($username=$username && $password=$password) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
		$_SESSION['login'] = true;
		header('location: index.php');}   
    }else{
        echo "<font color=red><b>Please check, username or password is wrong.</font>";
    }
	
}
}
?>
