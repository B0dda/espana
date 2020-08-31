<?php
require_once('PHPMailer/PHPMailerAutoload.php');
class Mail {
        public static function sendMail($subject, $body, $address) {
                $mail = new PHPMailer();
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.office365.com';
                $mail->Port = '587';
                $mail->isHTML(true);
                $mail->Username = 'support@bgaha.com';
                $mail->Password = 'Vevo4w1988@b';
                $mail->SetFrom('support@bgaha.com');
                $mail->Subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
                $mail->Body = $body;
                $mail->AddAddress($address);


                // $mail->SMTPDebugging = 1;
                 $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    $mail->SMTPKeepAlive = true;   
                    $mail->Mailer = “smtp”;
                // if(!$mail->Send()){
                //     echo "حدث خطأ أثناء إرسال البريد, الخطأ:".$mail->ErrorInfo;
                //     exit;
                // }
                
        }
}
?>
