<?php
include_once 'signupController.php';
session_start();
$countries=signupController::get_countries();
$advs_up=Database::selectAdvertisementMain("up");
$advs_left=Database::selectAdvertisementMain("left");
$advs_bottom=Database::selectAdvertisementMain("bottom");
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
 $type = null;
        if (isset($_SESSION['id'])) {
            $id=$_SESSION['id'];
             $type = $_SESSION['type'];
                 if($type == 3){
                    echo"
                <script>
                    document.getElementById('acc').remove();
                      document.getElementById('logout').remove();
                    document.getElementById('admin').remove();
                    document.getElementById('user').remove();
                </script>
                        ";
                 }
                 elseif($type == 2){
                      echo"
                <script>
                      document.getElementById('acc').remove();
                      document.getElementById('logout').remove();
                    document.getElementById('admin').remove();
                    document.getElementById('family').remove();
                </script>
                        ";     
                 }
                 elseif($type == 1){
                   echo"
                <script>
                    document.getElementById('default').remove();
                    document.getElementById('user').remove();
                    document.getElementById('family').remove();
                </script>
                        ";  
                 }
             }
            else{
                echo"
                <script>
                    document.getElementById('user').remove();
                    document.getElementById('admin').remove();
                    document.getElementById('family').remove();
                </script>
            ";
            }
    

echo

"


<!DOCTYPE html>
<html>
    <head>
        <!-- Basic page needs
		===========================-->
		<title>الأسر المنتجة</title>
                
		<meta charset='utf-8'>
		<meta name='author' content=''>
		<meta name='description' content=''>
		<meta name='keywords' content=''>        
        
        <!-- Mobile specific metas
		===========================-->
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>        
        <meta http-equiv=X-UA-Compatible' content='IE=edge'>
        
        <!-- Favicon
		===========================-->
		<link rel='shortcut icon' type='image/x-icon' href='images/fave.png'>
        
        <!-- Google Web Fonts 
		===========================-->        
        
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>

        <!-- Css Base And Vendor 
		===========================-->
        <link rel='stylesheet' href='vendor/bootstrap/css/bootstrap.css'>
        <link rel='stylesheet' href='vendor/jquery-ui/jquery-ui.min.css'>
        <link rel='stylesheet' href='vendor/font-awesome/css/font-awesome.min.css'>
        <link rel='stylesheet' href='vendor/owl-carousel/css/owl.carousel.css'>
        <link rel='stylesheet' href='vendor/owl-carousel/css/owl.theme.css'>
        
        <!-- Site Style
		===========================-->
        <link rel='stylesheet' href='css/style.css'>        
        <link rel='stylesheet' href='css/black.css'>        
        <link rel='stylesheet' href='css/default.css'>        
         
        <!--[if lt IE 9]>
            <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
            <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
    </head>
   
<body class=طintro-pageط>
    <div class='wrapper'>
    ";
if($type==2)
{
    
echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                    <img src='images/logo3.png'>
                </a>
            <!--End logo-->
            <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                <div class='menu-toggle'>
                    <span>menu toggle</span>
                </div>
                <div class='site-menu'>
                    <div class='menu-toggle'>
                        menu toggle
                    </div>
                    <ul id=user class='menu-nav'>
 <li>
                            <a href='profile-user.php'>
                                    my account
                                </a>
                        </li>
                        <li>
                            <a href='favourite.php?id=$id'>
                                    my favourite
                                </a>
                        </li>
                        <li>
                            <a href='about-us-en.php'>
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
                                </div><!--End mega-menu-->
                        </li>
                        <li>
                            <a href='blogs.php'>
                                    Blogs
                                </a>
                        </li>
                        
                       <li>
                            <a href='Nutrition-Family.php'>
Nutrition & Family
</a>
                        </li>
                        <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    Delivery Company
                                </a>
                        </li>
                        <li>
                            <a href='Training.php'>
                                    Training Hall
                                </a>
                        </li>
                      <li>
                            <a href='media.php'>
                                    Media 
                                </a>
                        </li>
                        
                        <li class='active'>
                            <a href='logout.php'>
                                    Logout
                                </a>
                        </li>
                       
                        <li class='active'>
                            <a href='#'>
                                    Choose Laungue
                                </a>
                            <ul class='main-drop'>
                                <li>
                                    <a href='index.php'>
                                    arabic
                                </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
</header>";}
elseif($type==1)
{
    
echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                    <img src='images/logo3.png'>
                </a>
            <!--End logo-->
            <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                <div class='menu-toggle'>
                    <span>menu toggle</span>
                </div>
                <div class='site-menu'>
                    <div class='menu-toggle'>
                        menu toggle
                    </div>
                    <ul id=user class='menu-nav'>
 <li>
                            <a href='profile-user.php'>
                                    my account
                                </a>
                        </li>
                        <li>
                            <a href='HAdmin-Dashboard.php?id=$id'>
                                    Dashbaord
                                </a>
                        </li>
                        <li>
                            <a href='about-us-en.php'>
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
                                </div><!--End mega-menu-->
                        </li>
                        <li>
                            <a href='blogs.php'>
                                    Blogs
                                </a>
                        </li>
                       
                        <li>
                            <a href='Nutrition-Family.php'>
Nutrition & Family
</a>
                        </li>
                        <li>
                           <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    Delivery Company
                                </a>
                        </li>
                        <li>
                            <a href='Training.php'>
                                    Training Hall
                                </a>
                        </li>
                      <li>
                            <a href='media.php'>
                                    Media 
                                </a>
                        </li>
                        
                        <li class='active'>
                            <a href='logout.php'>
                                    Logout
                                </a>
                        </li>
                       
                        <li class='active'>
                            <a href='#'>
                                    Choose Laungue
                                </a>
                            <ul class='main-drop'>
                                <li>
                                    <a href='index.php'>
                                    arabic
                                </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
</header>";}
elseif($type==3)
{
    
echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                    <img src='images/logo3.png'>
                </a>
            <!--End logo-->
            <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                <div class='menu-toggle'>
                    <span>menu toggle</span>
                </div>
                <div class='site-menu'>
                    <div class='menu-toggle'>
                        menu toggle
                    </div>
                    <ul id=user class='menu-nav'>
 <li>
                            <a href='profile.php'>
                                    my account
                                </a>
                        </li>
                        <li>
                            <a href='add-product.php?id=$id'>
                                    add product
                                </a>
                        </li>
                         <li>
                            <a href='family-products.php?id=$id'>
                                    my products
                                </a>
                        </li>
                        <li>
                            <a href='about-us-en.php'>
                                    About Us
                                </a>
                            <div class='main-drop full-mega'>
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
                                </div><!--End mega-menu-->
                        </li>
                        <li>
                            <a href='blogs.php'>
                                    Blogs
                                </a>
                        </li>
                         <li>
                            <a href='Nutrition-Family.php'>
Nutrition & Family
</a>
                        </li>
                      
                         <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    Delivery Company
                                </a>
                        </li>
                        <li>
                            <a href='Training.php'>
                                    Training Hall
                                </a>
                        </li>
                      <li>
                            <a href='media.php'>
                                    Media 
                                </a>
                        </li>
                        
                        <li class='active'>
                            <a href='logout.php'>
                                    Logout
                                </a>
                        </li>
                       
                        <li class='active'>
                            <a href='#'>
                                    Choose Laungue
                                </a>
                            <ul class='main-drop'>
                                <li>
                                    <a href='index.php'>
                                    arabic
                                </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
</header>";}

 else {
    echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                    <img src='images/logo3.png'>
                </a>
            <!--End logo-->
            <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                <div class='menu-toggle'>
                    <span>menu toggle</span>
                </div>
                <div class='site-menu'>
                    <div class='menu-toggle'>
                        menu toggle
                    </div>
                    <ul id=user class='menu-nav'>

                        <li>
                            <a href='about-us-en.php'>
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
                                </div><!--End mega-menu-->
                        </li>
                        <li>
                            <a href='blogs.php'>
                                    Blogs
                                </a>
                        </li>
                        
                       <li>
                            <a href='Nutrition-Family.php'>
Nutrition & Family
</a>
                        </li>
                         <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    Delivery Company
                                </a>
                        </li>
                        <li>
                            <a href='Training.php'>
                                    Training Hall
                                </a>
                        </li>
                      <li>
                            <a href='media.php'>
                                    Media 
                                </a>
                        </li>
                        <li class='active'>
                            <a href='login-register.php'>
                                    Login
                                </a>
                        </li>
                       
                      
                       
                        <li class='active'>
                            <a href='#'>
                                    Choose Laungue
                                </a>
                            <ul class='main-drop'>
                                <li>
                                    <a href='index.php'>
                                    arabic
                                </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
</header>";
}
echo "
        <!--End header-->
            <div class='main' role='main'>
            <div class='ads-widget'>
                <img src='images/banners/banner-5.jpg' alt=''>
            </div>
            <div class='main' role='main'>
                <div class='page-content'>
                    <div class='container'>                        
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='ads-widget'>
                                    <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'><img src='images/banners/adv.jpg'alt=''></a>
                                </div>
                            </div><!--End Col-md-4-->
                            <div class='col-md-8'>
                            

                                <div class='country-box'>
                                    <div class='row'>
                                        <div class='col-md-12'>
                                        <h2 class='title-lg'>
                                            <i class='fa fa-globe'></i>
                                            Please Select Your Country And Join Us
                                          </div>
                                          ";
            
                                if(is_array($countries))
                                
                                foreach($countries as $country)
                                {
                                            if (!empty($country['id'])) 
                                            
            echo "
                               
                                    <div class='col-md-2'>
                                        <a href='home.php?id=".$country['country_id']."' class='country-item'>
                                            <div class='img-wrapp'>
                                                <img src='flags/".$country['flag']."'>
                                            </div>
                                            <h3 class='title'>".$country['name']."</h3>
                                        </a>
                                    </div><!--End Col-md-2-->";
                                }
                                   
                              
              echo "                  
                                   
                                   
                                 
                                
                                    </div><!--End Row-->
                                </div><!--End Country-box-->
                            </div><!--End Col-md-8-->
                        </div><!--End Row-->
                       <div class='row'>
                        <div class='col-xs-12'>
                            <div class='ads-widget'>
                                <img src='images/banners/banner-5.jpg' alt=>
                            </div>
                        </div>
                        <!--End Col-xs-12-->
                    </div>
                    </div><!--End container-fluid-->
                </div><!--End page-content-->
               
    </body>
                                </html> ";
                