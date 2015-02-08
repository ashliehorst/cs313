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
            <li><a href="index.html" class="thispage">Home</a></li>
            <li><a href= "assignments.html">Assignments</a></li>
            <li><a href="http://www.notsoboringlife.com/list-of-hobbies/">Hobby List</a></li>
            <li><a href="https://www.linkedin.com/">Linked In</a></li>
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
		<input type="text" name="search" placeholder="Search for Activities" value="<?php echo $searchName;?>"/>
	  </form>
	  <p></p>
        </article>
        </div>

      <article id="main">
        <h2>Socializing, Activities, and Hobbies</h2>
        <p class = "size">Having a special event?</p>
        <p>Make it an activity and invite others with the same hobby.</p>
        <figure class="centered">
          <img src="ski.jpg" alt=""/>
          <figcaption>Find fun activities!</figcaption>
        </figure>    
      </article>

      <aside id="sidebar">
        <h1>hi</h1>
        <figure class="centered">
          <img src="tech.jpg"  alt=""/>
          <figcaption>Connect with people like you!</figcaption>
          <p>Organize your hobbies and 
		  find fun activities to go to!</p>
        </figure>
      </aside>
      
	 <br />
	 
	<?php echo $output; ?> 
	
      <footer>
        <p>&copy; Hobbies and Fun, Inc.</p>
      </footer>

</body>
</html>
