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
<title>Owner Home Screen</title>
</head>
<body>

       <div height="100%" width="100%">
	   <iframe src="Sidebar.php" name="sidebar" aligh="left" height="100%" width="20%" frameborder=0 allowtransparency=yes scrolling=no vspace=0 hspace=0 marginwidth=0 marginheight=0></iframe>
            <iframe  src="MainScreen.php"name="mainscreen" aligh="right" height="100%" width="79%" frameborder=0 allowtransparency=yes scrolling=no vspace=0 hspace=0 marginwidth=0 marginheight=0>Iframe 2</iframe>
        </div>
       </body>
</html>