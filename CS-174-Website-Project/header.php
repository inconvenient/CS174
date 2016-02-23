<script type = 'text/javascript'>
	function changeSession(){
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","modifysession.php");
		xmlhttp.send();
	}
</script>

<!doctype html>
<html><head>
<meta charset="utf-8">
<link rel = "stylesheet" href = "css/headerstyle.css">
<title>Header</title>
</head>

<body>
<?php session_start(); ?>

<nav width="100%" height="56" >
  <ul>
   	<li><a href = "welcome.php">Home</a></li>
    <?php
	
	// FUNCTION TO CHECK ADMIN
	function adminChecker() {
	$adminEmail = $_COOKIE['User'];
	
	if($adminEmail == 'admin@group3.cs174') {
		return true;
	}
	else return false;	
	}
	// FUNCTION TO CHECK ADMIN
	
	if(isset($_SESSION['sess_users'])) {
		echo "<li><a href = 'enterData.php'>Add A Video</a></li>";
		if(adminChecker()) { // IF ADMIN - ECHO THE LINK TO MODIFY , ELSE ECHO NEED ADMIN PAGE.
			echo "<li><a href = 'modify.php'>Modify A Video</a></li>";
		} else echo "<li><a href = 'needadmin.html'>Modify A Video</a></li>";
	}
	?>
    <li><a href = "#">Category</a>
    	<ul>		
               	<li><a href = "video.php?sort=lgnth"  onClick = "changeSession()"> Length </a>
                	<ul>
                    	<li><a href = "video.php?sort=lgnth&constr=10" onClick="changeSession()"> 0-10 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=20" onClick="changeSession()"> 10-20 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=40" onClick="changeSession()"> 20-40 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=60" onClick="changeSession()"> 40-60 minutes </a></li>
                        <li><a href = "video.php?sort=lgnth&constr=61" onClick="changeSession()"> 1+ hour </a></li>
                    </ul>
                </li>
                <li><a href = "video.php?sort=rsltn"  onClick = "changeSession()"> Highest Resolution </a>
                	<ul>
                    	<li><a href = "video.php?sort=rsltn&constr=144" onClick = "changeSession()"> 144p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=240" onClick = "changeSession()"> 240p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=360" onClick = "changeSession()"> 360p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=480" onClick = "changeSession()"> 480p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=720" onClick = "changeSession()"> 720p </a></li>
                        <li><a href = "video.php?sort=rsltn&constr=1080" onClick = "changeSession()"> 1080p </a></li>
                	</ul>
                </li>
                <li><a href = "video.php?sort=lang" onClick = "changeSession()"> Language </a>
                	<ul>
                    	<li><a href = "video.php?sort=lang&constr=eng" onClick = "changeSession()"> English </a></li>
                        <li><a href = "video.php?sort=lang&constr=none" onClick = "changeSession()"> Non-English </a></li>
                    </ul>
                </li>
                <li><a href = "video.php?sort=vwcnt" onClick = "changeSession()"> View Count </a>
                	<ul>
                        <li><a href = "video.php?sort=vwcnt&constr=75" onClick = "changeSession()"> 50,000-75,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=100" onClick = "changeSession()"> 75,001-100,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=125" onClick = "changeSession()"> 100,001-125,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=150" onClick = "changeSession()"> 125,001 - 150,000 </a></li>
                        <li><a href = "video.php?sort=vwcnt&constr=151" onClick = "changeSession()"> 150,000+ </a></li>
                    </ul>
                </li>
                <li><a href = "video.php?sort=vtype" onClick = "changeSession()"> Video Type </a>
                	<ul>
                    	<li><a href = "video.php?sort=vtype&constr=tut" onClick = "changeSession()"> Tutorial </a></li>
                        <li><a href = "video.php?sort=vtype&constr=ent" onClick = "changeSession()"> Entertainment </a></li>
                        <li><a href = "video.php?sort=vtype&constr=app" onClick = "changeSession()"> Application </a></li>
                        <li><a href = "video.php?sort=vtype&constr=wep" onClick = "changeSession()"> Weapons </a></li>
                        <li><a href = "video.php?sort=vtype&constr=gro" onClick = "changeSession()"> Group Demo </a></li>
                        <li><a href = "video.php?sort=vtype&constr=oth" onClick = "changeSession()"> Others </a></li>
                 	</ul>
               	</li>
                <li><a href = "video.php?sort=vcat" onClick = "changeSession()"> Video Category </a>
                	<ul style = "width: 200px">
                    	<li><a href = "video.php?sort=vcat&constr=ytc" onClick = "changeSession()"> Yang Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=ctc" onClick = "changeSession()"> Chen Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=stc" onClick = "changeSession()"> Sun Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=wtc" onClick = "changeSession()"> Wu Taichi </a></li>
                        <li><a href = "video.php?sort=vcat&constr=qg" onClick = "changeSession()"> QiGong </a></li>
                        <li><a href = "video.php?sort=vcat&constr=shl" onClick = "changeSession()"> Shaolin </a></li>
                        <li><a href = "video.php?sort=vcat&constr=tkd" onClick = "changeSession()"> Tae Kwon Do </a></li>
                        <li><a href = "video.php?sort=vcat&constr=wc" onClick = "changeSession()"> Wing Chun </a></li>
                        <li><a href = "video.php?sort=vcat&constr=aki" onClick = "changeSession()"> Aikido </a></li>
                        <li><a href = "video.php?sort=vcat&constr=jd" onClick = "changeSession()"> Judo </a></li>
                        <li><a href = "video.php?sort=vcat&constr=kfm" onClick = "changeSession()"> KungFu Movie </a></li>
                 	</ul>
               	</li>
                
         </ul>
    </li>
    
    <li><a href = "video.php" onClick="changeSession()">View All</a></li>
    <?php
	if(!isset($_SESSION['sess_users'])){
    	echo "<li><a href = 'login.php'>Login </a></li>";
    	echo "<li><a href = 'register.php'> Register </a></li>";
	}
	?>
	<li><a href = "displayFav.php"> Display Favorite </a></li>
    <?php
	if(isset($_SESSION['sess_users'])) {
		echo "<li><a href = 'editAccount.php'> Edit Account </a></li>";
	}
	?>
    
  </ul>
</nav>
</body>
</html>