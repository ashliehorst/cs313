<!DOCTYPE html>
<html>
<body>

<div>
<?php
try
{
	$query = "Fisher";
	$user = "ashliehorst";
	$pass = "Soccermom1";
	$db = new PDO("mysql:host=127.4.54.130;dbname=hobbyfun", $user, $pass);
	echo "Connection established! :-)<br />";
	
	/*
	$sql = "SELECT name FROM user WHERE name LIKE :name";
	
	$statement = $db->prepare($sql);
	$statement->bindValue(':name', '%' . $query . '%', PDO::PARAM_STR);
	$statement->execute();
	while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo "Found: " . $row["name"] . "<br />\n";
	}
	*/
}
catch (PDOException $ex)
{
	echo "Error: " . $ex->getMessage();
	die();
}
?>
</div>

</body>

</html>
