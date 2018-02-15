<?php


require("class.phpmailer.php");

        $mailer = new PHPMailer();
        $mailer->SetLanguage( 'en', 'language/' );
        $mailer->IsSMTP();
        $mailer->Host = 'ssl://smtp.gmail.com';
        $mailer->Port = 465; //can be 587
        $mailer->SMTPAuth = TRUE;
        $mailer->Username = 'info.dhuronto@gmail.com';  // Change this to your gmail address
        $mailer->Password = 'info*422142#';  // Change this to your gmail password
        $mailer->From = 'info.dhuronto@gmail.com';  // Change this to your gmail address
        $mailer->FromName = 'Dhuronto Soft Limited'; // This will reflect as from name in the email to be sent
        $mailer->Body = 'Hi how are you';
        $mailer->Subject = 'this a test mail';
        $mailer->AddAddress('sumonahmed58@gmail.com');  // This is where you want your email to be sent
        if(!$mailer->Send())
        {
            
            echo "Message was not sent<br/>";
           echo "Mailer Error: " . $mailer->ErrorInfo;
        }
        else
        {
    echo "Message has been sent";
        }


    
  
?> 