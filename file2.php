<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hobbies Fun</title>
	<link href="style.css" rel="stylesheet"  type="text/css">
</head>
<body>
	<form action="file3.php" method="POST" accept-charset="utf-8">
		<input type="submit" id="submit" name="action" value="Search">
		<input type="text" name="search" placeholder="Search for Activities" value="<?php echo $searchName;?>"/>
	</form>
	<?php echo $output; ?>
</body>
</html>
