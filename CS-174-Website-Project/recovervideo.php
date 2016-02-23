<?php

include("dbconnect.php"); 
include('header.php');
?>

<h2>You wish to modify the information on
<?php
$to_be_recovered_link=trim($_POST['to_be_recovered_link']);
print ("$to_be_recovered_link");
//print  "video as: <p><img src=$to_be_recovered_link alt=link /></p>";
?>
</h2>

<?php

$result = mysqli_query($conn, "select * from fun_video where videolink ='$to_be_recovered_link'");

if ($result)
{
list($id1, $title1, $link1, $length1, $resolution1, $desc1, $language1, $count1, $type1, $image1, $tag1, $category1) = mysqli_fetch_array($result);
     if ($title1 !=null)
     {
print  "Video is: <p><img src=$image1 alt=link /></p>";

// THIS IS FOR CLEANSING INPUT - But it needs fixing...

//$title1= mysql_real_escape_string(trim(strip_tags($title1)),$dbc);
//$link1= mysql_real_escape_string(trim(strip_tags($link1)),$dbc);
//$desc1= mysql_real_escape_string(trim(strip_tags($desc1)),$dbc);
//print "$desc1";
//$language1 = mysql_real_escape_string(trim(strip_tags($language1)),$dbc);
//$image1 =mysql_real_escape_string(trim(strip_tags($image1)),$dbc);
//$tag1 = mysql_real_escape_string(trim(strip_tags($tag1)),$dbc); 

//

print "
<form method=post action='updateinfo.php'>
<p><label for=title><strong>Video Title</strong></label> <input type=text name=title id=title size=40 value='$title1' />
</p>
<p>
<label for=link><strong>Video Link</strong></label> <input type=text name=link id =link size=40 value='$link1'/>
</p>
<p>
<label for=length><strong>Video Length</strong></label> <input type=text name=length id=length size=10 value=$length1> minutes
</p>
";
?>

<p><label for=resolution><strong>Highest Resolution</strong></label>
	<select id=resolution name=resolution >
    	<option value=144 <?php if($resolution1==144){print 'selected';} ?>>144p</option>
        <option value=240 <?php if($resolution1==240){print 'selected';} ?>>240p</option>
        <option value=360 <?php if($resolution1==360){print 'selected';} ?>>360p</option>
        <option value=480 <?php if($resolution1==480){print 'selected';} ?>>480p</option>
        <option value=720 <?php if($resolution1==760){print 'selected';}?> >720p</option>
        <option value=1080 <?php if($resolution1==1080){print 'selected';}?>>1080p</option>
	</select>
</p>
<?php
print "
<p>
<label for=desc><strong>Video Description</strong></label> <textarea id=desc name=desc row=2 col=40 >$desc1</textarea>  
</p>";
?>
<p><strong>Language:</strong> 
<select id=language name=language>
<option value =English <?php if($language1=="English") print "selected"; ?>>English</option>
<option value = Non-English <?php if($language1=="Non-English") print "selected"; ?>>Non-English</option>
    </select>
</p>
<?php 
print "
<p><label for=count><strong>View Count</strong></label> <input type=text id=count name=count size=20 value=$count1 />";
?>

<p><strong>Video Type</strong>    
<input type=checkbox id= "tutorial" name=type[] value="Tutorial" <?php if($type1=="Tutorial") {print "checked";} ?> /><label for=tutorial>Tutorial</label>
<input type=checkbox id="entertainment" name=type[] value="Entertainment" <?php if($type1=="Entertainment") {print "checked";} ?> ><label for=entertainment>Entertainment</label>
<input type=checkbox id=application name=type[] value="Application" <?php if($type1=="Application") {print "checked";} ?> ><label>Application</label>
<input type=checkbox id=weapon name=type[] value="Weapon" <?php if($type1=="Weapon") {print "checked";} ?> ><label for=weapon>Weapon</label>
<input type=checkbox id=group name=type[] value="Group demo" <?php if($type1=="Group demo") {print "checked";} ?> ><label for=group>Group Demo</label>
<input type=checkbox id=others name=type[] value="Others" <?php if($type1=="Others") {print "checked";} ?> ><label for=others>Others</label>
</p>
<?php
print "
<p><label for=image><strong>Video Icon Image</strong></label>
<input type=text id=image name=image value='$image1' size= 30 />
<p><label for=tag><strong>tag</strong></label>
<input type=text id=tag name=tag value='$tag1' size= 30 />(keywords separated by commas)</p>
<input type=hidden size=40 name='title' value='$title1''>
<input type=submit name=submit value='Modify accordingly now!'>
<input type=reset name=reset value='Start Over'>

</form>";
 mysqli_free_result($result);
     }  // end of inner if

 else
{
print "<h2>No matching link in the video collection found!</h2>";
 mysqli_free_result($result);
}
}//   end of outer if
?>
 <input type='button' value='Go back'
                      onclick='self.history.back()' />
<h2><a href="modify.php">Modify My Video Collection!!</a></h2>
<h2><a href="enterData.php">Add A New Video!!</a> </h2>