<!doctype html>
<html>
<head>
<title>Register</title>
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
<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>

<h1>Registration Form</h1>
<form action="" method="POST" class="form-horizontal content" role="form">

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
    <div class="col-md-offset-4 col-md-4">
    	<p align="left" style="color:red">Password must be 8 characters or longer with at least 1 number and 1 letter</p>
    	
    </div>
  
  	<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
    <input type="submit" class="btn btn-primary" value="Register" name="submit">
    </div>
  </div>
  
<!--<input type="submit" value="Login" name="submit"><br />
<pre><input type="checkbox" name="store_login" value="user">Remember Me<br></pre>-->
</form>


<?php
ob_start();
include 'dbconnect.php';

$email = (isset($_POST['email']) ? $_POST['email'] : null);
$pass = (isset($_POST['pass']) ? $_POST['pass'] : null);

function passwordStr($password) // Function to check pw strength
{
	if (!(strlen($password) < 8) && preg_match("/[0-9]+/",$password) && preg_match("/[a-zA-Z]+/", $password)) {
		return TRUE;
	}
	else return FALSE;
}

if(passwordStr($pass) && isset($_POST["submit"])) { // If everything is ok, then continue to submit.

	mysqli_select_db($dbc, $db) or die("Error: Cannot Select Database"); // Select DB

	$query=mysqli_query($dbc, "SELECT * FROM users WHERE email='".$email."'"); // Check for existing entry
	$numrows=mysqli_num_rows($query);

	if($numrows==0)	{ // If no entries match the registrant
	$sql="INSERT INTO users(email, password) VALUES('$email', '$pass')"; // Insert account into DB.
	$result=mysqli_query($dbc, $sql);

	if($result) {
	echo "Account Successfully Created";
	header('location: login.php');
	} else {
	echo "Failure To Create Account, Please Try Again";
	}
	} else {
	echo "That email is already registered with us. Please try again";
	}
}
else if(passwordStr($pass) == FALSE && isset($_POST["submit"])) {
	echo "<font color = 'red'>Your password did not meet the strength requirement. Please try again</font>";
}

?>

</body>
</html>