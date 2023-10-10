<?php

    $userMail = $_POST['userEmail'];
    // $senderTo = $_POST['sender_To'];
    $senderSubject= $_POST['sender_subject'];
    $senderMessage= $_POST['sender_message'];
    // $message= $_POST['message'];
    
    //email Recieved
    $to = $userMail;

    //email subject
    $subject = 'Avtar Space Technology';
    
    $headers = 'From: '.$userMail . "\r\n";


    $txt = "Subject : ".$senderSubject . "\r\n". "Message : ".$senderMessage;
    
    if(mail($to, $subject, $txt , $headers)){
        
        header('Location: ../hire-developer.php');
        
    }
    else{
         echo "Failed To Send Mail";
    }

?>