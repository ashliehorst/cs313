<?php

$hobbyIds = $_POST['chkHobbies'];

echo "hobby=$hobbyIds\n";

$dbUser = 'ashliehorst';
$dbPass = 'Soccermom1';
$dbName = 'hobbyfun';
$dbHost = '127.4.54.130'; 

try
{
	// Create the PDO connection
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// Now go through each hobby id in the list from the user's checkboxes
	foreach ($hobbyIds as $hobbyId)
	{
		$statement = $db->prepare('INSERT INTO user_hobby(user, hobbies) VALUES(1, :hobby)');
		$statement->bindParam(':hobby', $hobbyId);
		$statement->execute();
	}
}
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: profile.php");
die(); 
?>