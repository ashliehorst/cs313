<?php
/**********************************************************
* File: insertTopic.php
* Author: Br. Burton
* 
* Description: Takes input posted from topicEntry.php
*   This file enters a new scripture into the database
*   along with its associated topics.
*
*   This file actually does not do any rendering at all,
*   instead it redirects the user to showTopics.php to see
*   the resulting list.
***********************************************************/

// get the data from the POST
$actName = $_POST['actName'];
$locName = $_POST['locName'];
$city = $_POST['city'];
$state = $_POST['state'];
$street = $_POST['street'];
$date = $_POST['date'];
$hobby = $_POST['hobby'];

echo "actName=$actName\n";
echo "date=$date\n";
echo "hobby=$hobby\n";

$dbUser = 'ashliehorst';
$dbPass = 'Soccermom1';
$dbName = 'hobbyfun';
$dbHost = '127.4.54.130'; 

try
{
	// Create the PDO connection
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// First Add the Scripture
	$locQuery = 'INSERT INTO location(location_name, city, state, street) VALUES(:name, :city, :state, :street)';

	$locStatement = $db->prepare($locQuery);

	$locStatement->bindParam(':name', $locName);
	$locStatement->bindParam(':city', $city);
	$locStatement->bindParam(':state', $state);
	$locStatement->bindParam(':street', $street);

	$locStatement->execute();

	// get the new id
	$locationId = $db->lastInsertId();

	$query = 'INSERT INTO activity(activity_name, date, location, hobbies) VALUES(:name, :date, :location, :hobbies)';

	$statement = $db->prepare($query);

	$statement->bindParam(':name', $actName);
	$statement->bindParam(':date', $date);
	$statement->bindParam(':location', $locationId);
	$statement->bindParam(':hobbies', $hobby);

	$statement->execute();

	// get the new id
	$activityId = $db->lastInsertId();
  echo "activity id = " . $activityId;
  $actQuery = 'INSERT INTO user_activity(user, activity) VALUES(1, :activity)';
 	$actStatement = $db->prepare($actQuery);
  
  $actStatement->bindParam(':activity', $activityId);

	$actStatement->execute();
  
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: profile.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.

?>