<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db = mysqli_connect('localhost', 'root', '', 'project');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

function sendMail($email, $reset_token)
{
    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '630prasanna@gmail.com'; // Your Gmail email address
        $mail->Password   = 'ridheneecqarxszg'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Email content
        $mail->setFrom('630prasanna@gmail.com', 'Your Name');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Link From Your Website';
        $mail->Body    = "We got a request from you to reset your password! <br>
            Click the link below <br>
            <a href='http://localhost/project/updatepassword.php?email=$email&reset_token=$reset_token'>
            Reset Password
            </a>";

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['send-reset-link'])) {
    $email = $_POST['email'];
    // Prevent SQL injection by using prepared statements
    $query = "SELECT * FROM `user` WHERE email=?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        $reset_token = bin2hex(random_bytes(16));
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        $query = "UPDATE `user` SET `resettoken`='$reset_token', `resettokenexpire`='$date' WHERE `email`='$email'";
        if (mysqli_query($db, $query) && sendMail($email, $reset_token)) {
            echo "<script>alert('Password reset link sent to mail');</script>";
            echo "<script>window.location='login.php';</script>";
        } else {
            echo "<script>alert('Server error! Please try again later.');</script>";
            echo "<script>window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found. Please enter a valid email.');</script>";
        echo "<script>window.location='login.php';</script>";
    }
}
?>
