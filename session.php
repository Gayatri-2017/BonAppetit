<?php
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'bonapetit');
	define('DB_HOST', 'localhost');

	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if(!$link)	{
		die('Could not connect:' . mysqli_connect_error());
	}

	$db_select = mysqli_select_db($link, DB_NAME);

	if(!$db_select)	{
		die('Can\'t use ' . DB_NAME . ': ' . mysqli_connect_error());
	}

	//echo 'Connected to Session Page Successfully!';
	session_start();
?>

<body>

<p align="center"><font face="MV Boli" color="Black" size="22" text-align= "right">Bon Apetit</font></p>

<button style = "float:right;"><a href="firstpage.html" > <<<< Go Back to Home</a></button>

<?php
		if(!isset($_SESSION['login_user'])){
			echo "<h3>You are not logged in <h3><BR>";
			echo "<h3><a href = 'firstpage.html' style='font-family:Comic Sans MS'> Log in again?</a></h3>";
			exit();
			//header("location:login.php");
		}
		$user_check = $_SESSION['login_user'];
	
		$ses_sql1 = mysqli_query($link,"select ResLoginName from restaurant where ResLoginName = '$user_check' ");
		$ses_sql2 = mysqli_query($link,"select TakLoginName from taker where TakLoginName = '$user_check' ");

		if (!$ses_sql1 || !ses_sql2) {
			printf("Error: %s\n", mysqli_error($link));
			exit();
		}
	
		if($ses_sql1)	{
			$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
		}
		else if ($ses_sql2)	{
			$login_session = $row['username'];
		}

		//session.gc_maxlifetime = 1440
	
?>