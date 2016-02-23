<?php
include("dbconnect.php");
?>
<?php include('header.php'); ?>
<h2>Modify my Video Collection!!!</h2>
Enter the link of the video you wish to modify
<form method=post action="verify_input.php">

<b>Link:</b>
<input type=text size=40 name=to_be_recovered_link>
<br>
<input type=submit name=submit value="Recover this video info!">
<input type=reset name=reset value="Start Over">

</form>
