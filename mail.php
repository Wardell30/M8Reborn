<?php
    $message = '<html>';
    $message .= '<body>';
    $message .= '<h1>Welcome to M8Reborn</h1>';
    $message .= '<p>Hello, ' . $_COOKIE["user"] . '</p>';
    $message .= '<p>In order to access the application you need to confirm your account</p>';
    $message .= '<p>You can do that by clicking the button bellow</p>';
    $message .= '<a href=\'http://localhost/Project/activate.php\'><button>Confirm Account</button></a>';
    $message .= '</body>';
    $message .= '</html>';

    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Etc/UTC');

    require 'vendor/php/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "swprojectreborn@gmail.com";

    //Password to use for SMTP authentication
    $mail->Password = "SWProjectm8";

    //Set who the message is to be sent from
    $mail->setFrom('noreply@meigthreborn.com', 'M8Reborn');

    //Set who the message is to be sent to
    $mail->addAddress($_COOKIE["mail"], '');

    //Set the subject line
    $mail->Subject = 'Account Activation';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($message);

    //Replace the plain text body with one created manually
    $mail->AltBody = 'Account Activation. Follow this link to finish your account registration: ';

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        
        echo '<!DOCTYPE html>
<html>
<head>
<style>
.main{
    text-align: center;
    width: 10%;
    margin-left: 45%;
    margin-top:16%;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<div class="main">
<div class="loader"></div>
<p>Sending email...</p>
</div>
</body>
</html>';
        
        $cookie_mail_sent = 'mail_sent';
        $cookie_value_mail_sent = true;
            
        setcookie($cookie_mail_sent, $cookie_value_mail_sent, time() + (86400 * 30), "/");
        header('location:login.php');
    }

?>