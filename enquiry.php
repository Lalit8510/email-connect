<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $fullname = $_POST["fullname"];
    $company = $_POST["company"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
	$message = $_POST["message"];
//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rakesh7negi7@gmail.com';                     //SMTP username
    $mail->Password   = 'kozgswoiscfbooqs';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom('bhardwajlalit74614@gmail.com', 'Contact Form');
    $mail->addAddress('bhardwajlalit74614@gmail.com', 'Calgarypos');     
    

    //Recipients
    $mail->setFrom('rakesh7negi7@gmail.com', 'Contact Form');
    $mail->addAddress('rakesh7negi7@gmail.com', 'Calgarypos');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Calgarypos';
    $mail->Body    = "Fullname: $fullname <br> Company: $company <br> Email: $email<br> Phone: $phone <br> Address: $address <br> City: $city <br> Message: $message";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}header("location: thanks.html");
}