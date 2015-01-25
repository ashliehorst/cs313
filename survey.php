<?php

	session_start();

	$_SESSION["tester"] = "here";	

?>

<!DOCTYPE html>
<html>
   <head>
      <title> Process Form </title>
      <meta charset = "utf-8" />
      <style type = "text/css">
         td, th, table {border: thin solid black;}
      </style>
      <link href="main.css" rel="stylesheet" type="text/css"> 
   </head>

   <body style = "text-align:center"> 
      <div id="wrapper">
         <header id="top">
           <h1>Survey Results</h1>
           <nav id="mainnav">
             <ul>
               <li><a href="index.html" class="thispage">Home</a></li>
               <li><a href="assignments.html">Assignments</a></li>
               <li><a href="survey.php">Survey Results</a></li>
               <li><a href="https://www.linkedin.com/">Linked In</a></li>
               <li></li>
             </ul>
           </nav>
         </header>
	 <br />
	
	 <?php include 'data.php';
	 if (isset($_POST['zelda']) && isset($_POST["ice"])
	  && isset($_POST["place"]) && isset($_POST["music"]))
	 {
		$loz = $_POST["zelda"];
		$ice = $_POST["ice"];
		$place = $_POST["place"];
		$music = $_POST["music"];

		if ($loz=="Link") $countLink++;
		if ($loz=="Zelda") $countZelda++;
		if ($loz=="Support") $countSup++;
		if ($loz=="Villain") $countVil++;

		if ($ice=="Fruit") $countFru++;
		if ($ice=="Vanilla") $countVan++;
		if ($ice=="Chocolate") $countChoc++;
		if ($ice=="Mint") $countMin++;

		if ($place=="Forest") $countFor++;
		if ($place=="Beach") $countBea++;
		if ($place=="Mountains") $countMou++;
		if ($place=="Desert") $countDes++;

		if ($music=="Pop") $countPop++;
		if ($music=="Rock") $countRoc++;
		if ($music=="Classical") $countCla++;
		if ($music=="Techno") $countTec++;

	}

		echo "<h2> <b>Zelda Results</b> </h2>";
		echo "Link $countLink <br/>
			Zelda $countZelda
			Support $countSup
			Villain $countVil";

		echo "<h2> <b>Ice Cream Results</b> </h2>";
		echo "Fruit $countFru 
			Chocolate $countChoc 
			Vanilla $countVan
			Mint $countMin";

		echo "<h2> <b>Vacation Results</b> </h2>";
		echo "Forest $countFor 
			Beach $countBea 
			Mountains $countMou 
			Desert $countDes";

		echo "<h2> <b>Music Results</b> </h2>";
		echo "Pop $countPop 
			Rock $countRoc 
			Classical $countCla 
			Techno $countTec";


	  // Zelda
			$table = "<?php \n";   
			$table .= '$countLink' . " = \"$countLink\"; \n";
			$table .= '$countZelda' . " = \"$countZelda\"; \n"; 
			$table .= '$countSup' . " = \"$countSup\"; \n"; 
			$table .= '$countVil' . " = \"$countVil\" ?> \n";

	// Ice Cream
			$table .= "<?php \n";
			$table .= '$countFru' . " = \"$countFru\"; \n"; 
			$table .= '$countChoc' . " = \"$countChoc\"; \n";  
			$table .= '$countVan' . " = \"$countVan\"; \n"; 
			$table .= '$countMin' . " = \"$countMin\" ?> \n";

	// Places
			$table .= "<?php \n"; 
			$table .= '$countFor' . " = \"$countFor\"; \n"; 
			$table .= '$countBea' . " = \"$countBea\"; \n";
			$table .= '$countMou' . " = \"$countMou\"; \n"; 
			$table .= '$countDes' . " = \"$countDes\" ?> \n";
			
	// Music	
			$table .= "<?php \n"; 
			$table .= '$countPop' . " = \"$countPop\"; \n"; 
			$table .= '$countRoc' . " = \"$countRoc\"; \n";
			$table .= '$countCla' . " = \"$countCla\"; \n";  
			$table .= '$countTec' . " = \"$countTec\" ?> \n";		

			$file = "data.php";
			file_put_contents($file, $table);

		?>

      <br/><br/>
   </body>
</html>

