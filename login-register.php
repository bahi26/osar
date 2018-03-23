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
                    header("Location: login-register.php?add=empty");
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
                    header("Location: login-register.php?add=invalid");
                    exit();
                } else {
                    //check if there's similar exists
                    if (Database::check_email($email)) {
                        header("Location: login-register.php?add=exists&id=".$Countr);
                        exit();
                    } else {
                        //password encryption
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        //inseting data into the table
                        $birth_date="";
                        $country_name="";
                        Database::insertUser($first_name,$last_name,$email,$hashed_password,$phone_number,$address,$birth_date,$date,$country_name);
                        send_mail($email,$first_name." ".$last_name);
                        header("Location: login-register.php?add=success");
                        exit();
                    }
                }
            }
            else {
                header("Location: login-register.php?add=logged");
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
                    header("Location: login-register.php?add=empty");
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
                    header("Location: login-register.php?add=invalid");
                    exit();
                }
                else {
                    //check if there's similar exists
                    if (Database::check_email($email)) {
                        header("Location: login-register.php?add=exists&id=".$Countr);
                        exit();
                    } else {
                        //password encryption
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        //inseting data into the table
                        $starting_date="";
                        Database::insertFamily($name,$email,$hashed_password,$phone_number,$address,$starting_date,$date,$country_id);
                        send_mail($email,$name);
                        header("Location: login-register.php?add=success");
                        exit();
                    }
                }
            }
            else {
                header("Location: login-register.php?add=logged");
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
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700">

        <!-- Css Base And Vendor 
		===========================-->
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.css">
        <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.css">
        
        <!-- Site Style
		===========================-->
        <link rel="stylesheet" href="css/style.css">        
        <link rel="stylesheet" href="css/black.css">        
        <link rel="stylesheet" href="css/default.css">        
         
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
                        <header class="header">
                            <a class="col-xs-5 col-sm-3 col-md-2 logo" href="index.php">
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
                                                <li><a href="blogs.php">Blogs</a></li>
                                                <li><a href="login-register.php">Login</a></li>
                                                <li><a href="login-register.php">Register</a></li>
                                                <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>
                                                <li><a href="login-register-ar.php?id=<?php echo $country_id; ?>">Arabic</a></li>
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
                                    About Us
                                </a> 
 <div class='main-drop full-mega'>
                                   
                                    <div class='col-md-6'>
                                        <h3>Terms Of Use</h3>
                                                                                <a href='faq.php'>Faq</a>

                                        <a href='terms-en.php'>terms</a>
                                    </div><!--End col-md-3-->
                                   
                                    <div class='col-md-6'>
                                        <h3>Contact Us</h3>
                                        <a href='about-us-en.php'>about Us</a>
                                        <a href='contact.php'>contact Us</a>
                                    </div><!--End col-md-3-->
                                </div><!--End mega-menu-->                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    The Gifts
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            Gifts
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            Distributions

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Gift Packaging
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Others
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    Clothing & accessories
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            Mens
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            Women
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    Children & newborns

                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            Children
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            Daughters

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Newborns
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    Food & Beverage
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            Pastries
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            Candy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Main Dishes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Soups
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Drinks
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Appetizer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Side Dishes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Others
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href="#">
                                    Handcrafts
                                </a>  
                                <ul class="main-drop">
                                    <li>
                                        <a href="#">
                                            Straw works
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href="#">
                                            Sewing & embroidery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Wool & crochet
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li class="active">
                                <a href="contact.php">
                                    Contact Us
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                                    </li><!--End Menu Item-->


                                    </ul><!--End menu-nav -->
                                </div><!--End site-menu-->
                            </div><!--End main-header-->
                        </header><!--End header-->            <div class="main" role="main">
                <div class="page-content">
                    <div class="container">                        
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="box-wrap brdr-rd-3">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="login-register">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#login" data-toggle="tab">
                                                            login
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#register" data-toggle="tab">
                                                            user register
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#dealer_register" data-toggle="tab">
                                                            Family register
                                                        </a>
                                                    </li>
                                                </ul><!--End nav-tabs-->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="login">
                                                        <form class='login-form' method='post'action='login.php?id=<?php echo $country_id ?>&lang=<?php echo '2' ?>'>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="email" name='email'  class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name='password' placeholder="password" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="remmeber">
                                                                    <input id="remmeber" type="checkbox">
                                                                    
                                                                </div>
                                                                <div class="forget-pass">
                                                                    <a href="forget-password.php">
                                                                        forget your password ?
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <button class="custom-btn">login</button>
                                                          
                                                        </form>
                                                    </div><!--End tab-pane-->
                                                    <div class="tab-pane fade in" id="register">
                                                       
                                                        
                                                        <form  method='post' name='myForm'  action='login-register.php' >
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='frist name' class='form-control'name='first_name' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='last name' class='form-control'name='last_name' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='phone number' class='form-control'name='phone_number' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='text' placeholder='address' class='form-control'name='address' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='email' placeholder='email address' class='form-control'name='email' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='password' placeholder='password' class='form-control'name='password' required>
                                                            </div>
                                                            <div class='form-group'>
                                                                <input type='password' placeholder='confirm password' class='form-control'name='Confirm_password' required >
                                                            </div>
                                                            <button class='custom-btn' name='add-user-submit' >register</button>
                                                            
                                      
                                                        </form>
                                                        
                                                    </div>
                                                    
                                                    
                                                    <div class="tab-pane fade in" id="dealer_register">
                                                        <form method='post' name='myForm'  action='login-register.php' >
                                                            <div class="form-group">
                                                                <input type="text" placeholder="name" class="form-control" name='name' required>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <input type="text" placeholder="phone number" class="form-control"name='phone_number'>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="address" class="form-control"name='address' required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" placeholder="email address" class="form-control" name='email' required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" placeholder="password" class="form-control"name='password' required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" placeholder="confirm password" class="form-control"name='confirm_password' required>
                                                            </div>
                                                                 					
				           <select class='form-control' name='country_id' >
                                             <option class="form-group" value=''>Country...</option>";
                                                    <?php if(!is_array($countries))exit();
                                                    foreach($countries as $country)
                                                    {if(!empty($country['id']))
                                                        echo"
                                                    <option value='".$country['country_id']."'>".$country['name']."</option>";}
            echo"
                                                </select>";
            ?>
                                             <br/>
                                                            <button class="custom-btn" name='add-family-submit'>register</button>
                                                          
                                                        </form>
                                                    </div>
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
                                        <h3>Contact Us</h3>
                                    </div><!--End widget-title-->
                                    <div class="widget-content">
                                        <ul class="contact-widget">
                                            <li>
                                                <i class="fa fa-map-marker"></i>
                                                <span>Saudi Arabia</span>
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
                                        <h3>Connect With Us</h3>
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
                                            <li><a href="index.php">home</a></li>
                                            <li><a href="about-us-en.php">about us</a></li>
                                            <li><a href="faq.php">faq</a></li>
                                            <li><a href="terms-en.php">terms</a></li>
                                            <li><a href="blogs.php">blog</a></li>
                                            <li><a href="contact.php">contact us</a></li>
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