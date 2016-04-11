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
    <?php
    $User_ID=$_COOKIE["ck1"];
    $con = mysqli_connect("localhost","root","","test");
            if (mysqli_connect_errno($con)) {
            echo "Connection fail";
            }
            else
            {    
                   $qur1 = "select * from demo where User_ID = '".$User_ID."' ";
                   $result1=mysqli_query($con,$qur1);
                   while ($row = mysqli_fetch_array($result1))
                    {
                        $a = $row['umane'];
                    }
            }
        ?>
    
    <body bgcolor="ADD8E6">
        <table>
        <tr>
            <td colspan="2">
                <table align="right">
                <tr>
                    <td background="green">&nbsp;</B></td>
                    <td></td>
                </tr>
                </table>    
            </td>
            <td align="right">
                <table align="right">
                <tr>
                    <td align="right"><font color="white" size="3"><b>Welcome,</B></font></td>
                    <td align="right"><font color="white" size="3"><b><?php echo $a;?></b></font></td>
                </tr>
                </table>
            </td>
        </tr>
        </table>
        
    </body>
</html>