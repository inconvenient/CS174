
<html>
<head><title>Input Verification Page</title>
</head>
<body bgcolor='white'>
<?php include('header.php');?>
<?php
include_once("dbconnect.php");
//In case the register_globals is turned off, the form parameters can still be recovered as follows.
$to_be_recovered_link = $_POST['to_be_recovered_link'];
if (empty($to_be_recovered_link))
{
  print "<h2>You have not entered the video link</h2>";
  print "<h2><a href='modify.php'>Modify My Video Collections!!</a></h2>";
}
else
include ("recovervideo.php");
?>
<!-- PHP codes ends here -->

</body>
</html>