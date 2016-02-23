<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- custom css-->
    <link href="css/welcome.css" rel="stylesheet">
<!-- Script for popupvideo -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link type="text/css"
		href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.youtubepopup.min.js"></script>
    <script type="text/javascript">
		$(function() {
			$("a.youtube").YouTubePopup({ autoplay: 1 });
		});
		
    </script>
</head>

<body>


<!-- Fetch favorite videos from DB -->
<?php
	require_once("connect.php");
	include('selectdbfav.php');
	
	//number of display per page
	$display = 5;
	$num_rec = null;
	$num_pages = 0;
	if(isset($_GET[$num_rec]))
	{
		$num_rec = 0;
	}
	//detemine the pages
	else($num_rec != mysqli_fetch_array(mysqli_query($link,"SELECT COUNT(*) FROM `". $table ."`WHERE `user_id`='" .  $_SESSION['sess_users']."'"),MYSQLI_NUM));
		$q = mysqli_query($link,"SELECT COUNT(*) FROM `".$table ."` WHERE `user_id`='" .  $_SESSION['sess_users']. "'");
		$row = mysqli_fetch_array($q,MYSQLI_NUM);
		
		$num_rec = $row[0];
	if($num_rec == 0)
	{
	}
	else{
		if($num_rec > $display){
			$num_pages = ceil($num_rec/$display);
		}
		else
		{
			$num_pages = 1;
		}
	if(isset($_GET['s']))
	{
		$start = $_GET['s'];
		
	}
	else
	{
		$start = 0;
	}
	$q =  mysqli_query($link,"SELECT * FROM `fun_video` INNER JOIN `fav_video` ON fav_video.video_id = fun_video.id AND fav_video.user_id = '" . $_SESSION['sess_users'] . "' LIMIT $start, $display");
	}
?>

<!--Display Favorite Video-->
<?php

	if($num_rec != 0)
	{
		echo "<div class='container'>";
	while($row = mysqli_fetch_array($q, MYSQLI_ASSOC))
	{
		$_SESSION['prev'] = $_SERVER['REQUEST_URI'];
		echo "<tr>".
		"<td><a class = 'youtube' target = '_blank' href = " . $row['videolink'] . "><img src =" . $row['iconimage'] . " alt=picture></a></td>" .
		"<td>" . "</tr>";		
	}
		echo "</div>";
	mysqli_free_result($q);
	mysqli_close($link);

	}
	else
	{
		echo '</table>';
		echo "<h1 style=text-align:center>" . "You have no favorite videos" . "</h1>";
	}
	
?>

</body>
</html>