<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="forgot.css">
</head>
<body>
<div class="container">
	<table>
		<tr>
			<td width="20%"></td>
			<td>
			<form name="frmSendCode" method="post" action="#">
                <h2>Forgot Password</h2>
                <p>Enter UserEmail Address</p>
                <input class="control" type="email" name="txtemail" placeholder="UserEmail Address" ><br>
                <input class="button" type="submit" name="btnsubmit" value="Continue">
            </form>
			</td>
		</tr>
	</table>
</div>          
</body>
</html>

<?php
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
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
	$email=$_POST["txtemail"];
	//create a new PHPMailer object:
    $mail = new PHPMailer(true);
    
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
        $mail->Subject = 'Account Verification';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Account Verification Code</div><p>Hi,<br>Dear User,<br>We received a request to reset the password on your puppycare Account.Your Verification Code is: <b>'.$verification_code.'</b><br>Enter this code to complete the reset of account Password.This code will expire in 24 hours.If you did not request this code, someone probably gave your email address by mistake. You can safely ignore this email.</p><p>please <a href="mailto:puppycarelk@gmail.com"><b><u>contact</u></b></a> us for more Details. </p><p>Thanks for helping us keep your account secure.<br>Sincerely yours,<br>The puppycare Team</p><br>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';

        //Insert Email Details To Database
        //connection
        $con = mysqli_connect("localhost:3306", "dse","12345" );

        //select the database 
        mysqli_select_db($con,"dmwcw");

        //perform sql
        $sql = "INSERT INTO passwordupdates(UserEmail,VerificationCode) VALUES ('$email','$verification_code')";
 
        $ret= mysqli_query($con, $sql);
     
        header('location:verifyaccount.php');
   

     //disconnect 
      mysqli_close($con);


        //echo '<script>alert("Message has been sent")</script>';
    } 
    catch (Exception $e)
     {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
   
}


?>
