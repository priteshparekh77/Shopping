<?php
session_start();
if (!isset($_SESSION['User_ID']))
{
    die("You aren't allowed to access this page");
   header("location:http://codd.cs.montclair.edu/~parekhp/cgi-bin/OnlineShopping/Index.php");
}	
else
{
//echo "Authorized";
}
?>
<html>
<head>
<title>Employee Home Screen</title>
</head>
<body>
<?php
	/*session_start();
	$SesUserID=$_SESSION['User_ID'] ;
	$con = mysql_connect("localhost","parekhp","sundarkand");
	if (!$con)
	 {
		die('Could not connect: ' . mysql_error());
	 }
	else
	{    
		$db_selected = mysql_select_db("parekhp_OnlineShopping",$con);
	   	$qur1 = "select * from User where User_ID = '".$SesUserID."' ";
	 
	}*/
?>
       <div height="100%" width="100%">
	   <iframe src="EmpSidebar.php" name="sidebar" aligh="left" height="100%" width="20%"></iframe>
            <iframe  src="MainScreen.php"name="mainscreen" aligh="right" height="100%" width="79%">Iframe 2</iframe>
        </div>
       </body>
</html>