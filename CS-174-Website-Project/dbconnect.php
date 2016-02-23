<?php
/*create connection to mysql
*/
$servername="localhost";
$username="root";
$password="";
$db ="cs174";
$dbc =mysqli_connect($servername, $username, $password, $db);
$conn=new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
