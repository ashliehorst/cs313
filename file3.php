<?php
if(!$_SESSION){
    session_start();
 }
require $_SERVER['DOCUMENT_ROOT'].'file1.php';
if ($_POST['action'] == "Search" && !empty($_POST['search'])){
	$searchVariable = $_POST['search'];
	$scriptures = getSpecificScriptures($searchVariable);
	$output = "<h1>Fun Hobbies</h1>";
	foreach ($scriptures as $value) {
		$output .= "<b>$value[1]</b> <br />";
	}
	include "file2.php";
	exit;
}
else {
	$scriptures = getScriptures();
	$output = "<h1>Fun Hobbies</h1>";
	foreach ($scriptures as $value) {
		$output .= "<b>$value[1]</b> <br />";
	}
	include "file2.php";
	exit;
}
