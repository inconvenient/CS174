<?php
	session_start();
	ob_start();
	include('connect.php');
	include('selectdbfav.php');
	if(isset($_SESSION['sess_users'])){
		
		$userID = $_SESSION['sess_users'];
		$vidID = $_GET['id'];
		$result = mysqli_query($link, "SELECT * FROM `fav_video` WHERE `user_id`='".$userID."' AND `video_id`='".$vidID. "'");
		if(mysqli_num_rows($result) === 0)
		{
			
			$sql = "INSERT INTO fav_video(user_id,video_id) VALUES ('$userID', '$vidID')";
			$retval = mysqli_query($link, $sql);
			
		}
		header('Location: video.php');
	}
	else{
		header('Location: video.php');
	}
	header('Location:video.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action = "favoriteVideo.php">
	<a href = 'video.php'><button type = "button" name = "go back"> Go Back </button></a>
</form>
</body>
</html>