<?php
include_once  'User.php';
include_once  './Admin.php';
include_once  './Familiy.php';
include_once  './Product.php';
include_once './Country.php';
include_once './Advertisement.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author mohamed
 */
class  Database {

    public static function connect()
    {
    try {
    $dsn='mysql:host=ftp.osrmntja.com;dbname=osrmntja_osarmontja';
     $username='osrmntja';
     $password='kQ0mJTXVkgz5';
        $options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',);
         $con = new PDO($dsn, $username, $password, $options);
} catch (Exception $exc) {

    }
    return $con;
}
public static function selectpersonInfo ($id) 
{
    $person = new Person() ;
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, email, password, photo, phone_number FROM persons WHERE id = '$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
while($result = $query->fetch()){
       $person->setId($result['id']) ;
       $person->setEmail($result['email']);
       $person->setPassword($result['password']);
       $person->setPhoto($result['photo']);
       $person->setphone($result['phone_number']);

}
return $person;

    }
 else {
    return NULL;    
    }

}
public static function selectProducts ($id) 
{
    $products = array();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, name, price, information, date, photo, video FROM products WHERE family_id = '$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
       while($result = $query->fetch()){
            $product  = new Product();
       
       $product->setId($result['id']) ;
       $product->setName($result['name']);
       $product->setPrice($result['price']);
       $product->setDate($result['date']);
       $product->setPhoto($result['photo']);
           
       array_push($products, $product);
}

return $products;

    }
 else {
    return NULL;    
    }
    

}
public static function insertProduct($name,$description,$price,$photo,$video,$id,$date)
{
   
            $con= Database::connect();
                $query=$con->prepare("INSERT INTO `products` (`name`, `price`, `information`, `date`, `photo`, `video`, `family_id`) VALUES ('$name', '$price', '$description','$date', '$photo', '$video', '$id')");


                $result=$query->execute();
                echo $result;
}







public static function selectProduct($id)
{
     
    $product = new Product();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, name, price, information, date, photo, video,family_id  FROM products WHERE id = '$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
while($result = $query->fetch()){
       $product->setId($result['id']) ;
       $product->setName($result['name']);
       $product->setPrice($result['price']);
       $product->setInformation($result['information']);
       $product->setDate($result['date']);
       $product->setPhoto($result['photo']);
       $product->setVideo($result['video']);
       $product->setFamilyId($result['family_id']);



}
return $product;

    }
 else {
    return NULL;    
    }
}
public static function selectEmail($email)
{
 $sql_email="select email from person where email='$email';";
 $result_email=mysqli_query(self::conn(),$sql_email);
  $result_email_number=mysqli_num_rows($result_email);
  
  return( $result_email_number>0);
}
   ///////////////////////////////////////////////////////
    public static function selectPerson ($email) 
{
    $person = new Person() ;
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, email, password, photo FROM persons WHERE email = '$email'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
while($result = $query->fetch()){
       $person->setId($result['id']) ;
       $person->setEmail($result['email']);
       $person->setPassword($result['password']);
       $person->setPhoto($result['photo']);
}
return $person;

    }
 else {
    return NULL;    
    }

}
public static function selectUser ($id) 
{
    $user = new User();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, first_name, last_name FROM users WHERE id='$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
while($result = $query->fetch()){
       $user->setId($result['id']) ;
       $user->setFirst($result['first_name']);
       $user->setLast($result['last_name']);
}
return $user;

    }
 else {
    return NULL;    
    }

}
public static function selectFamiliy ($id) 
{
    $user = new Familiy();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, name, country_id FROM families WHERE id='$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
while($result = $query->fetch()){
       $user->setId($result['id']) ;
       $user->setName($result['name']);
       $user->setCountryId($result['country_id']);
}
return $user;

    }
 else {
    return NULL;    
    }

}
public static function selectAdmin ($id) 
{
    $user = new Admin();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, first_name, last_name, priority, country_id FROM admins WHERE id='$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {
while($result = $query->fetch()){
       $user->setId($result['id']) ;
       $user->setFirst($result['first_name']);
       $user->setLast($result['last_name']);
       $user->setPriority($result['priority']);
       $user->setCountryId($result['country_id']);


}
return $user;

    }
 else {
    return NULL;    
    }
    

}
public static function selectFamilies ($id) 
{
    $families = array();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, name FROM families WHERE country_id='$id'");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {

     while($result = $query->fetch()){
            $family  = new Familiy();
           
       $family->setId($result['id']) ;
       $family->setName($result['name']);
      
       array_push($families, $family);
     }

return $families;

    }
 else {
    return NULL;    
    }

}
    //////////////////////////////////////////////////////////////////////////
    public static function insertFollow($idUs,$idFam)
{
    $con= Database::connect();
                $query=$con->prepare("INSERT INTO `follow_family` (`family_id`, `user_id`) VALUES ('$idFam', '$idUs')");


                $result=$query->execute();
                echo $result;
}
public static function selectFollow($idUs,$idFam)
{
    $con= Database::connect();
                $query=$con->prepare("SELECT family_id, user_id FROM follow_family WHERE family_id='$idFam' AND user_id = '$idUs'");


               $query->execute();
                // $query->execute();
    
    //$query->execute(array($email,$pass));
     
    if($query->rowCount()>0)
    {
        return 1;
             
}
 else {
    return 0;    
}
}
public static function deletefollow($idUs,$idFam)
{
    $con= Database::connect();
                $query=$con->prepare("Delete FROM follow_family WHERE family_id='$idFam' AND user_id = '$idUs'");


               $query->execute();
                // $query->execute();
    
    //$query->execute(array($email,$pass));
     
   
}
    
    public static function selectFavouriteFamilies ($id) 
{
    $families = array();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, name, family_id FROM families, follow_family WHERE follow_family.user_id='$id' And families.id = follow_family.family_id ");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {

     while($result = $query->fetch()){
            $family  = new Familiy();
           
       $family->setId($result['id']) ;
       $family->setName($result['name']);
      
       array_push($families, $family);
     }

return $families;

    }
 else {
    return NULL;    
    }

}
    public static function deleteProduct($idPro)
{
    $con= Database::connect();
                $query=$con->prepare("Delete FROM products WHERE id = '$idPro'");


               $query->execute();
                // $query->execute();
    
    //$query->execute(array($email,$pass));
     
   
} public static function conn()
    {
         $conn=mysqli_connect("ftp.osrmntja.com","osrmntja","kQ0mJTXVkgz5","osrmntja_osarmontja");
        if(!$conn){
            die("could not connect: ".mysqli_connect_error());
        }else{
            $conn->set_charset("utf8");
        }
        return $conn;
    }

    
    
   /////////////bahi/////////////////////////////////
     public static function check_forget($unique_id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from forget_password where unique_id=?");
        $stmt->bind_param("s",$unique_id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }
    //edit
    public static function send_message($sender_id,$receiver_id,$message,$date){
        $conn=self::conn();
        $stmt=$conn->prepare("insert into messages (sender_id,receiver_id,message,date) values (?,?,?,?)");
        $stmt->bind_param("ssss",$sender_id,$receiver_id,$message,$date);
        $stmt->execute();
        // echo  $sender_id."<br>".$receiver_id."<br>".$message."<br>".$date;exit();
        $stmt->store_result();
        if($stmt->affected_rows>0)
        {
            $stmt2=$conn->prepare("update chats set state =1 where first_id=? and second_id=?");
            $stmt2->bind_param("ss",$receiver_id,$sender_id);
            $stmt2->execute();
            $stmt2->store_result();
            if($stmt2->affected_rows>0)return true;
        }
        else return false;
    }

//edit
    public static function get_messages($first_id,$second_id)
    {//edit
        $conn=self::conn();
        $stmt=$conn->prepare("select messages.message,messages.date,
                              messages.sender_id,messages.receiver_id from messages
                              where (messages.sender_id=? and messages.receiver_id=?) or (messages.sender_id=? and messages.receiver_id=?) order by messages.date ");
        $stmt->bind_param("ssss",$first_id,$second_id,$second_id,$first_id);
        $stmt->execute();
        $meta = $stmt->result_metadata();
        while ($field = $meta->fetch_field())
        {
            $params[] = &$row[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $params);
        $result=array();
        while ($stmt->fetch()) {
            foreach($row as $key => $val)
            {
                $c[$key] = $val;
            }
            $result[] = $c;
        }
        return $result;
    }
    public static function chat_existence($sender_id,$receiver_id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("select chat_id from chats where first_id=? and second_id=?");
        $stmt->bind_param("ss",$sender_id,$receiver_id);
        $stmt->execute();
        $stmt->bind_result($chat_id);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->store_result();
        return ($stmt->num_rows > 0);

    }

   
///////////////////////////////////////signup///
    public static function insertAdmin($first_name,$last_name,$email,$password,$phone_number,$country_id,$address,$date)
{

    $conn=Database::conn();
    $stmt=$conn->prepare("insert into persons (email,password,phone_number,address,registeration_date) VALUES (?,?,?,?,?)");
    $stmt2=$conn->prepare ("insert into admins (id,first_name,last_name,country_id) VALUES (LAST_INSERT_ID(),?,?,?)");
    $stmt->bind_param("sssss",$email,$password,$phone_number,$address,$date);
    $stmt2->bind_param("sss",$first_name,$last_name,$country_id);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->affected_rows>0)
    {
        $stmt2->execute();
        $stmt2->store_result();
        if($stmt2->affected_rows>0)return true;
        else
        {
            $sql="delete from persons where id=LAST_INSERT_ID()";
            mysqli_query($conn,$sql);
            return false;
        }
    }
    else return false;

}


    public static function insertUser($first_name,$last_name,$email,$password,$phone_number,$address,$birth_date,$date,$country_name)
{
    $conn=Database::conn();
    $stmt=$conn->prepare("insert into persons (email,password,phone_number,address,registeration_date) VALUES (?,?,?,?,?)");
    $stmt2=$conn->prepare ("insert into users (id,first_name,last_name,birth_date,country_name) VALUES (LAST_INSERT_ID(),?,?,?,?)");
    $stmt->bind_param("sssss",$email,$password,$phone_number,$address,$date);
    $stmt2->bind_param("ssss",$first_name,$last_name,$birth_date,$country_name);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->affected_rows>0)
    {
        $stmt2->execute();
        $stmt2->store_result();
        if($stmt2->affected_rows>0)return true;
        else
        {
            $sql="delete from persons where id=LAST_INSERT_ID()";
            mysqli_query($conn,$sql);
            return false;
        }
    }
    else return false;
}


    public static function insertFamily($name,$email,$password,$phone_number,$address,$starting_date,$date,$country_id)
{
    $conn=Database::conn();
    $stmt=$conn->prepare("insert into persons (email,password,phone_number,address,registeration_date) VALUES (?,?,?,?,?)");
    $stmt2=$conn->prepare ("insert into families (id,name,starting_date,country_id) VALUES (LAST_INSERT_ID(),?,?,?)");
    $stmt->bind_param("sssss",$email,$password,$phone_number,$address,$date);
    $stmt2->bind_param("sss",$name,$starting_date,$country_id);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->affected_rows>0)
    {
        $stmt2->execute();
        $stmt2->store_result();
        if($stmt2->affected_rows>0)return true;
        else
        {
            $sql="delete from persons where id=LAST_INSERT_ID()";
            mysqli_query($conn,$sql);
            return false;
        }
    }
    else return false;

}

//////////////////////edit///////////////////////////////////////////////////////

    public  static function check_email($email){
        $conn=Database::conn();
        $stmt=$conn->prepare("select email from persons where email= ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }


    public static function check_id($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from persons where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }


    public static function get_password($id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select password from persons where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['password'];
    }


    public  static function check_email_id($email,$id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select email from persons where email= ? and id !=?");
        $stmt->bind_param("ss",$email,$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }


    public static function get_id($email)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from persons where email= ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['id'];
    }


    public static function editEmail($id,$email)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update persons set email= ? where id= ?");
        $stmt->bind_param("ss",$email,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editPassword($id,$password)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update persons set password= ? where id= ?");
        $stmt->bind_param("ss",$password,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editPhoneNumber($id,$phone_number)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update persons set phone_number= ? where id= ?");
        $stmt->bind_param("ss",$phone_number,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editAddress($id,$address)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update persons set address= ? where id= ?");
        $stmt->bind_param("ss",$address,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editName($id,$name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update families set name= ? where id= ?");
        $stmt->bind_param("ss",$name,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editFirst_U($id,$first_name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update users set first_name= ? where id= ?");
        $stmt->bind_param("ss",$first_name,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editLast_U($id,$last_name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update users set last_name= ? where id= ?");
        $stmt->bind_param("ss",$last_name,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editFirst_A($id,$first_name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update admins set first_name= ? where id= ?");
        $stmt->bind_param("ss",$first_name,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function editLast_A($id,$last_name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update admins set last_name= ? where id= ?");
        $stmt->bind_param("ss",$last_name,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function update_profile_picture($id,$photo){
        $conn=Database::conn();
        $stmt=$conn->prepare("update persons set photo= ? where id= ?");
        $stmt->bind_param("ss",$photo,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }
///new
    public static function get_profile_picture($id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select * from persons where id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }


/////////////////////////conrolroom/////////////////////////
    public static function check_country($name){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from countries where name= ?");
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }

    public static function get_country_id2($name){
        $conn=Database::conn();
        $stmt=$conn->prepare("select * from countries where name= ?");
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }
    ////////////////new
    public static function get_country_flag($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select * from countries where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }

    public static function check_country_id($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from countries where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows >0);
    }

    public static function add_country($name){
        $conn=Database::conn();
        $stmt=$conn->prepare("insert into countries (name) values (?)");
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function get_countries_admins(){
        $conn=Database::conn();
        $sql="select  countries.id,admins.id,countries.name,countries.flag,persons.email,admins.first_name,admins.last_name,persons.registeration_date,admins.country_id from countries
              left join admins on countries.id=admins.country_id left join persons on persons.id=admins.id order by countries.id";
        $result=mysqli_query($conn,$sql);
        //$data[]=NULL;
        while ($row=mysqli_fetch_assoc($result))
        {
         //   if(empty($row['country_id']))
          //  $row['country_id']=$row['id'];
            $data[]=$row;
            $x=0;
        }

        $i=0;
        if(isset($data))
            foreach($data as $r){
                if(empty($r['country_id']))
                {
                    $names=self::get_country_id2($r['name']);
                    $data[$i]['country_id']=$names['id'];
                }
                $i++;
            }else return null;

        if($x>0)return null;
        else
        return $data;
    }


    public static function get_countries(){
        $conn=Database::conn();
        $sql="select  * from countries order by id";
        $result=mysqli_query($conn,$sql);
        $data[]=NULL;
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        return $data;
    }


    public static function check_auth($id,$country_id,$priority)
    {
        $conn=Database::conn();
        $stmt0=$conn->prepare("select id from admins where (id= ? and country_id = ?) or (id= ? and  priority= ?)");
        $stmt0->bind_param("ssss",$id,$country_id,$id,$priority);
        $stmt0->execute();
        $stmt0->bind_result($id);
        $stmt0->store_result();
        $stmt0->fetch();
        return ($stmt0->num_rows > 0);
    }


    public static function change_country_name($id,$country_id,$name,$priority)
    {
        if(!self::check_auth($id,$country_id,$priority)) return false;
        $conn=Database::conn();
        $stmt=$conn->prepare("update countries set name= ? where id= ?");
        $stmt->bind_param("ss",$name,$country_id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function change_country_flag($id,$country_id,$photo,$priority)
    {
        if(!self::check_auth($id,$country_id,$priority)) return false;
        $conn=Database::conn();
        $stmt=$conn->prepare("update countries set flag= ? where id= ?");
        $stmt->bind_param("ss",$photo,$country_id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function check_admin($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from admins where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }

    public static function check_user($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from users where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }

    public static function check_family($id,$country_id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from families where id= ? and country_id=?");
        $stmt->bind_param("ss",$id,$country_id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }


    public static function remove_person($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("delete  from persons where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function remove_country($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("delete  from countries where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function remove_product($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("delete  from products where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }


    public static function get_families($country_id){
        $conn=Database::conn();
        $cid=mysqli_real_escape_string($conn,$country_id);
        $sql="select  families.id,families.name,persons.email,families.starting_date,persons.registeration_date,persons.phone_number,persons.address,persons.photo from families
              inner join persons on persons.id=families.id where families.country_id = '$cid' order by families.id";
        $result=mysqli_query($conn,$sql);
        $data[]=null;
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        return $data;
    }


    public static function get_users(){
        $conn=Database::conn();
        $sql="select  users.id,users.first_name,users.last_name,persons.email,users.birth_date,persons.registeration_date,persons.phone_number,persons.address,persons.photo from users
              inner join persons on persons.id=users.id order by users.id";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        if(isset($data))return $data;
        else return null;
    }


    public static function get_country_id($admin_id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select county_id from admins where id= ?");
        $stmt->bind_param("s",$admin_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['county_id'];
    }


    public static function get_country($country_id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select * from countries where id= ?");
        $stmt->bind_param("s",$country_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }


    public static function getF_country_id($family_id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select county_id from families where id= ?");
        $stmt->bind_param("s",$family_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['county_id'];
    }


    public static function get_family_id($product_id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select family_id from products where id= ?");
        $stmt->bind_param("s",$product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['family_id'];
    }


//////////////////////profile/////////////////////////////
    public static function profile_family($id){
        $conn=Database::conn();
        $id=mysqli_real_escape_string($conn,$id);
        $sql="select  families.id,families.name,persons.email,families.starting_date,persons.registeration_date,persons.phone_number,
              persons.photo,persons.address,persons.photo,families.country_id,countries.flag from families
              inner join persons on persons.id=families.id inner join countries on countries.id=families.country_id  where families.id = '$id'";
        $result=mysqli_query($conn,$sql);
        $data[]=null;
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        return $data;
    }


    public static function profile_user($id){
        $conn=Database::conn();
        $id=mysqli_real_escape_string($conn,$id);
        $sql="select  users.id,users.first_name,users.last_name,persons.email,users.birth_date,persons.registeration_date,persons.phone_number,
              persons.photo,persons.address,persons.photo from users inner join persons on persons.id=users.id where users.id = '$id'";
        $result=mysqli_query($conn,$sql);
        $data[]=null;
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        return $data;
    }


    public static function profile_admin($id){
        $conn=Database::conn();
        $id=mysqli_real_escape_string($conn,$id);
        $sql="select  admins.id,admins.first_name,admins.last_name,persons.email,persons.registeration_date,persons.phone_number,
              persons.photo,persons.address,persons.photo,admins.country_id,countries.name,countries.flag from admins
              inner join persons on persons.id=admins.id left join countries on countries.id=admins.country_id  where admins.id = '$id'";
        $result=mysqli_query($conn,$sql);
        $data[]=null;
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        return $data;
    }


///////////////////////chat///////////////////


    public static function get_notifications($id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("select * from chats where first_id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }


    public static function set_chat($sender_id,$receiver_id,$id1,$id2)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("insert into chats (first_id,second_id,chat_id) values (?,?,?)");
        $stmt->bind_param("sss",$sender_id,$receiver_id,$id1);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows>0)
        {
            $stmt2=$conn->prepare("insert into chats (first_id,second_id,chat_id) values (?,?,?)");
            $stmt2->bind_param("sss",$receiver_id,$sender_id,$id2);
            $stmt2->execute();
            $stmt->store_result();
            if($stmt2->affected_rows<=0)
            {
                $sql="delete from chats where id=LAST_INSERT_ID()";
                mysqli_query($conn,$sql);
                return false;
            }
            else return true;
        }
        else return false;
    }


    public static function receive($first_id,$second_id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("update chats set state= 0 where first_id= ? and second_id=?");
        $stmt->bind_param("ss",$first_id,$second_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows>0)
            return true;
        else
            return false;
    }


    public static function get_chats($first_id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("select chats.chat_id,chats.first_id,chats.second_id,chats.state,persons.photo,persons.id,admins.first_name,
                              chats.state,admins.last_name,users.first_name,users.last_name,families.name from chats inner join persons on
                              chats.second_id = persons.id left join users on chats.second_id=users.id left join admins on chats.second_id=admins.id
                              left join families on chats.second_id=families.id
                              where chats.first_id=? order by chats.state DESC");
        $stmt->bind_param("s",$first_id);
        $stmt->execute();
        $meta = $stmt->result_metadata();
        while ($field = $meta->fetch_field())
        {
            $params[] = &$row[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $params);

        while ($stmt->fetch()) {
            foreach($row as $key => $val)
            {
                $c[$key] = $val;
            }
            $result[] = $c;
        }
        $i=0;
        if(isset($result))
        foreach($result as $r){
            if(empty($r['first_name'])&empty($r['name']))
            {
                $names=self::get_admin_name($r['second_id']);
                $result[$i]['first_name']=$names['first_name'];
                $result[$i]['last_name']=$names['last_name'];
            }
            $i++;
        }else return null;

        return $result;
    }


    public static function get_chat_id($first_id,$second_id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("select chat_id from chats where first_id=? and second_id=?");
        $stmt->bind_param("ss",$first_id,$second_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['chat_id'];

    }

    public static function get_admin_name($id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select first_name,last_name from admins where id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }


    public static function get_chat($chat_id,$id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("select chats.chat_id,chats.first_id,chats.second_id,chats.state,persons.photo,persons.id,admins.first_name,
                              chats.state,admins.last_name,users.first_name,users.last_name,families.name from chats inner join persons on
                              chats.second_id = persons.id left join users on chats.second_id=users.id left join admins on chats.second_id=admins.id
                              left join families on chats.second_id=families.id
                              where chats.chat_id=? and chats.first_id=? order by chats.state DESC");
        $stmt->bind_param("ss",$chat_id,$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }

    public static function chat_existence_by_id($chat_id)
    {
        $conn=self::conn();
        $stmt=$conn->prepare("select chat_id from chats where chat_id=?");
        $stmt->bind_param("s",$chat_id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);

    }

    ///////////forgetpassword//////////////////
    public static function insert_forget($id,$unique_id,$date)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("insert into forget_password (id,unique_id,date) VALUES (?,?,?)");
        $stmt->bind_param("sss",$id,$unique_id,$date);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows>0)
            return true;
        else
            return false;
    }

    public static function get_forget_id($unique_id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from forget_password where unique_id=?");
        $stmt->bind_param("s",$unique_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['id'];
    }

    public static function get_forget_forget_id($id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select unique_id from forget_password where id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc['unique_id'];
    }

    public static function delete_forget($unique_id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("delete from forget_password where unique_id=?");
        $stmt->bind_param("s",$unique_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows>0)
            return true;
        else
            return false;
    }

    public static function check_forget_id($id){
        $conn=Database::conn();
        $stmt=$conn->prepare("select unique_id from forget_password where id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->bind_result($unique_id);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }
    ///////////category
    public static function add_category($name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("insert into categories (cname) VALUES (?)");
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows>0)
            return true;
        else
            return false;
    }
    public static function get_categories()
    {
        $conn=Database::conn();
        $sql="select  * from categories where id!= 1";
        $result=mysqli_query($conn,$sql);
        $data= array();
        while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
        return $data;
    }
    public static function delete_category($id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("delete from categories where id=?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->affected_rows>0)
            return true;
        else
            return false;
    }
    public static function editC_name($id,$name)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("update categories set cname= ? where id= ?");
        $stmt->bind_param("ss",$name,$id);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->affected_rows<=0)return false;
        else return true;
    }
        public static function check_category($name){
        $conn=Database::conn();
        $stmt=$conn->prepare("select id from categories where cname= ?");
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->store_result();
        $stmt->fetch();
        return ($stmt->num_rows > 0);
    }
        public static function get_category($id)
    {
        $conn=Database::conn();
        $stmt=$conn->prepare("select * from categories where id= ?");
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $assoc = $result->fetch_assoc();
        return $assoc;
    }

    ////////////////////////////
    public static function selectCountries()
{
    $countries = array();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, name FROM countries");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {

     while($result = $query->fetch()){
            $country  = new Country();
           
       $country->setId($result['id']) ;
       $country->setName($result['name']);
      
       array_push($countries, $country);
     }

return $countries;

    }
 else {
    return NULL;    
    }
}
public static function insertAdvertisement($name,$link,$photo,$id,$position,$home)
{
   
            $con= Database::connect();
                $query=$con->prepare("INSERT INTO `Advertisement` (`name`, `link`, `position`, `photo`, `country_id`, `check_home`) VALUES ('$name', '$link','$position', '$photo', '$id', '$home')");


                $result=$query->execute();
                //echo $result;
}
    
    
     public static function selectAdvertisementMain ($position) 
{
    $advertisements = array();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, photo, link, position FROM advertisement WHERE check_home='1' And position = '$position' ");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {

     while($result = $query->fetch()){
            $advertisement  = new Advertisement();
           
       $advertisement->setId($result['id']) ;
       $advertisement->setPhoto($result['photo']);
       $advertisement->setLink($result['link']);
              

      
       array_push($advertisements, $advertisement);
     }

return $advertisements;

    }
 else {
    return NULL;    
    }

}
public static function selectAdvertisementCountry ($id,$position) 
{
    $advertisements = array();
    try {
        $con= Database::connect();
    $query=$con->prepare("SELECT id, photo, link, position FROM advertisement WHERE country_id='$id' And position = '$position' ");
    $query->execute();
    
    //$query->execute(array($email,$pass));
    } catch (Exception $ex) {
            echo $exc->getTraceAsString();

    }
    if($query->rowCount()>0)
    {

     while($result = $query->fetch()){
            $advertisement  = new Advertisement();
           
       $advertisement->setId($result['id']) ;
       $advertisement->setPhoto($result['photo']);
       $advertisement->setLink($result['link']);
              

      
       array_push($advertisements, $advertisement);
     }

return $advertisements;

    }
 else {
    return NULL;    
    }

}

}
