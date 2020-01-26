<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailerAutoload.php';

// if (isset($_POST['name'],$_POST['email'])) {
//     // print_r($_POST);

//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $message = $_POST['comment'];
//     $to = 'jbg@jbradygreco.com';
      
//     $subject = 'Contact Request From Website';
//     $headers = "From: ".$name." <".$email."> \r\n";
//     $send_email = mail($to,$subject,$message,$headers);
    
//     echo ($send_email) ? 'success' : 'error';      
// }

$msg = '';
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'email-smtp.us-west-2.amazonaws.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'AKIAUX75NNCROXQGEEWY';
    $mail->Pasword = 'BGTaItimmBSmdKmJZzxgdxQOIUk/3r+nXFljf25c11J+';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom(jbg@jbradygreco.com', 'Webmaster');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('jbg1020@gmail.com', 'Brady');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Contact Request From Website';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['comment']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

?>