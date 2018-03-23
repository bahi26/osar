<?php
include_once 'Database.php';
session_start();
class controlRoomController
{

    public static function add_new_admin()
    {
    if (isset($_POST['add-admin-submit']))
    {$Country_id=$_GET['country'];
        if (isset($_SESSION['priority'])&$_SESSION['priority']>0)
        {
            //get the data from the front
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $date=date('Y-m-d H:i:s');
            $phone_number = $_POST['phone_number'];
            $country_id = $_POST['country_id'];
            if (empty($address)) $address = NULL;

            //check if there's empty fields
            if (empty($first_name) || empty($last_name) || empty($email)
                || empty($password) || empty($phone_number)  || empty($country_id)
            )
            {
                echo $first_name;exit();
              //  echo $first_name.$last_name.$email.$password.$phone_number.$country_id;exit();
                header("Location: HAdd_Admin.php?add=empty&country=".$Country_id);
                exit();
            } //check if there's invalid data
            elseif
            (
                !is_numeric($phone_number) ||
                !is_numeric($country_id) ||
                !filter_var($email, FILTER_VALIDATE_EMAIL) ||
                !preg_match("/^[a-zA-Z0-9]*$/", $password)
            ){
                header("Location: HAdd_Admin.php?add=invalid&country=".$Country_id);
                exit();
            } else {
                //check if there's similar exists
                if (Database::check_email($email)) {
                    header("Location: HAdd_Admin.php?add=exists&country=".$Country_id);
                    exit();
                } else {
                    //password encryption
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    //inseting data into the table
                    if(Database::insertAdmin($first_name, $last_name, $email, $hashed_password, $phone_number, $country_id,$address,$date))
                    {
                        header("Location: HAdd_Admin.php?add=success&country=".$Country_id);
                        exit();
                    }
                    else
                    {
                        header("Location: HAdd_Admin.php?add=error&country=".$Country_id);
                        exit();
                    }
                }
            }
        }
        else {
            header("Location: HFirstPage.php?add=auth&country=".$Country_id);
            exit();
        }

    }
}


    public static function remove_admin(){
        if (isset($_POST['remove-admin-submit']))
        {
            if (isset($_SESSION['priority'])&$_SESSION['priority']>0)
            {
                $admin_id=$_POST['admin_id'];
                if(!Database::check_admin($admin_id))
                {
                    //header("Location: HAdmin-Dashboard.php?remove=exist");
                    //exit();
                }
                else
                {
                    $picture=Database::get_profile_picture($admin_id);
                    if(Database::remove_person($admin_id))
                    {
                        if($picture['photo']!="0.jpg")unlink('profile_pictures/'.$picture['photo']);
                      //  header("Location: HAdmin-Dashboard.php?remove=success");
                        //exit();
                    }
                    else
                    {
                     //   header("Location: HAdmin-Dashboard.php?remove=error");
                      //  exit();
                    }
                }
            }
            else
            {
                header("Location: HAdmin-Dashboard0.php?");
                exit();
            }
        }

    }


    public static function add_new_country(){
        if (isset($_POST['add-country-submit']))
        {
            if (isset($_SESSION['priority'])&$_SESSION['priority']>0)
            {
                $name=$_POST['name'];
                $Country_id=$_GET['country'];
                $lang=$_POST['lang'];
                if(Database::check_country($name))
                {
                    if($lang==2)
                     header("Location: HAdd_Country.php?add=exist&country=".$Country_id);
                    else
                        header("Location: HAdd_CountryArabic.php?add=exist&country=".$Country_id);
                   // exit();
                }
                else
                {
                    if(Database::add_country($name))
                    {
                        
                        if($lang==2)
                        header("Location: HAdd_Country.php?country=".$Country_id);
                        else
                            header("Location: HAdd_CountryArabic.php?country=".$Country_id);
                       // exit();

                    }
                    else
                    {
                        if($lang==2)
                        header("Location: HAdd_Country.php?add=error&country=".$Country_id);
                        else
                            header("Location: HAdd_CountryArabic.php?add=error&country=".$Country_id);
                        //exit();
                    }
                }
            }
            else
            {  //echo $_SESSION['priority'];
                if($lang==2)
                header("Location: HAdmin-Dashboard0.php");
                exit();
            }
        }



    }


    public static function remove_country(){
        if (isset($_POST['remove-country-submit']))
        {
            if (isset($_SESSION['priority'])&$_SESSION['priority']>0)
            {
                $country_id=$_POST['country_id'];
                $admin_id=$_POST['admin_id'];
                $bool=false;
                if(!empty($admin_id))$bool=true;
                if(!Database::check_country_id($country_id))
                {
                   // header("Location: HAdmin-Dashboard.php?remove=exist");
                    //exit();
                }
                else
                {
                    $picture=Database::get_country_flag($country_id);
                    if(Database::remove_country($country_id))
                    {

                        if($picture['flag']!="0.jpg")unlink('flags/'.$picture['flag']);
                        if($bool) {
                            $picture=Database::get_profile_picture($admin_id);
                            if($picture['photo']!="0.jpg")unlink('profile_pictures/'.$picture['photo']);
                            Database::remove_person($admin_id);
                        }
                    }
                    else
                    {
                        //header("Location: HAdmin-Dashboard.php?remove=error");
                        //exit();
                    }
                }
            }
            else
            {
                header("Location: HAdmin-Dashboard.php?remove=auth");
                exit();
            }
        }

    }


    public static function get_countries()
    {
        if (isset($_SESSION['priority'])&$_SESSION['priority']>0)
        {
            $data=Database::get_countries_admins();
            return $data;
        }
        else
        {
            header("Location: HAdmin-Dashboard.php?remove=auth");
            exit();
        }
    }

    public static function get_country()
    {
        if (isset($_SESSION['priority']))
        {
            $country_id=$_SESSION['country_id'];
            if(is_null($_SESSION['country_id']))$country_id=$_POST['country_id'];

            if (Database::check_auth($_SESSION['id'],$country_id,$_SESSION['priority']))
            {
                $data=Database::get_country($country_id);
                return $data;
            }
            else
            {
                header("Location: HAdmin-Dashboard.php?remove=auth");
                exit();
            }
        }
        else {
            header("Location: HAdmin-Dashboard.php?remove=error");
            exit();
        }
    }


    public static function get_country_byid($id)
    {

        return Database::get_country($id);
    }

    public static function get_category_byid($id)
    {

        return Database::get_category($id);
    }
    public static function edit_country()
    {
        if (isset($_POST['edit-country-submit']))
        {

            self::edit_name();
            self::edit_flag();
        }
    }

    public static function edit_name(){
        if (isset($_POST['edit-country-submit']))
        {
            if (isset($_SESSION['priority']))
            {
                $country_id=$_POST['country_id'];
                $name=$_POST['name'];
               // echo $country_id;exit();
                if(empty($name))return;
                if(!Database::check_country_id($country_id))
                {echo
                    header("Location: HAdmin-Dashboard.php?edit=exist");
                    exit();
                }
                else
                {
                    Database::change_country_name($_SESSION['id'],$country_id,$name,$_SESSION['priority']);
                }
            }
            else
            {
                header("Location: HAdmin-Dashboard.php?edit=auth");
                exit();
            }
        }

    }


    public static function edit_flag(){
        if (isset($_POST['edit-country-submit']))
        {
            if (isset($_SESSION['priority']))
            {
                    $country_id=$_POST['country_id'];
                if(!Database::check_country_id($country_id))
                {
                    header("Location: HAdmin-Dashboard.php?edit=exist");
                    exit();
                }
                else
                {
                    if(self::update_flag($country_id))
                    {
                        header("Location: HShowCountries.php?country=1&edit=success");
                        exit();
                    }
                    else
                    {
                        return;
                    }
                }
            }
            else
            {
                header("Location: HAdmin-Dashboard.php?edit=auth");
                exit();
            }
        }


    }

    public static function remove_family(){
        if (isset($_POST['remove-family-submit']))
        {
            if (isset($_SESSION['priority']))
            {
                $family_id=$_POST['family_id'];
                if(!Database::check_family($family_id,$_SESSION['country_id']))
                {
                    header("Location: HAdmin-Dashboard.php?remove=exist");
                    exit();
                }
                else
                {
                    $picture=Database::get_profile_picture($family_id);
                    if(Database::remove_person($family_id))
                    {
                        if($picture['photo']!="0.jpg")unlink('profile_pictures/'.$picture['photo']);
                        header("Location: HAdmin-Dashboard.php?remove=success");
                        exit();
                    }
                    else
                    {
                        header("Location: HAdmin-Dashboard.php?remove=error");
                        exit();
                    }
                }
            }
            else
            {
                header("Location: HAdmin-Dashboard.php?remove=auth");
                exit();
            }
        }
    }

    public static function update_flag($country_id){
        if(isset($_POST['edit-country-submit']))
        {
            if(isset($_SESSION['id'])){
                $file=$_FILES['flag'];
                $file_name=$file['name'];
                $file_tmp_name=$file['tmp_name'];
                $file_size=$file['size'];
                $file_error=$file['error'];
                $ext=explode('.',$file_name);
                $file_ext=strtolower(end($ext));
                $allowed=array('jpg','jpeg','png');
                if(in_array($file_ext,$allowed)){
                    if($file_error==0)
                    {
                        if($file_size>50000000)
                        {
                            header("Location: HShowCountries.php?country=1&upload=size");
                            exit();
                        }
                        else
                        {
                            $file_new_name=uniqid('',true).".".$file_ext;
                            move_uploaded_file($file_tmp_name,'flags/'.$file_new_name);
                            if($_SESSION['photo']!="0.jpg")unlink('flags/'.$_SESSION['photo']);
                            $_SESSION['photo']=$file_new_name;
                            Database::change_country_flag($_SESSION['id'],$country_id,$file_new_name,$_SESSION['priority']);
                            return true;
                        }
                    }
                    else
                    {
                        header("Location: HShowCountries.php?country=1&upload=uploading");
                        exit();
                    }

                }
                else
                {
                    header("Location: HShowCountries.php?country=1&upload=type");
                    exit();
                }
            }
            else
            {
                header("Location: HSignin.php?upload=logged");
                exit();
            }
        }
    }

    public static function selectData()
    {
        if(isset($_SESSION['id'])&isset($_SESSION['type']))
        {
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

    public static function remove_user(){
        if (isset($_POST['remove-user-submit']))
        {
            if (isset($_SESSION['priority']))
            {
                $id=$_POST['user_id'];
                if(!Database::check_user($id))
                {
                    //header("Location: HAdmin-Dashboard.php?country=&remove=exist");
                    exit();
                }
                else
                {
                    $picture=Database::get_profile_picture($id);
                    if($picture['photo']!="0.jpg")unlink('profile_pictures/'.$picture['photo']);
                    if(Database::remove_person($id))
                    {
                        if($picture['photo']!="0.jpg")unlink('profile_pictures/'.$picture['photo']);
                        //header("Location: HShow_users.php??country=&remove=success");
                        //exit();
                    }
                    else
                    {
                        //header("Location: HAdmin-Dashboard.php?country=&remove=error");
                        exit();
                    }
                }
            }
            else
            {
                //header("Location: HFirstPage.php?");
                exit();
            }
        }

    }
    public static function get_users()
    {
        if (isset($_SESSION['priority']))
        {
            $data=Database::get_users();
            return $data;
        }
        else
        {
            header("Location: HAdmin-Dashboard.php?remove=auth");
            exit();
        }
    }
     //////////////categories
        public static function get_categories()
    {
        if (isset($_SESSION['priority']))
        {
            $data=Database::get_categories();
            return $data;
        }
        else
        {
            header("Location: login-register.php?auth");
            exit();
        }
    }
     public static function edit_category(){
        if (isset($_POST['edit-category-submit']))
        {

            if (isset($_SESSION['priority']))
            {
                $category_id=$_POST['category_id'];
                $name=$_POST['name'];
                if($id==1)
                {
                    header("Location: category_all.php?other");
                    exit();
                }
                if(empty($name))return;
                else
                Database::editC_name($category_id,$name);
                header("Location: category_all.php?");
                exit();
            }
            else
            {
                header("Location: login-register.php?auth");
                exit();
            }
        }

    }
        public static function remove_category(){
        if (isset($_POST['remove-category-submit']))
        {
            if (isset($_SESSION['priority']))
            {
                $id=$_POST['category_id'];
                if($id==1)
                {
                    header("Location: category_all.php?other");
                    exit();
                }
                else
                {
                    if(Database::delete_category($id))
                        {

                        }
                    else
                    {
                    }
                }
            }
            else
            {
                header("Location: login-register.php?auth");
                exit();
            }
        }

    }
    public static function add_category(){
        if (isset($_POST['add-category-submit']))
        {
            if (isset($_SESSION['priority']))
            {
                $name=$_POST['name'];
                if(Database::check_category($name))
                {
                    header("category_add.php?name=exists");
                    exit();
                }
                else
                {
                    if(Database::add_category($name))
                    {
                        header("category_add.php?done=1");
                    }
                    else
                    {
                        header("category_add.php?name=exists");
                        exit();
                    }
                }
            }
            else
            {
                header("Location: login-register.php?auth");
                exit();
            }
        }
    }


}