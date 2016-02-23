<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Page Display</title>
</head>

<body style = "text-align:center">
	
<?php
session_start();

$_SESSION['conD'] = isset($_SESSION['con'])? '&constr='. $_SESSION['con'] : "";

if ($num_pages > 1) {
	
	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="video.php?s=' . ($start - $display) . '&p=' . $num_pages . '&sort=' . $sort . $_SESSION['conD'].'">Previous</a> ';
	}
	
	// Make all the numbered pages:
	if($current_page < 10)
	{
		$pageS = 1;
	}
	else
		$pageS = $current_page - 10;
	if($current_page > $num_pages - 10)
		$pageE = $num_pages;
	else
		$pageE = $current_page + 10;
	for ($i = $pageS; $i <= $pageE; $i++) {
		if ($i != $current_page) {
			echo '<a href="video.php?s=' . (($display * ($i - 1))) . '&p=' . $num_pages . '&sort=' . $sort . $_SESSION['conD'].'">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $num_pages) {
		echo '<a href="video.php?s=' . ($start + $display) . '&p=' . $num_pages . '&sort=' . $sort  . $_SESSION['conD'].'">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
} // End of links section.
?>
</body>
</html>