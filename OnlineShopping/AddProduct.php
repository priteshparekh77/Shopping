<?php
session_start();
if (!isset($_SESSION['User_ID']))
{
    die("You aren't allowed to access this page");
    //echo "Not Authorized";
}	?>
<html>
    <style type="text/css">
	.style1 {
		color: #FF0000;
	}
     </style>
    <body bgcolor=FFFFCC>
    <script name="Javascript">
    function validateform()
    {
    	var pname=document.forms["AddProduct"]["prodname"].value;
    	var price=document.forms["AddProduct"]["price"].value;
    	var srtdescr=document.forms["AddProduct"]["sdscr"].value;
    	var dtldescr=document.forms["AddProduct"]["ddscr"].value;
    	var qty=document.forms["AddProduct"]["qty"].value;
    	var model=document.forms["AddProduct"]["model"].value;
    	var dim=document.forms["AddProduct"]["Dimension"].value;
    	var Weight=document.forms["AddProduct"]["Weight"].value;
    	
	if (pname==null || pname=="")
       		{
       			alert("Product name can not be blank");
       			return false;
       		}   
       	else if (price==null || price=="")
       		{
       			alert("Price can not be blank");
       			return false;
       		}
       		
       	else if (model==null || model=="")
       		{
       			alert("Model can not be blank");
       			return false;
       		} 
       		
       	else if (dim==null || dim=="")
       		{
       			alert("Dimension can not be blank");
       			return false;
       		} 
       		
       	else if (Weight==null || Weight=="")
       		{
       			alert("Weight can not be blank");
       			return false;
       		}  
      	else if (srtdescr==null || srtdescr=="")
       		{
       			alert("Short description name can not be blank");
       			return false;
       		}
	else if (dtldescr==null || dtldescr=="")
       		{
       			alert("Detail description name can not be blank");
       			return false;
       		} 
	else if (qty==null || qty=="")
       		{
       			alert("quantity name can not be blank");
       			return false;
       		} 
    }
    </script>
        <?php
            //echo ".".isset($_POST['submit']);
            if (isset($_POST["ispost"])) 
            { 
               // $con = mysqli_connect("localhost","root","","OnlineShopping");
                //if (mysqli_connect_errno($con)) {
                //echo "Connection fail";
               // }
               $con = @mysql_connect("localhost","root","");
    		if (!$con)
	  	{
	  		die('Could not connect: ' . mysql_error());
	  	} 
                else
                {
                    $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);
                    $category = $_POST["category"];
                    $subcatgory = $_POST["subcategory"];
                    $product = $_POST["prodname"];
                    $price = $_POST["price"];
                    $shortdescr = $_POST["sdscr"];
                    $dtldescr = $_POST["ddscr"];
                    $model = $_POST["model"];
                    $Dimension = $_POST["Dimension"];
                    $Weight = $_POST["Weight"];
                    $qty = $_POST["qty"];
                   $sqlqur = "Insert into product(Category_ID,Sub_CategoryID,Product_Name,Price,Short_Descr,Dtl_Descr,quntity,Model,Dimension,Weight) values ('$category','$subcatgory','$product','$price','$shortdescr','$dtldescr','$qty','$model','$Dimension','$Weight') ";
                    if (!mysql_query($sqlqur))
                    {
                    die('Error: ' . mysql_error($con));
                    }
                    echo "Record added successfully";
                    //mysqli_close($con);?>
        <?php
  //========================code for file uploading start==========
                    $lastquery="select * from product ORDER BY Product_ID desc LIMIT 1";
                    $result=mysql_query($lastquery);
                    if (mysql_num_rows($result) >0)
                    {
                        while ($row = mysql_fetch_array($result))
                         {
                            $productID = $row['Product_ID'];
                        }
                    }
                    //echo $productID;                    
                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $filename  = basename($_FILES['file']['name']);
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $new = $productID.'.'.$extension;
                    //$extension = end($temp);
                    //$new =  md5($filename).'.'.$extension;;
                    if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && ($_FILES["file"]["size"] < 1000000)
                    && in_array($extension, $allowedExts))
                      {
                      if ($_FILES["file"]["error"] > 0)
                        {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                        }
                      else
                        {
                        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                        echo "Type: " . $_FILES["file"]["type"] . "<br>";
                        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                        if (file_exists("upload/" . $_FILES["file"]["name"]))
                          {
                          echo $_FILES["file"]["new"] . " already exists. ";
                          }
                        else
                          {
                          move_uploaded_file($_FILES["file"]["tmp_name"],
                          "images/Products/" . $new);
                          echo "Stored in: " . "images/Products/" . $_FILES["file"]["name"];
                          }
                        }
                      }
                    else
                      {
                      echo "Invalid file";
                      }
   //========================file upload end======================                 
            ?>
                      <?php          
                    }
            }
            else
            {
             ?>
            <form name="AddProduct" action="AddProduct.php?id=1" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
            <input type="hidden" name="ispost" value="1"/>
            <table border="0" width="100%">
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Product Addition Form</u></font></h2>
            </thead>    
            <tr>
                    <td><b>Select Category:</b></td>
                    <td>
                       <?php
                       $con = @mysql_connect("localhost","root","");
                        if (!$con)
                          {
                          die('Could not connect: ' . mysql_error());
                          }
                        $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);
                        $sql = "SELECT * FROM category";
                        $result = mysql_query($sql);
                        echo'<select name="category"  class="textfield">';
                        while($row = mysql_fetch_assoc( $result )) 
                        { 
                            echo '<option value="'.$row["Category_ID"].'">' . $row["Category_Name"] . '</option>';   
                        }
                        echo '</select>';
                        ?>
                    </td>
            </tr>
            <tr>
                    <td><b>Select Sub Category:</b></td>
                    <td>
                        <?php
                       //$db_selected = @mysql_select_db("OnlineShopping",$con);
                        $sql = "SELECT * FROM sub_category";
                        $result = mysql_query($sql);
                        echo'<select name="subcategory"  class="textfield">';
                        while($row = mysql_fetch_assoc( $result )) 
                        { 
                            echo '<option value="'.$row["Sub_CategoryID"].'">' . $row["Sub_Category_Name"] . '</option>';   
                        }
                        echo '</select>';
                        ?>
                    </td>
            </tr>
            <tr>
                    <td><b>Product Name:</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="35"name="prodname"/></td>
            </tr>
            <tr>
                    <td><b>Price :</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="35"name="price"/></td>
            </tr>
            <tr>
                    <td><b>Model :</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="20"name="model"/></td>
            </tr>
            <tr>
                    <td><b>Dimension :</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="25"name="Dimension"/></td>
            </tr>
            <tr>
                    <td><b>Weight :</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="15"name="Weight"/></td>
            </tr>
            <tr>
                    <td><b>Short Description:</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="35"name="sdscr"/></td>
            </tr>
            <tr>
                    <td><b>Detail Description:</b></td>
                    <td><input type="text"style="background-color:white" width="100%" size="35"name="ddscr"/></td>
            </tr>
            <tr>
                    <td><b>Quantity:</b></td>
		    <td><input type="text"style="background-color:white" width="100%" size="35"name="qty"/></td>
            </tr>
            <tr>
                    <td><b>Upload Image:</b></td>
                    <td><input type="file" name="file" id="file"><br></td>
            </tr>
            <tr>
                    <td><input type="submit" name="submit_form"size="30" value="Add Product"/></td>
            </tr>    
        </table>
        </form>
            <?php
            }
            ?> 
    </body>
</html>