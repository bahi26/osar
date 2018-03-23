<?php
include_once 'forgetpasswordController.php';
echo "
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
        <!--[if lt IE 9]>
            <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
            <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
    </head>
    <body>
        <div class='wrapper'>
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

                                        <li><a href='forget-password.php'>الإنجليزية</a></li>
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
            <div class='main' role='main'>
                <ul class='breadcrumb'>
                    <li>
                        <a href='index-ar.html'>
                            <i class='fa fa-home'></i>الرئيسية   
                        </a>
                    </li>  
                    <li class='active'>تسجيل الدخول</li>
                </ul><!--End breadcrumb-->
                <div class='page-content'>
                    <div class='container'>                        
                        <div class='row'>
                            <div class='col-md-8 col-md-offset-2'>
                                <div class='box-wrap brdr-rd-3'>
                                    <div class='row'>
                                        <div class='col-md-8 col-md-offset-2'>
                                            <div class='forget-pass-content'>
                                                <div class='heading'>
                                                    <i class='fa fa-smile-o'></i>
                                                    <p>أدخل بريدك الإلكترونى لإستعادة حسابك !</p>
                                                </div>
                                                <form method='post' action='".forgetpasswordController::send_forget()."'>
                                                    <div class='form-group'>
                                                        <input type='text' placeholder='البريد الإلكترونى' class='form-control' name='email'>
                                                    </div>
                                                        <button class='custom-btn' type='submit' name='forget-submit'>ارسال</button>
                                                </form>
                                            </div><!--End forget-pass-->
                                        </div><!--End col-md-10-->
                                    </div><!--End row-->
                                </div><!--End box-wrap-->
                            </div><!--End col-md-8-->
                        </div><!--End Row-->  
                    </div><!--End container-fluid-->
                </div><!--End page-content-->
               <footer class='footer'>
                <div class='footer-widgets'>
                    <div class='col-md-4'>
                        <div class='widget'>
                            <div class='widget-title'>
                                <h3>اتصل بنا</h3>
                            </div><!--End widget-title-->
                            <div class='widget-content'>
                                <ul class='contact-widget'>
                                    <li>
                                        <i class='fa fa-map-marker'></i>
                                        <span>السعودية</span>
                                    </li>
                                    <li>
                                        <i class='fa fa-whatsapp'></i>
                                        <span>00966504627062</span>
                                    </li>
                                    <li>
                                        <i class='fa fa-envelope-o'></i>
                                        <span>osrmntja@hotmail.com</span>
                                    </li>
                                    <li>
                                        <i class='fa fa-whatsapp'></i>
                                        <span>00966504627062</span>
                                    </li>
                                </ul><!--End contact-widget-->    
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4-->
                    <div class='col-md-4'>
                        <div class='widget'>
                            <div class='widget-title'>
                                <h3>كن على تواصل</h3>
                            </div><!--End widget-title-->
                            <div class='widget-content'>
                                <ul class='social-widget'>
                                    <li>
                                                <a href='https://www.facebook.com/osrmntja' target='_blank'>
                                                <i class='fa fa-facebook'></i>
                                            </a>
                                    </li>
                                    <li>
                                        <a href='https://twitter.com/@osrmntja' target='_blank' >
                                                <i class='fa fa-twitter'></i>
                                            </a>
                                    </li>
                                    <li>
                                        <a href='https://www.instagram.com/osrmntjaar/' target='_balnk'>
                                                <i class='fa fa-instagram'></i>
                                            </a>
                                    </li>
                                   
                                </ul>
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                        <!--End widget-->
                    </div><!--End col-md-4-->
                    <div class='col-md-4'>
                        <div class='widget'>
                            <div class='widget-title'>
                                <img src='images/footer.png'>
                            </div><!--End widget-title-->
                            <div class='widget-content'>
                                <ul class='tags tabel-tags map-widget'>
                                    <li><a href='index-en.php'>الرئيسية</a></li>
                                    <li><a href='about-us-ar.php'>عن الموقع</a></li>
                                    <li><a href='faq-ar.php'>اسئلة شائعة</a></li>
                                    <li><a href='terms-ar.php'>البنود</a></li>
                                    <li><a href='blogs-ar.php'>مجتمع المنصة</a></li>
                                    <li><a href='contact-ar.php'>اتصل بنا</a></li>
                                </ul>
                            </div><!--End widget-content-->
                        </div><!--End widget-->
                    </div><!--End col-md-4--> 
                </div><!--End footer-widgets-->
                <div class='copyright'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-xs-6'>
                                made with
                                <i class='fa fa-heart'></i> By <a href=''>Three codes</a>
                            </div>
                            <!--End col-md-6-->
                            <div class='col-xs-6 text-right'>
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
        <script src='vendor/jquery/jquery.js'></script>
        <script src='vendor/bootstrap/js/bootstrap.min.js'></script>
        <script src='vendor/countdown.js'></script>
        <script src='vendor/jquery-ui/jquery-ui.min.js'></script>
        <script src='vendor/owl-carousel/js/owl.carousel.min.js'></script>
        <script src='vendor/jcarousellite.js'></script>
        
        <script src='js/main.js'></script>
    </body>
</html>    ";