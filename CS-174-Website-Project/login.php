<?php
include 'dbconnect.php';
session_start();
ob_start();


if (isset($_POST['email']) && isset($_POST['pass']))
{
	if (isset($_POST['store_login'])) // If user opts in, store user info to a cookie for 60 minutes
		{
			echo "enter";
			$cookie_email= "User";
			$cookie_pass= "Password";
			$email=$_POST['email'];
			$pass=$_POST['pass'];

		setcookie ($cookie_email, $email, time() + 3600, "/");
		setcookie ($cookie_pass, $pass, time() + 3600, "/");
		}	
}

if (isset($_POST["submit"])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	mysqli_select_db($dbc, $db) or die("Cannot Select DB");

	$query=mysqli_query($dbc, "SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);

	if($numrows!=0) {
		while($row=mysqli_fetch_assoc($query)) { // When you found the row w/ the login info
			$dbemail = $row['email'];
			$dbpassword = $row['password'];
		}

		if($email == $dbemail && $pass == $dbpassword) {
			$_SESSION['sess_users'] = $dbemail;
			echo "You are now logged in";
			if (isset($_COOKIE['PHPSESSID']))
       			 session_id($_COOKIE['PHPSESSID']); 
			/* REDIRECT USER TO FRONT PAGE AFTER LOGIN */
			ob_start();
			header("location: welcome.php",true);
			ob_flush();
			end;
		}
	} else {
		echo "Your email or password is incorrect. Please try again";
	}
}
?>
<!doctype html>
<html>
<head>
<title>Login</title>
<!-- Latest compiled and minified CSS --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> 
    <style>
	.main{
		margin-top: 100px;
	}
	.content {
		margin-top: 40px;
	}
</style>
</head>
<body>

<div class="container text-center main">
<h1>Login Form</h1>

<form action="login.php" method ="POST" class="form-horizontal content" role="form">
	<div class="form-group">
		<label for="inputEmail" class="col-md-4 control-label">Email</label> 
        <div class="col-md-4">
			<input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
    </div>
    
    <div class="form-group">
		<label for="inputPsw" class="col-md-4 control-label">Password</label> 
        <div class="col-md-4">
			<input type="password" class="form-control" id="inputPsw" name="pass" placeholder="Password">
        </div>
    </div>
        
    <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="store_login" value="user"> Remember me
        </label>
      </div>
    </div>
  	</div>
  
  	<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
    <input type="submit" class="btn btn-primary" value="Login" name="submit">
   <!--   <button type="submit" class="btn btn-default">Login</button>-->
    </div>
  </div>
  
<!--<input type="submit" value="Login" name="submit"><br />
<pre><input type="checkbox" name="store_login" value="user">Remember Me<br></pre>-->
</form>

<p><a href="editEmail.php">Change your email.</a></p>
<p><a href="editPassword.php">Change your password.</a></p>


</body>
</html>
