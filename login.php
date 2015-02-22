<?php  //Start the Session
session_start();
require('connect.php');
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
        <h1>Hobbies and Fun</h1>
        <nav id="mainnav">
          <ul>
            <li><a href="" class="thispage">Home</a></li>
            <li><a href="">Profile</a></li>
            <li><a href="">Hobby List</a></li>
            <li><a href="">Make Activity</a></li>
            <li></li>
          </ul>
        </nav>
      </header>

<h2>Login</h2>
<form action="" method="POST">
   
 	  <article id="main">
         <p><label>User Name : </label>
		<input id="username" type="text" name="username" placeholder="username" /></p>
		<p><label>Password&nbsp;&nbsp; : </label>
		 <input id="password" type="password" name="password" placeholder="password" /></p>  
		 <input type="submit" name="submit" value="Login" />  
		  <?php
	  if (isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM `user` WHERE user_name='$username' and password='$password'";
 
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);

	if ($count == 1){
	$_SESSION['username'] = $username;
	}else{
	//The login credentials doesn't match, he will be shown with an error message.
	echo "<br/><br/> Invalid Username/Password";
	}
}

//The user is logged in. Greet the user with message
if (isset($_SESSION['username'])){
	header("Location: file2.php");
} 

	else {
	//3.2 When the user visits the page first time, simple login form will be displayed.
	if(isset($msg) & !empty($msg)){
		echo "<br/>" . $msg;
	}
 ?>
 <br/><br/><br/><br/><br/><br/>
      </article>
    </form>
  
  
  
		<?php
require('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['regUsername']) && isset($_POST['regPassword']) && isset($_POST['regName']))   {
        
		$username = $_POST['regUsername'];
		$password = $_POST['regPassword'];
		$name = $_POST['regName'];

        $query = "INSERT INTO `user` (user_name, password, name) VALUES ('$username', '$password', '$name')";
        $result = mysql_query($query);
        if($result){
            $regMsg = "User Created Successfully.";
        }
		
    }
    ?>

    <!-- Form for logging in the users -->
<div>

<h2>Register</h2>
<form action="" method="POST" onsubmit= "return checkValid()">
     <p><label>Name : </label>
     <input type="text" name="regName" id= "regName" placeholder="name" /></p>

	<p><label>User Name : </label>
	<input type="text" name="regUsername" id="regUsername" placeholder="username" /></p>
       
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input type="password" name="regPassword" id = "regPassword" placeholder="password" /></p>
 
    <input class="btn register" type="submit" name="submit" value="Register" />
  </form>
  <?php
	if(isset($regMsg) & !empty($regMsg)){
		echo "<br/>" . $regMsg;
	}
 ?>
      </aside>

	  <script>
      
      <!--

       function nameCheck() {
	  var value = document.getElementById("regName").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

	  function usernameCheck() {
	  var value = document.getElementById("regUsername").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

	  function passwordCheck() {
	  var value = document.getElementById("regPassword").value;
          if (value == "") {
	     return false;
	  }
	  else {
	     return true;
	  }
       }

       function checkValid() {	
	   if (nameCheck() == false) {
	     alert("Register a name");
	     document.getElementById("regName").focus();
	     return false;
	   }
	
	  if (usernameCheck() == false) {
	     alert("Register a username");
		 document.getElementById("regUsername").focus();
	     return false;
	  }


	  if (passwordCheck() == false) {
	     alert("Register a password");
		 document.getElementById("regPassword").focus();
	     return false;
	  }
	  }

      //-->
       
    </script>
</div>
<?php } ?>

 <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>

 </div>
</body>
</html>