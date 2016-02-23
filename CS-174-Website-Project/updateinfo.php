<?php
include('header.php');
include("dbconnect.php");
$title= mysql_real_escape_string(trim(strip_tags($_POST['title'])),$dbc);
$link= mysql_real_escape_string(trim(strip_tags($_POST['link'])),$dbc);
$length= $_POST['length'];
$resolution= mysql_real_escape_string(trim(strip_tags($_POST['resolution'])),$dbc);
$desc= mysql_real_escape_string(trim(strip_tags($_POST['desc'])),$dbc);
$language = mysql_real_escape_string(trim(strip_tags($_POST['language'])),$dbc);
$count= $_POST['count'];
$type= implode(',', $_POST['type']);
$image =mysql_real_escape_string(trim(strip_tags($_POST['image'])),$dbc);
$tag = mysql_real_escape_string(trim(strip_tags($_POST['tag'])),$dbc); 
$cat = mysqli_real_escape_string(trim(strip_tags($_POST['category'])));
include("dbconnect.php");
        $query = "update fun_video "
                ." set  title ='$title',videolink='$link',videolength='$length',"
                ."highestresolution='$resolution', description='$desc', language='$language', viewcount='$count', videotype='$type', iconimage='$image', tag='$tag', category='$cat' "
                ."where videolink = '$link'"
        ;
        mysqli_query($conn, $query);
?>
<h2>Thanks!!</h2>
<h2><a href="video.php">View My Video Collection!!!</a></h2>
