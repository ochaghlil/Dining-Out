
<html>
<head>
	
	<style type="text/css">
		
		body{background-color:#7ea3ccff;}
		#bigWrapper{max-width:80%;margin:auto;text-align:center;}
		
		#time{position:relative;left:280px;font-size:50px;color:red;border:double;border-radius:10px;border-color:green;border-width:8px;text-align:center;width:50%;}
		h1{text-align:center; font-size:60px;color:green; border:dashed 3px red; }
		
		.button {position:relative; left:110px; border-radius: 4px;background-color:#00ff15;border: none;color: #black;text-align: center;font-size: 18px;padding: 10px;width:150px;cursor: pointer;margin: 5px;}
		.button span {cursor: pointer;display: inline;position: relative;transition: 0.5s;}
		.button span:after {content: '\00bb';position: absolute;opacity: 0;top: 0;right: -20px;transition: 0.5s;}
		.button:hover span {padding-right: 10px;}
		.button:hover span:after{opacity: 1;right: 0;}
		
				
		form input{position:relative; 
			left:-240px; top:100px; 
			width:280px; height:40px; 

			padding-top:10px;
			color:blue;font-size:25px;background-color:#7ea3ccff;}

		#id{position:relative;top:105px;left:-255px;max-width:200px}
		#id2{position:relative;top:105px;left:-255px;max-width:200px}
		
		input[type=password]:focus {
		  border: 4px solid #555;
		  transition: 0.5s;
		}		
		</style>
		
		
		<h1>The Current Time Is:</h1>
		<p id="time"></p>

		<script>
			//function to see time displayed.
			var myVar = setInterval(myTimer);
			function myTimer() {
				var d = new Date();
				document.getElementById("time").innerHTML = d.toLocaleTimeString();
			}
 
			function getCookie(cname) {
				var name = cname + "=";
				var decodedCookie = decodeURIComponent(document.cookie);
				var ca = decodedCookie.split(';');
				for(var i = 0; i <ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') {
						c = c.substring(1);
					}
					if (c.indexOf(name) == 0) {
						return c.substring(name.length, c.length);
					}
				}
				return "";
			}
			
			function clockOut() {
				var id = document.getElementById("id").value;
				
					var d = new Date();
					var n = d.getTime();
					n = n - getCookie(id);
					n = n/1000;
					alert(id + " has been clocked in for " + n + " seconds");
					alert('You are clocked-out!!  Enjoy your night!!!');
					window.location = "logIn.php"
					
					return false;
				}
				
			function test(){
					
						var d = new Date();
						var n = d.getTime();
						var id = document.getElementById("id").value;

						document.cookie=id + "=" + n + ";";
					}
			</script>
			<body id="bigWrapper">
				
				<form action="verification.php" method="POST">
				
					<div>
						<label id="id2">Employee ID</label>
						<input type="password" id="id" name="id" placeholder="ID" autofocus required>
					</div>	
							
					<button class="button" type="submit" onclick="test()"><span>Start Shift</span></button>

				</form>
				
					
				<button class="button" onclick="clockOut()"><span>End Shift</span></button>
					
				
					
</body> 

</html>
		
				
