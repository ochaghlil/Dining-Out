<!Doctype html>
<html>
<head>
	<title> Database </title>
</head>

<body>

<?php
	
	//conecting to database 
	$mysqli = new mysqli("localhost","root","password","Dining-Out");
	

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to database: " . $mysqli -> connect_error;
	  exit();
	}

	// Perform query to show all tuples
	$query = $mysqli -> query ("SELECT * FROM Employee");
	echo 'Employees: ' . '<br \>';
	
	while($row = mysqli_fetch_array ($query)){
		$id = $row['Employee_ID'];
		$name = $row['Name'];
		$card = $row['Card_Number'];
		$order = $row['Order_Number'];
		$table = $row['Table_Number'];
		
		echo 'ID: '.$id  . '  Name: ' .$name . '  Card Number: ' . $card . '  Order Number: ' . $order . ' Table Number: ' . $table . '<br \>';
	}
	
	$query = $mysqli -> query ("SELECT * FROM Food_Item");
	echo 'Menu: ' . '<br \>';
	
	while($row = mysqli_fetch_array ($query)){
		$fid = $row['Food_ID'];
		$fname = $row['Food_Name'];
		$fprice = $row['Food_Price'];
		$catType = $row['Category_Type'];
		$catID = $row['Category_ID'];
		
		echo 'Food ID: '.$fid  . '  Food Name: ' .$fname . '  Food Price: ' . $fprice . '  Category_Type: ' . $catType . ' Category ID: ' . $catID . '<br \>';
	}


	$query = $mysqli -> query ("SELECT * FROM Food_Item");
	
	echo "<table>"; // start a table tag in the HTML

	while($row = mysqli_fetch_array($query)){   //Creates a loop to loop through results
	echo "<tr><td>" . $row['Food_ID'] . "</td><td>" . $row['Food_Name'] . "</td></tr>";  //$row['index'] the index here is a field name
	}

	echo "</table>"; //Close the table in HTML
	
	
	
	//closing connection to database
	$mysqli -> close();
	
?>
</body>
</html>
