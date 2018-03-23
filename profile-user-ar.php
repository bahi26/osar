<?php
include_once 'editController.php';
session_start();
$data = editController::selectData();
$msg = "";
$type=$_SESSION['type'];
if (isset($_GET['profile'])) {

    //$msg=$_GET['id'];
    $msg = "Email is valid";
    $display = "inline";
} else {
    $display = "none";
}
if(isset($_POST['edit-user-submit'])) {
            if (isset($_SESSION['id'])) {

                //get the data from the front
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $lang=$_POST['lang'];
                if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
                if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
                
                $password_conformation =$_POST['password_conformation'];
                //check if there's invalid data
                if (
                    (!filter_var($email, FILTER_VALIDATE_EMAIL) & !empty($email)) ||
                    (!is_numeric($phone_number) & !empty($phone_number)) ||
                    (!preg_match("/^[a-zA-Z0-9]*$/", $password) & !empty($password)))
                {
                    header("Location: profile-user-ar.php?profile=invalid&id=".$Country_id);
                    exit();
                }
                else {
                    if (!Database::check_id($_SESSION['id'])) {
                        header("Location: profile-user-ar.php?profile=unknown");
                        exit();
                    }
                    else
                        {
                            $old_password=Database::get_password($_SESSION['id']);

                        if (!password_verify($password_conformation, $old_password))
                        {
                            if($lang==2)
                            header("Location: profile-user.php?profile=mismatch&id=".$Country_id);
                            else
                                header("Location: profile-user-ar.php?profile=mismatch&id=".$Country_id);
                            exit();
                        }
                        else
                            {
                            if (Database::check_email_id($email,$_SESSION['id']) & !empty($email))
                            {
                                if($lang==2)
                                header("Location: profile-user.php?profile=exists&id=".$Country_id);
                                else
                                    header("Location: profile-user-ar.php?profile=exists&id=".$Country_id);
                                exit();
                            }
                            else
                            {

                                if (!empty($email))
                                {
                                   Database::editEmail($_SESSION['id'],$email);
                                }

                                if (!empty($password))
                                {
                                    $password=password_hash($password,PASSWORD_DEFAULT);
                                    Database::editPassword($_SESSION['id'],$password);
                                }

                                if (!empty($address)) {
                                    Database::editAddress($_SESSION['id'],$address);
                                }

                                if (!empty($phone_number))
                                {
                                    Database::editPhoneNumber($_SESSION['id'],$phone_number);
                                }
                                if (!empty($first_name)) {
                            if ($_SESSION['type'] == 3) {
                                Database::editFirst_U($_SESSION['id'], $first_name);
                            } elseif ($_SESSION['type'] == 1) {
                                Database::editFirst_A($_SESSION['id'], $first_name);
                            }
                        }
                    
                    if (!empty($last_name)) {
                        if ($_SESSION['type'] == 3) {
                            Database::editLast_U($_SESSION['id'], $last_name);
                        } elseif ($_SESSION['type'] == 1) {
                            Database::editLast_A($_SESSION['id'], $last_name);
                        }
                    }
                                update_profile_picture_U();
                                if($lang==2)
                                    header("Location: profile-user.php?id=".$Country_id);
                                else
                                    header("Location: profile-user-ar.php?id=".$Country_id);
                                exit();
                            }

                        }
                    }
                }
            }
        }
    function update_profile_picture_u(){
            if(isset($_SESSION['id'])){
            $file=$_FILES['image'];
            if(empty($file)||$file['size']==0)return;
            $file_name=$file['name'];
            $file_tmp_name=$file['tmp_name'];
            $file_size=$file['size'];
            $file_error=$file['error'];
            $ext=explode('.',$file_name);
            $file_ext=strtolower(end($ext));
            $allowed=array('jpg','jpeg','png');
            if(isset($_GET['country'])){
                    $Country_id=$_GET['country'];
                }
            if(isset($_GET['id'])){
                    $Country_id=$_GET['id'];
                }
            $lang=$_POST['lang'];
            if(in_array($file_ext,$allowed)){
                if($file_error==0)
                {
                    if($file_size>50000000)
                    {
                        header("Location: profile-user-ar.php?upload=size");
                        exit();
                    }
                    else
                    {
                        $file_new_name=uniqid('',true).".".$file_ext;
                        move_uploaded_file($file_tmp_name,'profile_pictures/'.$file_new_name);
                        if($_SESSION['photo']!="0.jpg")unlink('profile_pictures/'.$_SESSION['photo']);
                        $_SESSION['photo']=$file_new_name;

                        Database::update_profile_picture($_SESSION['id'],$file_new_name);
                        if($lang==2)
                        header("Location: profile-user.php?upload=success&id=".$Country_id);
                        else
                           header("Location: profile-user-ar.php?upload=success&id=".$Country_id); 
                        exit();
                    }
                }
                else
                {
                    header("Location: profile-user-ar.php?upload=uploading");
                    exit();
                }

            }
            else
                {
                    header("Location: profile-user-ar.php?upload=type");
                    exit();
                }
            }
            else
                {
                header("Location: ../index-en.php?upload=logged");
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
        <div class="wrapper">
            <?php
            if($type==2)
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
                                        <li><a href="profile-user-ar.php">حسابى</a></li>

                                        <li><a href="blogs-ar.php">مجتمع المنصة</a></li>

                                        <li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">شركة التوصيل</a></li>
                                                                                <li><a href="logout.php">تسجيل خروج</a></li>

                                                                                <li><a href="profile-user.php">الإنجليزية</a></li>
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

<li><a href="blogs-ar.php">مجتمع المنصة</a></li>

<li><a href="https://www.tawseelo.com/sign-up-rider?ref=10" target="_blank">شركة التوصيل</a></li>
                                        <li><a href="logout.php">تسجيل خروج</a></li>

                                        <li><a href="profile-user.php">الإنجليزية</a></li>
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
                ?>
            
            <div class="main" role="main">
                <div class="page-content">
                    <div class="container-fluid">                        
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="top-box">
                                    <h3 class="box-title">معلومات الحساب</h3>
                                </div><!--End top-box-->
                                <div class="profile-content">
                                    <form method="post" action="profile-user-ar.php" enctype="multipart/form-data">
                                          <div class="upload-image">
                                                    <div  class="dropzone dropzone-file-area" id="my-dropzone">
                                                        <label class="custom-btn" for="files" class="btn">اضغط لتغيير صورة الملف الشخصي</label>
                                                        <input id="files" style="visibility:hidden;" type="file" name="image" accept="image/*">

                                                    </div>
                                                </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="awner-name">الاسم الاول</label>
                                                <input id="awner-name" class="form-control" type="text" placeholder="ادخل الاسم الاول" name="first_name" value="<?php echo $data[1]['first_name'] ?>">
                                            </div><!--End col-md-6-->
                                              <div class="col-md-6 form-group">
                                                <label for="awner-name">الاسم الاخير</label>
                                                <input id="awner-name" class="form-control" type="text" placeholder="ادخل الاسم الاخير" name="last_name" value="<?php echo $data[1]['last_name'] ?>">
                                            </div><!--End col-md-6-->
                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">الإيميل</label>
                                                <input id="awner-email" class="form-control" type="email" placeholder="ادخل الإيميل الخاص بك" value="<?php echo $data[1]['email'] ?>">
                                            </div><!--End col-md-6-->
                                         
                                            
                                           
                                           
                                       <div class="col-md-6 form-group">
                                                <label for="awner-email">رقم الهاتف</label>
                                                <input id="awner-email" class="form-control" type="text" placeholder="ادخل رقم هاتفك" name="phone_number" value="<?php echo $data[1]['phone_number'] ?>">
                                            </div><!--End col-md-6-->

                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">العنوان</label>
                                                <input id="awner-email" class="form-control" type="text" placeholder="ادخل العنوان الخاص بك" name="address" value="<?php echo $data[1]['address'] ?>">
                                            </div><!--End col-md-6-->
                                           



                                        </div><!--End row-->
                                         <div class="col-md-6 form-group">
                                                <label for="awner-email">كلمة المرور</label>
                                                <input id="awner-email" class="form-control" type="password" placeholder="ادخل كلمة المرور" name="password">
                                            </div><!--End col-md-6-->

                                            <div class="col-md-6 form-group">
                                                <label for="awner-email">تاكيد كلمة المرور</label>
                                                <input id="awner-email" class="form-control" type="password" placeholder="تاكيد كلمة المرور" name='password_conformation'>
                                                
                                            </div><!--End col-md-6-->
                                        <button name="edit-user-submit" type="submit" class="custom-btn">تغيير البيانات</button>
                                    </form>
                                </div><!--End Profile-content-->
                            </div><!--End Col-sm-9-->
                            <div class="col-sm-3">
                                <ul class="account-sidebar">
                                    <li class="account-img">
                                        <img src="profile_pictures/<?php echo $_SESSION['photo'] ?> ">
                                    </li><!--End account-img-->
                                    <?php 
                                    if ($type==2)
                                    {
                                        ?>
                                    <li class="active">
                                        <a href="profile-user-ar.php">
                                            <i class="fa fa-user"></i>
                                            معلومات الحساب
                                        </a>
                                    </li>
                                
                                    <li>
                                        <a href="favourite-ar.php">
                                            <i class="fa fa-heart"></i>
مفضلتي
                                        </a>
                                    </li>
                                    <?php
                                    }
                                   ?>
                                   
                                                                                                        <li><a href="HChatArabic.php" name="set-chat" ><i class="fa fa-comments-o"></i>الدردشة</a></li>
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
