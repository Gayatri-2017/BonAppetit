<?php
  
// Start the session
session_start();


	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bonapetit";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$username = $_POST['nguser'];
	$password = $_POST['ngpassword'];

	$_SESSION["USER"] = $username ;
$password=md5($password);

	$sql = "SELECT TakPass FROM taker WHERE TakLoginName='$username'";
	$result = $conn->query($sql);
	//$result=mysqli_query($conn,$sql);
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		
		if($row["TakPass"] == $password)
		{
header("location:ngoselect.php");
			}
			
	}		else
		{
			echo '<script language="javascript">';
echo 'alert("Login failed.");';
echo 'window.location.href="ngologin.html";';
echo '</script>'; ;
		}
	
	

?>