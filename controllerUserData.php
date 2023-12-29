<?php
include 'config/database.php';
$member = new Member();
$email = "";
$username = "";
$password = "";
$code_opt = 0;
$errors = array();



//reset-code
if (isset($_POST['check-username'])) {
    $username = $_POST['username'];
    $member_data = $member->getMemberByUsername($username);
    if (isset($member_data)) {
        $email = $member_data['email'];
        if (($member->checkUsername($username)) > 0) {
            $code = rand(999999, 111111);
            if ($member->insertCodeToMember($code, $username)) {
                $subject = 'Reset password food store';
                $content = "<p>Your password reset code is $code </p>";
                ;
                if (sendCodeMail($email, $username, $subject, $content)) {
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







$username = (isset($_SESSION['username']) ? $_SESSION['username'] : "");
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

$username = (isset($_SESSION['username']) ? $_SESSION['username'] : "");
if (isset($_POST['check-verify-code']) && !empty($username)) {
    $_SESSION['info'] = "";
    $member_data = $member->getMemberByUsername($username);
    $email = $member_data['email'];
    $code = $_POST['code'];
    if ($member_data['code'] == $code) {
        $info = "Verify success.Login now!";
        $_SESSION['info'] = $info;
        $member_data = $member->insertCodeToMember("", $username);
        if ($member->activeMember($username)) {
            $subject = "Register account success";
            $content = "
            Congratulations on successfully signing up for 
            your Food Store account! We're thrilled to have you on
            board and look forward to providing you with exceptional
            service. Your satisfaction is our priority, and we're 
            dedicated to ensuring your experience with us is nothing
            short of fantastic. Should you have any questions or
            need assistance, feel free to reach out. 
            Welcome, and thank you for choosing us!
            ";
            sendCodeMail($email, $username, $subject, $content);
            header('location: verify-member-success.php');
        } else {
            $errors['send-mail-error'] = "Please try again later.";
        }

        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
else{
    // header('location: forget-pw.php');
}


if (isset($_POST['register'])) {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $_SESSION['username'] = $username;
        $_SESSION['info'] = "";
        $status = $member->checkEmail($email, $username);
        if ($status == -1) {
            if ($member->register($username, $password, $email)) {
                $code = rand(999999, 111111);
                $member->insertCodeToMember($code, $username);
                $subject = "Code verify account";
                $content = "<p>Your account verification code is $code </p>";
                sendCodeMail($email, $username, $subject, $content);
                header('location:verify-member.php');
            } else {
                $errors['error-register'] = "Đăng kí thất bại";
            }
        } else if ($status == 0) {
            header('location:verify-member.php');
        } else {
            $errors['email-invalid'] = "Email hoặc tên đăng nhập đã tồn tại.";
        }

    }
}



if (isset($_POST['login'])) {
    // Check if user is already login
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];
    } else {
        // User is not logged in
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
    }


    if (isset($username) && isset($password) && !empty($username) && !empty($password)) {
        
        $_SESSION['username'] = $username;
        $status = $member->login($username, $password);
        if ($status == -2){
            $_SESSION['danger'] = "Something went wrong !!!";
        } else if ($status == -1) {
            header("location: verify-member.php");
        } else if ($status == 0) { // User
            header("location: index.php");
        } else if ($status == 1) {
            header("location: app/views/layout-admin.php");
        }
    }
}




function sendCodeMail($email, $username, $subject, $content)
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
        $mail->Subject = $subject;
        $noidungthu = $content;
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