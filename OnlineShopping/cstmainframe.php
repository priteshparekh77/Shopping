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
        
        <iframe  bgcolor="#ADD8E6" frameborder="0"height="22%" width="100%"src="cstHeader.php"></iframe>
        <iframe SRC="csthome.php"frameborder="0" name="tag"height="74%" width="100%"></iframe>
    </body>
</html>