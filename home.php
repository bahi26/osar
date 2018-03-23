<?php
session_start();
include_once 'PersonController.php';
include_once 'FamilyController.php';
include_once 'UserController.php';
$id = $_GET["id"];
$country_id = $id;
$type = null;
//exit();
$advs_up = Database::selectAdvertisementCountry($id, "up");
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
//include_once './FamilyController.php';
//include_once './UserController.php';
$families = Database::selectFamilies($id);

$family = new Familiy();
for ($i = 0; $i < count($families); $i++) {

    $family = $families[$i];
    $id = $family->getId();
    $products = FamilyController::selectProducts($id);
    $product = new Product();
    $product = $products[0];
}

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
<?php
if ($type == 2) {
    ?>
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
                                        <li><a href="profile-user.php">My Acount</a></li>
                                        <li><a href="blogs.php">Blogs</a></li>

                                        <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                        <li><a href="logout.php">logout</a></li>
                                        <li><a href="home-ar.php?id=<?php echo $country_id; ?>">Arabic</a></li>
                                    </ul><!--End navbar-nav-->
                                </nav><!--End navbar-collapse-->
                            </div><!--End top-navbar-->                         

                            <a class="head-wish" href="favourite.php?id=<?php echo $country_id ?>">
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
                </header><!--End header-->
    <?php ?>
    <?php
} elseif ($type == 3) {
    ?>
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
                                            <li><a href="profile.php">My Acount</a></li> 
                                            <li><a href="add-product.php?country=<?php echo $country_id; ?>">Add Product</a></li>
                                            <li><a href="family-products.php?country=<?php echo $country_id; ?>">My products</a></li>

                                            <li><a href="blogs.php">Blogs</a></li>

                                            <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                            <li><a href="logout.php">Logout</a></li>

                                            <li><a href="home-ar.php?id=<?php echo $country_id; ?>">Arabic</a></li>
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
                    </header><!--End header-->
    <?php ?>
    <?php
}
 elseif ($type==1) {
     
         ?>  
                    
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
                                            <li><a href="profile-user.php">My Acount</a></li> 
                                            <li><a href="HAdmin-Dashboard.php">Dashboard</a></li>

                                            <li><a href="blogs.php">Blogs</a></li>

                                            <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                            <li><a href="logout.php">Logout</a></li>

                                            <li><a href="home-ar.php?id=<?php echo $country_id; ?>">Arabic</a></li>
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
                    </header><!--End header-->
        <?php
} 
else {
    ?>
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
                                                <li><a href="blogs.php">Blogs</a></li>
                                                <li><a href="login-register.php">Login</a></li>
                                                <li><a href="login-register.php">Register</a></li>
                                                <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>
                                                <li><a href="home-ar.php?id=<?php echo $country_id; ?>">Arabic</a></li>
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
                        </header><!--End header-->
    <?php
}
?>
                    <div class="main" role="main">
                        <div id="home-slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#home-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#home-slider" data-slide-to="1"></li>
                                <li data-target="#home-slider" data-slide-to="2"></li>
                            </ol><!-- End Indicators -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="images/slider/slide-en-1.png">
                                </div>
                                <div class="item">
                                    <img src="images/slider/slide-en-2.png">
                                </div>
                                <div class="item">
                                    <img src="images/slider/slide-en-3.png">
                                </div>
                            </div><!-- End Slides -->
                        </div><!--End home-slider-->
                        <div class="page-content">
                            <div class="container-fluid">

                                <div class="main-widget">
                                    <div class="box-wrap padding-15">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6">
                                               <!--End main-banner-->    
                                            </div><!--End col-md-3-->
                                            <div class="col-md-3 col-sm-6">
                                                <a class="main-banner" href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank" target="_blank">
                                                    <img src="images/banners/adv.jpg" class="img-180">
                                                </a><!--End main-banner-->    
                                            </div><!--End col-md-3-->
                                            <div class="col-md-3 col-sm-6">
                                                <a class="main-banner" href="product-item-ar.html">
                                                    <img src="images/banners/banner-3.jpg" class="img-180">
                                                </a><!--End main-banner-->    
                                            </div><!--End col-md-3-->
                                            <div class="col-md-3 col-sm-6">
                                                <!--End main-banner-->    
                                            </div><!--End col-md-3-->
                                        </div><!--End Row-->
                                    </div><!--End box-wrap-->
                                    <br>
                                    <div class="main-widget-title">
                                        <h3>Products Of Familly</h3>
                                    </div><!--End main-widget-title-->
                                    <div class="main-widget-cont">
<?php
$family = new Familiy();
for ($i = 0; $i < count($families); $i++) {

    $family = $families[$i];
    $id = $family->getId();
    $products = FamilyController::selectProducts($id);
    $product = new Product();
    $product = $products[0];
    if ($product == null) {
        continue;
    } else {
        if ($product->getPhoto() == null) {
                    $photo = '1.jpg';

        }
        else
        {
                    $photo = $product->getPhoto();

        }

    }
    ?>
                                            <div class="product-item">
                                                <div class="img-container">
                                                    
 <a href="item.php?product=<?php echo $product->getId();?>" class="product-img">
                                                <img src="products/images/<?php echo $photo; ?>"  alt="" style="width:300px; height:300px; ">
                                            </a>                                             <?php
                                            if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {

                                                if (!UserController::checkFollow($_SESSION['id'], $id)) {
                                                    ?>
                                                            <div class="product-action">
                                                                <a id="<?php echo $i ?>">
                                                                    <li  onclick="follow('<?php echo "$id"; ?>', '<?php echo "$i"; ?>')" class="fa fa-heart-o"></li>
                                                                </a>
                                                            </div><!--End product-action-->

                                                    <?php
                                                }
                                            }
                                            ?>
                                                </div><!--End img-container-->
                                                <div class="product-desc">
                                                    <?php echo $product->getName(); ?>

                                                    <div class="price-box">
                                                        <a href="family-products.php?id=<?php echo $family->getId(); ?>&country=<?php echo $_GET["id"]; ?>">
                                                             <?php echo $family->getName();?>

                                                        </a><!--End product-name-->
                                                    </div><!--End price-box-->
                                                </div><!--End product-desc-->

                                            </div><!--End product-item-->

                                                    <?php
                                                }
                                                ?>



                                    </div><!--End main-widget-cont-->   
                                </div><!--End main-widget-->

                                <div class="spacer-35"></div>    



                            </div><!--End main-widget-->  
                            <div class="spacer-35"></div>    
                            <div class="box-wrap padding-15">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="main-banner">
                                            <img src="images/banners/banner-5.jpg" class="img-150">
                                        </div><!--End main-banner-->    
                                    </div><!--End col-md-3-->

                                    <div class="col-md-4">
                                        <div class="main-banner">
                                            <img src="images/banners/banner-6.jpg" class="img-150">
                                        </div><!--End main-banner-->    
                                    </div><!--End col-md-3-->
                                </div><!--End Row-->
                            </div> 
                            <div class="spacer-35"></div> 
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
            <div id="product-modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div><!--End modal-header-->
                        <div class="modal-body">
                            <div class="pro-modal-wrap">
                                <div class="pro-modal-img">
                                    <img src="images/products/1.jpg">
                                </div><!--End pro-modal-img-->
                                <div class="pro-modal-cont">
                                    <h3>عنوان المنتج</h3>
                                    <div class="price-box">
                                        <span class="price">$200.00</span>
                                        <s class="old-price">$300.00</s>
                                    </div><!--End price-box-->
                                    <p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال</p>
                                    <div class="product-item-cart">
                                        <span>الكمية</span>
                                        <div class="cat-number">
                                            <a href="#" class="number-down">
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <input value="4" class="form-control" type="text">
                                            <a href="#" class="number-up">
                                                <i class="fa fa-angle-up"></i>
                                            </a>
                                        </div>
                                        <button class="text-icon-btn">
                                            <i class="fa fa-shopping-cart"></i>
                                            إضافة للعربة
                                        </button>
                                        <button class="icon-btn">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                    </div><!--End product-item-cart-->
                                    <div class="product-item-share">
                                        <span>مشاركة المنتج</span>
                                        <ul class="social-share">
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul><!--End social-share-->
                                    </div><!--End product-item-share-->
                                </div><!--End pro-modal-cont-->
                            </div><!--End pro-modal-wrap-->
                        </div><!--End modal-body-->
                    </div><!--End modal-content -->
                </div><!--End modal-dialog -->
            </div><!-- END product-modal -->
            <!--Scripts Plugins-->
            <script src="vendor/jquery/jquery.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="vendor/countdown.js"></script>
            <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
            <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>
            <script src="vendor/jcarousellite.js"></script>

            <script src="js/main.js"></script>
            <script language = "javascript" type = "text/javascript">
                                                    function follow(id, counter)
                                                    {
                                                        var xhttp = new XMLHttpRequest();
                                                        xhttp.onreadystatechange = function () {
                                                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                                            }
                                                        };
                                                        // var check = document.getElementById(counter+"").innerHTML;




                                                        xhttp.open("GET", "follow.php?id=" + id, true);
                                                        document.getElementById(counter + "").remove();

                                                        xhttp.send();

                                                    }


            </script>
    </body>
</html>    

