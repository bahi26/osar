
<?php
include_once "chatController.php";
if(!isset($_SESSION['id']))
{
    header("Location: HSignin.php?logged=error");
    exit();
}
$chats=chatController::open_chatRoom();


//print_r($chats);
//exit();
/*$advs_up=Database::selectAdvertisementCountry($id,"up");
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

echo"

<!DOCTYPE html>
<html>
    <head>
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
        
        
        
        
        <link rel='stylesheet' href='css/w3.css'/>
        <link rel='stylesheet' href='css/WebCSs.css'/>
        <link rel='stylesheet' href='css/Heng-Home.css'/>
        
         <link rel='stylesheet' href='css/bootstrap.min.css'>
        <link rel='stylesheet' href='css/font-awesome.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='css/fonts.css'>
        <link rel='stylesheet' href='css/owl.carousel.css'>
        <link rel='stylesheet' href='css/style.css'>
        
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='icon' href='images/soft.png'>
        <style>
            html,body,h1,h2,h3,h4,h5,h6 {/*font-family: 'Berkshire Swash', cursive;*/font-family: 'Timmana', sans-serif;}
            body{
				
            }
            
            #span1{
                color:#2196F3;
                font-family: Timmana, sans-serif;}
        </style>
        
         <!--[if lt IE 9]>
		<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
		<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
        
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
    </head>
    <body>
";    
if ($type == 2) {
   
            echo"<div class='wrapper'>
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
                                        <li><a href='profile-user.php'>My Acount</a></li>
                                        <li><a href='blogs.php'>Blogs</a></li>

                                        <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>delivery company</a></li>

                                        <li><a href='logout.php'>logout</a></li>
                                        <li><a href='HChatArabic.php'>Arabic</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                            <a class='head-wish' href='favourite.php'>
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
    
";} elseif ($type == 3) {
    
          echo "     <div class='wrapper'>
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
                                            <li><a href='profile.php'>My Acount</a></li> 
                                            <li><a href='add-product.php'>Add Product</a></li>
                                            <li><a href='family-products.php'>My products</a></li>

                                            <li><a href='blogs.php'>Blogs</a></li>

                                            <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>delivery company</a></li>

                                            <li><a href='logout.php'>Logout</a></li>

                                            <li><a href='HChatArabic.php'>Arabic</a></li>
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
   
";}
 elseif ($type==1) {
     echo"
         
                    
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
                                            <li><a href='profile-user.php'>My Acount</a></li> 
                                            <li><a href='HAdmin-Dashboard.php'>Dashboard</a></li>

                                            <li><a href='blogs.php'>Blogs</a></li>

                                            <li><a href='https://www.tawseelo.com/sign-up-rider?ref=10'>delivery company</a></li>

                                            <li><a href='logout.php'>Logout</a></li>

                                            <li><a href='HChatArabic.php'>Arabic</a></li>
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
        
";} 
else {echo "
    
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
                                                <li><a href='HChatArabic.php'>Arabic</a></li>
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
   
";}
echo"
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
                   
                       <center><h2 style='color:red;' > Contacts</h2></center>
                        <div role='tabpanel' class='tab-pane' id='reviews'>
                        <div class='w3-container'>
								<div class='row'>
									<div>";
                        if(is_array($chats))
                         foreach ($chats as $chat){
                          echo"<form method='post' action='Chat.php?chat=".$chat['chat_id']."'>
										<div class='media'>
											<p class='pull-right'>
												<img class='media-object' src='profile_pictures/".$chat['photo']."' alt='Image'  width='120px' height='120px'>
											
											<br>
											<div class='media-body'>
												<h4 class='media-heading'>";
                                          if(!empty($chat['first_name']))echo"
													<p style='float:right;'>".$chat['first_name']."  ".$chat['last_name']."</p> ";
                                          else echo"
													<p style='float:right;'>".$chat['name']."</p>";echo"
													<br>
												</h4>";                          if($chat['state']>0)echo
                              "<br><p style='float:right;'>you have a new message</p>
                              <br><br>
                              <input class='btn btn-cart' type='submit' style='float:right;' name='start-chat' value='show msg'>";
                          else echo "<br>
                          <p style='float:right;'>no new messages
                          
                          <br><br>
                          
                            <input class='btn btn-cart' style='float:right;' type='submit' name='start-chat' value='show msg'>
                          
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
        </footer> ";

         if (isset($_SESSION['id'])) {
             
          $type =$_SESSION['type'];
                 if($type == 3){
                    echo'
                <script>
                    document.getElementById("default").remove();
                    document.getElementById("admin").remove();
                    document.getElementById("user").remove();
                </script>
                        ';
                 }
                 elseif($type == 2){
                      echo"
                <script>
                    document.getElementById('default').remove();
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
echo"
        
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