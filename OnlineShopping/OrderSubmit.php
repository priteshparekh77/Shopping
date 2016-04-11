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
<?php
	$uid=$_SESSION['User_ID'];
	$CardNo=$_POST['ccdno'];
	$CardType=$_POST['cardtype'];
	$ExpiryDate=$_POST['expdate'];
	$CVV=$_POST['cvv'];
	$SSN=$_POST['SSN'];
	$BStreet=$_POST['bstreet'];
	$BCity=$_POST['bcity'];
	$BState=$_POST['bstate'];
	$BZip=$_POST['bzip'];
	$SStreet=$_POST['sstreet'];
	$SCity=$_POST['scity'];
	$SState=$_POST['sstate'];
	$SZip=$_POST['szip'];
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
	$query="Insert into Cst_dtl(Customer_ID,SSN,Card_Type_ID,Card_No,Expiry_Date,CVV,BStreet,BCity,BState,BZip,SStreet,SCity,SState,SZip) values ('$uid','$SSN','$CardType','$CardNo','$ExpiryDate','$CVV','$BStreet','$BCity','$BState','$BZip','$SStreet','$SCity','$SState','$SZip')";
	if (!mysql_query($query))
                    {
                    die('Error: ' . mysql_error($link));
                    }
                    else{
                    
                    }
                    $query3="Select * from shoppingcart where user_id=$uid"; 
                    echo $query3;
                     $result=mysql_query($query3);
			        $rowrs=mysql_num_rows($result);
			        If ($rowrs >0)
			        {
			           while ($row = mysql_fetch_array($result))
			            {
			                $a = $row['Product_ID'];
			                $b = $row['cst_quntity'];
//			                $c = $row['User_ID'];
				}
				}
	$query5="Select * from product where Product_ID=$a"; 
                    echo $query5;
                     $result=mysql_query($query5);
			        $rowrs=mysql_num_rows($result);
			        If ($rowrs >0)
			        {
			           while ($row = mysql_fetch_array($result))
			            {
			                $q= $row['quntity'];
			                
				}
				}
		$newqty = $q - $b;	
		echo $newqty;	
		$query4="Update product set quntity=$newqty where Product_ID=$a"; 	
		echo $query4;
		 if(!mysql_query($query4))
                    {
                    die('Error: ' . mysql_error($link));
                    }
                    	else{}
                   
		
		
                    $query2="delete from shoppingcart where user_id=$uid";
                    if(!mysql_query($query2))
                    {
                    die('Error: ' . mysql_error($link));
                    }
                    	else
                    	{	?><h3>Order placed successfully<h3><br>
                    		Click here to print your order<a href="printOrder.php">Print Order</a>
                    		<?php
                    	}
                 //  $query3="Update product set qty= where product_id="; 	
}	
?>
</body>
</html>