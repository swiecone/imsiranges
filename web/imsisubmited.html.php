<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title> Chekc Country Submited and comparison</title>
</head>

<body>

<h2>Country submited check site</h2>

<?php 
 	echo 'This is the country from the data base: '.$row. '<br>' ;
 	echo 'This is the country send by the user: '. $countryvar. '<br>';
 	echo 'This the value of the comparison CountryInDb'. $CountryInDb;
?>


</body>

</html>