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
<head>
<title> Add Category </title>
</head>
    <style type="text/css">
	.style1 {
		color: #FF0000;
	}
     </style>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
    <body bgcolor=FFFFCC>
    <script name="Javascript">
    function validateform()
    {
    	var catname=document.forms["AddCategory"]["catname"].value;
    	if (catname==null || catname=="")
    	{
    		alert("Please add category name");
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
                    $catname = $_POST["catname"];
                   // $date = $_POST["date"];
                    $sqlqur1 = "Insert into category(Category_Name) values ('$catname') ";
                    echo $sqlqur;
                    if (!mysql_query($connection,$sqlqur1))
                    {
                    die('Error: ' . mysqli_error($connection));
                    }
                    echo "Record added successfully";
                 
                }
                   mysql_close($con);
            }
            else
            {
             ?>
            <form name="AddCategory" action="AddCategory.php?id=1" method="post" onsubmit="return validateform()">
            <input type="hidden" name="ispost" value="1"/>
            <table border="0" width="100%">
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Category Addition Form</u></font></h2>
            </thead>    
            <tr>
                    <td><b>Category Name :</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="35"name="catname"/></td>
                    
            </tr>
           <!--- <tr>
                <td>Date</td>
                <td><input type="text" id="datepicker" name="date"></td>
            </tr>--->
            <tr>
                    <td><input type="submit" name="submit_form"size="30" value="Add Category"/></td>
	    </tr>    
	        </table>
	        </form>
            <?php
            }
               //mysql_close($con);
            ?> 
    </body>
</html>