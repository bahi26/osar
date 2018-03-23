
<?php
include_once "chatController.php";
if(!isset($_SESSION['id']))
{
    header("Location: HSignin.php?logged=error");
    exit();
}

$chats=chatController::open_chatRoom();

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
echo"

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
        <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'>

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
        
       
        <link rel='icon' href='images/soft.png'>
         <style>
            html,body,h1,h2,h3,h4,h5,h6 {/*font-family: 'Berkshire Swash', cursive;*/font-family: 'Timmana', sans-serif;}
            body{
				
            }
            
            #span1{
                color:#2196F3;
                font-family: Timmana, sans-serif;}
        </style>
        
 <link rel='stylesheet' href='css/WebCSs.css'/>
        <link rel='stylesheet' href='css/Heng-Home.css'/>
        
        <link rel='stylesheet' href='css/font-awesome.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='css/fonts.css'>
        <link rel='stylesheet' href='css/owl.carousel.css'>
        
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <!--[if lt IE 9]>
            <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
            <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
    </head>
    <body>
    <header class='header'>
      ";
if ($type == 2) {
    
echo"
                <header class='header'>
                    <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                        <img src='images/logo3.png'>
                    </a><!--End logo-->
                    <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                        <div class='header-top'>
                            <div class='navbar top-navbar' role='navigation'>
                                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.top-navbar .navbar-collapse'>
                                    <i class='fa fa-bars'></i>
                                </button>
                                <nav class='collapse collapsing navbar-collapse'>
                                    <ul class='nav navbar-nav'>
                                        <li><a href='profile-user-ar.php'>حسابى</a></li>

                                        <li><a href='blogs-ar.php'>مجتمع المنصة</a></li>

                                        <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>شركة التوصيل</a></li>
                                                                                <li><a href='logout.php'>تسجيل خروج</a></li>

                                        <li><a href='HChat.php'>الإنجليزية</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                            <a class='head-wish' href='favourite-ar.php'>
                                <i class='fa fa-heart'></i>

                            </a>
                        </div><!--End header-top-->
                        <div class='menu-toggle'>
                            <span>menu toggle</span>
                        </div>
                        <div class='site-menu'>
                            <div class='menu-toggle'>
                                menu toggle
                            </div>
                        <ul class='menu-nav'>
                            <li class='active'>
                                <a href=''>
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
                                <a href='#'>
                                    الهدايا
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            هدايا
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            توزيعات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            تغليف هدايا
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الملابس وملحقاتها
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            رجال
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            نساء
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الأطفال والمواليد
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أولاد
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            بنات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مواليد
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    المأكولات والمشروبات
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            معجنات
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الحلويات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق رئيسية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الشوربات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مشروبات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مقبلات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق جانبية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    أعمال يدوية
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أعمال القش
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الخباطة والتطريز
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الصوف والكروشية
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li>
                                <a href='contact-ar.php'>
                                    اتصل بنا
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                        </div><!--End site-menu-->
                    </div><!--End main-header-->
                </header><!--End header-->
    
";} elseif ($type == 3) {
    echo"
                <header class='header'>
                    <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                        <img src='images/logo3.png'>
                    </a><!--End logo-->
                    <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                        <div class='header-top'>
                            <div class='navbar top-navbar' role='navigation'>
                                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.top-navbar .navbar-collapse'>
                                    <i class='fa fa-bars'></i>
                                </button>
                                <nav class='collapse collapsing navbar-collapse'>
                                    <ul class='nav navbar-nav'>
                                        <li><a href='profile-ar.php'>حسابى</a></li>
                                        <li><a href='add-product-ar.php'>اضافة منتج</a></li>
                                        <li><a href='family-products-ar.php'>منتجاتي</a></li>

                                        <li><a href='blogs-ar.php'>مجتمع المنصة</a></li>

                                        <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>شركة التوصيل</a></li>
                                        <li><a href='logout.php'>تسجيل خروج</a></li>

                                        <li><a href='HChat.php'>الإنجليزية</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                           
                        </div><!--End header-top-->
                        <div class='menu-toggle'>
                            <span>menu toggle</span>
                        </div>
                        <div class='site-menu'>
                            <div class='menu-toggle'>
                                menu toggle
                            </div>
                        <ul class='menu-nav'>
                            <li class='active'>
                                <a href=''>
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
                                <a href='#'>
                                    الهدايا
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            هدايا
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            توزيعات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            تغليف هدايا
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الملابس وملحقاتها
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            رجال
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            نساء
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الأطفال والمواليد
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أولاد
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            بنات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مواليد
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    المأكولات والمشروبات
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            معجنات
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الحلويات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق رئيسية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الشوربات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مشروبات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مقبلات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق جانبية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    أعمال يدوية
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أعمال القش
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الخباطة والتطريز
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الصوف والكروشية
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li>
                                <a href='contact-ar.php'>
                                    اتصل بنا
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                        </div><!--End site-menu-->
                    </div><!--End main-header-->
                </header><!--End header-->
    
";}
 elseif ($type==1) {
    echo"   
                    
                <header class='header'>
                    <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                        <img src='images/logo3.png'>
                    </a><!--End logo-->
                    <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                        <div class='header-top'>
                            <div class='navbar top-navbar' role='navigation'>
                                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.top-navbar .navbar-collapse'>
                                    <i class='fa fa-bars'></i>
                                </button>
                                <nav class='collapse collapsing navbar-collapse'>
                                    <ul class='nav navbar-nav'>
                                        <li><a href='profile-user-ar.php'>حسابى</a></li>
                                        <li><a href='HAdmin-DashboardArabic.php'>لوحة التحكم</a></li>

                                        <li><a href='blogs-ar.php'>مجتمع المنصة</a></li>

                                        <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>شركة التوصيل</a></li>
                                        <li><a href='logout.php'>تسجيل خروج</a></li>

                                        <li><a href='HChat.php'>الإنجليزية</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                           
                        </div><!--End header-top-->
                        <div class='menu-toggle'>
                            <span>menu toggle</span>
                        </div>
                        <div class='site-menu'>
                            <div class='menu-toggle'>
                                menu toggle
                            </div>
                        <ul class='menu-nav'>
                            <li class='active'>
                                <a href=''>
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
                                <a href='#'>
                                    الهدايا
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            هدايا
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            توزيعات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            تغليف هدايا
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الملابس وملحقاتها
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            رجال
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            نساء
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الأطفال والمواليد
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أولاد
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            بنات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مواليد
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    المأكولات والمشروبات
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            معجنات
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الحلويات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق رئيسية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الشوربات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مشروبات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مقبلات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق جانبية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    أعمال يدوية
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أعمال القش
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الخباطة والتطريز
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الصوف والكروشية
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li>
                                <a href='contact-ar.php'>
                                    اتصل بنا
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                        </div><!--End site-menu-->
                    </div><!--End main-header-->
                </header><!--End header-->
       
";} 

else
{
  echo"  
     <header class='header'>
                    <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index-en.php'>
                        <img src='images/logo3.png'>
                    </a><!--End logo-->
                    <div class='col-xs-5 col-sm-7 col-md-9 main-header'>
                        <div class='header-top'>
                            <div class='navbar top-navbar' role='navigation'>
                                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.top-navbar .navbar-collapse'>
                                    <i class='fa fa-bars'></i>
                                </button>
                                <nav class='collapse collapsing navbar-collapse'>
                                    <ul class='nav navbar-nav'>
                                                                                <li><a href='blogs-ar.php'>مجتمع المنصة</a></li>

                                                                                <li><a href='login-register-ar.php'>تسجيل دخول</a></li>
                                                                                <li><a href='login-register-ar.php'>انشاء حساب</a></li>


                                        <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>شركة التوصيل</a></li>

                                        <li><a href='HChat.php'>الإنجليزية</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                           
                        </div><!--End header-top-->
                        <div class='menu-toggle'>
                            <span>menu toggle</span>
                        </div>
                        <div class='site-menu'>
                            <div class='menu-toggle'>
                                menu toggle
                            </div>
                        <ul class='menu-nav'>
                            <li class='active'>
                                <a href=''>
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
                                <a href='#'>
                                    الهدايا
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            هدايا
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            توزيعات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            تغليف هدايا
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الملابس وملحقاتها
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            رجال
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            نساء
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    الأطفال والمواليد
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أولاد
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            بنات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مواليد
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    المأكولات والمشروبات
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            معجنات
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الحلويات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق رئيسية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الشوربات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مشروبات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            مقبلات
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أطباق جانبية
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            أخري
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    أعمال يدوية
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            أعمال القش
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            الخباطة والتطريز
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            الصوف والكروشية
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li>
                                <a href='contact-ar.php'>
                                    اتصل بنا
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                        </div><!--End site-menu-->
                    </div><!--End main-header-->
                </header><!--End header-->
                 
";}echo"

        <!----------------------Start Page Slider--------------------------->

        <!----------------------Page Container--------------------------->
        <div class='w3-container w3-margin-top'>
            <!------Page Card------>
            <div class='w3-white w3-text-grey w3-card-2 w3-round-large'>
 			               
                <!------Card Container------>
                <div class='w3-container w3-padding-16'>
                    <!-------Page Logo------->
                    
                    
                    <!--------------Start Ads---------------->
                 
                            
            		<!---------------End Ads--------------->
                   
                    <!--<div class='w3-col' style='width:16%'>&nbsp;</div>
                    --------------Start Login and Register----------------
                    <div class='w3-half w3-padding-large' style='height:120px; '>
                        <div class='w3-container w3-text-white'>
                          <h2 class='w3-half'><i class='fa fa-sign-in' aria-hidden='true'></i> Join with Us</h2>
                          <div class='w3-half'>
							  <button class='w3-btn w3-blue w3-round-xxlarge w3-hover-light-blue w3-wide' style='transition:all 2s ease'><b>Login</b></button>

							  <button class='w3-btn w3-round-xxlarge w3-hover-light-blue w3-wide' style='transition:all 2s ease'><b>Register</b></button>

							  <p><i class='fa fa-handshake-o' aria-hidden='true'></i> All The Best For You</p>
                          </div>
                       </div>
                    </div>
                    ---------------End Login and Register--------------->
                </div>
                

       
        <!----------------------End Page Slider--------------------------->
       
                <br>
                <!--------End Header Card Container--------->
                <br>
                <!----------Start Division Sections {Left and Right}----------->

                <!--Left Side-->
                
                <div class='w3-row-padding '>
                   
                   <!---------------------Test----------------------------->
                   
                       <center><h2 style='color:red;' > الاشخاص</h2></center>
                        <div role='tabpanel' class='tab-pane' id='reviews'>
                        <div class='w3-container'>
								<div class='row'>
									<div>";
                        if(is_array($chats))
                         foreach ($chats as $chat){
                          echo"<form method='post' action='Chat-ar.php?chat=".$chat['chat_id']."'>
										<div class='media'>
											<p class='pull-left' style='padding-right:30px;'>
												<img class='media-object' src='profile_pictures/".$chat['photo']."' alt='Image' width='120px' height='120px' >
											</p>
											<br>
											<div class='media-body'>
												<h4 class='media-heading'>";
                                          if(!empty($chat['first_name']))echo"
													<p style='float:right;'>".$chat['first_name']."  ".$chat['last_name']."</p> ";
                                          else echo"
													<p style='float:right;'>".$chat['name']."</p>";echo"
													<br>
												</h4>";                          if($chat['state']>0)echo
                              "<br><p style='float:right;'>لديك رسالة جديد<br><br>ة<input class='btn btn-cart' style='float:right;' type='submit' name='start-chat' value='اظهار الدردشة'></p>";
                          else echo "<br>
                          <p style='float:right;'>لا يوجد رسائل جديدة
                          
                          <br><br>
                          
                          <input class='btn btn-cart' style='float:right;' type='submit' name='start-chat' value='اظهار الدردشة'>
                          
                          </p>";echo"
											</div>
										</div>
								</form>		";}echo"
										
									</div>
									
								</div>
                    </div>
								<br>
								<br>
								<br>
								<br>
								<br>
							</div>
                       
                    
                    
                   <!---------------------End Test------------------------->
             
                    <!--End Left Side-->

                    
                  
                </div>
            </div>
            <!----------Page Container End---------->
        </div>
        <!---------------------End the first Card-------------------->
        
        
        <!---------------------Start bottom Advertisement------------>
       
         <!---------------------End bottom Advertisement------------>
         
         
        <footer class='w3-container w3-Grey w3-center w3-large w3-margin-top' style='letter-spacing: 2px;'>
           &nbsp;&nbsp;
        </footer> 

        
        <script type='text/javascript' src='js/myscripts.js'></script>
        <script src='https://code.jquery.com/jquery-1.10.2.js'></script>
        <script src='https://code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/jquery.countdown.min.js'></script>
        <script src='js/owl.carousel.min.js'></script>
        <script src='js/isotope.min.js'></script>
        <script src='js/scripts.js'></script>
    </body>
</html>";