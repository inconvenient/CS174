<script type = 'text/javascript'>
	function changeSession(){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","modifysession.php");
		xmlhttp.send();
	}
</script>
<!doctype html>
<?php

	if(isset($_POST['vidl']) || isset($_POST['vidr']) || isset($_POST['vidv']) || isset($_POST['vidc']) || isset($_POST['vidt'])){
		$vidarr = array();
		$vidleng = empty($_POST['vidl']) ?"": $_POST['vidl'];
		if($vidleng != "")
			array_push($vidarr, $vidleng);
		$vidres = empty($_POST['vidr']) ? "":$_POST['vidr'];
		if($vidres != "")
			array_push($vidarr, $vidres);
		$vidlang = empty($_POST['vidv']) ?"": $_POST['vidv'] ;
		if($vidlang != "")
			array_push($vidarr, $vidlang);
		$vidcoun = empty($_POST['vidc']) ?"": $_POST['vidc'];
		if($vidcoun != "")
			array_push($vidarr, $vidcoun);
		$vidtype = empty($_POST['vidt']) ?"": implode(',' ,$_POST['vidt']);
		if($vidtype != "")
			array_push($vidarr, $vidtype);
		$_SESSION['vidarr'] = $vidarr;
		$_SESSION['vidarra'] = $vidarr;
	}
	
?>
<html>
<head>
<style>
	nav p{ 
	padding:0 20px;
	}
	
</style>
<meta charset="utf-8">
<title>Multiple Video Sort</title>
</head>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" onClick="changeSession()">
  <!-- video length -->
  <nav >
      <ul>
          <li>
            <p>Length of Video</p>
            <ul>
              <li>
                <input type ="radio" name = "vidl" value = "10">
                0 - 10 minutes</li>
              <li>
                <input type ="radio" name = "vidl" value = "20">
                10 - 20 minutes</li>
              <li>
                <input type ="radio" name = "vidl" value = "40">
                20 - 40 minutes</li>
              <li>
                <input type ="radio" name = "vidl" value = "60">
                40 - 60 minutes</li>
              <li>
                <input type ="radio" name = "vidl" value = "61">
                60+ minutes</li>
            </ul>
          </li>
          <!-- Resolution -->
          <li>
            <p>Resolution of Video</p>
            <ul>
              <li>
                <input type ="radio" name = "vidr" value = "144">
                144p</li>
              <li>
                <input type ="radio" name = "vidr" value = "240">
                240p</li>
              <li>
                <input type ="radio" name = "vidr" value = "360">
                360p</li>
              <li>
                <input type ="radio" name = "vidr" value = "480">
                480p</li>
              <li>
                <input type ="radio" name = "vidr" value = "720">
                720p</li>
              <li>
                <input type ="radio" name = "vidr" value = "1080">
                1080p</li>
            </ul>
          </li>
          
          <!-- Language -->
          <li>
            <p>Language</p>
            <ul>
              <li>
                <input type ="radio" name = "vidv" value = "eng">
                English</li>
              <li>
                <input type ="radio" name = "vidv" value = "none">
                Non-English</li>
            </ul>
          </li>
          <!-- View Count -->
          <li>
            <p>View Count</p>
            <ul>
              <li>
                <input type ="radio" name = "vidc" value = "75">
                50,000-75,000</li>
              <li>
                <input type ="radio" name = "vidc" value = "100">
                75,001-100,000</li>
              <li>
                <input type ="radio" name = "vidc" value = "125">
                100,001-125,000</li>
              <li>
                <input type ="radio" name = "vidc" value = "150">
                125,001-150,000</li>
              <li>
                <input type ="radio" name = "vidc" value = "151">
                150,001+</li>
            </ul>
          </li>
          
          <!-- Video Type -->
          <li>
              <p>Video Type</p>
              <ul>
                <li>
                  <input type = "checkbox" name = "vidt[]" value = "tut">
                  Tutorial</li>
                <li>
                  <input type = "checkbox" name = "vidt[]" value = "ent">
                  Entertainment</li>
                <li>
                  <input type = "checkbox" name = "vidt[]" value = "app">
                Application</li>
                <li><input type = "checkbox" name = "vidt[]" value = "wep">
                Weapon
                </li>
                <li>
                  <input type = "checkbox" name = "vidt[]" value = "gro">
                  Group Demo</li>
                <li>
                  <input type = "checkbox" name = "vidt[]" value = "oth">
                  Others</li>
              </ul>
          </li>
      </ul>
  </nav>
  <p>
    <input type = "submit" value = "filter" style = "text-align:center">
  </p>
</form>
<body>
</body>
</html>