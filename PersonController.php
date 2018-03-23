<?php
include_once 'Database.php';
include_once './Person.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersonController
 *
 * @author mohamed
 */
class PersonController {

    public static function login($email, $pass) {
                    // $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
//$check =password_verify($password,$old_password);
        $person = new Person();
        if (Database::selectPerson($email) != NULL) {

            $person = Database::selectPerson($email);
            $check =password_verify($pass,$person->getPassword());
            if ($check)
            {
            return $person;
            }
        else {
            return NULL;    
        }
        } else {
            return null;
        }
    }

    public static function check($id) {
        if (Database::selectFamiliy($id) != NULL) {
            // $person = Database::selectFamiliy($email, $pass);
            return 3;
        } elseif (Database::selectAdmin($id) != NULL) {
            // $person = Database::selectAdmin($email, $pass);
            return 1;
        } elseif (Database::selectUser($id) != NULL) {
            //$person = Database::selectAdmin($email, $pass);
            return 2;
        }
    }

    public static function enter() {
       
            $country_id = $_GET['id'];
            $lang=$_GET['lang'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $email = $_POST['email'];
                $pass = $_POST['password'];
              
                $user = PersonController::login($email, $pass);
                if ($user != null) {

                    $_SESSION['id'] = $user->getId();
                    $_SESSION['photo']=$user->getPhoto();
                   
                    $type = PersonController::check($user->getId());
                    if($type==1)
                    {
                        $admin = new Admin();
                        $admin= Database::selectAdmin($_SESSION['id']);
                         $_SESSION['priority'] = $admin->getPriority();
                         $_SESSION['country_id'] = $admin->getCountryId();
                             
                    }
                    $_SESSION['type'] = $type;
                    
                    header("Location: login.php");
                    
                    
                    // echo $type;
                } else {
                    echo 'email or pass is incorrect';
                    if($lang == 2)
                    header("Location: login-register.php?valid=invalid");
                    else 
                        header("Location: login-register-ar.php?valid=invalid");
                    // header("Location: login.php");
                }
            } 
        }
    }


?>
