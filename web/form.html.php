<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Add IMSI range</title>
 <link rel='stylesheet' type='text/css' href='stylesheet.css'/>
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="header"> <H1> Add IMSI range!</H1></div>

<div id="wrapper">
        <div id="inputs">
	
    <form action="?submitimsi" method="post">
		<label for="operator">Operator Name:</label>
            <input type="text" value="operator" name="operator">

        <label for="country">Operator Country: </label>
            <input type="text" value="country" name="country" >	
        
        <label for="mcc">Type the MCC of the operator here:</label>
				<input type="text" value="mcc" name="mcc">	
        
        <label for="mnc">Type the MNC of the operator here:</label>
				<input type="text" value="mnc" name="mnc">
            
        <label for="virtualoperator">Is the operator virtual? If so, tick the box:</label>
				<input style="align-left" type='checkbox' value="virtualop" name="virtualop">
      
   <input type="submit" value="submit">
</form>
   
        </div>

        </div>
</body>
</html>