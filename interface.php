<?php
include_once 'dbh.php';
?>

<!DOCTYPE html>
<html>
<head>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" > </script>
    <style type="text/css">


        #OrderTable{position:absolute; top:90px; left:90px;border:3px solid black; background-color: white; }
        /* CSS HEX colors
        --firebrick: #b3001bff;
        --eerie-black: #262626ff;
        --lapis-lazuli: #255c99ff;
        --iceberg: #7ea3ccff;
        --tan: #ccad8fff;
        --cotton-candy: #f4bfdbff;
        --lavender-blush: #ffe9f3ff;
        --green-sheen: #87baabff;
        --lavender-gray: #cac4ceff;
        */

        body{background-color:#7ea3ccff;}

        #OrderTable{position:absolute; top:90px; left:90px;border:3px solid black;}

        #div2{height:200px;width:400px;overflow-y:auto;}
        .myTable{position:absolute;top:80px;left:850px; height:50px;width:400px;overflow-y:scroll;border-bottom:2px solid black;}
        tr{padding:5px; border-bottom:3px solid black ; font-size:25px;}
        caption{font-size:30px;color:#262626ff;}

        #mainButton{position:absolute; top:150px; left:600px;}
        #sideButton{position:absolute; top:350px; left:600px;}
        #dessertButton{position:absolute; top:550px; left:600px;}


        .dish{position:relative; top:140px; left:870px; font-size:25px; border-bottom:1px solid black; display:none;}
        .price{position:relative;  top:140px; left:1000px; font-size:25px;border-bottom:1px solid black; display:none;}
        .addbtn{position:relative; top:160px; left:1100px; font-size:20px; padding:8.5px;}
        .addbtn:hover{cursor:pointer;background-color:#A9A9A9;}
        td{border-bottom:1px solid black;}

        .nameplace{position:absolute; top:110px; left:260px;font-weight:bold;}

        .orderClass{position:absolute; top:160px; left:100px;}
        .Total{position:absolute; top:480px; left:110px;font-weight:bold;width:150px;}
        .descriptiono{display:none;}


        #receipt{position:absolute; top:50px; left:1150px; cursor:pointer; background-color:#dddb6a;}
        .receipt {border-radius:55%; padding:10px; text-align:center;}

        #logout{position:absolute; top:650px; left:1160px; cursor:pointer;background-color:#da1212;}
        .logout {width:140px;font-size:25px;border-radius:50px;}

        #clockOut{position:absolute; top:650px; left:870px; cursor:pointer;background-color:#fd3a69;}
        .clockOut {width:100px;font-size:20px;border-radius:50px; }

        #addEmployee{position:absolute; top:30px; left:90px; cursor:pointer;background-color:#dddb6a;}
        .addEmployee {width:110px;font-size:15px;border-radius:50px;}

        #changeTable{position:absolute; top:640px; left:90px; cursor:pointer;background-color:#da1212;}
        .changeTable {width:80px;font-size:15px;border-radius:50px;}

        .button {padding:16px 32px;cursor:pointer;border-radius:10px;transition-duration: 0.5s;font-size: 16px;font-weight:bold;outline:none;}

        .button1 {background-color: white; color: black; border: 2px solid #0e49b5;
        }

        .button1:hover {background-color:#0e49b5; color: white; }
        .button2 {background-color: white; color: black; border: 2px solid #54e346;}

        .button2:hover {background-color: #54e346; color: white;}

        .button3 {background-color: white; color: black; border: 2px solid #cc0e74;}

        .button3:hover {background-color: #cc0e74; color: white;}

        .foodButton {border:4px solid black;background-color:orange;padding:20px; cursor:pointer;}

        .button1 {width:150px;}
        .button2 {width:150px;}
        .button3 {width:150px;}

        #edit{position:absolute; top:606px; left:1015px; cursor:pointer;background-color:#dddb6a;}
        .edit{border-radius:90%; padding:10px; text-align:center;}

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                                             <style>
                                                                             * {box-sizing: border-box;}

        body {font: 16px Arial; }

        #search{position:absolute; top:30px; left:595px;}

        .searchTerm {
            width: 65%;
            border: 3px solid #6EA5F9;
            border-right: 3px solid #6EA5F9;
            padding: 5px;
            height: 20px;
            border-radius: 5px 5px 5px 5px;
            outline: none;
            color: #9DBFAF;
        }

        .searchButton1 {
            width: 80px;
            height: 45px;
            border: 1px solid #6EA5F9;
            background: #6EA5F9;
            text-align: center;
            color: #fff;
            border-radius: 5px 5px 5px 5px;
            cursor: pointer;
            font-size: 20px;
        }



    </style>

    <title>Dining-Out</title>
    <script src="cart.js" asynch></script>	<!-- the javascript  -->
</head>

<body id="bigWrapper">

<!--table to see the order-->
<table  style="width:400px; height:500px" id="OrderTable" >
    <caption>YOUR ORDER FOR</caption>
    <tr> </tr>

</table>



<!--search: -->
<?php

$output = NULL;

if(isset($_POST['submit'])) {

    $search = $conn-> real_escape_string($_POST['search']);

    //query the database:
    $resultSet = $conn->query("SELECT * FROM Food_Item WHERE Food_Name LIKE '%$search%' ORDER BY Category_ID;");


    if($resultSet->num_rows > 0){
        while ($row = $resultSet->fetch_assoc())
        {

            $name = $row['Food_Name'];
            $price = $row['Food_Price'];

            $output .= "$name  Price: $$price <br>";
        }
    }
    else {
        $output = "No Results.";
    }
}
?>
<!--
		<form method="POST" id="search">
			<input type="TEXT" name="search" placeholder="Food Name" class ="searchTerm"/>
			<input type="SUBMIT" name="submit" value="Search" class="searchButton1"/>

			<?echo $output;?>
		</form>
	-->

<button id="receipt" class="receipt receipt" onclick="printsend()"> PAY OPTIONS</button>

<form action="logIn.php">
    <button id="logout"  class="logout logout"> LOG OUT</button>
</form>

<form action="ClockIn.php">
    <button id="clockOut"  class="clockOut"> CLOCK OUT</button>
</form>

<form action="editMenu.php">
    <button id="edit" class="edit">EDIT MENU</button>
</form>

<form action="editEmployee.php">
    <button id="addEmployee" class="addEmployee">EDIT EMPLOYEES</button>
</form>

<form action="tables.html">
    <button id="changeTable" class="changeTable">Change Table</button>
</form>


<h2 class="nameplace"></h2><!-- These are all for test purposes, structure must stay same but neds to be replaced to read from database-->
<section class="menuClass" id="menuC">
    <div id="mainTableDiv" class="mainTableDiv"> </div>
    <div id="sideTableDiv" class="sideTableDiv"> </div>
    <div id="desTableDiv"  class="desTableDiv"> </div>

    <section class="orderClass" id="orderC">        <!-- where the order is stored -->
        <div class="ordered">
        </div>
        <div class="Total">
            <span class="totalc">$0.00</span>        <!-- Where the total is stored -->
        </div>
    </section>

    <table class="mainTable">
        <tr>
            <th>Name </th>
            <th>Price</th>
        </tr>
    </table>
    <table class="sideTable">
        <tr>
            <th>Name </th>
            <th>Price</th>
        </tr>
    </table>
    <table class="desTable">
        <tr>
            <th>Name </th>
            <th>Price</th>
        </tr>
    </table>

    <script>

        jQuery.ajax({
            url: 'function.php',
            type: 'POST',
            data: { "readdb": ""},
            success: function(response) { add3(response);}
        });
        function add3(menu){
            var names = menu.split("-")[0]
            names = names.split("+")
            var prices = menu.split("-")[1]
            prices = prices.split("+")
            var cat = menu.split("-")[2]
            cat = cat.split("+")
            for(var i = 0; i < cat.length; i++)
            {
                if (cat[i] === "7"){
                    addmain(names[i],prices[i], "$")
                }

                else if (cat[i] === "8"){
                    addside(names[i],prices[i])
                }

                else if (cat[i] === "9"){
                    adddes(names[i],prices[i])
                }
            }
        }
        function addmain(dish, price) {
            var toadd = document.createElement('div')
            var ordered = document.getElementsByClassName('mainTableDiv')[0]
            var content = `
					<div class="item">
					 <span class="dish">${dish}</span>
					 <span class="price">${price}</span>
					 <button class="addbtn" type="button">Add</button>
					</div>
					`
            toadd.innerHTML = content
            ordered.append(toadd)

            var toadd2 = document.createElement('div')
            var ordered2 = document.getElementsByClassName('mainTable')[0]
            var content2 = `
				<tr>
                    <td>${dish}</td><td>$${price}</td>
                </tr>
					`
            toadd2.innerHTML = content2
            ordered2.append(toadd2)
            ready()
        }
        function addside(dish, price) {
            var toadd = document.createElement('div')
            var ordered = document.getElementsByClassName('sideTableDiv')[0]
            var content = `
					<div class="item">
					<span class="dish">${dish}</span>
					<span class="price">${price}</span>
					<span class="type side" ></span>
					<button class="addbtn" type="button">Add</button>
					</div> `
            toadd.innerHTML = content
            ordered.append(toadd)

            var toadd2 = document.createElement('div')
            var ordered2 = document.getElementsByClassName('sideTable')[0]
            var content2 = `
				<tr>
                    <td>${dish}</td><td>$${price}</td>
                </tr>
					`
            toadd2.innerHTML = content2
            ordered2.append(toadd2)
            ready()
        }
        function adddes(dish, price) {
            var toadd = document.createElement('div')
            var ordered = document.getElementsByClassName('desTableDiv')[0]
            var content = `
					<div class="item">
					<span class="dish">${dish}</span>
					<span class="price">${price}</span>
					<span class="type des" ></span>
					<button class="addbtn" type="button">Add</button>
					</div> `
            toadd.innerHTML = content
            ordered.append(toadd)

            var toadd2 = document.createElement('div')
            var ordered2 = document.getElementsByClassName('desTable')[0]
            var content2 = `
				<tr>
                    <td>${dish}</td><td>$${price}</td>
                </tr>
					`
            toadd2.innerHTML = content2
            ordered2.append(toadd2)
            ready()
        }
        var mainC = document.getElementsByClassName('mainTableDiv')[0]
        var sideC = document.getElementsByClassName('sideTableDiv')[0]
        var desC = document.getElementsByClassName('desTableDiv')[0]
        var maint = document.getElementsByClassName('mainTable')[0]
        var sidet = document.getElementsByClassName('sideTable')[0]
        var dest = document.getElementsByClassName('desTable')[0]

        function mainD(){                //Display the menus by section
            mainC.style.display = "block"
            sideC.style.display = "none"
            desC.style.display = "none"
            maint.style.display = "block"
            sidet.style.display = "none"
            dest.style.display = "none"
        }
        function sideD(){
            mainC.style.display = "none"
            sideC.style.display = "block"
            desC.style.display = "none"
            maint.style.display = "none"
            sidet.style.display = "block"
            dest.style.display = "none"
        }
        function desD(){
            mainC.style.display = "none"
            desC.style.display = "block"
            sideC.style.display = "none"
            maint.style.display = "none"
            dest.style.display = "block"
            sidet.style.display = "none"
        }
        mainD();    //to load an inital menu

        buildTable(mainTableDiv)

        function buildTable(data){
            var table = document.getElementByClassName('myTable')

            for (var i=0; i< data.length; i++){
                var row = ` <tr>
											<td>${data[i].name}</td>
											<td>${data[i].price}</td>
										</tr>`
                table.innerHTML += row

            }
        }

    </script>

    <div>
        <button onClick="mainD()" name="main" class="button button2" id="mainButton"> Main </button>
    </div>
    <div>
        <button onClick="sideD()" name="side" class="button button1" id="sideButton"> Side </button>
    </div>
    <div>
        <button onClick="desD()" name="dessert" class="button button3" id="dessertButton"> Dessert </button>
    </div>



</body>

</html>
