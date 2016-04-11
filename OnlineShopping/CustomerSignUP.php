<?php
session_start();

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
                    $password = md5($password);
                    $sqlqur = "Insert into user(User_Name,User_TypeID,First_Name,Last_Name,Confirm_Password,Street,City,State,Zip,Password,Email_ID) values ('$username','3','$fname','$lname','','$street','$city','$state','$zip','$password','$email') ";
                    
                    if (!mysql_query($sqlqur))
                    {
                    die('Error: ' . mysql_error($con));
                    }
                    echo "1 record added";
                    ?>
                    <script type="text/javascript">
            			window.location.href = "http://codd.cs.montclair.edu/~parekhp/cgi-bin/OnlineShopping/Index.php"
        	      </script>
        	      <?php
                    mysql_close($con);
                }
            }
            else
            {
             ?> 
        <form name="customerSignup" action="CustomerSignUP.php" method="post" onsubmit="return validateform()">
            <input type="hidden" name="ispost" value="1"/>
            <thead>
            <h2 align="left"><font  bgcolor="#ADD8E6"><u>Customer Registration Form</u></font></h2>
            </thead> 
            <table border="0">
                    <tr>
                        <td ><font color="black"><b>First Name:</b></font></td>
                        <td><input type="text" style="background-color:white" width="100%" size="35" name="cstfname"/></td>
                    </tr>
                    <tr>
                        <td><b>Last Name:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="35" name="cstlname"/></td>
                    </tr>
                    <tr>
                        <td><b>User Name:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="29" name="cstuname"/></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td><input type="password"style="background-color:white" width="100%" size="25" name="cstpwd"/></td>
                    </tr>
                    <tr>
                        <td><b>Confirm Password:</b></td>
                        <td><input type="password"style="background-color:white" width="100%" size="25" name="cstcpwd"/></td>
                    </tr>
                    <tr>
                        <td><b>Email ID:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="23" name="cstemail"/></td>
                    </tr>
                    <tr>
                        <td><b>Street:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="25" name="cststreet"/></td>
                    </tr>
                    <tr>
                        <td><b>City:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="17" name="cstcity"/></td>
                    </tr>
                    <tr>
                        <td><b>State:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="15" name="cststate"/></td>
                    </tr>
                    <tr>
                        <td><b>Zip:</b></td>
                        <td><input type="text"style="background-color:white" width="100%" size="15" name="cstzip"/></td>
                    </tr> 
                    <tr>
                        <td colspan="2"><button><b>Register</b></button></td>
                   
                    </tr>
              </table>

        </form>
		<?php }?>
    </body>
</html>
        