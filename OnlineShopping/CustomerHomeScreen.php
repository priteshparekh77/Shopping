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
       
    <body>
        <iframe  valgin="left" src="customersidebar.php" width="20%" height="100%"></iframe>
        <iframe  background-color:"#ADD8E6" src="cstmainframe.php" height="100%" width="79%"></iframe>
        
    </body>
</html>