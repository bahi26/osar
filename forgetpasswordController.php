<?php
include 'Database.php';
session_start();
class forgetpasswordController
{
    public static function send_mail($unique_id,$email,$url)
    {

            $subject = "HTML email";
            $message = "
                    <html>
                    <head>
                    <title>Osrmntja</title>
                    </head>
                    <body>
                    <h2>Forget password</h2>
                    <br>
                    <h3>Hi ".$email."</h3>
                    <p>We received a request to reset your Osrmntja account password,click on the link below to enter the new password.</p>
                    <a href='".$url."?id=".$unique_id."' >Reset Password!</a>
                    <br>
                    </body>
                    </html>";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From: <osrmntja@hotmail.com>' . "\r\n";
            $headers .= 'Cc: osrmntja@hotmail.com' . "\r\n";
            mail($email, $subject, $message, $headers);
    }

    public static function send_forget()
    {
        if(isset($_POST['forget-submit']))
        {
            $email=$_POST['email'];
            if(Database::check_email($email))
            {
                $id=Database::get_id($email);
                self::delete_forget($id);
                $date=$date=date('Y-m-d H:i:s');
                $unique_id=uniqid('',true);
                if(Database::insert_forget($id,$unique_id,$date))
                {
                    $url="http://localhost/New%20folder/osr/recovery.php";
                    self::send_mail($unique_id,$email,$url);
                }
                else
                {
                    header("Location: forget-password.php?forget=error");
                    exit();
                }
            }
            else
            {
                header("Location: forget-password.php?error=existence");
                exit();
            }
        }
    }

    public static function change_password()
    {
        if(isset($_POST['change-submit']))
        {
            $unique_id=$_GET['id'];
            $password=$_POST['password'];
            if(Database::check_forget($unique_id))
            {

                if (!empty($password) && preg_match("/^[a-zA-Z0-9]*$/",$password))
                {
                    $id=Database::get_forget_id($unique_id);
                    Database::delete_forget($unique_id);
                    $password=password_hash($password,PASSWORD_DEFAULT);
                    Database::editPassword($id,$password);
                    header("Location: login-register.php");
                    exit();
                }
                else
                {
                    header("Location: recovery.php?id=$unique_id&forget=error");
                    exit();
                }
            }
            else
            {
                header("Location: forget-password.php?error=end");
                exit();
            }
        }
    }

    public static function delete_forget($id)
    {
        if(Database::check_forget_id($id))
        {
            $unique_id=Database::get_forget_forget_id($id);
            Database::delete_forget($unique_id);
        }
    }
}