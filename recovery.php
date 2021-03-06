<?php
include_once 'forgetpasswordController.php';
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
    <body>
        <div class='wrapper'>
           <header class='header'>
                            <a class='col-xs-5 col-sm-3 col-md-2 logo' href='index.php'>
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
                                                <li><a href='blogs.php'>Blogs</a></li>
                                                <li><a href='login-register.php'>Login</a></li>
                                                <li><a href='login-register.php'>Register</a></li>
                                                <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>delivery company</a></li>
                                                <li><a href='recovery-ar.php?id=".$_GET['id']."'>Arabic</a></li>
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
                                <a href='#'>
                                    The Gifts
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            Gifts
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            Distributions

                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Gift Packaging
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Others
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    Clothing & accessories
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            Mens
                                        </a>  
                                        
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            Women
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    Children & newborns

                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            Children
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            Daughters

                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Newborns
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    Food & Beverage
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            Pastries
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            Candy
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Main Dishes
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Soups
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Drinks
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Appetizer
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Side Dishes
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Others
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                            <li>
                                <a href='#'>
                                    Handcrafts
                                </a>  
                                <ul class='main-drop'>
                                    <li>
                                        <a href='#'>
                                            Straw works
                                        </a>  
                                    </li><!--End dropdown-submenu-->
                                    <li>
                                        <a href='#'>
                                            Sewing & embroidery
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            Wool & crochet
                                        </a>
                                    </li>
                                </ul>     
                            </li><!--End Menu Item-->
                             
                            <li class='active'>
                                <a href='contact.php'>
                                    Contact Us
                                </a>  
                            </li><!--End Menu Item-->
                        </ul><!--End menu-nav -->
                                    </li><!--End Menu Item-->


                                    </ul><!--End menu-nav -->
                                </div><!--End site-menu-->
                            </div><!--End main-header-->
                        </header><!--End header-->
            <div class='main' role='main'>
               <!--End breadcrumb-->
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
                                                    <p>enter your new password to recover your account ! </p>
                                                </div>
                                                <form method='post' action='".forgetpasswordController::change_password()."'>
                                                    <div class='form-group'>
                                                        <input name='password' type='password' placeholder='new password' class='form-control'>
                                                    </div>
                                                        <button class='custom-btn'type='submit' name='change-submit'>Reset</button>
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
                                        <h3>Contact Us</h3>
                                    </div><!--End widget-title-->
                                    <div class='widget-content'>
                                        <ul class='contact-widget'>
                                            <li>
                                                <i class='fa fa-map-marker'></i>
                                                <span>Saudi Arabia</span>
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
                                        <h3>Connect With Us</h3>
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
                                            <li><a href='index.php'>home</a></li>
                                            <li><a href='about-us-en.php'>about us</a></li>
                                            <li><a href='faq.php'>faq</a></li>
                                            <li><a href='terms-en.php'>terms</a></li>
                                            <li><a href='blogs.php'>blog</a></li>
                                            <li><a href='contact.php'>contact us</a></li>
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
</html>";