
<?php

$rname=$_REQUEST['rname'];
$oname=$_REQUEST['oname'];
$remail=$_REQUEST['email'];
$rloc=$_REQUEST['rloc'];
$rcon=$_REQUEST['rcon'];
$uname=$_REQUEST['runame'];
$paswd=$_REQUEST['rpassword'];
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
$paswd=md5($paswd);
$sql =  "INSERT INTO restaurant (ResName, ResOwner,  ResEmailID, ResLoc , ResContact, ResLoginName, ResPass)  
VALUES ('".$rname."','".$oname."','".$remail."','".$rloc."' ,'".$rcon."' ,'".$uname."' ,'".$paswd."')";

if (mysqli_query($conn,$sql)) {
    	echo '<script language="javascript">';
echo 'alert("Your account has been created.");';
echo 'window.location.href="reslogpage.html";';
echo '</script>'; 
			

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


