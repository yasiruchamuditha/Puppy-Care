<?php
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
//Crossing


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

if(isset($_POST["btnCsubmit"]))
{
   
      //
    $mail = new PHPMailer(true);
    //

	$Breed=$_POST["txtbreed"];
    $Name=$_POST["txtPName"]; 
    $Age=$_POST["txtage"];
    $Price=$_POST["txtPrice"]; 
    $ContactNo=$_POST["txtContactNo"];
    $Email=$_POST["txtEmail"];

	if(empty($Email))
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
     $sql = "INSERT INTO crossing(Breed,Name,Age,Price,ContactNo,Email) VALUES ('$Breed','$Name',$Age,$Price,$ContactNo,'$Email')";
      
     $ret= mysqli_query($con, $sql);
    
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
        $mail->addAddress($Email);     //Add a recipient
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
        $mail->Subject = 'Crossing Registration';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Succesfully Request Received</div><p>Hi,<br>Dear User,<br>Your Request is successfully Registered on '.$Email.'</p><p> Our Member will contact you for futher Verification on contact details you provided on Registration.</p>
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
	<title>crossing</title>
	<link rel="stylesheet" type="text/css" href="Crossingform.css">
</head>
<body class="signupbody">
<table>
	<tr>
		<td width="25%">	
		</td>
	    <td height="600px">
	   	<h1>Dog Crossing</h1>
	   	<form name="frmsignup" method="post" action="Crossingform.php" enctype="multipart/form-data">
		<p>Pet Breed</p>
		<input class="RegInput"  type="text" name="txtName" placeholder="Breed">
		<p>Pet Name</p>
		<input class="RegInput"  type="text" name="txtPName" placeholder="Name">
		<p>Pet Age</p>
		<input class="RegInput"  type="text" name="txtage" placeholder="Age">
		<p>Price</p>
		<input class="RegInput"  type="text" name="txtPrice" placeholder="Price">
		<p>Contact No</p>
		<input class="RegInput"  type="tele" name="txtContactNo" placeholder="Contact No">
		<p>Email</p>
		<input class="RegInput"  type="email" name="txtEmail" placeholder="Email">
		<input type="submit" class="signupsubmit" name="btnCsubmit" value="SUBMIT"><br><br>
		
	    </form>
	   </td>
	</tr>
</table>
</body>
</html>

