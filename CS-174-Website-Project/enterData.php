<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Enter Data</title>
</head>

<body>
<?php include('header.php');

include ("dbconnect.php");
?>
<h2>Enter video information</h2>
<form method="post" action="entry.php">
<p><label for=title><strong>Video Title</strong></label> <input type=text name=title id=title size="40" />
</p>
<p>
<label for=link><strong>Video Link</strong></label> <input type=text name=link id =link size='40' />
</p>
<p>
<label for=length><strong>Video Length</strong></label> <input type=text name=length id=length size='10'> minutes
</p>
<p>
<label for=resolution><strong>Highest Resolution</strong></label>
	<select id=resolution name='resolution'>
    	<option value=144>144p</option>
        <option value=240>240p</option>
        <option value=360>360p</option>
        <option value=480>480p</option>
        <option value=720>720p</option>
        <option value=1080>1080p</option>
	</select>
</p>
<p><label for=desc><strong>Video Description</strong></label> <textarea id='desc' name='desc' row='2' col='20'></textarea>  
<p><strong>Language:</strong> 
	<select id=language name='language'>
    	<option value =English>English</option>
        <option value = Non-English>Non-English</option>
    </select>
</p>
<p><label for=count><strong>View Count</strong></label> <input type=text id=count name=count size='20' />
<p><strong>Video Type</strong>    
<input type=checkbox id="tutorial" name=type[] value="Tutorial" /><label for=tutorial>Tutorial</label>
<input type=checkbox id="entertainment" name=type[] value="Entertainment"><label for=entertainment>Entertainment</label>
<input type=checkbox id="application" name=type[] value="Application"><label>Application</label>
<input type=checkbox id="weapon" name=type[] value="Weapon"><label for=weapon>Weapon</label>
<input type=checkbox id="group" name=type[] value="Group demo"><label for=group>Group Demo</label>
<input type=checkbox id="others" name=type[] value="Others"><label for=others>Others</label>
</p>
<p><label for=image><strong>Video Icon Image</strong></label>
<input type=text id='image' name='image' size= '30' />
<p><label for=tag><strong>tag</strong></label>
<input type=text id='tag' name='tag' size= '30' />(keywords separated by commas)</p>
<label for=category><strong>Category</strong></label>
	<select id='category' name='category'>
    	<option value=Yang Taichi>Yang Taichi</option>
        <option value=Chen Taichi>Chen Taichi</option>
        <option value=Sun Taichi>Sun Taichi</option>
        <option value=Wu Taichi>Wu Taichi</option>
        <option value=QiGong>QiGong</option>
        <option value=Shaolin>Shaolin</option>
        <option value=Tae kwon do>Tae Kwon Do</option>
        <option value=Wing Chun>Wing Chun</option>
        <option value=Aikido>Aikido</option>
        <option value=Judo>Judo</option>
        <option value=KungFu Movie>KungFu Movie</option>

	</select>
</p>

<input type=submit name=submit value="submit">
<input type=reset name=reset value="Start Over">
</form>
<input type='button' value='Go back'
                      onclick='self.history.back()' />
</body>
</html>