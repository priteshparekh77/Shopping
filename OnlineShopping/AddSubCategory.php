<?php
session_start();
if (!isset($_SESSION['User_ID']))
{
    die("You aren't allowed to access this page");
    //echo "Not Authorized";
}
?>
<html>
    <style type="text/css">
	.style1 {
		color: #FF0000;
	}
     </style>
    <body bgcolor=FFFFCC>
       <script name="javascript">
       	function validateform()
       	{
       		var subcat=document.forms["AddSubCategory"]["subcatname"].value;
       		if (subcat==null || subcat=="")
       		{
       			alert("Sub category can not be blank");
       			return false;
       		}
       	}
       </script>
        <?php
            //echo ".".isset($_POST['submit']);
            if (isset($_POST["ispost"])) 
            { 
                
 		$con = @mysql_connect("localhost","root","");
    		if (!$con)
	  	{
	  		die('Could not connect: ' . mysql_error());
	  	}              
                //$con = mysqli_connect("localhost","root","","OnlineShopping");
                //if (mysqli_connect_errno($con)) {
                //echo "Connection fail";
                //}
                else
                {
                     $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);
                    $subcatname = $_POST["subcatname"];
                    $categoryid = $_POST["category"];
                   $sqlqur2 = "Insert into sub_category(Category_ID,Sub_Category_Name) values ('$categoryid','$subcatname')";
                    if (!mysql_query($sqlqur2))
                    {
                    die('Error: ' . mysql_error($con));
                    }
                    echo "Record added successfully";
                    mysql_close($con);
                }
            }
            else
            {
             ?>
            <form name="AddSubCategory" action="AddSubCategory.php?id=1" method="post" onsubmit="return validateform()">
            <input type="hidden" name="ispost" value="1"/>
            <table border="0" width="100%">
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Sub Category Addition Form</u></font></h2>
            </thead>    
            <tr>
                <td><b>Select Category</b></td>
                <td>
                    <?php
                       $con = @mysql_connect("localhost","root","");
                        if (!$con)
                        {
                          die('Could not connect: ' . mysql_error());
                        }
                        $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);
                        $sql5 = "SELECT * FROM category";
                        $result3 = mysql_query($sql5);
                        echo'<select name="category"  class="textfield">';
                        while($row = mysql_fetch_assoc( $result3 )) 
                        { 
                            echo '<option value="'.$row["Category_ID"].'">' . $row["Category_Name"] . '</option>';   
                        }
                        echo '</select>';
                        ?>
                </td>
            </tr>
            <tr>
                <td><b>Sub Category Name :</b></td>
                <td><input type="text"style="background-color:white" width="100%" size="35"name="subcatname"/></td>
            </tr>
            <tr>
                    <td><input type="submit" name="submit_form"size="30" value="Add Sub Category"/></td>
            </tr>    
        </table>
        </form>
            <?php
            }
            ?> 
    </body>
</html>