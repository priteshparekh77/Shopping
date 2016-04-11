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
<?php
 $SesUserID=$_SESSION['User_ID'] ;
 ?>
<html>
    <body background="images/SidebarBgjpg.jpg">
<?php
//session_start();
      $SesUserID=$_SESSION['User_ID'] ;
        $con = @mysql_connect("localhost","root","");
        if (!$con)
	  {
	  	die('Could not connect: ' . mysql_error());
	  }	
            else
            {    
 	        $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);		
			//include 'database.php';
                $qur1 = "select * from user where User_ID = '".$SesUserID."'";
                $result1=mysql_query($qur1);
				$rowrs=mysql_fetch_array($result1);
                while ($row = mysql_fetch_array($result1))
                {
                        $a = $row['First_Name'];
                }
            }
           // session_destroy();
        ?>
       <link rel="stylesheet" href="/resources/demos/style.css" />
       <table bgcolor="#ADD8E6" width="100%">
	   <tr >
			<td  align="left">Welcome    <?php echo $a ?>!</td>
			<td  align="right"><a target="_parent" href="Logout.php">Logout</a></td>
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
                    <td><a href="AddUser.php" target="mainscreen"/> <font color="#191970">Add User / Employee</a></font></td>
                </tr>
                <tr border="1" bgcolor="#ADD8E6">
                    <td><a href="AddCategory.php" target="mainscreen">Add Category</a></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td><a href="AddSubCategory.php" target="mainscreen"/> <font color="#191970">Add Sub Category</a> </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <a href="AddProduct.php" target="mainscreen"/><font color="#191970">Add Products</a> </font></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr bgcolor="#ADD8E6">
                    <td> <font color="#191970" size=3><B>Transaction Dashboard</b> </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <a href="test.php" target="mainscreen"/><font color="#191970">Orders</a> </font></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr bgcolor="#ADD8E6">
                    <td> <font color="#191970" size=3><B>Report Dashboard</b> </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <font color="#191970">View orders </font></td>
                </tr>
                <tr bgcolor="#ADD8E6">
                    <td> <font color="#191970">View Users </font></td>
                </tr>
            </tbody>
        </table>
</body>
<html>
        