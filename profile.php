<?php
include_once 'editController.php';
session_start();
$data = editController::selectData();
$msg = "";
if (isset($_GET['profile'])) {

    //$msg=$_GET['id'];
    $msg = "Email is valid";
    $display = "inline";
} else {
    $display = "none";
}
if (isset($_POST['edit-family-submit'])) {
    if (isset($_SESSION['id'])) {


        //get the data from the front
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $password_conformation = $_POST['password_conformation'];
        if (isset($_GET['country'])) {
            $Country_id = $_GET['country'];
        }
        if (isset($_GET['id'])) {
            $Country_id = $_GET['id'];
        }
        $lang=$_POST['lang'];
        //check if there's invalid data
        if (
                (!filter_var($email, FILTER_VALIDATE_EMAIL) & !empty($email)) ||
                (!is_numeric($phone_number) & !empty($phone_number)) ||
                (!preg_match("/^[a-zA-Z0-9]*$/", $password) & !empty($password))) {
            header("Location: profile.php?profile=invalid&id=" . $Country_id);
            exit();
        } else {
            if (!Database::check_id($_SESSION['id'])) {
                header("Location: Profile.php?profile=unknown");
                exit();
            } else {
                $old_password = Database::get_password($_SESSION['id']);

                if (!password_verify($password_conformation, $old_password)) {
                    if ($lang == 2)
                        header("Location: Profile.php?profile=mismatch&id=" . $Country_id);
                    else
                        header("Location: Profile-ar.php?profile=mismatch&id=" . $Country_id);
                    exit();
                }
                else {
                    if (Database::check_email_id($email, $_SESSION['id']) & !empty($email)) {
                        if ($lang == 2)
                            header("Location: profile.php?profile=exists&id=" . $Country_id);
                        else
                            header("Location: profie-ar.php?profile=exists&id=" . $Country_id);
                        exit();
                    }
                    else {

                        if (!empty($email)) {
                            Database::editEmail($_SESSION['id'], $email);
                        }

                        if (!empty($password)) {
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            Database::editPassword($_SESSION['id'], $password);
                        }

                        if (!empty($address)) {
                            Database::editAddress($_SESSION['id'], $address);
                        }

                        if (!empty($phone_number)) {
                            Database::editPhoneNumber($_SESSION['id'], $phone_number);
                        }
                        if (!empty($name)) {
                            Database::editName($_SESSION['id'], $name);
                        }

                        update_profile_picture_f();
                        header("Location: profile.php?update=success&id=" . $Country_id);
                        exit();
                    }
                }
            }
        }
    }
}

function update_profile_picture_f() {
    if (isset($_SESSION['id'])) {
        $file = $_FILES['image'];
        if (empty($file) || $file['size'] == 0)
            return;
        $file_name = $file['name'];

        $file_tmp_name = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $ext = explode('.', $file_name);
        $file_ext = strtolower(end($ext));
        $allowed = array('jpg', 'jpeg', 'png');


        if (isset($_GET['country'])) {
            $Country_id = $_GET['country'];
        }
        if (isset($_GET['id'])) {
            $Country_id = $_GET['id'];
        }
        $lang = $_POST['lang'];


        if (in_array($file_ext, $allowed)) {
            if ($file_error == 0) {
                if ($file_size > 50000000) {
                    header("Location: profile.php?upload=size");
                    exit();
                } else {
                    $file_new_name = uniqid('', true) . "." . $file_ext;
                    move_uploaded_file($file_tmp_name, 'profile_pictures/' . $file_new_name);
                    if ($_SESSION['photo'] != "0.jpg")
                        unlink('profile_pictures/' . $_SESSION['photo']);
                    $_SESSION['photo'] = $file_new_name;

                    Database::update_profile_picture($_SESSION['id'], $file_new_name);
                    if ($lang == 2)
                        header("Location: profile.php?upload=success&id=" . $Country_id);
                    else
                        header("Location: profile.php?upload=success&id=" . $Country_id);
                    exit();
                }
            }
            else {
                header("Location: profile.php?upload=uploading");
                exit();
            }
        } else {
            header("Location: profile.php?upload=type");
            exit();
        }
    } else {
        header("Location: login-register.php?upload=logged");
        exit();
    }
}

if (isset($_GET['country'])) {
    $country_id = $_GET['country'];
    $id = $country_id;
} else {
    //   $id = $_GET["id"];
    // $country_id = $id;
}
if (isset($_GET["id"])) {

    $id = $_GET["id"];
}

/* $advs_up = Database::selectAdvertisementCountry($id, "up");
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

                                            <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">delivery company</a></li>

                                            <li><a href="logout.php">Logout</a></li>

                                            <li><a href="profile-ar.php">Arabic</a></li>
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
                                <div class="top-box">
                                    <h3 class="box-title">account information</h3>
                                </div><!--End top-box-->
                                <div class="profile-content">
                                    <form method="post" action="profile.php" enctype="multipart/form-data">
                                        <div class="upload-image">
                                            <div  class="dropzone dropzone-file-area" id="my-dropzone">
                                                <label class="custom-btn" for="files" class="btn">Click to Change profile picture</label>
                                                <input id="files" style="visibility:hidden;" type="file" name="image" accept="image/*">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="hidden" class="form-control"  name="lang" value="2">

                                            <div class="col-md-6 form-group">
                                                <label for="awner-name">My Name</label>
                                                <input id="awner-name" class="form-control" type="text" placeholder="enter your name" name="name" value="<?php echo $data[1]['name'] ?>">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">My Email</label>
                                                <input id="awner-email" class="form-control" type="email" placeholder="enter your Email" name="email" value="<?php echo $data[1]['email'] ?>">
                                            </div><!--End col-md-6-->

                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">My phone</label>
                                                <input id="awner-email" class="form-control" type="text" placeholder="enter your Phone" name="phone_number" value="<?php echo $data[1]['phone_number'] ?>">
                                            </div><!--End col-md-6-->

                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">My address</label>
                                                <input id="awner-email" class="form-control" type="text" placeholder="enter your Addrees" name="address" value="<?php echo $data[1]['address'] ?>">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">Password</label>
                                                <input id="awner-email" class="form-control" type="password" placeholder="enter your Password" name="password">
                                            </div><!--End col-md-6-->

                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">Confirm Password</label>
                                                <input id="awner-email" class="form-control" type="password" placeholder="enter your Password" name='password_conformation'>

                                            </div><!--End col-md-6-->



                                        </div><!--End row-->

                                        <button name="edit-family-submit" type="submit" class="custom-btn">Edit Information</button>
                                    </form>
                                </div><!--End Profile-content-->
                            </div><!--End Col-sm-9-->
                            <div class="col-sm-3">
                                <ul class="account-sidebar">
                                    <li class="account-img">
                                        <img src="profile_pictures/<?php echo $_SESSION['photo'] ?> ">
                                    </li><!--End account-img-->
                                    <li class="active">
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
                                   
                                    <li>
                                        <a href="add-product.php">
                                            <i class="fa fa-plus"></i>
                                            Add Product
                                        </a>
                                    </li>
                                                                <li><a href="HChat.php" name="set-chat" ><i class="fa fa-comments-o"></i>Chat</a></li>

                                    
                                </ul><!--End account-sidebar-->
                            </div><!--End Col-sm-3-->
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

        <script src="js/main.js"></script>
    </body>
</html>    