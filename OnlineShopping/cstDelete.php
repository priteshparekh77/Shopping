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
</head>
<body>
	<?php
	$uid=$_SESSION['User_ID'];
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
			$query="delete from user where user_id=$uid";
			if (!mysql_query($query))
                    	{
                    		die('Error: ' . mysql_error($con));
                   	 }
			?> <script type="text/javascript">
            			window.location.href = "http://codd.cs.montclair.edu/~parekhp/cgi-bin/OnlineShopping/Index.php"
        	      </script><?php
                   }

?>
</body>
</html>