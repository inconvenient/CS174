<!DOCTYPE HTML>
<HTML>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include("dbconnect.php"); ?>

<h2>View My Video Collection!!</h2>
<form action="viewData.php" method=post>
<p>Sort by
<select name=sortBy>
<option value=""></option>
<option value=title>Title</option>
<option value=videolength>Length</option>
<option value=highestresolution>Highest Resolution</option>
<option value=language>Language</option>
<option value=viewcount>View Count</option>
</select>
<input type=submit name=submit>
</p>
</form>
<?php
print "<table><caption></caption>"	;
	print "<thead >";
	print "<tr style=\"background-color:#ccffcc;\"><th scope=\"col\" >Video</th>
	<th scope=\"col\">Title</th>
	<th scope=\"col\">Length</th>
	<th scope=\"col\">Highest Resolution</th>
	<th scope=\"col\">Description</th>
	<th scope=\"col\">Language</th>
	<th scope=\"col\">View Count</th>
	<th scope=\"col\">Video Type</th>
	<th scope=\"col\">Tag</th>
	<th scope=\"col\">Favorite</th></tr></thead>
	";
if(isset($_POST['sortBy'])){
	$sortBy = $_POST['sortBy'];
	$sql = "select * from fun_video order by $sortBy";
}
else{
	$sql = "select * from fun_video";
}

$result = mysqli_query($conn, $sql);
if ($result)
{
while (list($id, $title, $link, $length, $resolution, $desc, $language, $count, $type, $image, $tag, $category) = mysqli_fetch_array($result))
{
	print "<tbody><tr>
	<td><a href=$link target=_blank><img src=$image width=\"250px\" /></a></td>
	<td width=\"200px\">$title</td><td width=\"100\" style=\"text-align:center\">$length</td><td style=\"text-align:center\">$resolution</td>
	<td width=\"220\">$desc</td><td width=\"100\">$language</td><td>$count</td>
	<td>$type</td><td>$tag</td><td><input type=checkbox name=\"fav[]\" value=$id></td></tr>";
 	print "</tbody>";
}
print "</table>";

        mysqli_free_result($result);
}

?>
<h2><a href="modify.php">Modify My Videos!!</a></h2>
<h2><a href="enterData.php">Add A New Video!!</a></h2>
</body>
</HTML>