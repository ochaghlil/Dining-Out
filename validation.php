<?php
	


	$conn = mysqli_connect('localhost', 'root', 'password', 'Dining-Out');
	
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	
	$query = "SELECT * FROM Employee where Employee_ID = '$id' && Name = '$name'";
	
	$result = mysqli_query($conn, $query);
	
	$num = mysqli_num_rows($result);
	
	if ($num == 1){
		
		header('location:ClockIn.php');
	}
	else {
		echo '<script>alert("Wrong Combination")</script>'; 
		header("Location: logIn.php");
			}
	
	
?>
