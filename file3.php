<?php
if(!$_SESSION){
    session_start();
 }
require $_SERVER['DOCUMENT_ROOT'].'file1.php';
if ($_POST['action'] == "Search" && !empty($_POST['search'])){
	$searchVariable = $_POST['search'];
	$activities = getSpecificActivity($searchVariable);
	$output = "<h1>Activities</h1>";
	foreach ($activities as $value) {
		$output .= "$value[1] <br />";
	}
	include "file2.php";
	exit;
}
else {
	$activities = getActivities();
	$output = "<h1>Activities</h1>";
	foreach ($activities as $value) {
		$output .= "$value[1] <br />";
	}
	include "file2.php";
	exit;
}

?>
