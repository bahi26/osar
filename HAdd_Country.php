<?php 
session_start();
    include_once'controlRoomController.php';

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
    </head>
    <body>
     
                 <!----------------- Start NavBar------------------->
                     <!----------------- Start NavBar------------------->
    <header class='header'>
      <nav id='admin' class='navbar navbar-default navbar-fixed-top'>
	      	<div class='container'>
		        <div class='navbar-header'>
		          <a class='navbar-brand' href='HFirstPage.php' style='color:chocolate;'><h4>Osra<span style='color:#2196F3;font-family: 'Timmana', sans-serif;'>Monteja</span></h4></a>
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
			          	<ul class='nav navbar-nav'>
				            <li class='active'><a href='HFirstPage.php'>Home</a></li>
				            
				            <li id ='PF'><a href='profile-user.php '>profile</a></li>
				            
				            
				            
				          
		        		
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
                    <a href='HShow_users.php?country='>
                        <div class='list color-5 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-user'></i>الزائرين
                        </div>
                    </a>
                    <a href='HShowCountries.php'>
                        <div class='list color-4 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-diamond'></i>البلاد
                        </div>
                    </a>
                    <a href='HAdd_Country.php'>
                        <div class='list color-3 col-lg-2 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-flag'></i>اضافة بلد
                        </div>
                    </a>
                    <a href='HAdd_Admin.php'>
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
                                                <h4 style='color:red;'>Add Country</h4>
                                                <br/>
                                                </center>        
           </section>
                                                      
                    <form method='post' action='".controlRoomController::add_new_country()."'>                            
                                             <br/>
										<br/>
										<br/>                                              
                                                <!--	Select Countries -->
                                                 <input type='hidden'name='lang' value='2'>
                                                 
                                                <input class ='w3-text-red w3-input' type='text' name='name' placeholder='Enter Country Name' required>
                                                <br/>
                                           
                                        <br/>
										<br/>
										<br/>
										<input class='w3-btn w3-blue' type='submit' name='add-country-submit' style='float:right;'value='Add Country'>
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