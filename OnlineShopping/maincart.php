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
<?php
$userid=$_SESSION['User_ID'];
$pid=$_POST['pid'];
$ctpnm=$_POST['cartpname'];
$ctprc=$_POST['cartprice'];
$ctst=$_POST['cartsrtdescr'];
$ctdtl=$_POST['cartdtldescr'];
$cartqty=$_POST['cartqty'];
$cstqty=$_POST['yourqty'];
//$netqty=$cartqty - $cstqty;
$model=$_POST['model'];
$weight=$_POST["weight"];
$dim=$_POST["dim"];
$TtlAmt= $ctprc* $cstqty;
 
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
    $query="INSERT INTO shoppingcart(Product_Name,price,description,user_id,cst_quntity,Product_ID,model,weight,dimension,ttlamt)VALUES('$ctpnm','$ctprc','$ctst','$userid','$cstqty','$pid','$model','$weight','$dim','$TtlAmt')";
    if (!mysql_query($query))
                    {
                    die('Error: ' . mysql_error($link));
                    }
                    echo "<h2>Item successfully inserted into cart</h2>";
                    echo "Please click here to view your cart";
                    ?>
    <a href="ViewCart.php">View Cart</a>
    <?php
                    mysql_close($link);
}
?>
</body>
</html>