<?php
if (isset($_POST['name'],$_POST['email'])) {
      
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['comment'];
      
    // Set your email address where you want to receive emails. 
    $to = 'jbg@jbradygreco.com';
      
    $subject = 'Contact Request From Website';
    $headers = "From: ".$name." <".$email."> \r\n";
    mail($to,$subject,$message,$headers);
    
    echo (mail($to,$subject,$message,$headers)) ? 'success' : 'error';
      
}
?>