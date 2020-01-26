<?php
// ini_set('display_errors', 1);

require 'PHPMailerAutoload.php';

$msg = '';
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

    $mail = new PHPMailer;
    $mail->isSMTP();
    // $mail->SMTPDebug = 3;
    $mail->Host = 'email-smtp.us-west-2.amazonaws.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'AKIAUX75NNCROXQGEEWY';
    $mail->Password = 'BGTaItimmBSmdKmJZzxgdxQOIUk/3r+nXFljf25c11J+';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Use a fixed address in your own domain as the from address
    $mail->setFrom('jbg@jbradygreco.com', 'Webmaster');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('jbg@jbradygreco.com', 'Brady');

    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'jbradygreco.com NEW MESSAGE';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['comment']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            echo ('error');
        } else {
            echo ('success');
        }
    }
}

?>