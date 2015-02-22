<?php
	session_start();
?>
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
        <h1>Profile</h1>
        <nav id="mainnav">
          <ul>
            <li><a href="file2.php" class="thispage">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="hobbies.php">Hobby List</a></li>
            <li><a href="activity.php">Make Activity</a></li>
            <li></li>
          </ul>
        </nav>
      </header>

	<div id = "here">

<form id="mainForm" action="insertTopic.php" method="POST">

<?php

$dbUser = 'ashliehorst';
$dbPass = 'Soccermom1';
$dbName = 'hobbyfun';
$dbHost = '127.4.54.130'; 

try
{
	// Create the PDO connection
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

	// prepare the statement
	$user_name = $_SESSION['username'];
	echo "<p>Hello " . $user_name . "!</p>";

	// prepare the statement
	$statement = $db->prepare("SELECT * FROM user_activity ua
				JOIN activity a ON ua.activity = a.activity_id
				JOIN user u ON ua.user = u.user_id
				WHERE user_name = '$user_name'");
	$statement->execute();
	echo "<p>Your Activities:</p>";
	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['activity_name'] . "<br/>";
	}
	
	// prepare the statement
	$statement = $db->prepare("SELECT * FROM user_hobby uh
				JOIN hobbies h ON uh.hobbies = h.hobby_id
				JOIN user u ON uh.user = u.user_id
				WHERE user_name = '$user_name'");
	$statement->execute();
	echo "<p>Your Hobbies:</p>";
	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['hobby_name'] . "<br/>";
	} 
}
catch (PDOException $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error connecting to DB. Details: $ex";
	die();
}

?>

	<br />

</form>

      
	 <br />
	
      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>

</body>
</html>
