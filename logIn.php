<html>
<head>
		<link rel="stylesheet" type="text/css" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
		<style>
			body{background-color:#7ea3ccff;background-image: url('burgerPic.jpg');background-repeat: no-repeat;
  background-size: 100% 100%;}
			
			h1{text-align:center; font-size:60px;color:#00ff15; border:dashed 3px rgba(47, 126, 210); position:absolute;top:40px;left:27%;text-shadow: 4px 4px #FF0000;}
			
			
			
			#bigWrapper{width:1000px; margin:20px auto; text-align:center;}
			
			.login-box{
				font-weight:bold;
				max-width:700px;
				float:none;
				margin:150px auto;
			}
			.login-left{
				background:rgba(211, 211, 211, 0.5);
				padding: 30px;
			}
			.login-right{
				background: rgba(160, 160, 150, .7);
				padding: 30px;
			} 
			
			input[type=text]:focus {
			  border: 5px solid #555;
			  transition: 0.5s;
			}
			input[type=password]:focus {
			  border: 5px solid #555;
			  transition: 0.5s;
			}
		</style>
		<title>Log In</title>
	
</head>
<body id="bigWrapper">
	
		
<div class="container">
	<div class="login-box">
	<div class="row">
		<div class="col-md-6 login-left">
			<h2>Log In Here</h2>
			<form action="validation.php" method="post">
				
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
				</div>
				<div class="form-group">
					<label>Employee ID</label>
					<input type="password" name="id" class="form-control" placeholder="ID" required>
				</div>	
							
				<button type="submit" class="btn btn-primary">Log In</button>
			</form>
		</div>
		
		<div class="col-md-6 login-right">
			<h2>Register Here</h2>
			<form action="registration.php" method="post">
			
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" placeholder="Name" required>
				</div>
		<div class="form-group">
					<label>Employee ID</label>
					<input type="password" name="id" class="form-control" placeholder="ID" required>
				</div>
				
				<button type="submit" class="btn btn-primary">Register</button>
			</form>
		</div>
		
	</div>
		
</div>	
		
		<h1>Welcome to Dining Out!</h1>
		

</body>

</html>
