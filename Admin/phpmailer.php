<?php
require '/PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'durnoldsinstitute';
$mail->Password = '@Durnolds2019';
$mail->setFrom('durnoldsinstitute@gmail.com');
$mail->addAddress('arnoldmubaiwa99@gmail.com');
$mail->Subject = 'Hello from PHPMailer!';
$mail->Body = 'This is a test.';
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS";
}