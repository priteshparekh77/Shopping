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

//echo $pid;
if(!isset($_POST["ispost"])) 
{
	$sid=$_GET['prod_id'];
	$con = mysql_connect("localhost","parekhp","sundarkand");
	    if (!$con)
		  {
		  	die('Could not connect: ' . mysql_error());
		  }	  
	    else
	    {
	        $db_selected = mysql_select_db("parekhp_OnlineShopping",$con);
	        $UserName = $_POST["username"];
	        $qur = "SELECT category.Category_ID, category.Category_Name, sub_category.Sub_CategoryID, sub_category.Sub_Category_Name FROM category INNER JOIN sub_category ON category.Category_ID = sub_category.Category_ID where sub_category.Sub_CategoryID=$sid";
	        echo $qur;
	        $result=mysql_query($qur);
	        $rowrs=mysql_num_rows($result);
	        If ($rowrs >0)
	        {
	           while ($row = mysql_fetch_array($result))
	            {
			$subcatname=$row['Sub_Category_Name'];
			$catname=$row['Category_Name'];
		
	     	}
	     }mysql_close($con);
	     }
	     
	      ?>
            <form name="AddSubCategory" action="UpdateSubCat.php?id=1" method="post" onsubmit="return validateform()">
            <input type="hidden" name="ispost" value="1"/>
            <input type="hidden" name="sid" value=<?php echo $sid;?>>
            <table border="0" width="100%">
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Sub Category Addition Form</u></font></h2>
            </thead>    
            <tr>
                <td><b>Category</b></td>
                <td><?php echo $catname?></td>
            </tr><tr>
                <td><b>Sub Category Name :</b></td>
                <td><input type="text"style="background-color:white" width="100%" size="35"name="subcatname" value=<?php echo $subcatname;?>></td>
            </tr>
            <tr>
                    <td><input type="submit" name="submit_form"size="30" value="Update Sub Category"/></td>
            </tr>    
        </table>
        </form>
            <?php
 }
 else
 {    
 ?>    

        <?php
            //echo ".".isset($_POST['submit']);
            if (isset($_POST["ispost"])) 
            { 
                
 		$con = mysql_connect("localhost","parekhp","sundarkand");
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
                     $db_selected = mysql_select_db("parekhp_OnlineShopping",$con);
                    $subcatname = $_POST["subcatname"];
                    $categoryid = $_POST["category"];
                    $sid=$_POST["sid"];
                   $sqlqur2 = "Update sub_category set Sub_Category_Name='$subcatname' where Sub_CategoryID=$sid";
                 //echo $sqlqur2;
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
            
            }}
            ?> 
    </body>
</html>
