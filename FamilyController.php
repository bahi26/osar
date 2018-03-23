<?php
include_once './Database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FamilyController
 *
 * @author mohamed
 */
class FamilyController {
    public static function addProduct($name,$description,$price,$photo,$video,$id)
    {
       $date =  date('y/m/d h/m/s');
       Database::insertProduct($name, $description, $price, $photo, $video, $id, $date);
        
}
 public static function selectProducts($id)
    {
       return Database::selectProducts($id);
        
}
    public static function remove_family($family_id){
            if (isset($_SESSION['priority']))
            {

                if(!Database::check_family($family_id,1))
                {
                    header("Location: HFamily-product.php?remove=exist");
                    exit();
                }
                else
                {
                    if(Database::remove_person($family_id))
                    {
//                        header("Location: HFamily-product.php?remove=success");
  //                      exit();
                    }
                    else
                    {
                        header("Location: HFamily-product.php?remove=error");
                        exit();
                    }
                }
            }
            else
            {
                header("Location: HFamily-product.php?remove=auth");
                exit();
            }

    }
    
    
}
