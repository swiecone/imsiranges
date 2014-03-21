<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title> List of Operators, Countries and associated IMSI ranges</title>

 <link rel='stylesheet' type='text/css' href='stylesheet.css'/>
 <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

</head>

<body>
	<div id="header"><h1>Welcome to Imsi Ranges</h1></div>

<div id="wrapper">

<div align="center"><a href="?addimsi" >Add IMSI to imsiDB</a></div>

   
<table border="1">
<tr>
<th>Country</th>
<th>Operator</th>    
<th>IMSI</th>    
<th>MCC</th>    
<th>MNC</th>
<th>Virtual Operator</th>
<th>Delete Operator</th>
    
</tr>
<?php foreach ($imsiranges as $imsirange): ?>
	<tr align='center'>
	<blockquote>
		<td>
		<?php echo
    htmlout($imsirange['country']);	
				?>			
		</td>
        
        <td>
		<?php echo htmlout($imsirange['operator']);	
				?>			
		</td>	
        
        <td>
		<?php 

$imsi = " ". $imsirange['mcc'] . $imsirange['mnc']." ";
echo $imsi;
				?>			
		</td>	
       
        
        <td>
		<?php echo htmlout($imsirange['mcc']);	
				?>			
		</td>	
        
        <td>
        		<?php echo htmlout($imsirange['mnc']);	
				?>			
		</td>	
        <td>
        		<?php echo htmlout($imsirange['virtualoperator']);	
				?>			
		</td>	
        
        
	   <td>
		<form  action="?deleteimsi" method="post">
			<input type="hidden" name="id" 
					value="<?php echo $imsirange['id'];  ?>"> 
		<input type="submit" value="Delete">
			
</form>	
		
		</td>	
	</tr>
	
	</blockquote>

	<?php endforeach; ?>
</table>
    </div>
    
		

</body>

</html>