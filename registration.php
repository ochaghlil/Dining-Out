<?php
	
session_start();
header("Location: logIn.php");

	$con = mysqli_connect('localhost', 'root', 'password', 'Dining-Out');
	
	
	$id = mysqli_real_escape_string($con, $_POST['id']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	
	$query = "SELECT * FROM Employee where Employee_ID = '$id'";
	
	$result = mysqli_query($con, $query);
	
	$num = mysqli_num_rows($result);
	
	if ($num == 1){
		alert( "Username Already Taken");
	}
	else {
		$reg = "INSERT INTO Employee(Employee_ID, Name) values ('$id', '$name')";
		mysqli_query($con, $reg);
		alert("Registration Successful");
	}
	
	
?>
