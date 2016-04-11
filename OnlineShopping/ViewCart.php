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
$UID=$_SESSION['User_ID'];
$link = mysql_connect("localhost","parekhp","sundarkand"); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
linebreak();
$db = mysql_select_db("parekhp_OnlineShopping", $link); 
if (!$db) { 
    die('Could not open database: ' . mysql_error());
} 
createDynamicHTMLTable("your Cart", "SELECT Product_Name as Product,price as Price,description as Dersciption,cst_quntity as Quantity,model as Model,weight as Weight,dimension as Dimension, ttlamt as TotalAmount FROM shoppingcart where user_id=$UID", $link);

mysql_close($link);
function strong($text)
{
    return "<STRONG>$text</STRONG>\n";
}
function linebreak($text="\n") {
    echo nl2br( $text );
}
function createDynamicHTMLTable($table_name, $sql_query, $link)
{
    $sql_result = mysql_query($sql_query, $link); 
    //echo $sql_query;
    if (($sql_result)||(mysql_errno == 0)) 
    {        
        echo "<DIV>\n";
        linebreak( strong( sprintf("Table: \"%s\"", $table_name) ) );
        echo "<TABLE borderColor=#000000 cellSpacing=0 cellPadding=6 border=2>\n";
        echo "<TBODY>\n";
        $rowcount=mysql_num_rows($sql_result);
        if ($rowcount >0) 
        { 
            $i = 0; 
            echo "<TR vAlign=top bgColor=#00ffff>\n";
            while ($i < mysql_num_fields($sql_result)) 
            { 
                echo "<TH>". mysql_field_name($sql_result, $i) . "</TH>\n"; 
                $i++; 
            } 
            echo "</TR>\n"; 
            while ($rows = mysql_fetch_array($sql_result,MYSQL_ASSOC)) 
            { 
                echo "<TR>\n"; 
                foreach ($rows as $data) 
                { 
                    echo "<TD align='center'>". $data . "</TD>\n"; 
                } 
                echo "</TR>\n"; 
            } 
        } 
        else 
        { 
            echo "<TR>\n<TD colspan='" . ($i+1) . "'>Your cart is empty</TD></TR>\n"; 
        } 
        
        echo "</TBODY>\n</TABLE>\n";
        echo "</DIV>\n";
    } 
    else
    { 
        echo nl2br( sprintf( "Error in running query: %s\n", mysql_error()) ); 
    }
    mysql_free_result($sql_result);
    linebreak();
   if (isset($_POST["ispost"])) 
    { 
       $UID=$_SESSION['User_ID'];
       $dquery="delete from shoppingcart where user_id=$UID limit 3";
       echo $dquery;
       if (!mysql_query($dquery))
                    {
                    die('Error: ' . mysql_error($link));
                    }
                    ?>
                    <script name="javascript">
                        window.location.href="ViewCart.php"
                        </script>
    <?php
                    mysql_close($con);
       
    }
}
?>
   <tr>
   <td><form action="ViewCart.php" method="post">
        <input type="hidden" name="ispost" value="1"/>
        <input type="submit" value="Empty Cart" id="" /><br>
    </form></td>
   <td> <form action="order.php" method="post">
        <input type="submit" value="Place order"/>
    </form></td></tr>
    </table>        
    </body>
</html>