<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="verifyaccount.css">
</head>
<body>
<div class="container">
	<table>
		<tr>
			<td width="20%"></td>
			<td>
			<form name="frmverifyCode" method="post" action="#">
                <h2>Verify Your Account</h2>
                <p>Verification code</p>
                <input class="control" type="text" name="txtcode" placeholder="Enter Verification Code" ><br>
                <input class="button" type="submit" name="btnsubmit" value="Continue">
            </form>
			</td>
		</tr>
	</table>
</div>          
</body>
</html>

<?php
if(isset($_POST["btnsubmit"]))
{
	$code=$_POST["txtcode"];

	 //connection
        $con = mysqli_connect("localhost:3306", "dse","12345" );

        //select the database
        mysqli_select_db($con,"dmwcw");

        //perform sql
        $sql = "SELECT * FROM passwordupdates WHERE  VerificationCode='$code' ";
        $ret= mysqli_query($con, $sql);
        $num_row 	= mysqli_num_rows($ret);
	         if ($num_row >0) 
				{		
				    //echo '<script>alert("Succesful")</script>';	
					header('location:updatePassword.php');	
				}
			else
				{
					echo '<script>alert("Invalid Verification Code")</script>';
				}

        //disconnect 
         mysqli_close($con);
}
?>