<?php
//echo '<img src="fetch.php?id=' . htmlspecialchars($_GET["img_id"]) . '"border ="0" height="250" width="250" />';
$conn = mysqli_connect("localhost","root","")or die("Cannot connect to database"); 

//keep your db name
mysqli_select_db($conn, "bonapetit") or die("Cannot select database");
//$sql = "SELECT * FROM `second` where `bid` = 1"; 
// manipulate id ok 
//$sth = mysql_query($sql);
//$result=mysql_fetch_array($sth);
// this is code to display 
//echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['img'] ).'"/ width="200" height="200">"';
?>
<?php
 session_start(); 
 //$ffhr=$_REQUEST['ffhr'];
// $fpdt=$_REQUEST['fpdt'];


$servername = "localhost";
$dbname = "bonapetit";
$username="root";
$password="";

$conn =  mysqli_connect($servername, $username, $password,$dbname);

$uname=$_SESSION["USER"];

	
// Check connection
if ($conn->connect_error) {
    echo 'conn';
    die("connection failed: " . $conn->connect_error);
} 

else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bon Appetit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bon Appetit</a>
    </div>
    <ul class="nav navbar-nav">
  
     
      </li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
</nav>
 <table align="center">
   <tr>
    <th>
      ID&nbsp;
    </th><th></th><th></th>
    <th>
      Name&nbsp;
    </th><th></th><th></th>
    <th>
      Contact&nbsp;
    </th><th></th><th></th>
    <th>
      FoodName&nbsp;
    </th><th></th><th></th>
    <th>
      Select&nbsp;
    </th><th></th>
  </tr>
  <tr>
    <td>
      
    </td>
  </tr>


  
      <?php
      //$sql="SELECT * FROM restaurant ";
      $sql = "SELECT `restaurant`.`ResID`, `ResName`, `FoodName`, `FoodQuantity`, `restaurant`.`ResContact` FROM `restaurant`,`donatefood` WHERE `restaurant`.`ResID` = `donatefood`.`ResID` AND `status`=  'Fresh'";
        
    $query=mysqli_query($conn, $sql); 
  
    while ($row=mysqli_fetch_array($query)){ 
      ?>
        <tr>
          <td ><?php echo $row['ResID'] ?></td><td></td><td></td>
          <td>
            <?php echo $row['ResName'] ?>
          </td><td></td><td></td>
          <td>
            <?php echo $row['ResContact'] ?>
          </td><td></td><td></td>
          <td>
            <?php echo $row['FoodName'] ?>
          </td><td></td><td></td>

		  <td><input type="submit" value="view"></td><td></td>

        </tr>
      <?php
      }
	  }
    ?>
  </table>
</body>
</html>