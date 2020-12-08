<?php  // strict requirement declare(strict_types=1); // strict requirement
function readdb() {
	$conn = new mysqli("localhost","root","password","Dining-Out");
    //sql statement to select parts of a table
    $sql = "SELECT * FROM Food_Item ;";
    //query to get the items 
    $result = mysqli_query($conn, $sql);
    //check if database connection didn't work properly
    $resultCheck = mysqli_num_rows($result);
    //loop to print items in database
    $names = '';
    $pris = '-';
	$cat = '-';
    while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
        $names = $names . '+' . $row['Food_Name'];
        $pris = $pris . '+' . $row['Food_Price'];
		$cat = $cat . '+' . $row['Category_ID'];
    }
    echo $names . $pris . $cat; 
}
readdb();
