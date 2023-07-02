<?php
/**
 * @author Yasiru
 * contact me : https://linktr.ee/yasiruchamuditha for more information.
 */
//reivews

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

if(isset($_POST["btnSubmit"]))
{
    //create a new PHPMailer object:
    $mail = new PHPMailer(true);
    //

	$Name=$_POST["txtName"];
    $Email=$_POST["txtEmail"]; 
    $ContactNo=$_POST["txtPhoneNo"];
    $Message=$_POST["txtMessage"]; 
  
   

	if(!empty($Email))
	{

        //connection
     $con = mysqli_connect("localhost:3306", "dse","12345" );

     //select the database 
     mysqli_select_db($con,"dmwcw");

     //perform sql
     $sql = "INSERT INTO reviews(Name,Email,ContactNo,Message) VALUES ('$Name','$Email',$ContactNo,'$Message')";

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
        $mail->Subject = 'Users Feedback';
        $mail->Body    = '<div style="width: 700px ; background-color:lightskyblue; font-weight: bold;text-align: center;font-family: Arial;font-size: 30pt;">Users Feedback</div><p>Hi,<br>Dear User,<br>We received Your valueble Feedback on '.$Email.'</p><p>We appreciate your feedback.</p>
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


     header('location:index.html');
   
     //disconnect 
      mysqli_close($con); 
		
	}
	else
	{
        echo '<script>alert("UserEmail Filed cannot be blank")</script>';
	
	}
}



?>