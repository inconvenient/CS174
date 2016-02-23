<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	
	include('header.php');
	include('multiple_sort.php');
	include('display.php');
	display('selectdb.php');
?>
</body>
</html>