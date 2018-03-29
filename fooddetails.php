<?php
 session_start(); 
 //$ffhr=$_REQUEST['ffhr'];
// $fpdt=$_REQUEST['fpdt'];


$servername = "localhost";
$dbname = "bonapetit";
$username="root";
$password="";

$item_name=$_REQUEST['item_name'];
$quantity=$_REQUEST['quantity'];
$no_of_hrs=$_REQUEST['no_of_hrs'];
$datetime=$_REQUEST['datetime'];



$conn =  mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
	echo 'conn';
    die("connection failed: " . $conn->connect_error);
} 

else
{

    $sql1 = "INSERT INTO donatefood (FoodName, FoodQuantity , FoodFreshHours, FoodPrepDateTime) 
    VALUES ('".$item_name."','".$quantity."','".$no_of_hrs."','".$datetime."')";
	
	if (mysqli_query($conn,$sql1)) {
    	echo '<script language="javascript">';
echo 'alert("Info entered.");';
echo 'window.location.href="fooddetails.html";';
echo '</script>'; 
			

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	
}



