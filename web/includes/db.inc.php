<?php
//Connection to Data Base internet joke data base (ijdb)

try 
{
	$pdo = new PDO('mysql:host=localhost;dbname=imsidb', 'imsidbuser','mypassword');
	$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/** "success.html.php" is placed here in order to check that the data base is working as expected. 

If an error is detected, please uncomment the include and check the database is connecting correctly. 
**/
    
// include 'success.html.php';    
//  exit();

}
catch (PDOException $e)
{	
$output = "Error fetching jokes: ".
			 "<br><br>".
			 "<b>Error exception details:</b> ". $e->getMessage();		 ;

include 'error.html.php';
exit();	
}
