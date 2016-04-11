<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login page</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />
  

</head>
<body>
    <script name="javascript">
    function validateForm()
{
var x=document.forms["loginform"]["username"].value;
var y=document.forms["loginform"]["password"].value;
	if (x==null || x=="")
	  {
		  alert("Username or Password can not be blank");
		  return false;
		}
	else if (x==null || x=="" && y==null || y=="" )
	  {
		  alert("Username or Password can not be blank");
		  return false;
	  }
	else if (y==null || y=="")
	  {
		  alert("Username or Password can not be blank");
		  return false;
	  }
}
        </script>

    <div align="center" >
    <div id="login-box" style="background-color:#FFFFE7">
    <table align="left ">
        <tr>
            <td align="left"><b><font size="6"color="#29964A">Login Here </font></b></td>
            <td align="right"><input type="image" sRC="images/LoginImage.jpg"/></td>
        </tr>
    </table>
        <form name="loginform" method="post" onsubmit="return validateForm()"Action="LoginCheck.php"><br/>
    <table cellpadding="4" cellspacing="4" align="left">
        <tr>
            <td align=left><b><font color="#29964A">User Name : </FONT></b></td>
            <td><input  type="text" name="username"/></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td align=left><b><font color="#29964A">Password : </FONT></b></td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr height="60">
            <td align="left"><b><font size="4"color="#29964A"><button>Sign In</font></b></td>
            <td align="right"><b><font size="4"color="#29964A"> <a href="CustomerSignUP.php">Signup Here</a></font></b></td>
        </tr>
     </table>
    </form>
        
        </div>
</div>

</body>
</html>