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
<body background="images/sidebarBGjpg.jpG">
<?php         
     $SesUserID=$_SESSION['User_ID'] ;
     $con = mysql_connect("localhost","parekhp","sundarkand");
     if (!$con)
     {
	die('Could not connect: ' . mysql_error());
     }	  
    else
    {
        $db_selected = mysql_select_db("parekhp_OnlineShopping",$con);
           $qur1 = "select * from user where User_ID = '".$SesUserID."' ";
           $result1=mysql_query($qur1);
           while ($row = mysql_fetch_array($result1))
            {
                $a = $row['First_Name'];
		$b = $row['Last_Name'];
            }
    }
    mysql_close($con);
?>
        <link rel="stylesheet" href="/resources/demos/style.css" />
       <table bgcolor="#ADD8E6" width="100%">
	   <tr >
			<td  align="left">Welcome</td>
			<td  align="right"><?php echo $a?>&nbsp;<?php echo $b?>!</a></td>
	   </tr>
           <tr></tr>
           <tr></tr>
           <tr></tr>
           <tr></tr>           
	   </table>
        <table></table>
        <table></table>
        <table></table>
			<table  width="90%" cellspacing="4" cellpadding="4">
            
                <tr bgcolor="#ADD8E6">
                    <td> <font color="#191970" size=4><B>Master Dashboard</b> </font></td>
                </tr>
                <tr></tr>
                <tr></tr>
                
                <tr bgcolor="#ADD8E6">
                    <td> <font color="#191970" size=4><B>Categories</b> </font></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr bgcolor="#ADD8E6">
                    <td><a href="LeavingRoom.php" target="tag"/> <font color="#191970">Living Room</a> </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <a href="BedRoom.php" target="tag"/><font color="#191970">Bed Room</a> </font></td>
                </tr>
<tr bgcolor="#ADD8E6">
                    <td><a href="Kitchen.php" target="tag"/> <font color="#191970">Kitchen</a></font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td><a href="DiningHall.php" target="tag"/> <font color="#191970">Dining Hall</a> </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <a href="Office.php" target="tag"/><font color="#191970">Office</a> </font></td>
                </tr>
                <tr></tr>
                <tr></tr>
		<tr bgcolor="#ADD8E6">
                    <td> <font color="#191970" size=4><B>Your Details</a></font></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr bgcolor="#ADD8E6">
                    <td><a href="ViewCart.php" target="tag"/> <font color="#191970">View Cart</a></font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td><a href="printOrder.php" target="tag"/> <font color="#191970">Print Orders</a> </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <a href="CstEdtDtl.php" target="tag"/><font color="#191970">View / Edit personal details</a> </font></td>
                </tr>
               <tr bgcolor="#ADD8E6">
                    <td> <a href="cstDelete.php" target="mainscreen"/><font color="#191970">Delete Account</a> </font></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr bgcolor="#ADD8E6">
                    <td  align="left"><a target="_parent" href="Logout.php">Logout</a></td>
                </tr>
		
            </tbody>
        </table>

    </body>
<html>
        