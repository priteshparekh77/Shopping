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
$uid=$_SESSION['User_ID'];
$date = date("y-m-d");
//echo $date;
$ordr="$date"."/" ."$uid";
$link = mysql_connect("localhost","parekhp","sundarkand"); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//linebreak();
$db = mysql_select_db("parekhp_OnlineShopping", $link); 
if (!$db) { 
    die('Could not open database: ' . mysql_error());
} 
else
{
$oquery="select * from shoppingcart where user_id=$uid";
//echo $oquery;
	$result1= mysql_query($oquery);
	//echo $result1;
     $rowcount=mysql_num_rows($result1);
    // echo $rowcount;
     if ($rowcount == 0 || $rowcount == "" or $rowcount ==null)
     {
	echo "you do not have any item in your cart";
      }
      else
      {
      	
    $query1="INSERT INTO parekhp_OnlineShopping.order(Order_No,Order_Date)VALUES('$ordr','$date')";
   // echo $query1;
        if (!mysql_query($query1))
                    {
                    die('Error: ' . mysql_error($link));
                    }
                    else{// Do Nothing}
     $squery="SELECT * FROM parekhp_OnlineShopping.order ORDER BY Order_ID DESC LIMIT 1 ";
    // echo $squery;
     $result1= mysql_query($squery);
     $rowcount=mysql_num_rows($result1);
     if ($rowcount>0)
     {
     	while ($row=mysql_fetch_array($result1))
     	{
     		$orderid=$row['Order_ID'];
     		
     		$orderno=$row['Order_No'];
     	}
     }else{echo "No record found";}
     
     $squery1="SELECT * FROM shoppingcart where user_id=$uid";
     $result= mysql_query($squery1);
     $rowcount=mysql_num_rows($result);
     if ($rowcount>0)
     {
     	while ($row=mysql_fetch_array($result))
     	{
     		$prid=$row['Product_ID'];
     		$qty=$row['cst_quntity'];
     		$total=$row['ttlamt'];
     	}
     }
     else{echo "No record found";}
     
     $query3="Insert into Order_Details (Order_ID,Order_No,User_ID,Product_ID,Qty,Total) values('$orderid','$orderno','$uid','$prid','$qty','$total')";
    // echo $query3;
     if(!mysql_query($query3))
     {
     	die('Error:'.mysql_error($link));
     	}
     	else{
     	?>
     	<html>
     	<body>
     	<form action="OrderSubmit.php" method=post name="ordersubmit">
     	<h3> Please enter below information 
     	<table border="0" width="100%">
     	<tr>
                <td colspan="1"><b>Card Type</b></td>
                    <td colspan="1">
                    <select name=cardtype>
                    <option value=1>VISA</option>
                    <option value=2>Master</option>
                    <option value=3>American Express</option>
                    </select>
                </td>    
                <td colspan="1"><b>Credit Card No</b></td>
                    <td colspan="1"><input size="25" style="background-color:white" type="text" name="ccdno"/></td>
                    
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="1"><b>Expiry Date</b></td>
                    <td colspan="1"><input  size="25"style="background-color:white" type="text" name="expdate"/></td>   
                <td colspan="1"><b>Cvv No:</b></td>
                    <td colspan="1"><input size="20"style="background-color:white" type="text" name="cvv"/></td>
                    
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
            <td>Social Security No</td>
             <td colspan="1"><input size="35" style="background-color:white" type="text" name="SSN"/></td>    
            </tr>
            
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr><td><h4> Please enter your billing address:</h4></td></tr>
            <tr>
                <td colspan="1"><b>Street</b></td>
                    <td colspan="1"><input size="35" style="background-color:white" type="text" name="bstreet"/></td>    
                <td colspan="1"><b>City</b></td>
                    <td colspan="1"><input size="25" style="background-color:white" type="text" name="bcity"/></td>
                    
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="1"><b>State</b></td>
                    <td colspan="1"><input  size="25"style="background-color:white" type="text" name="bstate"/></td>   
                <td colspan="1"><b>Zip</b></td>
                    <td colspan="1"><input size="20"style="background-color:white" type="text" name="bzip"/></td>
                    
            </tr><tr><td><h4> Please enter your shipping address:</h4></td></tr>
                <tr>
                <td colspan="1"><b>Street</b></td>
                    <td colspan="1"><input size="35" style="background-color:white" type="text" name="sstreet"/></td>    
                <td colspan="1"><b>City</b></td>
                    <td colspan="1"><input size="25" style="background-color:white" type="text" name="scity"/></td>
                    
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="1"><b>State</b></td>
                    <td colspan="1"><input  size="25"style="background-color:white" type="text" name="sstate"/></td>   
                <td colspan="1"><b>Zip</b></td>
                    <td colspan="1"><input size="20"style="background-color:white" type="text" name="szip"/></td>
                    
            </tr>
            <tr>
            	<td><input type=submit value=CheckOut></td>
            </tr>
     	</table>
     	</form>
     	</body>
     	</html>
     	<?php
     	}
     
   }                 
             
                    
?>             <?php
            }}
            ?>
            
    <!---           
    </body>
</html>--->