<?php

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $num = $rs->num_rows;

    if($num == 1){

        $code = uniqid();
        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");

         // email code
         $mail = new PHPMailer;
         $mail->IsSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'kalpawishvajith01@gmail.com';
         $mail->Password = 'kopl srhx kivc ywtl';
         $mail->SMTPSecure = 'ssl';
         $mail->Port = 465;
         $mail->setFrom('kalpawishvajith01@gmail.com', 'Thabaruma.LK ');
         $mail->addReplyTo('kalpawishvajith01@gmail.com', 'Thabaruma.LK ');
         $mail->addAddress($email);
         $mail->isHTML(true);
         $mail->Subject = 'Thabaruma.LK Forgot Password Verification Code';
         $bodyContent = '<h1 style="color:red;font-family: Segoe UI;">Your Verification Code Is : '.$code.'</h1>';  
         $mail->Body    = $bodyContent;

         if(!$mail->send()){
            echo ("Email sent Failed.");
         }else{
            echo ("success");
         }

    }else{
        echo ("වලංගු නොවන විද්‍යුත් තැපැල් ලිපිනයක්.");
    }

}else{
    echo ("කරුණාකර ඔබගේ විද්‍යුත් තැපැල් ලිපිනය විද්‍යුත් තැපැල් ක්ෂේත්‍රයට ඇතුළු කරන්න.");
}

?>