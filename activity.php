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

<body onload = "onLoad()">
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

	<form action="updateActivity.php" method="POST" onsubmit= "return checkValid()">
	<br />
		<p>Activity Name</p>
		<input type="text"id ="actName" name="actName"></input>
		<br /><br />

		<p>Location</p>
		Name of Location<input type="textarea" id ="locName" name="locName"></input>
		City<input type="text" id ="city" name="city"></input>
		State<input type="text" id ="state" name="state"></input>
		Street<input type="text" id ="street" name="street"></input>
		<br /><br />

		Date<input type="text" id ="date" name="date"></input>
		<br /><br />

		<p>Hobby that goes with the activity</p>
<?php
// This section will now generate the available check boxes for topics
// based on what is in the database


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

<script>
      
      <!--

       function actNameCheck() {
	  var value = document.getElementById("actName").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }


       function locNameCheck() {
		 var value = document.getElementById("locName").value;
          if (value == "") {
		  
	     return false;
	  }
	  else {
	     return true;
	  }
       }

	  function locCityCheck() {
	  var value = document.getElementById("city").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

	  function locStateCheck() {
	  var value = document.getElementById("state").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

	  function locStreetCheck() {
	  var value = document.getElementById("street").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

	  function dateCheck() {
	  var value = document.getElementById("date").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

      function checkRadio() {
 	  var hobbyArray = document.forms[0].hobby;
	  var checkedAtLeastOne = false;
	  for (var i = 0; i < hobbyArray.length; i++) {
	     if (hobbyArray[i].checked) {
		checkedAtLeastOne = true;
	     }		
	  }

	  if (checkedAtLeastOne == false) {
    	     return false;
	  }	    
      
       }


       function onLoad() {
          document.getElementById("actName").focus();
       }  

       function checkValid() {	
	   	  
	   if (actNameCheck() == false) {
	     alert("Enter an activity name");
	     document.getElementById("actName").focus();
	     return false;
	   }
	
	  if (locNameCheck() == false) {
	     alert("Enter a location name");
		 document.getElementById("locName").focus();
	     return false;
	  }


	  if (locCityCheck() == false) {
	     alert("Enter a city");
		 document.getElementById("city").focus();
	     return false;
	  }

	  if (locStateCheck() == false) {
	     alert("Enter a state");
		 document.getElementById("state").focus();
	     return false;
	  }	 

	  if (locStreetCheck() == false) {
	     alert("Enter a street");
 	     document.getElementById("street").focus();
	     return false;
	  }

	  if (dateCheck() == false) {
	     alert("Enter a date");
 	     document.getElementById("date").focus();
	     return false;
	  }

	  if (checkRadio() == false) {
	     alert("Pick a hobby");
	     return false;
	  }

       }

      //-->
       
    </script>

  
	 <br />
	
      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>
  </div>  
</body>
</html>
