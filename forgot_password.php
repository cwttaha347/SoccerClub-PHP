<?php
include('require/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

function generateVerificationCode() {
    return substr(md5(uniqid(rand(), true)), 0, 6);
}

if (isset($_POST['send_code'])) {
    $email = $_POST['email'];
    
    $userQuery = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email'");
    $userExists = mysqli_num_rows($userQuery);

    if ($userExists > 0) {
        $verificationCode = generateVerificationCode();
        
        $updateQuery = "INSERT INTO `verification_code` (`email`, `verification_code`) VALUES ('$email', '$verificationCode')";
        mysqli_query($con, $updateQuery);

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = 'msg360combat@gmail.com'; 
        $mail->Password = 'blwiwoefzmbiufmx'; 
        $mail->setFrom('msg360combat@gmail.com', 'Soccer Club');
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset Verification Code';
        $mail->Body = "Your verification code is: $verificationCode";

        if ($mail->send()) {
            echo 'Verification code sent to your email.';
            echo '<script>window.location.href="verify.php?email='.$email.'"</script>';
        } else {
            echo 'Error sending email: ' . $mail->ErrorInfo;
            echo '<script>window.location.href="reset_password.php"</script>';
        }
    } else {
        echo 'Email not found in our database.';
        echo '<script>window.location.href="reset_password.php"</script>';
    }
}
?>
