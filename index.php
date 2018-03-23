<?php

include_once 'signupController.php';
session_start();
$countries = signupController::get_countries();
$advs_up = Database::selectAdvertisementMain("up");
$advs_left = Database::selectAdvertisementMain("left");
$advs_bottom = Database::selectAdvertisementMain("bottom");
$advUp = new Advertisement();
$advUp = $advs_up[count($advs_up) - 1];

$advleft = new Advertisement();
$advleft = $advs_left[count($advs_left) - 1];

$advdown = new Advertisement();
$advdown = $advs_bottom[count($advs_bottom) - 1];
$photo1;
$link1;
if ($advUp == null) {
    $photo1 = "advertisement.jpg";
    $link1 = "";
} else {
    $photo1 = $advUp->getPhoto();
    $link1 = $advUp->getLink();
}

$photo2;
$link2;
if ($advleft == null) {
    $photo2 = "advertisement.jpg";
    $link2 = "";
} else {
    $photo2 = $advleft->getPhoto();
    $link2 = $advleft->getLink();
}

$photo3;
$link3;
if ($advdown == null) {
    $photo3 = "advertisement.jpg";
    $link3 = "";
} else {
    $photo3 = $advdown->getPhoto();
    $link3 = $advdown->getLink();
}
$type = null;
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $type = $_SESSION['type'];
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
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>

    <!-- Favicon
		===========================-->
    <link rel='shortcut icon' type='image/x-icon' href='images/fave.png'>

    <!-- Google Web Fonts 
		===========================-->

    <link rel='stylesheet' href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css'>

    <!-- Css Base And Vendor 
		===========================-->
    <link rel='stylesheet' href='vendor/bootstrap/css/bootstrap-arabic.css'>
    <link rel='stylesheet' href='vendor/jquery-ui/jquery-ui.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome/css/font-awesome.min.css'>
    <link rel='stylesheet' href='vendor/owl-carousel/css/owl.carousel.css'>
    <link rel='stylesheet' href='vendor/owl-carousel/css/owl.theme.css'>

    <!-- Site Style
		===========================-->
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/black.css'>
    <link rel='stylesheet' href='css/default.css'>
    <link rel='stylesheet' href='css/style-arabic.css'>
    <!--[if lt IE 9]>
            <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
            <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
</head>

<body class='intro-page'>
    <div class='wrapper'>
      ";
if ($type == 2) {

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
                   <ul class='menu-nav'>
 <li>
                            <a href='profile-user-ar.php'>
                                    حسابى
                                </a>
                        </li>
                         <li>
                            <a href='favourite-ar.php?id=$id'>
                                   مفضلتي
                                </a>
                        </li>
<li class='active'>
    <a href='about-us-ar.php'>
                                    عن المنصة
                                </a>
    <div class='main-drop full-mega'>
        <div class='col-md-6'>
            <h3>شروط الإستخدام</h3>
            <a href='faq-ar.php'>أسئلة شائعة</a>
            <a href='terms-ar.php'>الشروط والاحكام</a>
        </div>
        <!--End col-md-3-->

        <div class='col-md-6'>
            <h3>تواصل معنا</h3>
            <a href='about-us-ar.php'>عن الموقع</a>
            <a href='contact-ar.php'>اتصل بنا</a>
        </div>
        <!--End col-md-3-->
    </div>
    <!--End mega-menu-->
</li>

<li>
    <a href='blogs-ar.php'>
                                    مجتمع المنصة
                                </a>
</li>

<li>
               
  <a href='Nutrition-Family-ar.php'>

التغذية والأسرة
</a>
                        </li>
          
<li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    شركة التوصيل
                                </a>
                        </li>
                        <li>
                            <a href='media-ar.php'>
                                    القسم الإعلامي
                                </a>
                        </li>
                        <li>
                            <a href='Training-ar.php'>
                                    قاعة التدريب
                                </a>
                        </li>
                      
                         <li class='active'>
                            <a href='logout.php'>
                                    تسجيل الخروج
                                </a>
                        </li>
                        <li class='active'>
                            <a href=>
                                    اختر اللغة
                                </a>
                            <ul class='main-drop'><a href='index-en.php'>
                                    اللغة الإنجليزية
                                </a></ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
        </header>
        ";
}
elseif ($type == 3) {
    echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index.php'>
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
                   <ul class='menu-nav'>

                          <li class='active'>
                            <a href='about-us-ar.php'>
                                    عن المنصة
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
                                </div><!--End mega-menu-->
                        </li>
                        <li>
                            <a href='profile-ar.php'>
                                    حسابى
                                </a>
                        </li>
                        
                        
                         <li>
                         
                   <a href='add-product-ar.php?id=$id'>
                                        اضافة منتج
                                </a>
                        </li>
                         <li>
                                  <a href='family-products-ar.php?id=$id'>      
                                      منتجاتي
                                </a>
                        </li>
                        <li>
                            <a href='blogs-ar.php'>
                                    مجتمع المنصة
                                </a>
                        </li>
                        <li>
                         <a href='Nutrition-Family-ar.php'>

التغذية والأسرة    
       </a>
     </li>
    <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    شركة التوصيل
                                </a>
                        </li>
                        <li>
                            <a href='media-ar.php'>
                                    القسم الإعلامي
                                </a>
                        </li>
                        <li>
                            <a href='Training-ar.php'>
                                    قاعة التدريب
                                </a>
                        </li>
                      
                         <li class='active'>
                            <a href='logout.php'>
                                    تسجيل الخروج
                                </a>
                        </li>
                        <li class='active'>
                            <a href=>
                                    اختر اللغة
                                </a>
                            <ul class='main-drop'><a href='index-en.php'>
                                    اللغة الإنجليزية
                                </a></ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
        </header>
        ";
}
elseif ($type==1) 
    {
    echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index.php'>
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
                   <ul class='menu-nav'>

                       <li class='active'>
                            <a href='about-us-ar.php'>
                                    عن المنصة
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
                                </div><!--End mega-menu-->
                        </li>
                        <li>
                            <a href='profile-user-ar.php'>
                                    حسابى
                                </a>
                        </li>
                        
                        
                         <li>
                         
                   <a href='HAdmin-DashboardArabic.php?id=$id'>
                                        لوحة التحكم
                                </a>
                        </li>
                      
                        <li>
                            <a href='blogs-ar.php'>
                                    مجتمع المنصة
                                </a>
                        </li>
                        <li>
                         <a href='Nutrition-Family-ar.php'>

التغذية والأسرة    
       </a>
     </li>
   <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    شركة التوصيل
                                </a>
                        </li>
                        <li>
                            <a href='media-ar.php'>
                                    القسم الإعلامي
                                </a>
                        </li>
                        <li>
                            <a href='Training-ar.php'>
                                    قاعة التدريب
                                </a>
                        </li>
                      
                         <li class='active'>
                            <a href='logout.php'>
                                    تسجيل الخروج
                                </a>
                        </li>
                        <li class='active'>
                            <a href=>
                                    اختر اللغة
                                </a>
                            <ul class='main-drop'><a href='index-en.php'>
                                    اللغة الإنجليزية
                                </a></ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
        </header>
        ";
}

else {
    echo "
        <header class='header'>
            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index.php'>
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
                   <ul class='menu-nav'>

                       <li class='active'>
                            <a href='about-us-ar.php'>
                                    عن المنصة
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
                                </div><!--End mega-menu-->
                        </li>
                        
                        <li>
                            <a href='blogs-ar.php'>
                                    مجتمع المنصة
                                </a>
                        </li>
                         
                        <li>
                            <a href='Nutrition-Family-ar.php'>

التغذية والأسرة
</a>
                        </li>
                     
                       <li>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'>
                                    شركة التوصيل
                                </a>
                        </li>
                        <li>
                            <a href='media-ar.php'>
                                    القسم الإعلامي
                                </a>
                        </li>
                        <li>
                            <a href='Training-ar.php'>
                                    قاعة التدريب
                                </a>
                        </li>
                        <li class='active'>
                            <a href='login-register-ar.php'>
                                    تسجيل الدخول
                                </a>
                        </li>
                       
                        <li class='active'>
                            <a href=>
                                    اختر اللغة
                                </a>
                            <ul class='main-drop'><a href='index-en.php'>
                                    اللغة الإنجليزية
                                </a></ul>
                        </li>

                    </ul>
                    <!--End menu-nav -->
                </div>
                <!--End site-menu-->
            </div>
            <!--End main-header-->
        </header>
        ";
}
echo "
        <!--End header-->
 <div class='main' role='main'>
            <div class='ads-widget'>
                <img src='images/banners/banner-5.jpg' alt=''>
            </div>

            <div class='page-content'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-4'>
                            <a href='https://www.tawseelo.com/sign-up-rider?ref=10' target='_blank'><img src='images/banners/adv.jpg'alt=''></a>

                        </div>
                        <!--End Col-md-4-->
                        <div class='col-md-8'>
                            <div class='country-box'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <h2 class='title-lg'>
                                            <i class='fa fa-globe'></i> من فضلك اختر دولتك وانضم لنا
                                        </h2>
                                    </div>";
if (is_array($countries))
    foreach ($countries as $country) {
        if (!empty($country['id']))
            echo "
                               
                                    <div class='col-md-2'>
                                        <a href='home-ar.php?id=" . $country['country_id'] . "' class='country-item'>
                                            <div class='img-wrapp'>
                                                <img src='flags/" . $country['flag'] . "'>
                                            </div>
                                            <h3 class='title'>" . $country['name'] . "</h3>
                                        </a>
                                    </div><!--End Col-md-2-->";
    }


echo "                  
                            </div>
                            <!--End Country-box-->
                        </div>
                        <!--End Col-md-8-->
                    </div>
                    <!--End Row-->
                      <div class='row'>
                        <div class='col-xs-12'>
                            <div class='ads-widget'>
                                <img src='images/banners/banner-5.jpg' alt=''>
                            </div>
                        </div>
                        <!--End Col-xs-12-->
                    </div>
                    </div><!--End container-fluid-->
                </div><!--End page-content-->
               
    </body>
                                </html> ";
