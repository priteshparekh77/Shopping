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
                document.getElementById("frm1").action="UpdateSubCat.php?prod_id="+ID;
                document.getElementById("frm1").submit();
            }
            </script>
    
</script>
<body>
<?php
	$UID=$_SESSION['User_ID'];
	$link = mysql_connect("localhost","parekhp","sundarkand"); 
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	echo $link;
	linebreak();
	$db = mysql_select_db("parekhp_OnlineShopping", $link); 
	if (!$db) { 
	    die('Could not open database: ' . mysql_error());
	} 
	createDynamicHTMLTable("Sub_Category", "SELECT category.Category_ID, category.Category_Name, sub_category.Sub_CategoryID, sub_category.Sub_Category_Name FROM category INNER JOIN sub_category ON category.Category_ID = sub_category.Category_ID", $link);
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
	      echo "<form method=post id='frm1'>";   
	     // echo "<input type='hidden' name='ispost' value='1'/>";   
	        echo "<DIV>\n";
	        linebreak( strong( sprintf("Update \"%s\"", $table_name) ) );
	        echo "<TABLE borderColor=#000000 cellSpacing=0 cellPadding=6 border=2>\n";
	        echo "<TBODY>\n";
	        $rowcount=mysql_num_rows($sql_result);
	        if ($rowcount >0) 
	        { 
	            $i = 0; 
	           echo "<TR vAlign=top bgColor=#00ffff>\n";
	          echo  "<td>Category Name</td>";
	         echo  "<td>Sub Category Name</td>";
	         echo  "<td>Update Info</td>";
	           
	           /* while ($i < mysql_num_fields($sql_result)) 
	            { 
	                echo "<TH>"."Update Subcategory below". "</TH>\n"; 
	                $i++; 
	            }*/ 
	            echo "</TR>\n";
	            while ($rows = mysql_fetch_array($sql_result,MYSQL_ASSOC)) 
	            { 
	                echo "<TR>\n"; 
	                /*foreach ($rows as $data) 
	                { 
	                    echo "<TD align='center'>". $data . "</TD>\n"; 
	                } */
	                $subname=$rows['Sub_Category_Name'];
	                $catid=$rows['Category_ID'];
	                $catname=$rows['Category_Name'];
	                $subcatid=$rows['Sub_CategoryID'];
	                //echo $subcatid;
	               	?>
	               	<td width=35%><?php echo $catname;?></td>
	               	<td width=35%><?php echo $subname;?></td>
	               	<td align=center><input type="button" onclick="frmsbmt('<?php echo $subcatid; ?>')" value='Update'/></td>
	               	<?php
	                echo "</TR>\n"; 
	            } 
	        } 
	        else 
	        { 
	            echo "<TR>\n<TD colspan='" . ($i+1) . "'>Your cart is empty</TD></TR>\n"; 
	        } 
	        
	        echo "</TBODY>\n</TABLE>\n";
	        echo "</DIV>\n";
	         echo "</form>";
	    } 
	    else
	    { 
	        echo nl2br( sprintf( "Error in running query: %s\n", mysql_error()) ); 
	    }
	    mysql_free_result($sql_result);
	    //linebreak();
	  
	}

?>
     
    </body>
</html>