<?php
include_once 'Database.php';
class editController
{
    public static function edit_user(){
        if(isset($_POST['edit-user-submit'])) {
            if (isset($_SESSION['id'])) {

                //get the data from the front
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $lang=$_POST['lang'];
                if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
                if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
                
                $password_conformation =$_POST['password_conformation'];
                //check if there's invalid data
                if ((!preg_match("/^[a-zA-Z]*$/", $first_name) & !empty($first_name)) ||
                    (!preg_match("/^[a-zA-Z]*$/", $last_name) & !empty($last_name)) ||
                    (!filter_var($email, FILTER_VALIDATE_EMAIL) & !empty($email)) ||
                    (!is_numeric($phone_number) & !empty($phone_number)) ||
                    (!preg_match("/^[a-zA-Z0-9]*$/", $password) & !empty($password)))
                {
                    header("Location: HProfileNew.php?profile=invalid&id=".$Country_id);
                    exit();
                }
                else {
                    if (!Database::check_id($_SESSION['id'])) {
                        header("Location: HProfileNew.php?profile=unknown");
                        exit();
                    }
                    else
                        {
                            $old_password=Database::get_password($_SESSION['id']);

                        if (!password_verify($password_conformation, $old_password))
                        {
                            if($lang==2)
                            header("Location: HProfileNew.php?profile=mismatch&id=".$Country_id);
                            else
                                header("Location: HProfileNewArabic.php?profile=mismatch&id=".$Country_id);
                            exit();
                        }
                        else
                            {
                            if (Database::check_email_id($email,$_SESSION['id']) & !empty($email))
                            {
                                if($lang==2)
                                header("Location: HProfileNew.php?profile=exists&id=".$Country_id);
                                else
                                    header("Location: HProfileNewArabic.php?profile=exists&id=".$Country_id);
                                exit();
                            }
                            else
                            {

                                if (!empty($email))
                                {
                                   Database::editEmail($_SESSION['id'],$email);
                                }

                                if (!empty($password))
                                {
                                    $password=password_hash($password,PASSWORD_DEFAULT);
                                    Database::editPassword($_SESSION['id'],$password);
                                }

                                if (!empty($address)) {
                                    Database::editAddress($_SESSION['id'],$address);
                                }

                                if (!empty($phone_number))
                                {
                                    Database::editPhoneNumber($_SESSION['id'],$phone_number);
                                }
                                if (!empty($first_name))
                                {
                                    Database::editFirst_U($_SESSION['id'],$first_name);
                                }
                                if (!empty($last_name))
                                {
                                    Database::editLast_U($_SESSION['id'],$last_name);
                                }
                                self::update_profile_picture_U();
                                if($lang==2)
                                    header("Location: HProfileNew.php?id=".$Country_id);
                                else
                                    header("Location: HProfileNewArabic.php?id=".$Country_id);
                                exit();
                            }

                        }
                    }
                }
            }
        }
    }


    public static function edit_Admin(){
        if(isset($_POST['edit-admin-submit'])) {
            if (isset($_SESSION['id'])) {

                //get the data from the front
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $password_conformation =$_POST['password_conformation'];
                $lang=$_POST['lang'];
                 if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
                if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
                //check if there's invalid data
                if ((!preg_match("/^[a-zA-Z]*$/", $first_name) & !empty($first_name)) ||
                    (!preg_match("/^[a-zA-Z]*$/", $last_name) & !empty($last_name)) ||
                    (!filter_var($email, FILTER_VALIDATE_EMAIL) & !empty($email)) ||
                    (!is_numeric($phone_number) & !empty($phone_number)) ||
                    (!preg_match("/^[a-zA-Z0-9]*$/", $password) & !empty($password)))
                {
                    header("Location: HProfileNew.php?profile=invalid&id=".$Country_id);
                    exit();
                }
                else {
                    if (!Database::check_id($_SESSION['id'])) {
                        header("Location: HProfileNew.php?profile=unknown");
                        exit();
                    }
                    else
                    {
                        $old_password=Database::get_password($_SESSION['id']);

                        if (!password_verify($password_conformation, $old_password))
                        {
                            if($lang==2)
                            header("Location: HProfileNew.php?profile=mismatch");
                            else
                                header("Location: HProfileNewArabic.php?profile=mismatch&id".$Country_id);
                            exit();
                        }
                        else
                        {
                            if (Database::check_email_id($email,$_SESSION['id']) & !empty($email))
                            {
                                if($lang==2)
                                header("Location: HProfileNew.php?profile=exists&id".$Country_id);
                                else
                                    header("Location: HProfileNewArabic.php?profile=exists&id".$Country_id);
                                exit();
                            }
                            else
                            {

                                if (!empty($email))
                                {
                                    Database::editEmail($_SESSION['id'],$email);
                                }

                                if (!empty($password))
                                {
                                    $password=password_hash($password,PASSWORD_DEFAULT);
                                    Database::editPassword($_SESSION['id'],$password);
                                }

                                if (!empty($address)) {
                                    Database::editAddress($_SESSION['id'],$address);
                                }

                                if (!empty($phone_number))
                                {
                                    Database::editPhoneNumber($_SESSION['id'],$phone_number);
                                }
                                if (!empty($first_name))
                                {
                                    Database::editFirst_A($_SESSION['id'],$first_name);
                                }
                                if (!empty($last_name))
                                {
                                    Database::editLast_A($_SESSION['id'],$last_name);
                                }
                                self::update_profile_picture_A();
                                header("Location: HProfileNew.php?id".$Country_id);
                                exit();
                            }

                        }
                    }
                }
            }
        }
    }


    public static function edit_family(){
        if(isset($_POST['edit-family-submit'])) {
            if (isset($_SESSION['id'])) {
                //get the data from the front
                $name = $_POST['name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $password_conformation =$_POST['password_conformation'];
                if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
                if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
                $lang=$_POST['lang'];
                //check if there's invalid data
                if ((!preg_match("/^[a-zA-Z0-9]*$/", $name) & !empty($name)) ||
                    (!filter_var($email, FILTER_VALIDATE_EMAIL) & !empty($email)) ||
                    (!is_numeric($phone_number) & !empty($phone_number)) ||
                    (!preg_match("/^[a-zA-Z0-9]*$/", $password) & !empty($password)))
                {
                    header("Location: HProfileNew%20-%20Family.php?profile=invalid&id=".$Country_id);
                    exit();
                }
                else {
                    if (!Database::check_id($_SESSION['id'])) {
                        header("Location: HProfileNew%20-%20Family.php?profile=unknown");
                        exit();
                    }
                    else
                    {
                        $old_password=Database::get_password($_SESSION['id']);

                        if (!password_verify($password_conformation, $old_password))
                        {
                            if($lang == 2)
                            header("Location: HProfileNew%20-%20Family.php?profile=mismatch&id=".$Country_id);
                            else
                               header("Location: HProfileNew%20-%20FamilyArabic.php?profile=mismatch&id=".$Country_id); 
                            exit();
                        }
                        else
                        {
                            if (Database::check_email_id($email,$_SESSION['id']) & !empty($email))
                            {
                                if($lang == 2)
                                header("Location: HProfileNew%20-%20Family.php?profile=exists&id=".$Country_id);
                                else
                                    header("Location: HProfileNew%20-%20FamilyArabic.php?profile=exists&id=".$Country_id);
                                exit();
                            }
                            else
                            {

                                if (!empty($email))
                                {
                                    Database::editEmail($_SESSION['id'],$email);
                                }

                                if (!empty($password))
                                {
                                    $password=password_hash($password,PASSWORD_DEFAULT);
                                    Database::editPassword($_SESSION['id'],$password);
                                }

                                if (!empty($address)) {
                                    Database::editAddress($_SESSION['id'],$address);
                                }

                                if (!empty($phone_number))
                                {
                                    Database::editPhoneNumber($_SESSION['id'],$phone_number);
                                }
                                if (!empty($name))
                                {
                                    Database::editName($_SESSION['id'],$name);
                                }
                                self::update_profile_picture_f();

                                header("Location: HProfileNew%20-%20Family.php?update=success&id=".$Country_id);
                                exit();
                            }

                        }
                    }
                }
            }
        }
    }


    public static function update_profile_picture_u(){
            if(isset($_SESSION['id'])){
            $file=$_FILES['image'];
            if(empty($file)||$file['size']==0)return;
            $file_name=$file['name'];
            $file_tmp_name=$file['tmp_name'];
            $file_size=$file['size'];
            $file_error=$file['error'];
            $ext=explode('.',$file_name);
            $file_ext=strtolower(end($ext));
            $allowed=array('jpg','jpeg','png');
            if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
            if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
            $lang=$_POST['lang'];
            if(in_array($file_ext,$allowed)){
                if($file_error==0)
                {
                    if($file_size>50000000)
                    {
                        header("Location: HProfileNew.php?upload=size");
                        exit();
                    }
                    else
                    {
                        $file_new_name=uniqid('',true).".".$file_ext;
                        move_uploaded_file($file_tmp_name,'profile_pictures/'.$file_new_name);
                        if($_SESSION['photo']!="0.jpg")unlink('profile_pictures/'.$_SESSION['photo']);
                        $_SESSION['photo']=$file_new_name;

                        Database::update_profile_picture($_SESSION['id'],$file_new_name);
                        if($lang==2)
                        header("Location: HProfileNew.php?upload=success&id=".$Country_id);
                        else
                           header("Location: HProfileNewArabic.php?upload=success&id=".$Country_id); 
                        exit();
                    }
                }
                else
                {
                    header("Location: HProfileNew.php?upload=uploading");
                    exit();
                }

            }
            else
                {
                    header("Location: HProfileNew.php?upload=type");
                    exit();
                }
            }
            else
                {
                header("Location: ../index.php?upload=logged");
                exit();
                }

    }

    public static function update_profile_picture_f(){
        if(isset($_SESSION['id'])){
            $file=$_FILES['image'];
            if(empty($file)||$file['size']==0)return;
            $file_name=$file['name'];
            $file_tmp_name=$file['tmp_name'];
            $file_size=$file['size'];
            $file_error=$file['error'];
            $ext=explode('.',$file_name);
            $file_ext=strtolower(end($ext));
            $allowed=array('jpg','jpeg','png');
            
            
             if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
            if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
            $lang=$_POST['lang'];
            
            
            if(in_array($file_ext,$allowed)){
                if($file_error==0)
                {
                    if($file_size>50000000)
                    {
                        header("Location: HProfileNew%20-%20Family.php?upload=size");
                        exit();
                    }
                    else
                    {
                        $file_new_name=uniqid('',true).".".$file_ext;
                        move_uploaded_file($file_tmp_name,'profile_pictures/'.$file_new_name);
                        if($_SESSION['photo']!="0.jpg")unlink('profile_pictures/'.$_SESSION['photo']);
                        $_SESSION['photo']=$file_new_name;

                        Database::update_profile_picture($_SESSION['id'],$file_new_name);
                        if($lang==2)
                            header("Location: HProfileNew%20-%20Family.php?upload=success&id=".$Country_id);
                        else
                            header("Location: HProfileNew%20-%20FamilyArabic.php?upload=success&id=".$Country_id);
                        exit();
                    }
                }
                else
                {
                    header("Location: HProfileNew%20-%20Family.php?upload=uploading");
                    exit();
                }

            }
            else
            {
                header("Location: HProfileNew%20-%20Family.php?upload=type");
                exit();
            }
        }
        else
        {
            header("Location: HSignin.php?upload=logged");
            exit();
        }

    }
    public static function update_profile_picture_A(){
        if(isset($_SESSION['id'])){
            $file=$_FILES['image'];
            if(empty($file)||$file['size']==0)return;
            $file_name=$file['name'];
            $file_tmp_name=$file['tmp_name'];
            $file_size=$file['size'];
            $file_error=$file['error'];
            $ext=explode('.',$file_name);
            $file_ext=strtolower(end($ext));
            $allowed=array('jpg','jpeg','png');
            
            
              if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
            if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
            $lang=$_POST['lang'];
            
            
            if(in_array($file_ext,$allowed)){
                if($file_error==0)
                {
                    if($file_size>50000000)
                    {
                        header("Location: HProfileNew.php?upload=size");
                        exit();
                    }
                    else
                    {
                        $file_new_name=uniqid('',true).".".$file_ext;
                        move_uploaded_file($file_tmp_name,'profile_pictures/'.$file_new_name);
                        if($_SESSION['photo']!="0.jpg")unlink('profile_pictures/'.$_SESSION['photo']);
                        $_SESSION['photo']=$file_new_name;

                        Database::update_profile_picture($_SESSION['id'],$file_new_name);
                        if($lang==2)
                        header("Location: HProfileNew.php?upload=success&id=".$Country_id);
                        else
                          header("Location: HProfileNewArabic.php?upload=success&id=".$Country_id);  
                        exit();
                    }
                }
                else
                {
                    header("Location: HProfileNew.php?upload=uploading");
                    exit();
                }

            }
            else
            {
                header("Location: HProfileNew.php?upload=type");
                exit();
            }
        }
        else
        {
            header("Location: ../index.php?upload=logged");
            exit();
        }

    }


    public static function selectData()
    {
        if(isset($_SESSION['id'])&isset($_SESSION['type']))
        {
            //echo $_SESSION['type'];exit;
            switch ($_SESSION['type']) {
                case 1:
                    return Database::profile_admin($_SESSION['id']);
                    break;
                case 2:
                    return Database::profile_user($_SESSION['id']);
                    break;
                case 3:
                    return Database::profile_family($_SESSION['id']);
                    break;
                default:
                    echo $_SESSION['id'];
                    return null;
                    
            }
        }
        else
        {
        header("Location: HProfileNew-Family.php?add=logged");
        exit();
        }
    }
}