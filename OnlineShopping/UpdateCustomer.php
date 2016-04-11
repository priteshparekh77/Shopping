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
                document.getElementById("frm1").action="UpdateCst.php?prod_id="+ID;
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
	createDynamicHTMLTable("User Details", "SELECT * from user where User_TypeID <> 1", $link);
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
	   // echo $sql_query;
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
	          echo  "<td>First Name</td>";
	         echo  "<td>Last Name</td>";
	         echo  "<td>User Name</td>";
	         echo  "<td>Password</td>";
	         echo  "<td>Confirm Password</td>";
	         echo  "<td>Email</td>";
	         echo  "<td>Street</td>";
	         echo  "<td>City</td>";
	         echo  "<td>State</td>";
	         echo  "<td>Zip</td>";
	         echo  "<td>Update Info</td>";
	         	           
	           /* while ($i < mysql_num_fields($sql_result)) 
	            { 
	                echo "<TH>"."Update Subcategory below". "</TH>\n"; 
	                $i++; 
	            }*/ 
	            echo "</TR>\n";
	            while ($row = mysql_fetch_array($sql_result,MYSQL_ASSOC)) 
	            { 
	                echo "<TR>\n"; 
	                /*foreach ($rows as $data) 
	                { 
	                    echo "<TD align='center'>". $data . "</TD>\n"; 
	                } */
	                $fname=$row['First_Name'];
                        $a=$row['Last_Name'];
                        $b=$row['User_Name'];
                        $c=$row['Password'];
                        $d=$row['Confirm_Password'];
                        $e=$row['Email_ID'];
                        $f=$row['Street'];
                        $g=$row['City'];
                        $h=$row['State'];
                        $i=$row['Zip'];
                        $uid=$row['user_id'];
	                //echo $subcatid;
	               	?>
	               	<td width=35%><?php echo $fname;?></td>
                        <td width=35%><?php echo $a;?></td>
                        <td width=35%><?php echo $b;?></td>
                        <td width=35%><?php echo $c;?></td>
                        <td width=35%><?php echo $d;?></td>
                        <td width=35%><?php echo $e;?></td>
                        <td width=35%><?php echo $f;?></td>
                        <td width=35%><?php echo $g;?></td>
                        <td width=35%><?php echo $h;?></td>
                        <td width=35%><?php echo $i;?></td>
	               	
	               	<td align=center><input type="button" onclick="frmsbmt('<?php echo $uid; ?>')" value='Update'/></td>
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