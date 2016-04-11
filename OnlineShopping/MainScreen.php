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
    <body bgcolor="FFFFCC">
        <input width="100%" height="100%" type="image" src="images/bgfur.jpg"/>
		
    </body>
<html>
        