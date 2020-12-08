
<?php
	
	//conecting to database 
	$conn = new mysqli("localhost","root","password","Dining-Out");
	

	// Check connection
	if ($conn -> connect_errno) {
	  echo "Failed to connect to database: " . $conn -> connect_error;
	  exit();
	}
