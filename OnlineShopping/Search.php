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
   $search=$_POST['search'];
$link = mysql_connect("localhost","parekhp","sundarkand"); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
linebreak();
$db = mysql_select_db("parekhp_OnlineShopping", $link); 
if (!$db) { 
    die('Could not open database: ' . mysql_error());
} 
createDynamicHTMLTable("Search Result", "select Product_ID,Price,Product_Name,Short_Descr,Dtl_Descr,Model,Weight FROM product where Product_Name like '%$search%' group by Product_ID" , $link);

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
        echo "<DIV  bgcolor=blue>\n";
        linebreak( strong( sprintf(" \"%s\"", $table_name) ) );
        echo "<TABLE borderColor=#000000 cellSpacing=0 cellPadding=6 border=2>\n";
        echo "<TBODY>\n";
        $rowrs=mysql_num_rows($sql_result);
        If ($rowrs > 0)
        { 
             $i = 0; 
            echo "<TR vAlign=top bgColor=#00ffff>\n";
            echo "</TR>\n"; 
            $columnCounter = 1;
            while ($rows = mysql_fetch_array($sql_result,MYSQL_ASSOC)) 
            { 
                $name=$rows['Product_Name'];
                $price=$rows['Price'];
                $srtdesc=$rows['Short_Descr'];
                $dtdescr=$rows['Dtl_Descr'];
                $pid=$rows['Product_ID'];
                $_SESSION=$pid;
                $Model=$rows['Model'];
                $Weight=$rows['Weight'];
            ?>
              <TD align='left'width="200" height="200"><font align="left">Name:<?php echo $name; ?><br />Price:<?php echo $price; ?>$</br>Model:<?php echo $Model; ?></br>Weight:<?php echo $Weight; ?><br/><img width="150" height="100" src=images/Products/<?php echo $pid; ?>.jpg /><br/><input type='button' onclick="formSubmit('<?php echo $pid; ?>');" value='Add to Cart'/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="frmsbmt('<?php echo $pid; ?>')" value='More Details'/></font></TD>
        
            <?php
                
                echo "<input type='hidden' value='1'name='a'/>";
                if ($columnCounter % 5 == 0)
                {                 
                    echo "</TR>\n <TR>\n"; 
                }
                $columnCounter = $columnCounter + 1;
           } 
            echo "</TR>\n"; 
            
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
        