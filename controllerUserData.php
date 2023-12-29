<?php
include 'config/database.php';
$member = new Member();
$email = "";
$username = "";
$errors = array();
if (isset($_POST['check-username'])) {
    $username = $_POST['username'];
    $member_data = $member->getMemberByUsername($username);
    if (isset($member_data)) {
        $email = $member_data['email'];
        if (($member->checkUsername($username)) > 0) {
            $code = rand(999999, 111111);
            if ($member->insertCodeToMember($code, $username)) {
                if (sendCodeMail($email, $username, $code)) {
                    $info = "We've sent a passwrod reset otp to your email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    header('location:reset-code.php');
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } else {
                $errors['db-error'] = "Something went wrong!" . $email;
            }
        }
    } else {
        $errors['email'] = "This username does not exist!";
    }
}






$username;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$code_opt = 0;
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $member_data = $member->getMemberByUsername($username);
    $code_opt = $_POST['otp'];
    if ($member_data['code'] == $code_opt) {
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        $member_data = $member->insertCodeToMember("", $username);
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}



//if user click change password button
if (isset($_POST['change-password'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $_SESSION['info'] = "";
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_DEFAULT);
        echo $username;
        //update pw
        if ($member->updatePassword($username, $encpass)) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}

function sendCodeMail($email, $username, $code)
{
    require "public/PHPMailer/src/PHPMailer.php";
    require "public/PHPMailer/src/SMTP.php";
    require 'public/PHPMailer/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tannp.42.student@fit.tdc.edu.vn';
        $mail->Password = 'tandz1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('tannp.42.student@fit.tdc.edu.vn', 'Food store admin');
        $mail->addAddress($email, $username);
        $mail->isHTML(true);
        $mail->Subject = 'Reset password food store';
        $noidungthu = "<p>Your password reset code is $code </p>";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
        return true;
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
        return false;
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: login-user.php');
}
?>