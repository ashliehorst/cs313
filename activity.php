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
        <h1>Make an Activity</h1>
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

	<form action="updateActivity.php" method="POST">
	<br />
		<p>Activity Name</p>
		<input type="text" name="actName"></input>
		<br /><br />

		<p>Location</p>
		Name of Location<input type="textarea" name="locName"></input>
		City<input type="text" name="city"></input>
		State<input type="text" name="state"></input>
		Street<input type="text" name="street"></input>
		<br /><br />

		Date<input type="text" name="date"></input>
		<br /><br />

		<p>Hobby that goes with the activity</p>
<?php
// This section will now generate the available check boxes for topics
// based on what is in the database


// It would be better to store these in a different file
$dbUser = 'ashliehorst';
$dbPass = 'Soccermom1';
$dbName = 'hobbyfun';
$dbHost = '127.4.54.130';

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
		echo '<input type="radio" name="hobby" value="' . $row['hobby_id'] . '">';
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

	<input type="submit" value="Create Activity" />

</form>
  
	 <br />
	
      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>
  </div>  
</body>
</html>