<ul>
  <li><a href="index.php">Home sweet home</a></li>
  <li><a href="comment.php">Wanna comment on the courses?</a></li>
</ul>

<?php include('server.php');

if(empty($_SESSION['username'])){
	header('location: login.php');
	echo "You cannot leave comments without logging in!";
}
 ?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="header">
<h2>Home page</h2>
</div>

<div class="content">
<?php if (isset($_SESSION['success'])): ?>
<div class="error success">
<h3>
<?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
</h3>
</div>
<?php endif ?>
<?php if (isset($_SESSION["username"])): ?>
<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
<?php endif ?>
<head>
    <title>Search</title>

    <meta http-equiv="content" content="text/html; charset=utf-8" />
	
</head>
</div>
	<form action="search.php" method="POST">
    <input type="text" name="query" />
    <input type="submit" value="Search" />
    </form>
</body>
</html>
