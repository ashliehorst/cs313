<!DOCTYPE html>
<html>
<body>

<div>
<?php
try
{

function loadDatabase()
{

  $dbHost = "127.4.54.130";
  $dbPort = "";
  $dbUser = "ashliehorst";
  $dbPassword = "Soccermom1";

     $dbName = "hobbyfun";

    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: "; 
          require("setLocalDatabaseCredentials.php");
     }
     else 
     { 
          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbName = getenv('hobbyFun'); 
          $dbUser = getenv('adminv5ijxEy');
          $dbPassword = getenv('REtjuvjGyn6-');
     } 
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
	
    $db = new PDO("mysql:host=$dbHost:dbname=$dbName", $dbUser, $dbPassword);

     return $db;

}

$db = loadDatabase();

$statement = $db->query('SELECT name FROM hobbies');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Hobbies</h2>";

foreach($results as $hobby)
{
	echo "<p><b>" . $hobby['name'];
}

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
