<?php
session_start();
if (!isset($_SESSION['User_ID']))
{
    die("You aren't allowed to access this page");
    //echo "Not Authorized";
}	
else
{
//echo "Authorized";
}
?>
<html>
<body>
<script name="Javascript">
    function validateform()
    {
    	
    	var x=document.forms["cnfcart"]["cartqty"].value;
    	var y=document.forms["cnfcart"]["yourqty"].value;
    	
    	if (y > X)
    	{    	
    		alert("Please add quntity");
    		return false;
    	}	
    }
    </script>
<?php
$pid=$_GET['prod_id'];
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
    $query="select * from product where product_id=$pid";
    $result= mysql_query($query);
    $rows=  mysql_num_rows($result);
    if($rows>0)
    {
        while($row=mysql_fetch_array($result))
        {
            $a=$row['Product_Name'];
            $b=$row['Price'];
            $c=$row['Short_Descr'];
            $d=$row['Dtl_Descr'];
            $e=$row['quntity'];
	    $f=$row['Model'];
            $g=$row['Weight'];
            $h=$row['Dimension'];
        }
        
        }
    
 else {
     echo "No records found";
    }
}
?>
    <table>
        <thead>
        <h2><u>Configure your shopping cart</u></h2>
        </thead>
        <form name="cnfcart" action="maincart.php" method="post" onsubmit="return validateform()">
            <tr>
            <input type="hidden" name="pid" value="<?php echo $pid?>"/>
            </tr>
            <tr>
                <td>Product Name:</td>
                <td><input type="text"  name="cartpname" readonly value="<?php echo $a?>"/>
                
            </tr>
            <tr>
                <td>Product Price:</td>
                <td><input type="text"  name="cartprice" readonly value="<?php echo $b?>"/>
            </tr>
            <tr>
                <td>Product Short Description:</td>
                <td><input type="text"  name="cartsrtdescr" readonly value="<?php echo $c?>"/>
            </tr>
            <tr>
                <td>Product Detail Description:</td>
                <td><input type="text"  name="cartdtldescr"readonly value="<?php echo $d?>"/>
            </tr>
            <tr>
                <td>Available Quantity:</td>
                <td><input type="text" readonly name="cartqty" value="<?php echo $e?>"/>
            </tr>
            
            <tr>
                <td>Your Quantity:</td>
                <td><input type="text" name="yourqty" />
            </tr>
            
            <tr>
                <td>Model:</td>
                <td><input type="text" name="model" value="<?php echo $f?>"/>
            </tr>
            
            <tr>
                <td>Weight:</td>
                <td><input type="text" name="weight" value="<?php echo $g?>"/>
            </tr>
            
            <tr>
                <td>Dimension:</td>
                <td><input type="text" name="dim" value="<?php echo $h?>"/>
            </tr>
            <tr>
                <td colspan="2">
            <input type="submit" value="Submit Cart"/>
            <a href="csthome.php">Continue Shopping</a>
            </td>
            </tr>
        </form>
    </table>        
    </body>
</html>