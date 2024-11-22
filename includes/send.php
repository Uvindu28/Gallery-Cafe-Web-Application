<?php
// Load PHPMailer classes using PHPMailerAutoload.php
require '../PHPMailer/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $cus_name = $_POST['name'];
    $action = $_POST['action'];

    $subject = $action == 'confirm' ? 'Reservation Confirmed.' : 'Reservation Cancelled';
    $message = $action == 'confirm' ? 'Your reservation has been confirmed. Thank you for joining us.' : 'Your reservation has been cancelled. We apologize for any inconvenience.';

    $mail = new PHPMailer();

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                           // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';      // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = 'gallerycafe56@gmail.com'; // SMTP username
        $mail->Password   = 'nzvqknwbnyqdjryn';       // SMTP password
        $mail->SMTPSecure = 'tls';                 // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also accepted
        $mail->Port       = 587;                   // TCP port to connect to

        //Recipients
        $mail->setFrom('gallerycafe56@gmail.com', 'GalleyCafe');
        $mail->addAddress($email, $cus_name);      // Add a recipient

        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
