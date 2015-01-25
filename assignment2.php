<?php
header("Location: http://php-ashliehorst.rhcloud.com/survey.php");
exit;
?>

<!DOCTYPE html>

<html>


    <head>
        <title>Survey</title>
        <meta http-equiv="refresh" content="1;url=http://php-ashliehorst.rhcloud.com/survey.php">
         <link href="main.css" rel="stylesheet" type="text/css"> 
    </head>
    <body>
        <div id="wrapper">
          <header id="top">
            <h1>Survey</h1>
            <nav id="mainnav">
              <ul>
                <li><a href="index.html" class="thispage">Home</a></li>
                <li><a href= "assignments.html">Assignments</a></li>
                <li><a href="survey.php">Survey Results</a></li>
                <li><a href="https://www.linkedin.com/">Linked In</a></li>
                <li></li>
              </ul>
            </nav>
          </header>
	
	    <br/><br/>

     <form action="survey.php" method="post">
         <div id="center">
             <h2><b>From the selection below:</b> </h2>

             <h3> <b> 1. Who is your favorite Legend of Zelda character? </b> </h3>
             <input type="radio" name="zelda" value="Link"> Link</input>
             <input type="radio" name="zelda" value="Zelda"> Zelda</input>
             <input type="radio" name="zelda" value="Support"> Support (Navi, Midna, Fi)</input>
             <input type="radio" name="zelda" value="Villain"> Villain (Ganondorf, Zant, Girahim)</input>
             <br /> <br />

             <h3> <b> 2. What is your favorite type of ice cream? </b> </h3>
             <input type="radio" name="ice" value="Fruit"> Fruit</input>
             <input type="radio" name="ice" value="Vanilla"> Vanilla</input>
             <input type="radio" name="ice" value="Chocolate"> Chocolate</input>
             <input type="radio" name="ice" value="Mint"> Mint</input>
             <br /> <br />

             <h3> <b> 3. What is your favorite vacation spot? </b> </h3>
             <input type="radio" name="place" value="Forest"> Forest</input>
             <input type="radio" name="place" value="Beach"> Beach</input>
             <input type="radio" name="place" value="Mountains"> Mountains</input>
             <input type="radio" name="place" value="Desert"> Desert</input>
             <br /> <br />

             <h3> <b> 4. What is your favorite music genre </b> </h3>
             <input type="radio" name="music" value="Pop"> Pop</input>
             <input type="radio" name="music" value="Rock"> Rock</input>
             <input type="radio" name="music" value="Classical"> Classical</input>
             <input type="radio" name="music" value="Techno"> Techno</input>
             <br /> <br />

             <input type="submit" value="Submit" />
             <input type="reset" value="Clear" />
             <br /><br />
         </div>
    </form>

        </div>
    </body>
</html>
