<?php
  
// Start the session
session_start();


	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bonapetit";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION["USER"] = $username ;
$password=md5($password);


	$sql = "SELECT ResPass FROM restaurant WHERE ResLoginName='$username'";
	$result = $conn->query($sql);
	
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		
		if($row["ResPass"] == $password)
		{
header("location:fooddetails.html");
			}
		else
		{
			echo '<script language="javascript">';
echo 'alert("Invalid credentials.");';
echo 'window.location.href="reslogpage.html";';
echo '</script>'; 
			
		}
	}
	

?>