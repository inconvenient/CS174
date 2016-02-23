
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- custom css-->
    <link href="css/welcome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">
<title>Welcome</title>

</head>
<?php include('header.php'); ?>
<body>
<?php 

ob_start();

print '<h3>Explore our library of Martial Arts Videos </h3>';

ob_end_flush()
?>
<div>
<?php
if(isset($_SESSION['sess_users']))
{
	include('userFav.php');
	echo "<p>Click <a href=logout.php>here</a> to logout.</p>";
}
?>
	
	

</div>
<?php
//include('footer.html');
?>
</body>
</html>