<?php
	


	$conn = mysqli_connect('localhost', 'root', 'password', 'Dining-Out');
	
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	//$error = "No ID found";
	
	$query = "SELECT * FROM Employee where Employee_ID = '$id' ";
	
	$result = mysqli_query($conn, $query);
	
	$num = mysqli_num_rows($result);
	
	echo($query);
	
	if ($num == 1){
		//$_SESSION["id"] = $id;
		header("Location: tables.html");
	}
	else {
		//$_SESSION["error"] = $error;
		header("Location: ClockIn.php");
			}
	
?>
