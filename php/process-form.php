<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['comment'];
    $to = 'jbg@jbradygreco.com';
    $subject = 'Contact Request From Website';
    $headers = "From: ".$name." <".$email."> \r\n";

    mail($to,$subject,$message,$headers);
    echo (mail($to,$subject,$message,$headers)) ? 'WORKED' : 'FAILED';

}

?>