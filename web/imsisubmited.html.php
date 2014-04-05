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
<ol>
<?php foreach ($countries as $acountry): ?>

<?php	
 echo "<li>". $acountry['country']. "</li>"; ?>

<?php endforeach; ?>
</ol>
<p>
<?php 	echo '<br>'.'This is the country send by the user: '. $countryfromform. '<br>';
 	echo 'Value of the comparison CountryInDb: '. $insertcountry;
?>
</p>

<p>
<?php echo "Operator insertion in DB:  ". $confirmOperatorInDB ?>
</p>

<?php 
 	echo 'The operators from the data base: '?>
<ol>
<?php foreach ($operators as $anoperator): ?>

<?php	
 echo "<li>". $anoperator['operator']. "</li>"; ?>

<?php endforeach; ?>
</ol>
<p>
<?php 	echo '<br>'.'This is the Operator send by the user: '. $operatorfromform. '<br>';
 	echo 'Value of the comparison OperatorInDb: '. $insertoperator;
?>
</p>

<p>
<?php echo "Operator insertion in DB:  ". $confirmOperatorInDB ?>
</p>


<a href="."> Go back to main menu </a>

</body>

</html>