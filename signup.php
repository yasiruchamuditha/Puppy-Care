<?php
//Signup

session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//


if(isset($_POST["btnsubmit"]))
{
    $mail = new PHPMailer(true);

	$email=$_POST["txtUserEmail"];
    $name=$_POST["txtName"]; 
    $ContactNo=$_POST["txtContactNo"];
    $address=$_POST["txtaddress"]; 
    $Password=$_POST["txtPassword"];
    $ConfirmPassword=$_POST["txtConfirmPassword"]; 


	if(empty($email))
	{
		echo '<script>alert("UserEmail Filed cannot be blank")</script>';
	}
	else
	{
		if($Password==$ConfirmPassword)
		{
          //connection
       $con = mysqli_connect("localhost:3306", "dse","12345" );

        //select the database 
       mysqli_select_db($con,"dmwcw");

     //perform sql
     $sql = "INSERT INTO user (	Email,Name,ContactNo,Address,Password) VALUES ('$email','$name',$ContactNo,'$address','$Password')";

     $ret= mysqli_query($con, $sql);
     echo '<script>alert("Successfuly Registered")</script>';
     

//email 

//
 try {
       
        //Server settings
        //$mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'puppycarelk@gmail.com';                     //SMTP username
        $mail->Password   = 'nzgoiemxtrzqyhnn';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('puppycarelk@gmail.com', 'Puppy Care');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
       // $mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);       
        $verification_code=substr(number_format(time()*rand(),0,'',''), 0,6) ;                          //Set email format to HTML
        $mail->Subject = 'Account Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Welcome to Puppycare Family</div><p>Hi,<br>Dear User,<br>Your Puppycare Account is successfully Registered on '.$email.'</p><p>please <a href="mailto:puppycarelk@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
            <p>Thank You.<br>Sincerely yours,<br>The puppycare Team</p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

         } 
    catch (Exception $e)
     {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }

//
     header('location:index.html');
     //disconnect 
      mysqli_close($con);

		}
		else
		{
			echo '<script>alert("Please Enter correct Password")</script>';
		}
	}
}


?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="Fstylesignup.css">
</head>
<body class="signupbody">
<table>
	<tr>
		<td width="60%">
			
		</td>
	   <td height="600px">
	   	<h1>Registration</h1>
	   	 <form name="frmsignup" method="post" action="#" enctype="multipart/form-data">
		<p>Email</p>
		<input class="RegInput" type="text" name="txtUserEmail" placeholder="User Email">
		<p>Name</p>
		<input class="RegInput"  type="text" name="txtName" placeholder="Name">
		<p>Contact No</p>
		<input class="RegInput"  type="tele" name="txtContactNo" placeholder="Contact No">
		<p>Address</p>
		<textarea class="RegInput"  name="txtaddress" placeholder="Address"></textarea><br>
		<p>Password</p>
		<input class="RegInput"  type="text" name="txtPassword" placeholder="Password">
		<p>Confirm Password</p>
		<input class="RegInput"  type="text" name="txtConfirmPassword" placeholder="Confirm Password">
		<input type="submit" class="signupsubmit" name="btnsubmit" value="SIGNUP"><br><br>
	    </form>
	   </td>
	</tr>
</table>
	   
</body>
</html>