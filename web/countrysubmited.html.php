<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title> Chekc Country Submited and comparison</title>
</head>

<body>

<h2>Country submited check site</h2>

<?php 
 	echo 'The countries from the data base: '?>

<?php foreach ($countries as $acountry): ?>

<?php	
 echo " ". $acountry['country']. ", "; ?>

<?php endforeach; ?>

<?php 	echo '<br>'.'This is the country send by the user: '. $countryfromform. '<br>';
 	echo 'Value of the comparison CountryInDb: '. $insertcountry;
?>


</body>

</html>