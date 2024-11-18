                                   // TCP port to connect to
<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';
$mail = new PHPMailer;                              // Passing `true` enables exceptions


    //Server settings
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ilazoadmn@gmail.com';                 // SMTP username
    $mail->Password = 'nvydmjebueibnidm';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('ilazoadmn@gmail.com', ': ilazo pharmacy and cosmetics');
    $mail->addAddress('20193647@std.neu.edu.tr');     // Add a recipient
    $mail->addReplyTo('nyoxmlimwa@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Ilazo Artificial Intergency' ;

	$mailContent = '
<h2>System Detection</h2>
<p>I detect some of product are running out of stock please Add </p>';

    $mail->Body    = $mailContent ;
    $mail->send();

if(!$mail->send()){
    echo 'Message could not be sent.';

    echo 'Error: '. $mail->ErrorInfo;
}else{
	echo 'Message has been sent';
}	

?>