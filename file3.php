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
        <h1>Activities</h1>
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
        <article>
          <h2>Be Inspired</h2>
          <p></p>
		<form action="file3.php" method="POST" accept-charset="utf-8">
		<input type="submit" id="submit" name="action" value="Search">
		<input type="text" name="search" placeholder="Search Activities by Hobby" value="<?php echo $searchName;?>"/>
	  </form>
	  <p></p>
        </article>
        </div>

<?php
if(!$_SESSION){
    session_start();
 }
$server = '127.4.54.130';
$username = 'ashliehorst';
$passwd = 'Soccermom1';
$database = 'hobbyfun';
        $dsn = "mysql:host=$server; dbname=$database";
        try{
            $db = new PDO($dsn, $username, $passwd); //creates a PDO Object
        } catch (PDOException $exc) {
                echo "<p>An error occurred while connecting to the database</p>";
        }
if ($_POST['action'] == "Search" && !empty($_POST['search'])){
	$searchVariable = $_POST['search'];
	 try{
        $sql = 'SELECT * FROM activity a 
				JOIN location l ON a.location = l.location_id
				JOIN hobbies h ON a.hobbies = h.hobby_id WHERE hobby_name LIKE :name';  			   
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', '%' . $searchVariable . '%', PDO::PARAM_STR);
        $stmt->execute();
           
    } catch (PDOException $ex) {
        echo 'Error';
    }
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
	    echo "<h2>" . $row['activity_name'] 
		     . "</h2> <p>Location: " . $row['location_name'] . "<br/>" . $row['street'] . "<br/>" . $row['city'] . ", " . $row['state'] 
		     . "<p>Date: " .  $row['date'] . "<br/>Hobbies: " . $row['hobby_name'] . "</p><br />";
	}
	 
}
else {
 try{
        $sql = 'SELECT * FROM activity a 
				JOIN location l ON a.location = l.location_id
				JOIN hobbies h ON a.hobbies = h.hobby_id';
        $stmt = $db->prepare($sql);
        $stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
	    echo "<h2>" . $row['activity_name'] 
		     . "</h2> <p>Location: " . $row['location_name'] . "<br/>" . $row['street'] . "<br/>" . $row['city'] . ", " . $row['state'] 
		     . "<p>Date: " .  $row['date'] . "<br/>Hobbies: " . $row['hobby_name'] . "</p><br />";
	}
            
    } catch (PDOException $ex) {
        echo 'Could not access Activities';
    }
}
?>

      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>

</body>
</html>
