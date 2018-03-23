<?php
session_start();
//include_once './Database.php';

include_once 'PersonController.php';
include_once 'FamilyController.php';
include_once 'UserController.php';
//$id = $_GET["id"];
//$country_id = $id;
$type = null;

/*$advs_up = Database::selectAdvertisementCountry($id, "up");
$advs_left = Database::selectAdvertisementCountry($id, "left");
$advs_bottom = Database::selectAdvertisementCountry($id, "bottom");
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
 
 */
if (isset($_SESSION['id'])) {
    $type = $_SESSION['type'];


    $Joinus = "none";
    $PF = "inline";
    $logout = "inline";
    $type = $_SESSION['type'];
    if ($type == 3) {
        $Add_Product = "inline";
        $Dash = "none";
        $MyFav = "none";
    } elseif ($type == 2) {
        $Add_Product = "none";
        $Dash = "none";
        $MyFav = "inline";
    } elseif ($type == 1) {
        $Add_Product = "none";
        $MyFav = "none";
        $Dash = "inline";
    }
} else {

    $logout = "none";
    $Joinus = "inline";
    $Add_Product = "none";
    $PF = "none";
    $MyFav = "none";
    $Dash = "none";
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
       <?php
if ($type == 2) {
    ?>

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
                                        <li><a href="profile-user-ar.php">حسابى</a></li>

                                        <li><a href="blogs-ar.php">مجتمع المنصة</a></li>

                                        <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">شركة التوصيل</a></li>
                                                                                <li><a href="logout.php">تسجيل خروج</a></li>

                                        <li><a href="faq.php">الإنجليزية</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                            <a class="head-wish" href="favourite-ar.php">
                                <i class="fa fa-heart"></i>

                            </a>
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
    <?php
} elseif ($type == 3) {
    ?>
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
                                        <li><a href="profile-ar.php">حسابى</a></li>
                                        <li><a href="add-product-ar.php">اضافة منتج</a></li>
                                        <li><a href="family-products-ar.php">منتجاتي</a></li>

                                        <li><a href="blogs-ar.php">مجتمع المنصة</a></li>

                                        <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">شركة التوصيل</a></li>
                                        <li><a href="logout.php">تسجيل خروج</a></li>

                                        <li><a href="faq.php">الإنجليزية</a></li>
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
    <?php
}
 elseif ($type==1) {
     
         ?>  
                    
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
                                        <li><a href="profile-user-ar.php">حسابى</a></li>
                                        <li><a href="HAdmin-DashboardArabic.php">لوحة التحكم</a></li>
]
                                        <li><a href="blogs-ar.php">مجتمع المنصة</a></li>

                                        <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">شركة التوصيل</a></li>
                                        <li><a href="logout.php">تسجيل خروج</a></li>

                                        <li><a href="faq.php">الإنجليزية</a></li>
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
        <?php
} 

else
{
    ?>
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

                                        <li><a href="faq.php">الإنجليزية</a></li>
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
                <?php 
}
?><!--End header-->
            <div class="main" role="main">
                <!--End breadcrumb-->
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10  col-md-offset-1">
                                <div class="section-offset">
                                  <div class="faq">
                                      <div class="toggle-container" id="accordion1">
                                        <div class="panel">
                                            <a href="#accord1" data-toggle="collapse" data-parent="#accordion1" class="panel-title">
                                                 1 - متى تم إنشاء الموقع ؟ وما أهدافه ؟
                                            </a>
                                            <div class="panel-collapse collapse in" id="accord1">
                                                <div class="panel-content">
                                                     تشرفنا بتدشين الموقع الأول بالوطن العربي الذي يخدم الأسر منتجة في 23 نوفمبر من عام 2017 .. ليكون أكبر منصة لخدمة هذه الفئة الغالية من أبناء الوطن العربي.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                        <div class="panel">
                                            <a class="collapsed panel-title" href="#accord2" data-toggle="collapse" data-parent="#accordion1">2 - 	هل يُقدم الموقع خدماته لدول معينة ؟  </a>
                                            <div class="panel-collapse collapse" id="accord2">
                                                <div class="panel-content">
                                                    ولأول مرة, فموقعنا الإلكتروني لم يتم إنشاؤه ليقتصر على تقديم خدماته لفئة أو جنسية معينة .. فهو عام للجميع من كل الوطن العربي. ونسعى معكم وبتعاونكم للوصول للعالمية .
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                        <div class="panel">
                                            <a class="collapsed panel-title" href="#accord3" data-toggle="collapse" data-parent="#accordion1">3 -	هل يُمكنني إنشاء متجر مجاني على الموقع ؟ </a>
                                            <div class="panel-collapse collapse" id="accord3">
                                                <div class="panel-content">
                                                    نعم, فهذا هو الهدف الرئيسي من إنشاء موقعنا الإلكتروني, ليكون البوابة الأولى لبيع وتسويق منتجات الأسر المنتجة.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                          <div class="panel">
                                            <a class="collapsed panel-title" href="#accord4" data-toggle="collapse" data-parent="#accordion1" >4 - 
                                                 	ما التسهيلات التي تقدمونها لدعم الأسر المنتجة ؟
                                            </a>
                                            <div class="panel-collapse collapse" id="accord4">
                                                <div class="panel-content">
                                                     باقة كبيرة من الخدمات والتسهيلات التي نوفرها لأعزائنا من الأسر المنتجة .. تبدأ بتوفير إمكانية إنشاء متجر إلكتروني لعرض منتجاتهم دون أية تكاليف أو إجراءات تذكر .. كما نعمل على توفير دورات تدريبية وتطويرية للأسر المنتجة لدعمهم .. أيضاً نقوم بكل فخر بتسويق منتجاتهم على مواقع التواصل الإجتماعي المختلفة
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                        <div class="panel">
                                            <a class="collapsed panel-title" href="#accord5" data-toggle="collapse" data-parent="#accordion1">5 - 	هل تقدمون هدايا وجوائز للمتميزين ؟ </a>
                                            <div class="panel-collapse collapse" id="accord5">
                                                <div class="panel-content">
                                                    بالطبع, للمزيد من التحفيز والتشجيع على تقديم كل ما هو جديد ومميز من منتجات تمت صناعتها منزلياً.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                        <div class="panel">
                                            <a class="collapsed panel-title" href="#accord6" data-toggle="collapse" data-parent="#accordion1">6 - 	بأي لغة تعمل لوحة تحكم المتجر ؟ </a>
                                            <div class="panel-collapse collapse" id="accord6">
                                                <div class="panel-content">
                                                    لأننا محترفون, فقد وفرنا لوحة تحكم للمتجر باللغتين العربية والإنجليزية لتلائم كافة الإحتياجات.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                          <div class="panel">
                                            <a class="collapsed panel-title" href="#accord7" data-toggle="collapse" data-parent="#accordion1" class="panel-title">7 - 
                                                 	ما هي التفاصيل التي يُمكنني إدراجها لكل منتج ؟
                                            </a>
                                            <div class="panel-collapse collapse" id="accord7">
                                                <div class="panel-content">
                                                     عدة خانات سهلة وواضحة لإدراج أكبر كم من التفاصيل الخاصة بالمنتج .. مثل: (الإسم – الصور – الوصف التقني – السعر – الخصم إن توفر – طرق التواصل).
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                        <div class="panel">
                                            <a class="collapsed panel-title" href="#accord8" data-toggle="collapse" data-parent="#accordion1">8 - ماهي الخطوات التي تتم بعد ورود طلب شراء لأحد خدماتي ؟ </a>
                                            <div class="panel-collapse collapse" id="accord8">
                                                <div class="panel-content">
                                                    لكل متجر إمكانية إضافة طرق التواصل الخاصة به .. جنباً إلى جنب مع حسابات التواصل الإجتماعي المرتبطة بالمتجر .. لذا فيُمكن للمشتري التواصل مباشرةً مع المتجر.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                        <div class="panel">
                                            <a class="collapsed panel-title" href="#accord9" data-toggle="collapse" data-parent="#accordion1">9 - 	هل لديكم مقر رسمي ؟ </a>
                                            <div class="panel-collapse collapse" id="accord9">
                                                <div class="panel-content">
                                                    نتشرف بوجود مقرنا الرسمي في أطهر بقاع الأرض – المملكة العربية السعودية – منطقة مكة المكرمة.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                          <div class="panel">
                                            <a class="collapsed panel-title" href="#accord10" data-toggle="collapse" data-parent="#accordion1">10 - 	 ماهي طرق التواصل المختلفة معكم ؟ </a>
                                            <div class="panel-collapse collapse" id="accord10">
                                                <div class="panel-content">
                                                    للتعرف على كافة الطرق المتاحة للتواصل معنا .. فضلاً زيارة صفحة إتصل بنا من خلال موقعنا الرسمي.
                                                </div><!-- end content -->
                                            </div>
                                        </div><!--End panel-->
                                    </div><!--End toggle-container-->

                                      </div>
                                </div><!--End section-offset-->
                                
                            </div><!--End col-md-9-->
                        </div><!--End row-->
                    </div><!--End container-->
               
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
                
            </div><!--End Main-->
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