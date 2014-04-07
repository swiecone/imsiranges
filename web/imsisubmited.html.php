<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title> Check IMSI information Submited and comparison</title>
</head>

<body>
<h2> IMSI information submited check site </h2>
<br>



<!-- ************************************************
Let's show the information for the bloody countries!!
************************************************* -->

<h3>
<?php 
 	echo 'The countries from the data base: '?></h3>
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
<?php echo "Country insertion in DB:  ". $confirmCountryInDB ?>
</p>


<!-- ************************************************
Let's show the information for the bloody Operators!!
************************************************* -->

<h3><?php 
 	echo 'The operators from the data base: '?></h3>
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


<!-- ************************************************
Let's show the information for the bloody MCC's!!
************************************************* -->

<h3><?php 
 	echo 'The MCC from the data base: '?></h3>
<ol>
<?php foreach ($mccs as $anmcc): ?>

<?php	
 echo "<li>". $anmcc['mcc']. "</li>"; ?>

<?php endforeach; ?>
</ol>
<p>
<?php 	echo '<br>'.'This is the MCC send by the user: '. $mccfromform. '<br>';
 	echo 'Value of the comparison OperatorInDb: '. $insertmcc;
?>
</p>

<p>
<?php echo "MCC insertion in DB:  ". $confirmMccInDB ?>
</p>


<!-- ************************************************
Let's show the information for the bloody MNC's!!
************************************************* -->

<h3><?php 
 	echo 'The MCC from the data base: '?></h3>
<ol>
<?php foreach ($mncs as $anmnc): ?>

<?php	
 echo "<li>". $anmnc['mnc']. "</li>"; ?>

<?php endforeach; ?>
</ol>
<p>
<?php 	echo '<br>'.'This is the MNC send by the user: '. $mncfromform. '<br>';
 	echo 'Value of the comparison OperatorInDb: '. $insertmnc;
?>
</p>

<p>
<?php echo "MNC insertion in DB:  ". $confirmMncInDB ?>
</p>

<p>
<?php echo "Virtual Operator Information :  ". $virtualoperator ?>
</p>

<a href="."> Go back to main menu </a>
<br>
<br>


</body>

</html>