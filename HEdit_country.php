<?php
include_once 'controlRoomController.php';
$country_id=$_GET['country'];
$country=controlRoomController::get_country_byid($country_id);
if(empty($country_id))
{
    header("Location: HShowCountries.php?country?=");
    exit();
}
echo"
<!DOCTYPE html>
<html lang='ar'>
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
<header class='header'>
    <section class='large-list' id='boss'>
                <div class='w3-container'>
                    <a href='HAdmin-Dashboard.php?country=".$country_id."'>
                        <div class='list color-5 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-user'></i>رجوع
                        </div>
                    </a>
                    
                    
                </div><!-- End container -->
                <div class='clearfix'></div>
            </section><!-- End large-list -->
       </header>
    
	<!-- /.menu-overlay -->

     
       <br/>
       <br/>
	


	<section class='section ' id='product'>
		<div class='container  w3-padding-16'>
			<div class='row'>
			<form method='post' action='".controlRoomController::edit_country()."'enctype= \"multipart/form-data\">
				<div class='col-md-4 col-sm-12'>
					<div class='product-img'>
						<label for='file-input' style='width:100%; height:100%;'> 
                                     <img id='preview' src='flags/".$country['flag']."'style='width:100%; height:100%; margin-right: auto; margin-left: auto;display: block;' />
                                 </label>
                                  <input id='file-input' type='file' name='flag' accept='image/*' style='display:none;' >
                                  
					</div>
					<div class='clearfix'></div>
				</div>
				<div class='col-md-8 col-sm-12'>
					<h3 style='display:inline;'class='product-title'>Country Name</h3>
				 
					<br><br><br>
					<input name='country_id'  value='".$country['id']."' type='hidden'>
                    <input class ='w3-text-red w3-input'type='text' name='name' placeholder='Country Name' value='".$country['name']."'>
					<hr>
				
					
				</div>
               <div class='form-group'>
						    <button name='edit-country-submit' class='btn btn-primary' style='float:right;'>Update</button>
				</div>
                </form>				 
			</div>
		</div>

		
	</section>

	";
        if (isset($_SESSION['id'])) {
            $type = $_SESSION['type'];
                 if($type == 3){
                    echo"
                <script>
                    document.getElementById('default').remove();
                    document.getElementById('admin').remove();
                    document.getElementById('user').remove();
                </script>
                        ";
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
            };
    echo"
	
    <script src='https://code.jquery.com/jquery-1.10.2.js'></script>
	<script src='https://code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
    <script src='https://www.cse.ust.hk/~rossiter/dating_web_site.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/jquery.countdown.min.js'></script>
    <script src='js/owl.carousel.min.js'></script>
	<script src='js/jquery.fancybox.pack.js'></script>
    <script src='js/isotope.min.js'></script>
    <script src='js/scripts.js'></script>
    ";
     if (isset($_SESSION['id'])) {
         $type =$_SESSION['type'];
         if($type == 2){
            echo'
                <script>
                    document.getElementById("delete").remove();
                </script>
            ';
           }
     }
    else{
        echo'
                <script>
                    document.getElementById("delete").remove();
                </script>
            ';
    }
    echo"
    
</body>
</html>";