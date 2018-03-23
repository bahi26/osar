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
echo"
<!DOCTYPE html>
<html>
    <head>
        <title>Roductive Families</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        
        <link rel='stylesheet' href='css/w3.css'/>
        <link rel='stylesheet' href='css/WebCSs.css'/>
        <link rel='stylesheet' href='css/Primary.css'/>
        <link rel='stylesheet' href='css/bootstrap.min.css'>
        <link rel='stylesheet' href='css/font-awesome.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
        
        <link href='https://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        
        <link rel='stylesheet' href='css/fonts.css'>
        <link rel='stylesheet' href='css/owl.carousel.css'>
        <link rel='stylesheet' href='css/style.css'>
       
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
        <!----------------------Start Page Slider--------------------------->

        <!----------------------Page Container--------------------------->
        <div class='w3-container w3-margin-top'>
            <!------Page Card------>
            <div class='w3-white w3-text-grey w3-card-2 w3-round-large'>
 			               
                <!------Card Container------>
                <div class='w3-container w3-padding-16'>
                    <!-------Page Logo------->
                    <div class='w3-third' >
                        <div class='w3-container'>
                            <img class ='w3-padding-16' src='images/OsrLogo.jpg' width='40%' alt='logo' >
                        </div>
                    </div>
                    
                    <!--------------Start Ads---------------->
                 <div class='w3-padding w3-twothird'>
						 <!-------- Ads Banner ---------->
						<div class='' style='height:120px; '>
							<div class='w3-container w3-panel w3-blue w3-card-2 w3-round-large'>
								<h2 class='w3-center w3-text-white w3-padding-32'>Ads By Google Here...</h2>
							</div>
						</div>
                  </div>
                            
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
                   <div class='w3-half' >
                       <center><h2 style='color:red;' >العائلات </h2></center>
                        <div role='tabpanel' class='tab-pane' id='reviews'>
								<div class='row'>";
                      foreach ($chats as $chat){
                          echo"
                          <form method='post' action='Chat.php?chat=".$chat['chat_id']."'>
                          <img src='profile_pictures/".$chat['photo']."'>";
                          if(!empty($chat['first_name']))echo
                              "<p>".$chat['first_name']."  ".$chat['last_name']."</p>";
                              else echo "<p>".$chat['name']."</p>";
                          if($chat['state']>0)echo
                              "<p>you have a new message</p>";
                          else echo "<p>no new messages</p>";
                          echo
                          "<button type='submit' name='start-chat'>open</button></form>
                          ";
                      }echo"
									</div>
									
								</div>
								<br>
								<br>
								<br>
								<br>
								<br>
							</div>
                       
                    </div>
                    
                   <!---------------------End Test------------------------->
                    
        
        <!---------------------Start bottom Advertisement------------>
        <div class='w3-container w3-padding-16'>
                    <!-------- Ads Banner ---------->
                    <div class='' style='height:120px; '>
                        <div class='w3-container w3-panel  w3-card-2 w3-round-large' style='background-color: #FFF;'>
                            <h2 class='w3-center w3-text-black w3-padding-32'>Ads By Google Here...</h2>
                        </div>
                    </div>
         </div>
         <!---------------------End bottom Advertisement------------>
         
         
        <footer class='w3-container w3-Grey w3-center w3-large w3-margin-top' style='letter-spacing: 2px;'>
           &nbsp;&nbsp;
        </footer>
        
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