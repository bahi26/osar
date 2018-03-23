<?php
include_once 'controlRoomController.php';
$countries=controlRoomController::get_countries();
echo"
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
     

       
       
       
                   <!----------------- End NavBar------------------->
       <br/>
       <br/>
       
        <!----------------------Page Container--------------------------->
        <div class='w3-margin-top'>
            <!------Page Card------>
            <div class='w3-white w3-text-grey w3-card-2 w3-round-large'>
 			               
                <!------Card Container------>
              <div class='w3-container w3-padding-16'>
                    <!-------Page Logo------->
                  
                            
            		  <!---------------Ads Banner--------------->

                </div>
                <br>
                <br>
                <!--------End Header Card Container--------->
                
                
                
                <div class='w3-row w3-row-padding w3-padding-16'>
                   
                   <!---------------------Left Ads----------------------------->
                   <div class='w3-quarter w3-padding-16' >
                        
                    </div>
                          <!--------------------End Left Side--------------------------->

                        <!----------Start Page Forms---------->
<div class='w3-padding-16'>
	<div class='col-sm-12'>
					<table class='table table-responsive products-table'>
					   
					    <tbody>
					    	";
if(is_array($countries))
foreach($countries as $country)
{echo"
					        <tr>
					           
					            <td class='product-title'>
					            	
										<img  width='40%' height='20%' src='flags/".$country['flag']."'>
							        
						            <h3>".$country['name']."</h3>
					            </td>
					            <td class='product-title'>";
                                  if(!empty($country['email']))
                                    echo "
                                    <h4>".$country['email']."</h4>
                                    <h5>".$country['first_name']." ".$country['last_name']."</h5>
                                    ";
                                  else        
                                     echo "
                                    <h4>No Admin choosen</h4>
                                    <h5>None</h5>
                                    ";
                                echo"
					            </td>
                                
					            <td class='product-price'>
                                    <form method='post' action='".controlRoomController::remove_country()."'>
                                    <input type='hidden' name='country_id' value='".$country['country_id']."'>
                                    <input type='hidden' name='admin_id' value='".$country['id']."'>
                                       <button type='submit'  class='btn btn-cart' name='remove-country-submit'><i class='fa fa-trash-o'></i>delete</button>  
                                    </form>
					            </td>";
                                
                                
                                
                                if(!empty($country['email']))
                                    echo "
                                <td class='product-price'>
                                    <form action='".controlRoomController::remove_admin()."' method='post'>
                                    <input type='hidden' name='admin_id' value='".$country['id']."'>
                                       <button type='submit'  class='btn btn-cart' name='remove-admin-submit'><i class='fa fa-user-circle-o'></i>remove</button>  
                                    </form>
					            </td>";
 else 
 {echo"
 <td class='product-price'>
     <a href='HAdd_Admin.php  class='btn btn-cart' name='remove-admin-submit'><i class='fa fa-user-circle-o'></i>add</a>
     </td>";
 }
                                echo "
                                <td class='product-price'>
                                    <form action='edit_country.php?country=".$country['country_id']."' method='POST'>
                                       <button type='submit'  class='btn btn-cart' name='open-country-submit'><i class='fa fa-picture-o'></i>edit</button>  
                                    </form>
					            </td>
                               
					            
                               
					        </tr>";

}
echo"
					    </tbody>
					</table>
				</div>
</div>                              
                            <!----------Page Forms---------->
                    
                </div>

            </div>
            <!----------Page Container End---------->
        </div>
        <!---------------------End the first Card-------------------->
        
        
        <!---------------------Start bottom Advertisement------------>
        <div class='w3-container w3-padding-16'>
                    <!-------- Ads Banner ---------->
                    
         </div>
         <!---------------------End bottom Advertisement------------>
         
         
        <footer class='w3-container w3-Grey w3-center w3-large w3-margin-top' style='letter-spacing: 2px;'>
        </footer>";
        
        if (isset($_SESSION['id'])) {
            $type =$_SESSION['type'];
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
        <script src='js/isotope.min.js'></script>
        <script src='js/scripts.js'></script>
    </body>
</html>";