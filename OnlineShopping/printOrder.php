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
            <script type="text/javascript" lang="javascript" >
            function formSubmit(ID)
            {
               //alert("add to cart");
                document.getElementById("frm1").action="cart.php?prod_id="+ID;
                document.getElementById("frm1").submit();
            }
             function frmsbmt(ID)
            {
               //alert("more details");
                document.getElementById("frm1").action="productdetails.php?prod_id="+ID;
                document.getElementById("frm1").submit();
            }
            </script>
    
</script>
    </head>
    <body>

   <?php 
   $uid=$_SESSION['User_ID'];
$link = mysql_connect("localhost","parekhp","sundarkand"); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
linebreak();
$db = mysql_select_db("parekhp_OnlineShopping", $link); 
if (!$db) { 
    die('Could not open database: ' . mysql_error());
} 
createDynamicHTMLTable("Your Order", "SELECT od.Order_NO, od.Qty, od.Total, pd.Product_Name, pd.model, pd.dimension, pd.weight, pd.price, pd.Short_Descr, pd.Dtl_Descr, pd.Product_ID
FROM Order_Details AS od
INNER JOIN product AS pd ON od.Product_ID = pd.Product_ID
WHERE User_Id =6
ORDER BY Order_ID DESC
LIMIT 1 " , $link);
mysql_close($link);
function strong($text)
{
    return "<STRONG>$text</STRONG>\n";
}
function linebreak($text="\n") {
    echo nl2br( $text );
}
?> 
<?php
function createDynamicHTMLTable($table_name, $sql_query, $link)
{
    $sql_result = mysql_query($sql_query); 
    //echo $sql_query;
    if (($sql_result)||(mysql_errno == 0)) 
    {        
       echo "<form method=post id='frm1'>";
       //echo "<br/><input type='submit' label='add to cart'";
        echo "<DIV align=left bgcolor=blue>\n";
        linebreak( strong( sprintf("SubCategory: \"%s\"", $table_name) ) );
        echo "<TABLE borderColor=#000000 cellSpacing=0 cellPadding=6 border=2 width=100%>\n";
        echo "<TBODY>\n";
        echo "<h3><b><u>Please see your order below:</u></b></h3>";
        $rowrs=mysql_num_rows($sql_result);
        If ($rowrs > 0)
        { 
             $i = 0; 
            echo "<TR vAlign=top bgColor=#00ffff>\n";
            echo "</TR>\n"; 
            $columnCounter = 1;
            while ($rows = mysql_fetch_array($sql_result,MYSQL_ASSOC)) 
            { 
                $Order_No=$rows['Order_NO'];
                $Product_ID=$rows['Product_ID'];
                $qty=$rows['Qty'];
                $Total=$rows['Total'];
               	 $Price=$rows['Total'] / $rows['Qty']; 
               	 $a=$rows['Product_Name'];
               	 $b=$rows['model'];
               	 $c=$rows['dimension'];
               	 $d=$rows['weight'];
               	// $e=$rows['price'];
               	 $f=$rows['Short_Descr'];
               	 $g=$rows['Dtl_Descr'];
               	 $pid=$rows['Product_ID'];
               //	 echo $Order_No;
                
            ?>
              <TD align='left'><font align="left">Order No:<b><?php echo $Order_No; ?></b><br />Price:<b><?php echo $Price; ?>$</b></br>Qty:<b><?php echo $qty; ?></b></br>Total:<b><?php echo $Total; ?></b></br>Product Name:<b><?php echo $a; ?></b></br>Model No:<b><?php echo $b; ?></b></br>Product Dimension:<b><?php echo $c; ?></b></br>Weight:<b><?php echo $d; ?></b></br>Short Description:<b><?php echo $f; ?></b></br>Detail Description:<b><?php echo $g; ?></b></font></TD>
              <td><img width="150" height="100" src=images/Products/<?php echo $pid; ?>.jpg /></td>
        
            <?php
                
                echo "<input type='hidden' value='1'name='a'/>";
                if ($columnCounter % 5 == 0)
                {                 
                    echo "</TR>\n <TR>\n"; 
                }
                $columnCounter = $columnCounter + 1;
           } 
            echo "</TR>\n"; 
            echo"<TR>";
            echo "<td colspan='2'>";
            echo "<h3><b> Thank you for shopping with us</b></h3>";
             echo "</td>";
            echo "</TR>";
            
          } else { 
            echo "<TR>\n<TD colspan='" . ($i+1) . "'>No Results found!</TD></TR>\n"; 
        } 
        echo "</TBODY>\n</TABLE>\n";
        echo "</DIV>\n";
        echo "</form>";
    } else { 
        echo nl2br( sprintf( "Error in running query: %s\n", mysql_error()) ); 
    }
    //mysql_free_result($sql_result);
    linebreak();
    //mysql_close($link);
}
?> 
</body>
<html>
        