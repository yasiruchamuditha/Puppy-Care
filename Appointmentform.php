<?php
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
//Appointment

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

if(isset($_POST["btnAsubmit"]))
{
    //create a new PHPMailer object:
    $mail = new PHPMailer(true);
    //

	$breed=$_POST["txtbreed"];
    $name=$_POST["txtPName"]; 
    $age=$_POST["txtage"];
    $ContactNo=$_POST["txtContactNo"]; 
    $email=$_POST["txtEmail"];
   

	if(empty($email))
	{
		echo '<script>alert("UserEmail Filed cannot be blank")</script>';
	}
	else
	{
		  //connection
     $con = mysqli_connect("localhost:3306", "dse","12345" );

     //select the database 
     mysqli_select_db($con,"dmwcw");

     //perform sql
     $sql = "INSERT INTO appointment (	breed,Name,age,ContactNo,email) VALUES ('$breed','$name',$age,$ContactNo,'$email')";

     $result= mysqli_query($con, $sql);
 

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
        $mail->Subject = 'Appointment  Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Succesfully Appointment Created</div><p>Hi,<br>Dear User,<br>Your Appointment is successfully Registered on '.$email.'</p><p>please visit Our Nearest center for Appointment</p>
           <p>please <a href="mailto:puppycarelk@gmail.com"><b><u>contact</u></b></a> us for more Details. </p>
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
      header('location:browse ads.html');
     //disconnect 
      mysqli_close($con);

	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Appoinment</title>
	<link rel="stylesheet" type="text/css" href="Appointmentform.css">
</head>
<body class="signupbody">
<table>
	<tr>
		<td width="20%" >
			
		</td>
	   <td height="500px">
	   	<h1>Appoinment</h1>
	   	 <form name="frmAppointment" method="post" action="#" enctype="multipart/form-data">
		<p>Pet Breed</p>
		<input class="RegInput"  type="text" name="txtbreed" placeholder="Breed">
		<p>Pet Name</p>
		<input class="RegInput"  type="text" name="txtPName" placeholder="Name">
		<p>Pet Age</p>
		<input class="RegInput"  type="text" name="txtage" placeholder="Age">

		<p>Contact No</p>
		<input class="RegInput"  type="tele" name="txtContactNo" placeholder="Contact No">
	    <p>Email</p>
		 <input class="RegInput"  type="tele" name="txtEmail" placeholder="Email"><br>
		 <input type="submit" class="signupsubmit" name="btnAsubmit" value="SUBMIT"><br><br>
		
	    </form>
	   </td>
	</tr>
</table>
	   
</body>
</html>