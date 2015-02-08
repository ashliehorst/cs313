<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hobbies Fun</title>
	<link href="main.css" rel="stylesheet"  type="text/css">

</head>

<body>
    <div id="wrapper">
      <header id="top">
        <h1>Hobbies and Fun</h1>
        <nav id="mainnav">
          <ul>
            <li><a href="index.html" class="thispage">Home</a></li>
            <li><a href= "assignments.html">Assignments</a></li>
            <li><a href="http://www.notsoboringlife.com/list-of-hobbies/">Hobby List</a></li>
            <li><a href="https://www.linkedin.com/">Linked In</a></li>
            <li></li>
          </ul>
        </nav>
      </header>

	 <br />
	 
	<?php echo $output; ?> 
	
      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>
      
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
//	include "file2.php";
	exit;
}
else {
	$activities = getActivities();
	$output = "<h1>Activities</h1>";
	foreach ($activities as $value) {
		$output .= "$value[1] <br />";
	}
//	include "file2.php";
	exit;
}

?>

</body>
</html>
