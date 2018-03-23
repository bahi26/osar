<?php
session_start();
include_once 'PersonController.php';
include_once 'FamilyController.php';
include_once 'UserController.php';
//$id = $_GET["id"];
//$country_id = $id;
$type = null;
//exit();
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
 * 
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
                                        <li><a href="profile-user.php">My Acount</a></li>
                                        <li><a href="blogs.php">Blogs</a></li>

                                        <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                        <li><a href="logout.php">logout</a></li>
                                        <li><a href="terms-ar.php">Arabic</a></li>
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
                                            <li><a href="profile.php">My Acount</a></li> 
                                            <li><a href="add-product.php?country=<?php echo $country_id; ?>">Add Product</a></li>
                                            <li><a href="family-products.php?country=<?php echo $country_id; ?>">My products</a></li>

                                            <li><a href="blogs.php">Blogs</a></li>

                                            <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                            <li><a href="logout.php">Logout</a></li>

                                            <li><a href="terms-ar.php">Arabic</a></li>
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
                                            <li><a href="profile-user.php">My Acount</a></li> 
                                            <li><a href="HAdmin-Dashboard.php">Dashboard</a></li>

                                            <li><a href="blogs.php">Blogs</a></li>

                                            <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                            <li><a href="logout.php">Logout</a></li>

                                            <li><a href="terms-ar.php">Arabic</a></li>
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
                                                <li><a href="terms-ar.php">Arabic</a></li>
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
        <!--End header-->

        <div class="main" role="main">
           
            <div class="page-content">
                <section class="contact-us">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="map-wrap">
                                    <h3>• الشروط والأحكام :</h3>نرحب بكم في موقعنا .. الشروط والأحكام التالية يتم تطبيقها على كافة أقسام الموقع وفروعها وكذلك التطبيق. عند زيارتك لموقعنا أو تطبيقنا .. فأنت توافق ضمنياً على الشروط والأحكام الموضحة أدناه .. وإذا كنت لا توافق عليها, فلا تقم بإستخدام خدماتنا. لنا الحق كإدارة الموقع تغيير أجزاء من شروط الإستخدام والأحكام المتعلقة بها أو تعديلها أو إضافة المعلومات عليها بأي وقت ودون سابق إنذار. وتصبح التغييرات سارية النفاذ عند نشرها على الموقع أو التطبيق. لذا نرجو منكم مراجعتها دوماً للإطلاع على التحديثات المتعلقة بها.
                                    <h3>- استخدام الموقع :</h3>للإستفادة من خدمات هذا الموقع, يجب ألا يقل عُمرك عن 18 عاماً .. ويُمكنك زيارته تحت إشراف أحد الوالدين أو الوصي القانوني. من طرفنا نمنحك ترخيصاً غير قابل للتحويل أو الإلغاء لتستخدم الموقع بموجب الشروط والأحكام الموضحة .. ويكمن هذا الترخيص في التسوق لشراء سلع شخصية يتم عرضها وبيعها على هذا الموقع. للإستفادة من بعض الخدمات الخاصة بالموقع التسجيل أو الإشتراك فيها. وبإختيارك التسجيل أو الإشتراك فإنك توافق على تقديم معلومات شخصية ودقيقة, وكذلك تحديثها كلما لزم الأمر. وتتحمل بمفردك مسئولية الحفاظ على كلمة السر الخاصة بك, وغيرها من الوسائل اللازمة للتأكد من ملكيتك للحساب. وتقع كامل المسئولية على صاحب الحساب بخصوص كافة الأنشطة التي يتم إستخدام كلمة المرور بها. وعليك مراسلتنا عند أي إستخدام غير مصرح به لكلمة السر أو لحسابك. ولا يُعد الموقع مسؤولاً في أي حال من الأحوال، بشكل مباشر أو غير مباشرٍ أو بأي شكل من الأشكال، عن أيّة خسارة أو أضرار من أي نوع، قد تنتُج عن عدم قيامك بالامتثال لهذا القِسم أو الإتصال به. عند إتخاذ خطوات التسجيل, يوافق العميل بشكل أوتوماتيكي على تلقي الرسائل الترويجية التي يُرسلها الموقع. ويُمكنك في وق لاحق إلغاء خيار تلقي هذه الرسائل من خلال الجزء السفلي في أي رسالة ترويجية تصلك على البريد الإلكتروني.

                                    <h3>- مشاركاتك على الموقع :</h3>كافة ما تشارك به على الموقع و/أو ما تقدمه لنا – على سبيل المثال وليس الحصر – الشكاوي, الإستفسارات, الإقتراحات والانتقادات تصبح ملكنا الوحيد والحصري, ولا تعود بأي حال من الأحوال ملكاً لك. وفضلاً عن الحقوق التي تنطبق على أي نوع من المشاركات, وبمجرد أن تشاركنا بها على الموقع أو التطبيق, فأنك تمنحنا حق استخدام الاسم الذي تعرضه والمرتبط مباشرةً بهذه المشاركة أو أي محتوى آخر. ولا يحق لك استخدام عنوان بريد إلكتروني غير حقيقي أو الإدعاء بأنك شخص آخر أو محاولة تضليلنا أو أي طرف ثالث فيما يتعلق بموثوقية أي من المشاركات. ومن حقنا حذف أي من المشاركات أو تعديلها, غير أننا لسنا ملزمين بذلك.
                                    <h3>- الموافقة على الطلبات وتفاصيل الأسعار :</h3>في بعض الحالات, قد لا تتم الموافقة على طلب عرض منتج أو طلب شراء منتج لعدة أسباب. وتحتفظ إدارة الموقع بالحق في رفض أو إلغاء أي طلب لأي سبب من الأسباب وفي أي وقت. وقبل أن تقوم الإدارة بالموافقة على الطلب. قد نراسلك بطلب تقديم بعض البيانات الإضافية للتحقق من شيء ما, بما في ذلك - على سبيل المثال وليس الحصر – رقم الهاتف والعنوان. من طرفنا نحرص على توفير أدق المعلومات المتعلقة بالأسعار لجميع مستخدمي الموقع, إلا أن الأخطاء قد ترد في بعض الأحيان.

                                    <h3>- العلامات التجارية وحقوق النشر :</h3>جميع حقوق الملكية الفكرية, سواء كانت مسجلة أو غير مسجلة, وكافة معلومات المحتوى والتصميمات الخاصة بالموقع, تعتبر ملكاً لنا, بما في ذلك – على سبيل المثال وليس الحصر – الرسوم والبرامج والنصوص والصور والفيديو والصوت, فضلاً عن جميع مصنفات البرمجيات والبرامج الرئيسية. وإن كل محتويات الموقع مجمية أيضاً بموجب قانون النشر مجتمعة في صورة عمل واحد وفقاً لقوانين حقوق النشر في المملكة العربية السعودية والإتفاقيات الدولية. جميع الحقوق محفوظة.



                                </div>
                                <!--End map-wrap-->


                            </div>
                            <!--End col-md-8-->
                            <div class="col-md-4">
                                <ul class="contact-info">
                                    <li>
                                        <span>address : </span>
                                        <span>Saudi Arabia</span>
                                    </li>
                                    <li>
                                        <span>email :</span>
                                        <span>osrmntja@hotmail.com</span>
                                    </li>
                                    <li>
                                        <span>phone number:</span>
                                        <span>00966504627062</span>
                                    </li>
                                    <li>
                                        <span>whatsapp number :</span>
                                        <span>00966504627062</span>
                                    </li>
                                </ul>
                                <!--End Contact-info-->
                            </div>
                            <!--End col-md-4-->
                        </div>
                        <!--End Row-->
                        <div class="spacer-30"></div>

                    </div>
                    <!--End Container-->
                </section>
                <!--End Section-->
            </div>
            <!--End Page-content-->
            <footer class="footer">
                <div class="footer-widgets">
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>Contact Us</h3>
                            </div>
                            <!--End widget-title-->
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
                                </ul>
                                <!--End contact-widget-->
                            </div>
                            <!--End widget-content-->
                        </div>
                        <!--End widget-->
                    </div>
                    <!--End col-md-4-->
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <h3>Connect With Us</h3>
                            </div>
                            <!--End widget-title-->
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
                                <!--End social-widget-->
                            </div>
                            <!--End widget-content-->
                        </div>
                        <!--End widget-->
                        <div class="widget">
                            <div class="widget-title">
                                <h3>Newsletter</h3>
                            </div>
                            <!--End widget-title-->
                            <div class="widget-content">
                                <form class="form-icon">
                                    <input type="text" placeholder="Enter Your Email">
                                    <button type="submit">
                                            <i class="fa fa-envelope-o"></i>
                                        </button>
                                </form>
                                <!--End form-icon-->
                            </div>
                            <!--End widget-content-->
                        </div>
                        <!--End widget-->
                    </div>
                    <!--End col-md-4-->
                    <div class="col-md-4">
                        <div class="widget">
                            <div class="widget-title">
                                <img src="images/footer.png">
                            </div>
                            <!--End widget-title-->
                            <div class="widget-content">
                                <ul class="tags tabel-tags map-widget">
                                    <li><a href="index-en.html">home</a></li>
                                    <li><a href="about-us.html">about us</a></li>
                                    <li><a href="faq.html">faq</a></li>
                                    <li><a href="privacy.html">privacy</a></li>
                                    <li><a href="terms.html">terms</a></li>
                                    <li><a href="guarantee.html">guarantee</a></li>
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="contact.html">contact us</a></li>
                                </ul>
                            </div>
                            <!--End widget-content-->
                        </div>
                        <!--End widget-->
                    </div>
                    <!--End col-md-4-->
                </div>
                <!--End footer-widgets-->
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                made with
                                <i class="fa fa-heart"></i> By <a href="https://www.facebook.com/mr.shoman" target="_blank">Mr-Shoman</a>
                            </div>
                            <!--End col-md-6-->
                            <div class="col-xs-6 text-right">
                                CopyRight © 2017 osrmntja.com
                            </div>
                            <!--End col-md-6-->
                        </div>
                        <!--End row-->
                    </div>
                    <!--End container-->
                </div>
                <!--End copyright-->
            </footer>
            <!--End Footer-->

        </div>
        <!--End Main-->
    </div>
    <!--End Wrapper-->

    <!--Scripts Plugins-->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/countdown.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="vendor/jcarousellite.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="js/google.js"></script>

    <script src="js/main.js"></script>

</body>

</html>
