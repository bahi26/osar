<?php
include_once 'signupController.php';
include_once './Database.php';
$countries=signupController::get_countries();
 if (isset($_POST['add-user-submit']))
        {
           
            if (!isset($_SESSION['id']))
            {
                
                //get the data from the front
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
               
                $date=date('Y-m-d H:i:s');
             
                $address=$_POST['address'];
                $phone_number=$_POST['phone_number'];
               // echo $first_name .$last_name. $email  . $password.  $phone_number;
              
                if (empty($address)) $address = NULL;

                //check if there's empty fields
                if (empty($first_name) || empty($last_name) || empty($email)
                    || empty($password) || empty($phone_number)   )
                {
                    header("Location: login-register-ar.php?add=empty");
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
                    header("Location: login-register-ar.php?add=invalid");
                    exit();
                } else {
                    //check if there's similar exists
                    if (Database::check_email($email)) {
                        header("Location: login-register-ar.php?add=exists&id=".$Countr);
                        exit();
                    } else {
                        //password encryption
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        //inseting data into the table
                        $birth_date="";
                        $country_name="";
                        Database::insertUser($first_name,$last_name,$email,$hashed_password,$phone_number,$address,$birth_date,$date,$country_name);
                        send_mail($email,$name);
                        header("Location: login-register-ar.php?add=success");
                        exit();
                    }
                }
            }
            else {
                header("Location: login-register-ar.php?add=logged");
                exit();
            }

        }
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
                    || empty($password) || empty($phone_number) || empty($country_id) )  
                {
                    header("Location: login-register-ar.php?add=empty");
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
                    header("Location: login-register-ar.php?add=invalid");
                    exit();
                }
                else {
                    //check if there's similar exists
                    if (Database::check_email($email)) {
                        header("Location: login-register-ar.php?add=exists&id=".$Countr);
                        exit();
                    } else {
                        //password encryption
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        //inseting data into the table
                        $starting_date="";
                        Database::insertFamily($name,$email,$hashed_password,$phone_number,$address,$starting_date,$date,$country_id);
                        send_mail($email,$name);
                        header("Location: login-register-ar.php?add=success");
                        exit();
                    }
                }
            }
            else {
                header("Location: login-register-ar.php?add=logged");
                exit();
            }

        }
function send_mail($email,$name)
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
                    <h3>Hi ".$name."</h3>
                    <p>you've just signed in with ".$email.".</p>
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


$msg="error";
 if(isset($_GET['valid']))
 {
     //$msg=$_GET['id'];
     $msg = "Email or password is incorrect";
     $display="inline";
 }
else
{
         $display="none";

}
$id = 1;
$country_id = $id;
             
$advs_up=Database::selectAdvertisementCountry($id,"up");
$advs_left=Database::selectAdvertisementCountry($id,"left");
$advs_bottom=Database::selectAdvertisementCountry($id,"bottom");
$advUp=new Advertisement();
$advUp=$advs_up[count($advs_up)-1];

$advleft=new Advertisement();
$advleft=$advs_left[count($advs_left)-1];

$advdown=new Advertisement();
$advdown=$advs_bottom[count($advs_bottom)-1];
$photo1;
$link1;

if($advUp==null){
    $photo1="advertisement.jpg";
    $link1="";
}
else{
    $photo1=$advUp->getPhoto();
    $link1=$advUp->getLink();
}

$photo2;
$link2;
if($advleft==null){
    $photo2="advertisement.jpg";
    $link2="";
}
else{
    $photo2=$advleft->getPhoto();
    $link2=$advleft->getLink();
}

$photo3;
$link3;
if($advdown==null){
    $photo3="advertisement.jpg";
    $link3="";
}
else{
    $photo3=$advdown->getPhoto();
    $link3=$advdown->getLink();
}


?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Basic page needs
		===========================-->
		<title>الأسر المنتجة</title>
		<meta charset="utf-8">
		<meta name="author" content="">
		<meta name="description" content="">
		<meta name="keywords" content="">        
        
        <!-- Mobile specific metas
		===========================-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Favicon
		===========================-->
		<link rel="shortcut icon" type="image/x-icon" href="images/fave.png">
        
        <!-- Google Web Fonts 
		===========================-->        
        
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css">

        <!-- Css Base And Vendor 
		===========================-->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-arabic.css">
        <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.css">
        <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.css">
        <!-- Site Style
		===========================-->
        <link rel="stylesheet" href="css/style.css">        
        <link rel="stylesheet" href="css/black.css">        
        <link rel="stylesheet" href="css/default.css">        
        <link rel="stylesheet" href="css/style-arabic.css"> 
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
     <header class="header">
                    <a class="col-xs-5 col-sm-3 col-md-2 logo" href="index-en.php">
                        <img src="images/logo3.png">
                    </a><!--End logo-->
                    <div class="col-xs-5 col-sm-7 col-md-9 main-header">
                        <div class="header-top">
                            <div class="navbar top-navbar" role="navigation">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".top-navbar .navbar-collapse">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <nav class="collapse collapsing navbar-collapse">
                                    <ul class="nav navbar-nav">
                                                                                <li><a href="blogs-ar.php">مجتمع المنصة</a></li>

                                                                                <li><a href="login-register-ar.php">تسجيل دخول</a></li>
                                                                                <li><a href="login-register-ar.php">انشاء حساب</a></li>


                                                                                <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">شركة التوصيل</a></li>

                                        <li><a href="login-register.php?id=<?php echo $country_id; ?>">الإنجليزية</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                           
                        </div><!--End header-top-->
                        <div class="menu-toggle">
                            <span>menu toggle</span>
                        </div>
                        <div class="site-menu">
                            <div class="menu-toggle">
                                menu toggle
                            </div>
                        <ul class="menu-nav">
                            <li class="active">
                                <a href="">
                                    عن الموقع
                                </a> 
  <div class='main-drop full-mega'>
                                    <div class='col-md-6'>
                                        <h3>شروط الإستخدام</h3>
                                        <a href='faq-ar.php'>أسئلة شائعة</a>
                                        <a href='terms-ar.php'>الشروط والاحكام</a>
                                    </div><!--End col-md-3-->
                                   
                                    <div class='col-md-6'>
                                        <h3>تواصل معنا</h3>
                                        <a href='about-us-ar.php'>عن الموقع</a>
                                        <a href='contact-ar.php'>اتصل بنا</a>
                                    </div><!--End col-md-3-->
                                </div><!--End mega-menu-->                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    الهدايا
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            هدايا
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            توزيعات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            تغليف هدايا
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    الملابس وملحقاتها
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            رجال
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            نساء
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    الأطفال والمواليد
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            أولاد
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            بنات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            مواليد
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    المأكولات والمشروبات
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            معجنات
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            الحلويات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            أطباق رئيسية
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            الشوربات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            مشروبات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            مقبلات
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            أطباق جانبية
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    أعمال يدوية
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            أعمال القش
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            الخباطة والتطريز
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            الصوف والكروشية
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li>
                                <a href="contact-ar.php">
                                    اتصل بنا
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                        </div><!--End site-menu-->
                    </div><!--End main-header-->
                </header><!--End header-->
            <div class="main" role="main">
                <div class="page-content">
                    <div class="container">                        
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="box-wrap brdr-rd-3">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="login-register">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#login" data-toggle="tab">
                                                            تسجيل الدخول
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#register" data-toggle="tab">
                                                            حساب مستخدم جديد
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#dealer_register" data-toggle="tab">
                                                            حساب تاجر جديد
                                                        </a>
                                                    </li>
                                                </ul><!--End nav-tabs-->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="login">
                                                          <form class='login-form' method='post'action='login.php?id=<?php echo $country_id ?>&lang=<?php echo '1' ?>'>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="البريد الالكتروني" name='email'  class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name='password' placeholder="كلمة المرور" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="remmeber">
                                                                    <input id="remmeber" type="checkbox">
                                                                    
                                                                </div>
                                                                <div class="forget-pass">
                                                                    <a href="forget-password.php">
                                                                        نسيت كلمة السر؟
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <button class="custom-btn">تسجيل دخول</button>
                                                          
                                                        </form>
                                                    </div><!--End tab-pane-->
                                                    <div class="tab-pane fade in" id="register">
                                                        <form  method='post' name='myForm'  action='login-register.php' >
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='الاسم الاول' class='form-control'name='first_name' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='الاسم الاخير' class='form-control'name='last_name' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='رقم الهاتف' class='form-control'name='phone_number' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='العنوان' class='form-control'name='address' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='email' placeholder='البريد الالكتروني' class='form-control'name='email' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='password' placeholder='كلمة المرور' class='form-control'name='password' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='password' placeholder='تاكيد كلمة المرور' class='form-control'name='Confirm_password' required >
                                                            </div>
                                                            <button class='custom-btn' name='add-user-submit' >التسجيل</button>
                                                            
                                      
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade in" id="dealer_register">
                                                         <form method='post' name='myForm'  action='login-register.php' >
                                                            <div class="form-group">
                                                                <input type="text" placeholder="الاسم" class="form-control" name='name' required>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <input type="text" placeholder="رقم الهاتف" class="form-control"name='phone_number'>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="العنوان" class="form-control"name='address' required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" placeholder="البريد الالكتروني" class="form-control" name='email' required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" placeholder="كلمة المرور" class="form-control"name='password' required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" placeholder="تاكيد كلمة المرور" class="form-control"name='confirm_password' required>
                                                            </div>
                                                                 					
				           <select class='form-control' name='country_id' >
                                             <option class="form-group" value=''>الدولة   </option>
                                                    <?php if(!is_array($countries))exit();
                                                    foreach($countries as $country)
                                                    {if(!empty($country['id']))
                                                        echo"
                                                    <option value='".$country['country_id']."'>".$country['name']."</option>";}
            echo"
                                                </select>";
            ?>
                                             <br/>
                                                            <button class="custom-btn" name='add-family-submit'>التسجيل</button>
                                                          
                                                        </form>
                                                    
                                                </div><!--End tab-content-->
                                            </div><!--End login-register-->
                                        </div><!--End col-md-10-->
                                    </div><!--End row-->
                                </div><!--End box-wrap-->
                            </div><!--End col-md-8-->
                        </div><!--End Row-->  
                    </div><!--End container-fluid-->
                </div><!--End page-content-->
                 <footer class="footer">
                <div class="footer-widgets">
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>اتصل بنا</h3>
                            </div><!--End widget-title-->
                            <div class="widget-content">
                                <ul class="contact-widget">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <span>السعودية</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-whatsapp"></i>
                                        <span>00966504627062</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>
                                        <span>osrmntja@hotmail.com</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-whatsapp"></i>
                                        <span>00966504627062</span>
                                    </li>
                                </ul><!--End contact-widget-->    
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4-->
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>كن على تواصل</h3>
                            </div><!--End widget-title-->
                            <div class="widget-content">
                                <ul class="social-widget">
                                    <li>
                                                <a href="https://www.facebook.com/osrmntja" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/@osrmntja" target="_blank" >
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/osrmntjaar/" target="_balnk">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                    </li>
                                   
                                </ul>
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                        <!--End widget-->
                    </div><!--End col-md-4-->
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <img src="images/footer.png">
                            </div><!--End widget-title-->
                            <div class="widget-content">
                                <ul class="tags tabel-tags map-widget">
                                    <li><a href="index-en.php">الرئيسية</a></li>
                                    <li><a href="about-us-ar.php">عن الموقع</a></li>
                                    <li><a href="faq-ar.php">اسئلة شائعة</a></li>
                                    <li><a href="terms-ar.php">البنود</a></li>
                                    <li><a href="blogs-ar.php">مجتمع المنصة</a></li>
                                    <li><a href="contact-ar.php">اتصل بنا</a></li>
                                </ul>
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4--> 
                </div><!--End footer-widgets-->
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                made with
                                <i class="fa fa-heart"></i> By <a href="">Three codes</a>
                            </div>
                            <!--End col-md-6-->
                            <div class="col-xs-6 text-right">
                                CopyRight  © 2017 osrmntja.com
                            </div>
                            <!--End col-md-6-->
                        </div>
                        <!--End row-->
                    </div>
                    <!--End container-->
                </div>
                <!--End copyright-->
            </footer><!--End Footer-->
            </div><!--End main-->
        </div><!--End Wrapper-->
     
        
        <!--Scripts Plugins-->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/countdown.js"></script>
        <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>
        <script src="vendor/jcarousellite.js"></script>
        
        <script src="js/main.js"></script>
    </body>
</html>    
