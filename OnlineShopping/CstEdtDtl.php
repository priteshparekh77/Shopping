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
<title>Custormer Registration</title>
</head>
    <body bgcolor=FFFFCC>
    <script name="javascript">
    function validateform()
    {
	    var fname =document.forms["customerSignup"]["cstfname"].value;
	    var lname =document.forms["customerSignup"]["cstlname"].value;
	    var username=document.forms["customerSignup"]["cstuname"].value;
	    var passowrd=document.forms["customerSignup"]["cstpwd"].value;
	    var cnfpassword=document.forms["customerSignup"]["cstcpwd"].value;
	    var email=document.forms["customerSignup"]["cstemail"].value;
	    var atpos=email.indexOf("@");			
	    var dotpos=email.lastIndexOf(".");
	    var street=document.forms["customerSignup"]["cststreet"].value;
	    var city=document.forms["customerSignup"]["cstcity"].value;
	    var state=document.forms["customerSignup"]["cststate"].value;
	    var zip=document.forms["customerSignup"]["cstzip"].value;
	    if (fname==null || fname=="")
			  {
				  alert("First name can not be blank");
				  return false;
				}
			else if (lname==null || lname=="")
			  {
				  alert("Last name can not be blank");
				  return false;
			  }
			  
			else if (username==null || username=="")
			  {
				  alert("User name can not be blank");
				  return false;
			  }
			  
			else if (passowrd==null || passowrd=="")
			  {
				  alert("Password can not be blank");
				  return false;
			  }
			  
			else if (cnfpassword==null || cnfpassword=="")
			  {
				  alert("Confirm password can not be blank");
				  return false;
			  }
			else if ( passowrd!= cnfpassword)
			{
				alert("password and confirm password must be same");
				return false;
			}
			else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	  		{
		  		alert("Not a valid e-mail address");
		  		return false;
	  		}   
			else if (street==null || street=="")
			  {
				  alert("Street can not be blank");
				  return false;
			  }
			  else if (city==null || city=="")
			  {
				  alert("City can not be blank");
				  return false;
			  }
			  else if (state==null || state=="")
			  {
				  alert("State can not be blank");
				  return false;
			  }
			  else if (zip==null || zip=="")
			  {
				  alert("Zip code can not Zblank");
				  return false;
			  }
	}	                                 
    </script>
<?php
             $uid=$_SESSION['User_ID'];
            //echo ".".isset($_POST['submit']);
            if (isset($_POST["ispost"])) 
            { 
                
                /*$con = mysqli_connect("localhost","root","","OnlineShopping");
                if (mysqli_connect_errno($con)) {
                echo "Connection fail";
                }*/
                $con = mysql_connect("localhost","parekhp","sundarkand");
    		if (!$con)
	 	 {
	  		die('Could not connect: ' . mysql_error());
	 	 }
                else
                {
                    $db_selected = mysql_select_db("parekhp_OnlineShopping",$con);
                    $fname = $_POST["cstfname"];
                    $lname = $_POST["cstlname"];
                    $username = $_POST["cstuname"];
                    $password = $_POST["cstpwd"];
                    $cnfpassword = $_POST["cstcpwd"];
                    $street = $_POST["cststreet"];
                    $state = $_POST["cststate"];
                    $zip = $_POST["cstzip"];
                    $email = $_POST["cstemail"];
                    $city = $_POST["cstcity"];
                    //$sqlqur = "Insert into user(User_Name,User_TypeID,First_Name,Last_Name,Confirm_Password,Street,City,State,Zip,Password,Email_ID) values ('$username','3','$fname','$lname','$cnfpassword','$street','$city','$state','$zip','$password','$email') ";
                    $sqlqur="update user set First_Name='$fname',Last_Name='$lname' where user_id=$uid";
                    if (!mysql_query($sqlqur))
                    {
                    die('Error: ' . mysql_error($con));
                    }
                    echo "Details Updated successfully";
                    ?>
                   
        	      <?php
                    mysql_close($con);
                }
            }
            else
            {
             ?> 
            <?php
            	 $con = mysql_connect("localhost","parekhp","sundarkand");
            	 $uid=$_SESSION['User_ID'];
    		if (!$con)
	 	 {
	  		die('Could not connect: ' . mysql_error());
	 	 }
                else
                {
                    $db_selected = mysql_select_db("parekhp_OnlineShopping",$con);
                    $qur = "select * from user where user_id=$uid";
                     $result=mysql_query($qur);
        		$rowrs=mysql_num_rows($result);
       		 If ($rowrs >0)
        		{
           		while ($row = mysql_fetch_array($result))
            			{
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
                    }
                    }
                 }   
                    
                    
                    
                    
                    
            ?> 
        <form name="customerSignup" action="CstEdtDtl.php" method="post" onsubmit="return validateform()">
            <input type="hidden" name="ispost" value="1"/>
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Update your information below:</u></font></h2>
            </thead> 
            <table border="0">
                    <tr>
                        <td ><font color="black"><b>First Name:</b></font></td>
                        <td><input type="text" style="background-color:white" width="100%" size="35" name="cstfname"/ value=<?php echo $fname?>></td>
                    </tr>
                    <tr>
                        <td><b>Last Name:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="35" name="cstlname" value=<?php echo $a?>></td>
                    </tr>
                    <tr>
                        <td><b>User Name:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="29" name="cstuname"/value=<?php echo $b?>></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td><input type="password"style="background-color:white" width="100%" size="25" name="cstpwd"</td>
                    </tr>
                    <tr>
                        <td><b>Confirm Password:</b></td>
                        <td><input type="password"style="background-color:white" width="100%" size="25" name="cstcpwd"</td>
                    </tr>
                    <tr>
                        <td><b>Email ID:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="23" name="cstemail"value=<?php echo $e?>></td>
                    </tr>
                    <tr>
                        <td><b>Street:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="25" name="cststreet"value=<?php echo $f?>></td>
                    </tr>
                    <tr>
                        <td><b>City:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="17" name="cstcity"value=<?php echo $g?>></td>
                    </tr>
                    <tr>
                        <td><b>State:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="15" name="cststate"value=<?php echo $h?>></td>
                    </tr>
                    <tr>
                        <td><b>Zip:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="15" name="cstzip"value=<?php echo $i?>></td>
                    </tr> 
                    <tr>
                        <td colspan="2"><button><b>Update</b></button></td>
                   
                    </tr>
              </table>

        </form>
		<?php }?>
    </body>
</html>
        