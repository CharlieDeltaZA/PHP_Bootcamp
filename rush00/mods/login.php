<html>
	<head>
		<title>Mod Login</title>
		<link rel="stylesheet" href="./styles/login.css" media="all"/>
	</head>
	<body>
		<form method="post">
			<div class="imgcontainer">
				<img src="../imgs/creep.png" alt="Avatar" class="avatar">
			</div>

			<div>
				<label style="text-align: center;"> <?php if ($_GET['not_admin']) echo "You are not a Mod!"?></label>
				<label style="text-align: center;"> <?php  echo @$_GET['logged_out'];  ?></label>
			</div>

			<div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit" name="login">Login</button>
				<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" class="cancelbtn"><a href="../index.php">Cancel</a></button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</body>
</html>

<?php
	session_start();
	global $con;
	include("includes/db.php");
	if (isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($con, $_POST['uname']);
		$pass = mysqli_real_escape_string($con, $_POST['psw']);
		$sel_user = "select * from mods where user_email='$username'";
		$run_user = mysqli_query($con, $sel_user);
		$check_user = mysqli_fetch_array($run_user);
		if ($check_user['user_pass'] != hash('adler32', $pass))
			echo "<script>alert('Password or email is incorrect!')</script>";
		else
		{
			$_SESSION['user_email']=$username;
			echo "<script>window.open('index.php?logged_in=You have successfully logged in!','_self')</script>";
		}
	}
?>