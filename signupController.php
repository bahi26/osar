<?php
include 'Database.php';
class signupController
{
    public static function add_new_user(){
        if (isset($_POST['add-user-submit']))
        {
            if (!isset($_SESSION['id']))
            {
                //get the data from the front
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $birth_date=$_POST['birth_date'];
                $date=date('Y-m-d H:i:s');
                $country_name=$_POST['country_name'];
                $address=$_POST['address'];
                $phone_number=$_POST['phone_number'];
                $Countr = $_POST['Country_id'];
                if (empty($address)) $address = NULL;

                //check if there's empty fields
                if (empty($first_name) || empty($last_name) || empty($email)
                    || empty($password) || empty($phone_number) || empty($country_name) || empty($birth_date)
                )
                {
                    header("Location: HSignIn-Reg.php?add=empty");
                    exit();
                }
                //check if there's invalid data
                elseif
                (
                   !is_numeric($phone_number) ||
                    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
                    !preg_match("/^[a-zA-Z]*$/", $country_name) ||
                    !preg_match("/^[a-zA-Z0-9]*$/", $password)
                ){
                    header("Location: HSignIn-Reg.php?add=invalid");
                    exit();
                } else {
                    //check if there's similar exists
                    if (Database::check_email($email)) {
                        header("Location: HSignIn-Reg.php?add=exists&id=".$Countr);
                        exit();
                    } else {
                        //password encryption
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        //inseting data into the table
                        Database::insertUser($first_name,$last_name,$email,$hashed_password,$phone_number,$address,$birth_date,$date,$country_name);
                        header("Location: HSignIn-Reg.php?add=success");
                        exit();
                    }
                }
            }
            else {
                header("Location: HSignIn-Reg.php?add=logged");
                exit();
            }

        }
    }

    public static function add_new_family(){
        if (isset($_POST['add-family-submit']))
        {
            if (!isset($_SESSION['id']))
            {
                //get the data from the front
                $name = $_POST['name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $starting_date=$_POST['starting_date'];
                $date=date('Y-m-d H:i:s');
                $country_id=$_POST['country_id'];
                $address=$_POST['address'];
                $phone_number=$_POST['phone_number'];
                $Countr = $_POST['Country_id'];
                if (empty($address)) $address = NULL;

                //check if there's empty fields
                if (empty($name)|| empty($email)
                    || empty($password) || empty($phone_number) || empty($country_id) || empty($starting_date)
                )
                {
                    header("Location: HSignIn-Reg-family.php?add=empty");
                    exit();
                }
                //check if there's invalid data
                elseif
                (
                    !is_numeric($phone_number)||
                    !filter_var($email,FILTER_VALIDATE_EMAIL)||
                    !is_numeric($country_id)||
                    !preg_match("/^[a-zA-Z0-9]*$/",$password))
                {
                    header("Location: HSignIn-Reg-family.php?add=invalid");
                    exit();
                }
                else {
                    //check if there's similar exists
                    if (Database::check_email($email)) {
                        header("Location: HSignIn-Reg-family.php?add=exists&id=".$Countr);
                        exit();
                    } else {
                        //password encryption
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        //inseting data into the table
                        Database::insertFamily($name,$email,$hashed_password,$phone_number,$address,$starting_date,$date,$country_id);
                        header("Location: HSignIn-Reg-family.php?add=success");
                        exit();
                    }
                }
            }
            else {
                header("Location: HSignIn-Reg-family.php?add=logged");
                exit();
            }

        }
    }
    public static function get_countries()
    {

        $data=Database::get_countries_admins();
        return $data;

    }


}
