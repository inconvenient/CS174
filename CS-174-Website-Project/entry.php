
<?php include("dbconnect.php");
include('header.php'); 
//recover the form variable values.
if(!empty($_POST['title']) || !empty($title) || !empty($image)){
$title= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
$link= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['link'])));
$length= $_POST['length'];
$resolution= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['resolution'])));
$desc= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['desc'])));
$language = mysqli_real_escape_string($dbc,trim(strip_tags($_POST['language'])));
$count= $_POST['count'];
$type = "";
if(!empty($_POST['type']))
	$type= implode(',', $_POST['type']);
$image =mysqli_real_escape_string($dbc, trim(strip_tags($_POST['image'])));
$tag = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['tag']))); 
$cat = mysqli_real_escape_string($dbc,trim(strip_tags($_POST['category'])));
$query = "insert into fun_video "
        ." (title,videolink,videolength,highestresolution,description,language,viewcount,videotype,iconimage,tag, category) values "
                ."('$title', '$link', '$length', '$resolution', '$desc','$language','$count','$type','$image','$tag', '$cat')"
        ;

//var_dump($query);	   

	mysqli_query($conn,$query);
	print "<h2>Thanks!!</h2>";
}
else 
	print "<h2>Your input is incomplete and has not be added!</h2>";
?>
<h2><a href="video.php">View My Video Collection!!!</a></h2>
