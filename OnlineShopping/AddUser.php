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
    <style type="text/css">
	.style1 {
		color: #FF0000;
	}
     </style>
    <body bgcolor="FFFFCC">
<script name="javascript">
    function validateForm()
    {
	var fname=document.forms["Adduser"]["fname"].value;
	var lname=document.forms["Adduser"]["lname"].value;
	var username=document.forms["Adduser"]["username"].value;
	var passowrd=document.forms["Adduser"]["password"].value;
	var cnfpassword=document.forms["Adduser"]["cnfpwd"].value;
	var street=document.forms["Adduser"]["street"].value;
	var city=document.forms["Adduser"]["city"].value;
	var state=document.forms["Adduser"]["state"].value;
	var zip=document.forms["Adduser"]["zip"].value;
	var email=document.forms["Adduser"]["email"].value;
	var atpos=email.indexOf("@");			
	var dotpos=email.lastIndexOf(".");
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
		else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  		{
	  		alert("Not a valid e-mail address");
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
                //}
                 $con = @mysql_connect("localhost","root","");
    		if (!$con)
	 	 {
	  		die('Could not connect: ' . mysql_error());
	  	}
                else
                {
                    $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);
                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $Conf_Password = $_POST["cnfpwd"];
                    $street = $_POST["street"];
                    $state = $_POST["state"];
                    $zip = $_POST["zip"];
                    $email = $_POST["email"];
                    $city = $_POST["city"];
                    $joindate = $_POST["jdate"];
                    $salary = $_POST["salary"];
                    $usertype = $_POST["usertype"];
                    //echo $usertype;
                    //echo $usertype;
                    $sqlqur = "Insert into user(User_Name,User_TypeID,First_Name,Last_Name,Confirm_Password,Street,City,State,Zip,Password,Email_ID) values ('$username','$usertype','$fname','$lname','$Conf_Password','$street','$city','$state','$zip','$password','$email') ";
                    //mysqli_query($con,"Insert into user(First_Name,Last_Name,User_Name,Password,SSN,Street,City,State,Zip,Email_ID,User_TypeID) values ('$fname','$lname','$username','$password','$ssn','$street','$state','$zip','$email','$usertype') ");
                    if (!mysql_query($sqlqur))
                    {
                    die('Error: ' . mysql_error($con));
                    }
                    echo "1 record added";
                    mysql_close($con);
                }
            }
            else
            {
             ?>
 
     
             <form name="Adduser" action="AddUser.php?id=1" method="post" onsubmit="return validateForm()">
              <input type="hidden" name="ispost" value="1"/>
            <table border="0" width="100%">
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Employee Addition Form</u></font></h2>
            </thead>    
            <tr>
                    <td colspan="1"><b>First Name:</b></td>
                    <td colspan="1"><input type="text"style="background-color:white" width="100%" size="35"name="fname"/></td>
                    <td colspan="1" align="left"><b>Last Name:</b></td>
                    <td colspan="1"><input type="text" style="background-color:white"name="lname"size="35"/></td>                    
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                    <td colspan="1"><b>User Name:</b></td>
                    <td colspan="1"><input style="background-color:white" size="30"type="text" name="username"/></td>
                    <td colspan="1" ><b>Password:</b></td>
                    <td colspan="1"><input size="30" style="background-color:white" type="password" name="password"/></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                    <td colspan="1"><b>Confirm Password:</b></td>
                    <td colspan="1"><input size="25" style="background-color:white" type="password" name="cnfpwd"/></td>
                    <td colspan="1"><b>Street</b></td>
                    <td colspan="1"><input  size="35"style="background-color:white" type="text" name="street"/></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                    <td colspan="1"><b>City</b></td>
                    <td colspan="1"><input size="25" style="background-color:white" type="text" name="city"/></td>
                    <td colspan="1"><b>State</b></td>
                    <td colspan="1"><input  size="25"style="background-color:white" type="text" name="state"/></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                    <td colspan="1"><b>Zip Code</b></td>
                    <td colspan="1"><input size="20"style="background-color:white" type="text" name="zip"/></td>
                    <td colspan="1"><b>Email ID</b></td>
                    <td colspan="1"><input size="35" style="background-color:white" type="text" name="email"/></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <!---<tr>
                    <td colspan="1"><b>Join Date</b></td>
                    <td colspan="1"><input size="20"style="background-color:white" type="text" name="jdate"/></td>
                    <td colspan="1"><b>Salary</b></td>
                    <td colspan="1"><input size="25" style="background-color:white" type="text" name="salary"/></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>--->
            <tr>
                    <td colspan="1"><b>User Type</b></td>
                    <td>
                        <select name="usertype">
                        <option value="2">Employee</option>
                        <option value="3">Customer</option>
                        </select>
                    </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr>
                    <td colspan="2"><input type="submit" name="submit_form"size="30" value="add"/></td>
            </tr>    
        </table>
        </form>
                 <?php
            }
            ?>
            
               
    </body>
</html>