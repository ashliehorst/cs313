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
        <h1>List of Hobbies</h1>
        <nav id="mainnav">
          <ul>
            <li><a href="file2.php" class="thispage">Home</a></li>
            <li><a href= "profile.php">Profile</a></li>
            <li><a href="hobbies.php">Hobby List</a></li>
            <li><a href="activity.php">Make Activity</a></li>
            <li></li>
          </ul>
        </nav>
      </header>

	<div id = "here">

<form action="updateHobbies.php" method="POST">

<?php

$dbUser = 'root';
$dbPass = 'root';
$dbName = 'hobbyfun';
$dbHost = 'localhost'; // for my configuration, I need this rather than 'localhost'

try
{
	// Create the PDO connection
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

	// prepare the statement
	$statement = $db->prepare('SELECT * FROM hobbies');
	$statement->execute();

	// Go through each result
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '<input type="checkbox" name="chkHobbies[]" value="' . $row["hobby_id"] . '">';
		echo $row['hobby_name'];
		echo '</input><br />';

		// put a newline out there just to make our "view source" experience better
		echo "\n";
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

	<input type="submit" value="Add to your Hobby List" />

</form>

      
	 <br />
	
      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>

</body>
</html>