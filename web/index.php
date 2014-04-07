<?php 

include_once $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/helpers.inc.php';

include $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/magicquotes.inc.php';

// ********************************************************************************************************
// User clicks on "add IMSI" link and this triggers the request for the form to insert the IMSI information
// ********************************************************************************************************

if(isset($_GET['addimsi']))
{
	include 'form.html.php';
	exit();	
	}


// **********************************************************************
// If the user clicks the submit button, the submitimsi will be 
// invocked, and we need to process the request of insertion to database. 
// **********************************************************************

if(isset($_GET['submitimsi']))
{
include $_SERVER['DOCUMENT_ROOT'] . '/imsiranges/web/includes/db.inc.php';
	
// ******************************************************************************************
// Get all operators from ImsiDB to check if what the user has inserted is already in the DB
// ******************************************************************************************

	try{
		$sql = 'SELECT operator FROM operator';
		$result = $pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error = 'Error adding submitted IMSI range: '. $e->getMessage();
		include 'error.html.php';
		exit();
	}
	$operatorInDB = FALSE;

// **************************************************************
// Loop to check if the operator is in the DB.
// The parameters are passed to upper case before being comparted 
// **************************************************************

	foreach ($result as $row)
	{
			$var = strtoupper($row['operator']);
			$operators[] = array('operator' => $var);
		
			$operatorfromform = strtoupper($_POST['operator']);

// *********************************************************
//If country and insertion are the same, do not insert in DB 
// *********************************************************

			if ($var == $operatorfromform)
			{
				$operatorInDB = TRUE;
				$insertoperator = 'TRUE';
				$confirmOperatorInDB = "Operator already in the data base.";
			//	echo "Operator already in the data base";
			}
			
	
	}

// ****************************************************************************
// If the variable $operatorInDB is false, then $insertoperator should be false
// And we need to insert the country in the data base.
// ****************************************************************************

	if($operatorInDB == FALSE)
	{
	//make $insertoperator false, which means the operator is NOT in the database.
	$insertoperator = 'FALSE';		
	
	// Add Operator inserted by user the last element of the operators
	// And then add the operator to the Data Base. 
	$operators[] = array('operator' => $operatorfromform); 
	
		try{
		$sql = 'INSERT INTO operator SET 
				operator=:operator';	
		$s = $pdo->prepare($sql);
		$s->bindValue(':operator',$operatorfromform);		
		$s->execute();
		$confirmOperatorInDB = "Operator inserted in Operator table!!";
		}
		catch(PDOException $e)
		{
		$error = 'Error adding submitted Operator in Data Base.'. $e->getMessage();
		include 'error.html.php';
		exit();
		}
	}
// ******* END OF OPERATOR INSERTION IN DB ;) *********

// *****************************************************************************
// Get all countries to check if what the user has inserted is already in the DB
// *****************************************************************************
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

// **********************************************************
// If country and insertion are the same, do not insert in DB 
// **********************************************************
	if ($var == $countryfromform){
				$countryInDB = TRUE;
				$insertcountry = 'TRUE';
				//echo "Country in data base";
				$confirmCountryInDB = "country already in the data base.";
				}
	}

// **************************************************************************
// If the variable $countryInDB is false, then $insertcountry should be false
// And we should insert the country in the data base. 
// **************************************************************************

	if($countryInDB == FALSE)
	{
	// ************************************************************************	
	// State that the country inserted is NOT in the data base
	// And add it to the array of countries that will be displayed to the user
	// ************************************************************************
		
	$insertcountry = 'FALSE';		
	$countries[] = array('country' => $countryfromform);

		try{
		$sql = 'INSERT INTO country SET 
				country=:country';	
		$s = $pdo->prepare($sql);
		$s->bindValue(':country',$countryfromform);		
		$s->execute();
		$confirmCountryInDB = "Country inserted into DB!!";
		}
		catch(PDOException $e)
		{
		$error = 'Error adding submitted Country in Data Base.'. $e->getMessage();
		include 'error.html.php';
		exit();
		}
	}

// ***************************************************************************
// Get all mcc's to check if what the user has inserted is already in the DB
// ***************************************************************************
	try{
		$sql = 'SELECT mcc FROM mcc';
		$result = $pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error = 'Error adding submitted IMSI range: '. $e->getMessage();
		include 'error.html.php';
		exit();
	}
	$mccInDB = FALSE;

// **************************************
// Loop to check if the MCC is in the DB.
// **************************************

	foreach ($result as $row)
	{
			$var = $row['mcc'];
			$mccs[] = array('mcc' => $var);
			$mccfromform = $_POST['mcc'];

if ($var == $mccfromform){
				$mccInDB = TRUE;
				$insertmcc = 'TRUE';
				//echo "Country in data base";
				$confirmMccInDB = "MCC already in the data base.";
				}
		}

// **************************************************************************
// If the variable $MCCInDB is false, then $insertmcc should be false
// And we should insert the MCC in the data base. 
// **************************************************************************

	if($mccInDB == FALSE)
	{
	// ************************************************************************	
	// State that the MCC inserted is NOT in the data base
	// And add it to the array of countries that will be displayed to the user
	// ************************************************************************
		
	$insertmcc = 'FALSE';		
	$mccs[] = array('mcc' => $mccfromform);

		try{
		$sql = 'INSERT INTO mcc SET 
				mcc=:mcc';	
		$s = $pdo->prepare($sql);
		$s->bindValue(':mcc',$mccfromform);		
		$s->execute();
		$confirmMccInDB = "MCC inserted into DB!!";
		}
		catch(PDOException $e)
		{
		$error = 'Error adding submitted MCC in Data Base.'. $e->getMessage();
		include 'error.html.php';
		exit();
		}
	}

// ***************************************************************************
// Get all mnc's to check if what the user has inserted is already in the DB
// ***************************************************************************
	try{
		$sql = 'SELECT mnc FROM mnc';
		$result = $pdo->query($sql);
	}
	catch(PDOException $e)
	{
		$error = 'Error adding submitted IMSI range: '. $e->getMessage();
		include 'error.html.php';
		exit();
	}
	$mncInDB = FALSE;

// **************************************
// Loop to check if the MNC is in the DB.
// **************************************

	foreach ($result as $row)
	{
			$var = $row['mnc'];
			$mncs[] = array('mnc' => $var);
			$mncfromform = $_POST['mnc'];

		if ($var == $mncfromform){
				$mncInDB = TRUE;
				$insertmnc = 'TRUE';
				//echo "MNC inserted already in data base. ";
				$confirmMncInDB = "MNC already in the data base.";
				}
		}

// **************************************************************************
// If the variable $mncInDB is false, then $insertmnc should be false
// And we should insert the MNC in the data base. 
// **************************************************************************

	if($mncInDB == FALSE)
	{
	// ************************************************************************	
	// State that the country inserted is NOT in the data base
	// And add it to the array of countries that will be displayed to the user
	// ************************************************************************
		
	$insertmnc = 'FALSE';		
	$mncs[] = array('mnc' => $mncfromform);

		try{
		$sql = 'INSERT INTO mnc SET 
				mnc=:mnc';	
		$s = $pdo->prepare($sql);
		$s->bindValue(':mnc',$mncfromform);		
		$s->execute();
		$confirmMncInDB = "MNC inserted into DB!!";
		}
		catch(PDOException $e)
		{
		$error = 'Error adding submitted MNC in Data Base.'. $e->getMessage();
		include 'error.html.php';
		exit();
		}
	}

// We need to check if the operator has been placed as virtual or not, and also put this 
// information into the data base and associated to the interted operator. 

	 if (isset($_POST['virtualop']))
  {
	 $virtualoperator = "El operador es virtualoperator";
  }
  	else $virtualoperator = "El operador NO es virtualoperator";



// *********************************************************************
// We call imsisubmited.html.php in order to present all data inserted
// This site is a checkpoint and can be later commented or removed
// *********************************************************************

	include 'imsisubmited.html.php';
	exit();
}






		

// If we get 'deleteimsi' is that someone did not like that country operator,
// and we UNFORTUNATELY need to delete it from the db.... da da.

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