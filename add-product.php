<?php
session_start();
include_once './Database.php';

include_once './FamilyController.php';
//$id = $_GET['country'];
//$country_id = $id;
$familyId = $_SESSION['id'];
$error = "none";
if (isset($_POST['upload'])) {
    $file_name2=null;
    $file_name=null;
    $file_new_name="";
             $file_new_name2="";
   
    $file=$_FILES['image'];
   
            $file_name=$file['name'];
           
    
  
    

 $file2=$_FILES['video'];
            $file_name2=$file2['name'];
  

$check2 = false;
    $check1 = FALSE;


    $error = "none";


    if ($file_name2 != null) {
        if (validateVideo($file_name2)) {
             $ext2=explode('.',$file_name2);
$file_ext2=strtolower(end($ext2));
    //$path_info = pathinfo($image);
$file_new_name2=uniqid('',true).".".$file_ext2;
            $target2 = "products/videos/" .$file_new_name2;
            $check1 = move_uploaded_file($_FILES['video']['tmp_name'], $target2);
        } else {
            $file_new_name2 = "";
        }
    }

    
    if ($file_name != null) {
        if (validateImage($file_name)) {
             $ext=explode('.',$file_name);
$file_ext=strtolower(end($ext));
    //$path_info = pathinfo($image);
$file_new_name=uniqid('',true).".".$file_ext;
                $target = "products/images/".$file_new_name;

            $check2 = move_uploaded_file($_FILES['image']['tmp_name'], $target);
        } else {
            $file_new_name = "";
        }
    }
    if ($check1 || $check2) {
        
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        
        if (!is_numeric($price)) {
            return;
        } else {
            
            
            FamilyController::addProduct($name, $description, $price, $file_new_name, $file_new_name2, $familyId);

          header("Location: family-products.php?id=" . $familyId );
        }
    } else {
        $error = "inline";
    }
}

function validateImage($image) {
    $path_info = pathinfo($image);
    if ($path_info['extension'] == 'jpg' || $path_info['extension'] == 'jpeg' || $path_info['extension'] == 'png' || $path_info['extension'] == 'PNG' || $path_info['extension'] == 'gif') {
        return TRUE;
    } else {
        return FALSE;
    }
}

function validateVideo($video) {
    $path_info1 = pathinfo($video);
    if ($path_info1['extension'] == 'webm' || $path_info1['extension'] == 'WEBM'|| $path_info1['extension'] == 'mp4'|| $path_info1['extension'] == 'MP4' || $path_info1['extension'] == 'ogv' || $path_info1['extension'] == 'gif') {
        return TRUE;
    } else {
        return FALSE;
    }
}

/*$advs_up = Database::selectAdvertisementCountry($id, "up");
$advs_left = Database::selectAdvertisementCountry($id, "left");
$advs_bottom = Database::selectAdvertisementCountry($id, "bottom");*
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


$families = Database::selectFavouriteFamilies($_SESSION['id']);
//echo count($families);


if (isset($_SESSION['id'])) {


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
        <link rel="stylesheet" href="vendor/dropzone/dropzone.min.css">
        <link rel="stylesheet" href="vendor/dropzone/basic.min.css">

        <!-- Site Style
                ===========================-->
        <link rel="stylesheet" href="css/style.css">    
        <link rel="stylesheet" href="css/test.css">
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
                                            <li><a href="profile.php">My Acount</a></li> 
                                            <li><a href="add-product.php">Add Product</a></li>
                                            <li><a href="family-products.php">My products</a></li>

                                            <li><a href="blogs.php">Blogs</a></li>

                                            <li><a href="delivery.php">delivery company</a></li>

                                            <li><a href="logout.php">Logout</a></li>

                                            <li><a href="add-product-ar.php">Arabic</a></li>
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
            <div class="main" role="main">
                <div class="page-content">
                    <div class="container-fluid">                        
                        <div class="row">
                            <div class="col-sm-9">
                                <form method="post" action="add-product.php" enctype="multipart/form-data" >

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="gallery-slider">
                                                <div class="upload-image">
                                                    <div  class="dropzone dropzone-file-area" id="my-dropzone">
                                                        <label class="text" for="files" class="btn">Click to Upload image</label>
                                                        <input id="files" style="visibility:hidden;" type="file" name="image" accept="image/*">

                                                    </div>
                                                </div>
                                            </div><!--End gallery-slider-->
                                            <br>
                                            <div class="gallery-slider">
                                                <div class="upload-image">
                                                   <div  class="dropzone dropzone-file-area" id="my-dropzone">
                                                        <label class="text" for="videos" class="btn">Click to Upload video</label>
                                                        <input id="videos" style="visibility:hidden;" type="file" name="video" accept="video/*  ">

                                                    </div>
                                                </div>
                                            </div><!--End gallery-slider-->
                                        </div><!--End col-md-5-->
                                        <div class="col-md-8">
                                            <div class="add-prod-form" method="" action="">
                                                <div class="product-detail">
                                                    <div class="product-title form-group">
                                                        <input class="form-control" name="name" placeholder="product name title" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Product Description Here" rows="5" name="description"></textarea>
                                                    </div><!--End Form-group-->
                                                </div><!--End product-detail-->
                                                <div class="product-title form-group">
                                                    <input class="form-control" placeholder="product name price" name="price" type="text">
                                                </div>
                                                <div class="product-item-cart">
                                                    <button class="text-icon-btn" type="submit" name="upload">
                                                        <i class="fa fa-plus"></i>
                                                        add to my items
                                                    </button>
                                                </div><!--End product-item-cart-->
                                            </div><!--End add-prod-form-->
                                        </div><!--End col-md-8-->
                                    </div><!--End Row-->
                                </form>

                            </div><!--End Col-sm-9-->
                            <div class="col-sm-3">
                                <ul class="account-sidebar">
                                    <li class="account-img">
                                        <img src="profile_pictures/<?php echo $_SESSION['photo'] ?> ">
                                    </li><!--End account-img-->
                                    <li >
                                        <a href="profile.php">
                                            <i class="fa fa-user"></i>
                                            Account Information
                                        </a>
                                    </li>
                                    <li>
                                        <a href="family-products.php">
                                            <i class="fa fa-pencil-square-o"></i>
                                            My Items
                                        </a>
                                    </li>
                                   
                                    <li class="active">
                                        <a href="add-product.php">
                                            <i class="fa fa-plus"></i>
                                            Add Product
                                        </a>
                                    </li>
                                    
                                </ul><!--End account-sidebar-->
                            </div><!--End Col-sm-3-->
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
                                <h3>Product Title</h3>
                                <div class="price-box">
                                    <span class="price">$200.00</span>
                                    <s class="old-price">$300.00</s>
                                </div><!--End price-box-->
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>
                                <div class="product-item-cart">
                                    <span>Quantity</span>
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
                                        add to cart
                                    </button>
                                    <button class="icon-btn">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                </div><!--End product-item-cart-->
                                <div class="product-item-share">
                                    <span>product Share</span>
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
        <script src="vendor/dropzone/dropzone.min.js"></script>
        <script src="vendor/dropzone/form-dropzone.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>    