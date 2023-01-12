
<?php
//Login
session_start();

if(isset($_POST["btnLogin"]))
{
	$email=$_POST["txtUserEmail"];
    $password=$_POST["txtPassword"]; 
	if(empty($email))
	{
		echo '<script>alert("UserEmail Filed cannot be blank")</script>';
	}
	else
	{
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			echo '<script>alert("Please Enter Valid UserEmail")</script>';
              
		}
		else
		{
				
        //connection
        $con = mysqli_connect("localhost:3306", "dse","12345" );

        //select the database
        mysqli_select_db($con,"dmwcw");

        //perform sql
        $sql = "SELECT * FROM user WHERE  Password='$password' and Email='$email'";
        $ret= mysqli_query($con, $sql);
        $num_row 	= mysqli_num_rows($ret);
	         if ($num_row >0) 
				{		
				    echo '<script>alert("Login Succesful")</script>';	
					header('location:index.html');	
				}
			else
				{
					echo '<script>alert("Invalid Username and Password Combination")</script>';
				}

        //disconnect 
         mysqli_close($con);

	    }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="Fstyle.css">
</head>
<body class="LoginBody">
<table width="100%">
	<tr>
	  <td height="50px"></td>
	</tr>
	<tr>
		<td width="60%">	
		</td>
		<td>
			<h1 class="Loginh1">LOGIN</h1>
			<form action="#" method="post">
			<p class="Loginp">Username</p>
			<input class="logintxtUserEmail" type="email" name="txtUserEmail" placeholder="UserEmail">
			<p>Password</p>
			<input class="logintxtLPassword" type="Password" name="txtPassword" placeholder="Password"><br><br>
			<input  type="checkbox" name="chStatus" class="loginchStatus" value="Yes" checked="checked" size="40pt" ><p class="loginchbox">I am Agree to Terms and Conditions.</p>
			<br>
			<input type="submit" class="loginbtnLogin" name="btnLogin" value="LOGIN"><br><br>
			<a class ="loginForgotten" href="verficationcode.php" target="_blank">Forgotten Password ? Click Here.</a><br><br>
			<a class ="loginSignup" href="Signup.html" target="_blank">Don't Have Account ? Click Here.</a>
		</form>
		</td>
	</tr>
	<tr>
		<td height="100px"></td>
		<td height="100px">Dog Care @National Charity Fund</td>
	</tr>
</table>
</body>
</html>

