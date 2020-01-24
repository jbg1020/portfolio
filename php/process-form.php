<?php

if (isset($_POST['name'],$_POST['email'])) {
    // print_r($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['comment'];
    $to = 'jbg@jbradygreco.com';
      
    $subject = 'Contact Request From Website';
    $headers = "From: ".$name." <".$email."> \r\n";
    $send_email = mail($to,$subject,$message,$headers);    
    echo ($send_email) ? 'success' : 'error';
      
}

?>