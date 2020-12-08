<html>

	<head>
		
		<style>
			
			body{background-color:#7ea3ccff;}
			
			#bigWrapper{border-top:2px solid red; width:1000px; margin:20px auto; text-align:center;}
			
			#form{position:absolute;top:150px;left:250px;}
			
			table{padding:5px;border:1px black solid;font-size:20px;position:absolute;top:120px;left:45%;width:570px;}
			th{border-bottom:2px solid black;padding:3px;}			
			td{border-bottom:1px solid blue;}			
			
			.button{padding:8px;cursor:pointer;font-weight:bold;}
			.button:hover{background:#A9A9A9;}
			
			#remove{position:absolute;top:150px;left:40px;}
			#done{position:absolute;top:380px;left:380px;}
			#done:hover{background:green;}
			
			#idInput{position:relative;left:30px;}
			#nameInput{position:relative;left:50px;}
			#cardInput{position:relative;left:29px;}
						
			*, *::before, *::after {box-sizing: border-box;}

			.custom-field {
			  position: relative;
			  font-size: 14px;
			  padding-top: 20px;
			  margin-bottom: 5px;
			}

			.custom-field input {
			
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
		<title>Edit Employees</title>
			  		
		<form id="form" method ="POST" action="editE.php">
		<label class="custom-field three">
			Employee ID: <input class="input" id="idInput" autofocus type="number" name="id" placeholder="Employee ID" required autofocus> <br><br>
		</label>
		<label class="custom-field three">
			Name: <input class="input " id="nameInput" type="text" name="name" placeholder="Name" ><br><br>
		</label>
		<label class="custom-field three">
			Card Number: <input class="input" id="cardInput" type="text" name="card" placeholder="Card Number" ><br><br>
		</label>
							
			<div>
	            <!-- Input For Add Values To Database-->
	            <input type="submit" class="button" name="add" value="Add">
            
	            <!-- Input For Edit Values -->
	            <input type="submit" class="button" name="update" value="Update">
            
	            <!-- Input For Clear Values -->
	            <input type="submit" class="button" name="delete" value="Delete">      

			</div>
			</form>		
			
			<form action="interface.php">
				<button class="button" id="done">DONE </button>
			</form>

					
		<table>
			<caption> Current Employees </caption>
			<th> Employee ID </th>
			<th> Name </th>
			<th> Card Number </th>
			
		<?php
		
		//conecting to database 
		$mysqli = new mysqli("localhost","root","password","Dining-Out");
	
		$query = $mysqli -> query ("SELECT * FROM Employee");
		
		while($row = mysqli_fetch_array($query)){   //Creates a loop to loop through results
		echo "<tr>";
		echo "<td>".$row['Employee_ID'] ."</td>";
		echo "<td>".$row['Name']		."</td>";
		echo "<td>".$row['Card_Number'] ."</td>";
			
		}	
				
		//closing connection to database
		$mysqli -> close();
		?>
		
		</table>		
		
	</body>
					
</html>
