<?php 
    include_once'controlRoomController.php';
$countries=controlRoomController::get_countries();
 if(isset($_GET['country']))
 {
     $country_id = $_GET['country'];
     $id = $country_id;
 }
else
{
         $id = $_GET["id"];

        $country_id = $id;

}
if(isset($_GET["id"]))
 {
$id = $_GET["id"];}
$msg="";
 if(isset($_GET['add']))
 {
     //$msg=$_GET['id'];
     $status = $_GET['add'];
     if($status=="exists"){
     $msg = "Email is valid";
     $display="inline";}
 }
else
{
    
         $display="none";

}

echo "
<!DOCTYPE html>
<html>
    <head>
        <title>Roductive Families</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='css/w3.css'/>
        <link rel='stylesheet' href='css/WebCSs.css'/>
        <link rel='stylesheet' href='css/Heng-Home.css'/>
        <link rel='stylesheet' href='css/Dashboar-style.css'/>
        
         <link rel='stylesheet' href='css/bootstrap.min.css'>
        <link rel='stylesheet' href='css/font-awesome.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='css/fonts.css'>
        <link rel='stylesheet' href='css/owl.carousel.css'>
        <link rel='stylesheet' href='css/style.css'>
        
        <link rel='stylesheet' href='css/Add-product.css'/>
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel='icon' href='images/soft.png'>
        <style>
            html,body,h1,h2,h3,h4,h5,h6 {/*font-family: 'Berkshire Swash', cursive;*/font-family: 'Timmana', sans-serif;}
            body{
				
            }
        </style>
        
         <!--[if lt IE 9]>
		<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
		<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->
        
         <script>
            function validateForm() {
            var n = document.forms['myForm']['first_name'].value;
            var l = document.forms['myForm']['last_name'].value;
            var x = document.forms['myForm']['phone_number'].value;
           var p = document.forms['myForm']['password'].value;



        
           if (/\d/.test(n)) {
                document.getElementById('error').innerHTML = 'first name must not has number';
                return false;
            }
            
            if (/\d/.test(l)) {
                document.getElementById('error').innerHTML = 'last name must not has number';
                return false;
            }
            if (isNaN(x)) {
                document.getElementById('error').innerHTML = 'phone must be numbers';
                return false;
            }
            
            
              
            
            
        }
        
        </script>
        <link rel='stylesheet' href='css/bootstrap-rtl.css'>
    </head>
    <body>
     
                 <!----------------- Start NavBar------------------->
                     <!----------------- Start NavBar------------------->
    <header class='header'>
      <nav id='admin' class='navbar navbar-default navbar-fixed-top'>
	      	<div class='container'>
		        <div class='navbar-header' >
		          <a class='navbar-brand' href='HFirstPageArabic.php' style='color:chocolate;'><h4>Osra<span style='color:#2196F3;font-family: 'Timmana', sans-serif;'>Monteja</span></h4></a>
		        	<ul class='navbar-icons'>
		        		
		        		
		        		
		        		<li>
			        		<a href='#!' class='navbar-toggle' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
				        		<span class='icon-bar'></span>
					            <span class='icon-bar'></span>
					            <span class='icon-bar'></span>
			        		</a>
		        		</li>
			        </ul>
		          	
		        </div>

		        <div id='navbar' class='navbar-collapse collapse'>
		        	<div class=''>
			          	<ul class='nav navbar-nav' style='float:right;'>
                        
				            <li  ><a href='HFirstPageArabic.php'>الرئيسية</a></li>
				            
				            <li id ='PF'><a href='profile-user-ar.php '>حسابي</a></li>
				            
				            
				            
				            
				            <li id ='Dash'><a href='HAdmin-DashboardArabic.php'>لوحة التحكم</a></li>
				            
				            
				            
				            
				            <li ><a href='ContactUsArabic.php'>اتصل بنا</a></li>
				            
				            
				            <li><a href='AboutUsArabic.php'>عننا</a></li>
				            
				            
				            <li id ='logout' ><a href='logout.php'>خروج</a></li>
				            
			          	</ul>
		          	</div>

	          		<ul class='nav navbar-nav navbar-left navbar-icons' >
		        		
		        		<li class='dropdown' >
					            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='fa fa-cog'></i><span class='caret'></span></a>
					            <ul class='dropdown-menu'>
                                     <li class='select-language'>
                                        <p>اختر اللغة</p>
                                        <a href='HAdd_admin.php'>
                                            <i class='fa fa-language'>انجليزى</i>
                                        </a>

                                    </li>
					            </ul>
				        </li>
		        		
		        	</ul>
		        </div>
	      	</div>
	    </nav>
       </header>
       
                   <!----------------- End NavBar------------------->
       <br/>
       <br/>
       
        <!----------------------Page Container--------------------------->
        <div class='w3-margin-top'>
            <!------Page Card------>
            <div class='w3-white w3-text-grey w3-card-2 w3-round-large'>
 			                    
                <div class='w3-row w3-row-padding w3-padding-16'>
                   
                   <!---------------------Left Ads----------------------------->

                          <!--------------------End Left Side--------------------------->

                        <!----------Start Page Forms---------->
<div class='w3-padding-16'>
	

		<div class='w3-container'>
           <!-- Start large-list -->
          <section class='large-list' id='boss'>
                <div class='w3-container'>
                    <a href='HShow_usersArabic.php'>
                        <div class='list color-5 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-user'></i>الزائرين
                        </div>
                    </a>
                    <a href='HShowCountries.php'>
                        <div class='list color-4 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-diamond'></i>البلاد
                        </div>
                    </a>
                    <a href='HAdd_CountryArabic.php'>
                        <div class='list color-3 col-lg-2 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-flag'></i>اضافة بلد
                        </div>
                    </a>
                    <a href='HAdd_AdminArabic.php'>
                        <div class='list color-2 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-address-card-o'></i>اضافة ادمن
                        </div>
                    </a>
                    <a href='HChangeAdv.php'>
                        <div class='list color-1 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-money'></i>اضافة الاعلانات
                        </div>
                    </a>
                     <a href='category_add.php'>
                        <div class='list color-1 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-money'></i>اضافة قسم
                        </div>
                    </a>
                     <a href='category_all.php'>
                        <div class='list color-1 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-money'></i>الاقسام
                        </div>
                    </a>
                    
                </div><!-- End container -->
                <div class='clearfix'></div>
            </section><!-- End large-list -->
            <br/>
										<br/>
										<br/>
            <section class='large-list'>        <br/>
                                                <center><img src='images/user.png' alt='your image' style='width:100px; height:100px;border-radius :50%;     margin-right: auto; margin-left: auto;display: block;'/>
                                                <br>
                                                <h4 style='color:red;'>اضافة ادمن</h4>
                                                <br/>
                                                </center>        
           </section>          
             <form method='post' name='myForm' onsubmit='return validateForm()' action='".controlRoomController::add_new_admin()."'>
                                                
                                                <p id='error' style='color:red;'></p>
                                                <p style='display:".$display.";color:red;'>".$msg."'</p>
                        
                                                <p style='margin-top:35px;'>الاسم الاول</p>
                                                <input class ='w3-text-red w3-input'type='text' name='first_name' placeholder='الاسم الاول'>
                                               
                                                <p style='margin-top:35px;'>الاسم الاخير</p>
                                                <input class ='w3-text-red w3-input'type='text' name='last_name' placeholder='الاسم الاخير'>
                                                <br/>
                                                <br/>
                                                <p>البريد الالكترونى</p>
                                                <input class ='w3-text-red w3-input' type='text' name='email' placeholder='البريد الالكترونى'>
                                                <br/>
                                                <br/>
                                                <p>رقم الهاتف</p>
                                                <input class ='w3-text-red w3-input' type='text' name='phone_number' placeholder='رقم الهاتف'>
                                                <br/>
                                                <br/>
                                                <p>العنوان</p>
                                                <input class ='w3-text-red w3-input' type='text' name='address' placeholder=' العنوان'>
                                                <br/>
                                                <br/>
                                                <p>كلمة السر</p>
                                                <input class ='w3-text-red w3-input' type='Password' name='password' placeholder='••••••••'>
                                                <br/>
                                                <br/>
                                                <p>البلد</p>
                                                
                                                <!--	Select Countries -->				 <select class='form-control' name='country_id' >
                                                    <option value=''>Country...</option>";
                                                    foreach($countries as $country)
                                                    {if(empty($country['email']))
                                                        echo"
                                                    <option value='".$country['country_id']."'>".$country['name']."</option>";}
            echo"
                                                </select>
                                           
                                        <br/>
										<br/>
										<br/>
										<input class='w3-btn w3-blue' type='submit' name='add-admin-submit' style='float:right;'value='Add Admin'>
                                        <br/>
										<br/> 
                                        <br/> 
                                        <br/>
                                        <br/>       
            </form>
            
        </div>

</div>                              
                            <!----------Page Forms---------->
                    
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
          ";
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
        <script>
            function myFunction() {
                var x = document.getElementById('myTopnav');
                if (x.className === 'topnav') {
                    x.className += ' responsive';
                } else {
                    x.className = 'topnav';
                }
            }
        </script>
        <script src='https://code.jquery.com/jquery-1.10.2.js'></script>
        <script src='https://code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src='js/jquery.countdown.min.js'></script>
        <script src='js/owl.carousel.min.js'></script>
        <script src='https://www.cse.ust.hk/~rossiter/dating_web_site.js'></script>
        <script src='js/isotope.min.js'></script>
        <script src='js/scripts.js'></script>
    </body>
</html>";