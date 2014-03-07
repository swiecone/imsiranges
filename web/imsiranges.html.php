<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title> List of Operators, Countries and associated IMSI ranges</title>
    <link rel='stylesheet' type='text/css' href='stylesheet.css'/>
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="header"> 
<h1>Welcome to Imsi Ranges</h1>
</div>
    
    
<a href="?addimsi" ><p id="email">Add IMSI to imsiDB</p></a>

    <div id="wrapper">
        <div id="inputs">
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
	<tr>
	<blockquote>
		<td>
		<?php echo
    htmlout($imsirange['country']);	
				?>			
		</td>
        
        <td>
		<?php echo htmlspecialchars($imsirange['operator'], ENT_QUOTES,'UTF-8');	
				?>			
		</td>	
        
        <td>
		<?php 

$imsi = $imsirange['mcc'] . $imsirange['mnc'];
echo $imsi;
				?>			
		</td>	
       
        
        <td>
		<?php echo htmlspecialchars($imsirange['mcc'], ENT_QUOTES,'UTF-8');	
				?>			
		</td>	
        
        <td>
        		<?php echo htmlspecialchars($imsirange['mnc'], ENT_QUOTES,'UTF-8');	
				?>			
		</td>	
        <td>
        		<?php echo htmlspecialchars($imsirange['virtualoperator'], ENT_QUOTES,'UTF-8');	
				?>			
		</td>	
        
        
	   <td>
		<form  action="?deleteimsi" method="post">
			<input type="hidden" name="id" 
					value="<?php echo $imsirange['id'];  ?>"> 
			<input type="submit" value="delete"><br>
			
</form>	
		
		</td>	
	</tr>
	
	</blockquote>

	<?php endforeach; ?>
</table>
    
	</div>
        </div>	
		
</p>
</body>

</html>