<?php

session_start();

$dbUser = 'root';
$dbPass = 'root';
$dbName = 'hobbyfun';
$dbHost = 'localhost'; 

require('connect.php');

$hobbyIds = $_POST['chkHobbies'];

echo "hobby=$hobbyIds\n";

try
{
	// Create the PDO connection
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// Now go through each hobby id in the list from the user's checkboxes
	foreach ($hobbyIds as $hobbyId)
	{
  if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $userId = "SELECT user_id FROM user WHERE user_name = '$username'";
  
	$userStatement = $db->prepare($userId);
	$userStatement->execute();
  
  while ($userRow = $userStatement->fetch(PDO::FETCH_ASSOC))
	{
    $user = $userRow["user_id"];
  }
}
		$statement = $db->prepare("INSERT INTO user_hobby(user, hobbies) VALUES('$user', :hobby)");
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