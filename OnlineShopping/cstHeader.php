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
<head></head>

<body>
    <script name="Javascript">
    function validateform()
    {
    	//alert("asdasd");
    	var catname=document.forms["SearchForm"]["search"].value;
    	if (catname==null || catname=="")
    	{
    		alert("Search can not be blank");
    		return false;
    	}	
    }
    </script>
    <table border="1" height="10%">
    <tr bgcolor="#ADD8E6">
                <td align="center" colspan="6" width="100%"><font size="9" color="white">&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    <b>Welcome to Online Furniture Shopping</b></td>
            </tr>
    <tr style:border="1"  bgcolor="#ADD8E6">
        <td width="15%" colspan="1"><font  size="3"><a href="csthome.php" target="tag"><b>Home</a></B></font></td>
        <td width="25%" colspan="1"><font  size="3"><b><a href="LeavingRoom.php" target="tag">Living Room</a></b></font></td>
        <td width="25%" colspan="1"><font  size="3"><b><a href="BedRoom.php" target="tag">Bed Room</a></b></font></td>
        <td width="17%" colspan="1"><font  size="3"><b><a href="Kitchen.php" target="tag">Kitchen</a></b></font></td>
        <td width="17%" colspan="1"><font  size="3"><b><a href="DiningHall.php" target="tag">Dining Hall</a></b></font></td>
        <td width="17%" colspan="1"><font  size="3"><b><a href="Office.php" target="tag">Office<a></b></font></td>
    </tr>
    </table>
    <form action="Search.php" method="post" target="tag" name="SearchForm" onsubmit="return validateform()" >
	    <table align="right">
	    <tr>
	    <td>Search Product here&nbsp;&nbsp;<input type="text" name="search"/>
	    <td><input type="submit" value="Go"/>
	    </tr>
	    </table>
	    </form>
    </body>
</html>