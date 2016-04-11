<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login Check</title>
</head>
<body>    
<?php
    session_start();	
    $con = @mysql_connect("localhost","root","");
	//$con=mysqli_connect("localhost","parekhp","sundarkand","parekhp_OnlineShopping");
    if (!$con)
	 {
		die('Could not connect: ' . mysql_error());
	}	  
    else
    {
//		include 'database.php';
	 $db_selected = @mysql_select_db("parekhp_OnlineShopping",$con);
        $UserName = $_POST["username"];
        $qur = "select * from user where User_Name = '".$UserName."' ";
       // echo $qur;
        $result=mysql_query($qur);
        $rowrs=mysql_num_rows($result);
        If ($rowrs >0)
        {
           while ($row = mysql_fetch_array($result))
            {
                $a = $row['User_Name'];
                $b = $row['Password'];
                $c = $row['User_ID'];
                if($_POST["username"] == $a && ($_POST["password"]) == $b)
                    {
                    //session_start();
                          // store session data
                        $_SESSION['User_ID']=$c;
						
                      if ($row['User_TypeID'] == 1)
                      {
					   header("location:http://localhost/OnlineShopping/OwnerHomeScreen.php");
			          }
                      else if ($row['User_TypeID'] == 2)
                      {
					  header("location: http://localhost/OnlineShopping/EmployeeHomeScreen.php");
					  }
                      else if ($row['User_TypeID'] == 3)
                      {
						    header("location: http://localhost/OnlineShopping/CustomerHomeScreen.php");
                      }
                   }
                else
                {
				echo $b;
				echo "access denied";
                }
	}
}
          ELSE
            {
                echo "Username or Password not found";
            }}
             
    //  session_destroy();
       mysql_close($con);
?>
</body>
</html>