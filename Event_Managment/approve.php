<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approveBtn'])) {
    $mail = new PHPMailer(true);
    $email = $_POST['email'];
    try {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'example@gmail.com';                     //SMTP username
    $mail->Password   = '********';                               //SMTP password     
    $mail->Port       = 587;  

        $mail->setFrom('kashyaphemant2004@gmail.com', 'Hemant');
        $mail->addAddress($_POST['email']);    //Add a recipient            //Name is optional
        $mail->addReplyTo('kashyaphemant2004@gmail.com', 'Hemant');

        $mail->isHTML(true);
        $mail->Subject = 'Approval Notification';
        $mail->Body = 'Your account has been approved. Thank you!';

        $mail->send();
        echo '<script>alert("Message has been sent!");</script>';
    } catch (Exception $e) {
        echo '<script>alert("Failed to send email: {$mail->ErrorInfo}");</script>';
    }
}
?>
