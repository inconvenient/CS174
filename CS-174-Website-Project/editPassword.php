<?php
include "header.php"; 
include "dbconnect.php"; 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Password</title>
</head>

<body>

<h3>Edit Your Password</h3>
<form action="" method="POST">

Re-Enter Your Email (For Security): <input type="text" name="email"><br />
Current Password: <input type="password" name="curPW"><br />
New Password: <input type="password" name="newPW"><br />
Re-Enter Your Password: <input type="password" name="pwcheck"><br />
<p><input type="submit" value="Update" name="submit" /></p>

</form>

<?php
if(isset($_POST["submit"])) {
	$email = (isset($_POST['email']) ? $_POST['email'] : null); 
	$curPW = (isset($_POST['curPW']) ? $_POST['curPW'] : null);
	$newPW = (isset($_POST['newPW']) ? $_POST['newPW'] : null);
	$newPW2 = (isset($_POST['pwcheck']) ? $_POST['pwcheck'] : null);

	if($curPW == $newPW) {
		echo "This password is the same as your current one, please enter a new email.";
	} 
	else if($newPW != $newPW2) {
		echo "You did not verify your password correctly. Please try again.";
	}
	else if(!(passwordStr($newPW))) {
		echo "Your new password is too weak. Please try a different password.";
	}
	else {
		mysqli_select_db($dbc, $db) or die("Error: Cannot Select Database"); // Select DB
		$query=mysqli_query($dbc, "SELECT * FROM users WHERE password='".$curPW."' AND email='".$email."'");
		if(!$query) {
			echo "Could not properly query, please contact the webmaster.";
			exit;
		}
		else if(mysqli_num_rows($query) == 0) {
			echo "Could not find the email/account with the associated password. Please make sure it is correct and try again.";
			exit;
		}
		$sql = "UPDATE users SET password='".$newPW."' WHERE password='".$curPW."'";
		if(mysqli_query($dbc, $sql)) {
			echo "Password updated sucessfully";
		}	
	}
}

// FUNCTIONS //

function passwordStr($password) // Function to check pw strength
{
	if (!(strlen($password) < 8) && preg_match('/[a-z]+[0-9]+/', $password)) {
		return TRUE;
	}
	else return FALSE;
}
?>
</body>
</html>