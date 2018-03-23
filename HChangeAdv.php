<?php
session_start();
include_once  './Database.php';

include_once './FamilyController.php';
include_once './AdvertisementController.php';
 if(isset($_GET['country']))
 {
     $country_id = $_GET['country'];
     $id = $country_id;
 }
else
{
        //$id = $_GET["id"];

       // $country_id = $id;

}
if(isset($_GET["id"]))
 {
$id = $_GET["id"];}
$countries = Database::selectCountries();

if (isset($_POST['upload'])) {
    // echo 'aa';
    $country = new Country();

    $name = $_POST['name'];
    $link = $_POST['link'];
    $pos = $_POST['position'];
    $home =0;
    $image = $_FILES['image']['name'];
    if (isset($_POST['home']))
    {
    $home = $_POST['home'];
    }
    $check2 = false;
    $target = "advertisement/" . basename($_FILES['image']['name']);
    
        $check2 = move_uploaded_file($_FILES['image']['tmp_name'], $target);

        for ($i = 0; $i < count($countries); $i++) {
           
            $country = $countries[$i];

            $id = $country->getId();

            $position = 'country' . $id;
            if (isset($_POST[$position])) {
               // echo $_POST[$position];
                Database::insertAdvertisement($name, $link, $image, $id, $pos,$home);

            }
        }
    }


function validateImage($image) {
    $path_info = pathinfo($image);
    if ($path_info['extension'] == 'jpg' || $path_info['extension'] == 'jpeg' || $path_info['extension'] == 'png' || $path_info['extension'] == 'gif')
        {
        return TRUE;
    } else {
        return FALSE;
    }
}


?>
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
        <header class='header'>
        <section class='large-list' id='boss'>
                <div class='w3-container'>
                    <a href="HAdmin-Dashboard.php?country=<?php echo $country_id?>">
                        <div class='list color-5 col-lg-2 col-md-4 col-sm-6 col-xs-6'>
                            <i class='fa fa-user'></i>رجوع
                        </div>
                    </a>
                    
                    
                </div><!-- End container -->
                <div class='clearfix'></div>
            </section><!-- End large-list -->
       </header>
       <br/>
       <br/>
       
        <!----------------------Page Container--------------------------->
        
        <div class="w3-container w3-margin-top">
            <!------Page Card------>
            <div class="w3-white w3-text-grey w3-card-2 w3-round-large">
 			               
                <!------Card Container------>
              <div class="w3-container w3-padding-16">
                    <!-------Page Logo------->
                    <div class="w3-third" >
                        <div class="w3-container ">
                            <img class ="w3-padding-16"  src='images/OsrLogo.jpg' width="40%" alt="logo" >
                        </div>
                    </div>
                    
                    <!--------------Start Ads---------------->
                 <div class="w3-padding w3-twothird">
						 <!-------- Ads Banner ---------->
						
							
						
						
                  </div>
                            
            		  <!---------------Ads Banner--------------->

                </div>
                <br>
                <br>
                <!--------End Header Card Container--------->
               
                <!--------End Header NavBar--------->
                
                
                <div class="w3-row-padding w3-padding-16">
                   
                   <!---------------------Left Ads----------------------------->
                   
                   
                  
                          <!--------------------End Left Side--------------------------->
                       	<!--------------- Start testimonials  ----------------->
                    <div class="w3-threequarter">
                           

                <form action="HChangeAdv.php" method="post" enctype="multipart/form-data">
                   <p style="margin-top:35px; color:red;">Click On images in the top , left , bottom to choose your new images</p>
                    <input class="w3-text-red w3-input" type="text" name="name" placeholder="enter name of Advertisement" required>

                    <br>
                    <input class="w3-text-red w3-input" type="text" name="link" placeholder="enter link of Advertisement" required>

                    <br>
                    
                    <label for="file-input" > 
                                     <img id="preview" src="images/advertisement.jpg"style="width:100%; height:100%; margin-right: auto; margin-left: auto;display: block;" />
                    </label>
                    <input id="file-input" type="file" name="image" accept="image/*" style="display:none;">
                    <br/>
                    <input style="display:inline;" type="radio" name="position" value="up" >
                    up
                                        <br/>

                    <input style="display:inline;" type="radio" name="position" value="left" >
                    left
                                        <br/>

                    <input style="display:inline;" type="radio" name="position" value="bottom" >
                    bottom
                    <br> <br>
                    <input style="display:inline;" type="checkbox" name="country" value="all">all country
                    
                 <input style="display:inline;" type="checkbox" name="home" value="1"
                        main page
                    <br><br> <br>
                    <?php
                    $country = new Country();
                    for ($i = 0; $i < count($countries); $i++) {

                        $country = $countries[$i];
                        $id = $country->getId();
                        $name = $country->getName();
                        ?><input style="display:inline;" type="checkbox" name="country<?php echo $country->getId() ?>" value="<?php echo $country->getId() ?>"><?php echo $country->getName(); ?>
                        <?php
                    }
                    ?>
                    <br><br> <br><br> <br>
                    <input type="submit" value="post" name="upload"/>

                </form>
                    
                    </div>                
                    
                    <!--------------------End testimonials--------------------------->
                    


                    
                    
                </div>
                

                    
            </div>
            <!----------Page Container End---------->
        </div>
        <!---------------------End the first Card-------------------->
        
        
        <!---------------------Start bottom Advertisement------------>
        
        
         <!---------------------End bottom Advertisement------------>
         
         
        <footer class="w3-container w3-Grey w3-center w3-large w3-margin-top" style="letter-spacing: 2px;">
           &nbsp;&nbsp;
        </footer>
        	<?php
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
            }
    ?>
        <script type='text/javascript' src='js/myscripts.js'></script>
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://www.cse.ust.hk/~rossiter/dating_web_site.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>