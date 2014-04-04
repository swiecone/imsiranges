<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/helpers.inc.php';

include $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/magicquotes.inc.php';

//If you click on "add joke" link, then the form is displayed. 

if(isset($_GET['addimsi']))
{
	include 'form.html.php';
	exit();	
	}



//If there is variable called "joketext", then add the joke to the database. 

if(isset($_GET['submitimsi']))
{
include $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/db.inc.php';
	
//Get all countries to check if what the user has inserted is already in the DB
	try{
		$sql = 'SELECT country FROM country';
		$result = $pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error = 'Error adding submitted IMSI range: '. $e->getMessage();
		include 'error.html.php';
		exit();
	}
	$countryInDB = FALSE;

// Loop to check if the country is in the DB.
// The parameters are passed to upper case before comparing. 

	foreach ($result as $row)
	{
			$var = $row['country'];
			$var = strtoupper($var);	
			$countries[] = array('country' => $var);
		
			$countryfromform = strtoupper($_POST['country']);
			//If country and insertion are the same, do not insert in DB 
	if ($var == $countryfromform){
				echo "Country in data base";
				$countryInDB = TRUE;
				$insertcountry = 'TRUE';
				}
		}

//If the variable $countryInDB is false, then $insertcountry should be falta
	if($countryInDB == FALSE)
	{
/*
	try{
	$sql = 'INSERT INTO country SET 
			country=:country';	
	$s = $pdo->prepare($sql);
	$s->bindValue(':country',$countryfromform);		
	$s->execute();
	}
	catch(PDOException $e)
	{
		$error = 'Error adding submitted Country in Data Base.'. $e->getMessage();
		include 'error.html.php';
		exit();
	}
  */
	$insertcountry = 'FALSE';		
		

}
		include 'countrysubmited.html.php';
		exit();

//If variable is "deletejoke" then an action of deletion is performed in order to erase the joke.  

if(isset($_GET['deleteimsi']))
{	

include $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/db.inc.php';
    
    
	
	try{
	$sql = 'DELETE FROM imsiranges WHERE id=:id';	
	$s = $pdo->prepare($sql);
	$s->bindValue(':id',$_POST['id']);		
	$s->execute();
        
	}
	catch(PDOException $e)
	{
		$error = 'Error deleting joke: '. $e->getMessage();
		include 'error.html.php';
		exit();
	}
 
 
}


// Retrieve from the table all the jokes, add them to a joke array and include this array in a jokes site to be displayed. 

include $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/db.inc.php';



try
{
	$sql = 'SELECT imsiranges.id, country, operator, mcc, mnc, virtualoperator
FROM imsiranges
INNER JOIN country ON countryid = country.id
INNER JOIN operator ON operatorid = operator.id
INNER JOIN mcc ON mccid = mcc.id
INNER JOIN mnc ON mncid = mnc.id
INNER JOIN virtualoperator ON virtualoperatorid = virtualoperator.id';
    
	$result = $pdo->query($sql);
}
catch (PDOException $e)
{	
$output = "Error fetching IMSI ranges from data base: ".
			 "<br><br>".
			 "<b>Error exception details:</b> ". $e->getMessage();		 ;

include 'error.html.php';
exit();	
}

foreach($result as $row)
{
	$imsiranges[] = array('id' => $row['id'], 'country'=> $row['country'], 'operator'=>$row['operator'], 'mcc'=>$row['mcc'], 'mnc'=>$row['mnc'],'virtualoperator'=>$row['virtualoperator'],);
}

include 'imsiranges.html.php';