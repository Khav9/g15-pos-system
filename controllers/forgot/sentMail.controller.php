<?php
require '../../database/database.php';
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';
require '../../models/userManage.model.php';

// Get value from input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = htmlspecialchars($_POST['email']);
      if (isset($email)) {
            $_SESSION['emailOne'] = $email;
            $codePin = rand(1000000,100);
            updatePin($email,$codePin);

            // Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                  //Server settings
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                  $mail->Username   = 'dggihhg@gmail.com';                     //SMTP username
                  $mail->Password   = 'r m y v a h l f y l i n j t h x';                               //SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                  //Recipients
                  $mail->setFrom('dggihhg@gmail.com', 'POS SYSTEM CAMBODIA');
                  $mail->addAddress($email, 'User Name');  //អ្នកទទួល   //Add a recipient
                  // $mail->addAddress('ellen@example.com');               //Name is optional
                  // $mail->addReplyTo('info@example.com', 'Information');
                  // $mail->addCC('cc@example.com');
                  // $mail->addBCC('bcc@example.com');

                  //Attachments
                  // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachment    //Optional name

                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Forgot Your Password ?';
                  $mail->Body    = "
                  <h1>Hello there,</h1><br>

                  Having trouble logging in?<br>

                  Resetting your password is easy. Just fill in the 6-digit code, you will read Create a new password.<br>
                  <h4>Your 6 codes are :</h4><h2>". $codePin."</h2><br>
                  If you are, you do not have to do anything.<br>
                   
                  Thank you
                  POS Security Team";
                  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                  if (accountExist($email) !== []){
                        $mail->send();
                        header('location: /verifyPIN');
                  }else{
                        echo "Don't have this user in database";
                        header('location: /forgotPassword');
                  }
                  echo 'Message has been sent';
                  //verify PIN
            } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  header('location: /forgotPassword');
            }
      }else{
            echo 'not isset email';
            header('location: /forgotPassword');
      }
}
