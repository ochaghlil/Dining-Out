<!doctype html>
<?php
$servername = "localhost";
$username="root";
$password="password";
$dbname="Dining-Out";

$id="";
$name="";
$price="";
$quantity="";
$category_id="";
 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}
//get data from the form
function getData()
{
	$data = array();
	$data[0]=$_POST['id'];
	$data[1]=$_POST['name'];
	$data[2]=$_POST['price'];
	$data[3]=$_POST['quantity'];
	$data[4]=$_POST['category_id'];
	return $data;
}
//search
if(isset($_POST['find']))
{
	$info = getData();
	$search_query="SELECT * FROM Food_Item WHERE Food_ID = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
	if($search_result)
	{
		if(mysqli_num_rows($search_result))
		{
			while($rows = mysqli_fetch_array($search_result))
			{
				$id = $rows['Food_ID'];
				$name = $rows['Food_Name'];
				$price = $rows['Food_Price'];
				$quantity = $rows['Quantity'];
				$category_id = $rows['Category_ID'];
 
			}
		}else{
			echo("");
		}
	} else{
		echo("");
	}
 
}
//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `Food_Item`(`Food_ID`, `Food_Name`, `Food_Price`, `Quantity`, `Category_ID`) VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]')";
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("");
 
			}else{
				echo("");
			}
		}
	}catch(Exception $ex){
		echo("");
	}
}
//delete
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `Food_Item` WHERE Food_ID = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("");
			}else{
				echo("");
			}
		}
	}catch(Exception $ex){
		echo("");
	}
}
//edit
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `Food_Item` SET `Food_ID`='$info[0]', `Food_Name`='$info[1]',Food_Price='$info[2]',Quantity='$info[3]',Category_ID='$info[4]' WHERE Food_ID = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("");
			}else{
				echo("");
			}
		}
	}catch(Exception $ex){
		echo("");
	}
}
 
?>
	<head>
		
		<style>
			
			body{background-color:#7ea3ccff;}
			
			#bigWrapper{border:1px solid red; width:1000px; margin:20px auto; text-align:center;}
			
			#form{position:absolute;top:80px;left:250px;}
			
			
			table{padding:5px;border:1px black solid;font-size:20px;position:absolute;top:50px;left:45%;width:570px;}
			th{border-bottom:2px solid black;padding:3px;}			
			td{border-bottom:1px solid blue;text-align:center;}
			tr:hover{background-color:gray;}			
			
			.button{padding:8px;cursor:pointer;font-weight:bold;}
			.button:hover{background:#A9A9A9;}
			
			#remove{position:absolute;top:150px;left:40px;}
			#done{position:absolute;top:420px;left:385px;}
			#done:hover{background:green;}
			
			#idInput{position:relative;left:38px;}
			#nameInput{position:relative;left:28px;}
			#priceInput{position:relative;left:29px;}
			#quantityInput{position:relative;left:20px;}
			#categoryInput{position:relative;left:10px;}				
			
			*, *::before, *::after {box-sizing: border-box;}

			.custom-field {
			  position: relative;
			  font-size: 14px;
			  padding-top: 20px;
			  margin-bottom: 5px;
			}

			.custom-field input {
			  border: none;
			  background: #f2f2f2;
			  padding: 12px;
			  border-radius: 3px;
			  width: 250px;
			  outline: none;
			  font-size: 14px;
			}

			input[type=text]:focus {
			  border: 5px solid #555;
			  transition: 0.5s;
			}
			</style>
		
	</head>
	
	<body id="bigWrapper">
		<title>Edit Menu</title>
		


	<form id="form" method ="post" action="editMenu.php">
	<label class="custom-field three">
		ID: <input class="input " id="idInput" autofocus type="number" name="id" placeholder="Food ID" value="<?php echo($id);?>"><br><br>
	</label>
	<label class="custom-field three">
		Name: <input class="input " id="nameInput" type="text" name="name" placeholder="Name" value="<?php echo($name);?>"><br><br>
	</label>
	<label class="custom-field three">
		Price: <input class="input" id="priceInput" type="text" name="price" placeholder="Price" value="<?php echo($price);?>"><br><br>
	</label>
	<label class="custom-field three">
		Quantity: <input class="input" id="quantityInput" type="text" name="quantity" placeholder="Quantity" value="<?php echo($quantity);?>"><br><br>
	</label>
	<label class="custom-field three">
		Category ID: <input class="input" id="categoryInput" type="text" name="category_id" placeholder="Category ID" value="<?php echo($category_id);?>"><br><br>
	</label>	
		<div>
			<input type="submit" name="insert" class="button" value="Add">
			<input type="submit" name="delete" class="button" value="Delete">
			<input type="submit" name="update" class="button" value="Update">
			<input type="submit" name="find" class="button" value="Find">
 
		</div>
	</form>
	
	<form action="interface.php">
		<button class="button" id="done">DONE </button>
	</form>
	
	<table id="tableId">
		<caption> Current Menu </caption>
		<th> Food ID </th>
		<th> Food Name </th>
		<th> Price </th>
		<th> Quantity </th>		
		<th> Category ID </th>	
		
	<?php
	
	//conecting to database 
	$mysqli = new mysqli("localhost","root","password","Dining-Out");

	$query = $mysqli -> query ("SELECT * FROM Food_Item ORDER BY Category_ID");
	
	while($row = mysqli_fetch_array($query)){ //Creates a loop to loop through results
	echo "<tr>";
	echo "<td>".$row['Food_ID']."</td>";
	echo "<td>".$row['Food_Name']."</td>";
	echo "<td>"."$".$row['Food_Price']."</td>";
	echo "<td>".$row['Quantity']."</td>";
	echo "<td>".$row['Category_ID']."</td>";			
		
	}	
			
	//closing connection to database
	$mysqli -> close();
	?>
	
	</table>
	
</body>
</html>
