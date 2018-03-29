
<?php

$ngname=$_REQUEST['ngname'];
$ngowner=$_REQUEST['ngownername'];
$nglocation=$_REQUEST['nglocation'];
$ngemail=$_REQUEST['ngemail'];
$ngloginname=$_REQUEST['ngloginname'];

$ngwebsite=$_REQUEST['ngwebsite'];
$ngpaswd=$_REQUEST['ngpaswd'];
$ngcontact=$_REQUEST['ngcontact'];

$servername = "localhost";
$dbname = "bonapetit";
$username="root";
$password="";

// Create connection
$conn =  mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
	echo 'conn';
    die("connection failed: " . $conn->connect_error);
} 
$ngpaswd=md5($ngpaswd);
$sql =  "INSERT INTO `taker`(`TakName`, `TakOwner`, `TakEmailId`, `TakLoginName`, `TakPass`, `TakContact`, `TakWebsite` ) 
VALUES ('".$ngname."','".$ngowner."','".$ngemail."','".$ngloginname."','".$ngpaswd."','".$ngcontact."','".$ngwebsite."')";

if (mysqli_query($conn,$sql)) {
	
    echo '<script language="javascript">';
echo 'alert("Your account has been created.");';
echo 'window.location.href="ngologin.html";';
echo '</script>'; 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
	


