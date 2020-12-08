<?php
include_once 'dbh.php';

	$id = mysqli_real_escape_string($conn,$_POST['id']);
	$name = $_POST['name'];
	$card = $_POST['card'];

	if (isset($_POST['add'])){
	$sql = "INSERT INTO Employee (Employee_ID, Name, Card_Number) 
			VALUES ('$id', '$name', '$card');";
	mysqli_query($conn, $sql);
	
	header("Location: editEmployee.php");
}

	if (isset($_POST['delete'])){
	$sql = "DELETE FROM Employee WHERE Employee_ID='$id';";
	mysqli_query($conn, $sql);
	
	header("Location: editEmployee.php");
}
	if (isset($_POST['update'])){
	$sql = "UPDATE Employee SET Employee_ID='$id', Name='$name', Card_Number='$card' WHERE Employee_ID='$id' || Name='$name';";
	mysqli_query($conn, $sql);
	
	header("Location: editEmployee.php");
}

?>
