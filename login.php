<?php
session_start();
include_once './Database.php';

include_once 'PersonController.php';
include_once './FamilyController.php';
include_once './UserController.php';

  if (isset($_SESSION['id'])) {
             
             header ("Location: index.php"); ?>
                    <a href="logout.php">logout</a><br/>
                    <?php
                    $families = Database::selectFamilies(1);
                    $family = new Familiy();
                    for ($i = 0; $i < count($families); $i++) {

                        $family = $families[$i];
                        $id = $family->getId();
                        $products = FamilyController::selectProducts($id);
                        $product = new Product();
                        $product = $products[0];
                        $type= $_SESSION['type'];
                        // echo $product->getId() . "   ..";
                        //echo $id;
                        if ($type == 2) {
                            ?>
                            <a href="favourite.php"> my favourite</a><br/>
                            <a href="FamilyDetails.php/?id=<?php echo $id; ?>"><?php echo $family->getName(); ?></a><br/>
                            <a href="ProductDetails.php/?id=<?php echo $product->getId() ?>"> <?php echo $product->getPhoto() ?></a><br/>

                            <?php
                            if (UserController::checkFollow($_SESSION['id'], $id)) {
                                ?><a href="unfollow.php/?id=<?php echo $id; ?>"> unfollow</a><br/>
                                <?php
                            } else {
                                ?><a href="follow.php/?id=<?php echo $id; ?>"> follow</a><br/>

                                <?php
                            }
                        } else {
                            ?><a href="FamilyDetails.php/?id=<?php echo $id ?>"><?php echo $family->getName(); ?></a><br/>
                            <a href="ProductDetails.php/?id=<?php echo $product->getId() ?>"><?php echo $product->getPhoto() ?></a><br/>
                            <?php
                        }
                    }
                    if ($type == 3) {
                        ?> <a href="myworks.php">my works</a>
                        <?php
                    }
            //Do stuff
        } 
        else {

             $country=$_GET['id'];
            $lang=$_GET['lang'];
      PersonController::enter();
       ?>
                <?php
            }
        

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /*$email = $_POST['email'];
    $pass = $_POST['pass'];
    $user = PersonController::login($email, $pass);
    if ($user != null) {
        $_SESSION['id'] = $user->getId();
        echo $user->getId();
        $type = PersonController::check($user->getId());
        $_SESSION['type'] = $type;
        ?> <a href="logout.php">logout</a><br/>
        <?php
        $families = Database::selectFamilies(1);
        $family = new Familiy();
        for ($i = 0; $i < count($families); $i++) {

            $family = $families[$i];
            $id = $family->getId();
            $products = FamilyController::selectProducts($id);
            $product = new Product();
            $product = $products[0];
            // echo $product->getId() . "   ..";
            //echo $id;
            if ($type == 2) {
                ?>
                <a href="favourite.php"> my favourite</a><br/>
                <a href="FamilyDetails.php/?id=<?php echo $id; ?>"><?php echo $family->getName(); ?></a><br/>
                <a href="ProductDetails.php/?id=<?php echo $product->getId() ?>"> <?php echo $product->getPhoto() ?></a><br/>

                <?php
                if (UserController::checkFollow($_SESSION['id'], $id)) {
                    ?><a href="unfollow.php/?id=<?php echo $id; ?>"> unfollow</a><br/>
                    <?php
                } else {
                    ?><a href="follow.php/?id=<?php echo $id; ?>"> follow</a><br/>

                    <?php
                }
            } else {
                ?><a href="FamilyDetails.php/?id=<?php echo $id ?>"><?php echo $family->getName(); ?></a><br/>
                <a href="ProductDetails.php/?id=<?php echo $product->getId() ?>"><?php echo $product->getPhoto() ?></a><br/>
                <?php
            }
           
        }
         if ($type == 3) {
                ?> <a href="myworks.php">my works</a>
                <?php
            }
        ?>

        <?php
        // echo $type;
    } else {
        echo 'email or pass is incorrect';
        // header("Location: login.php");
    }
} else {
    ?>
    <form action="login.php" method="POST">
        <h4>login</h4>
        <input type="text" name="email" placeholder="enter your email"/>
        <input type="password" name="pass" placeholder="enter your password"/>
        <input type="submit" value="login"/>
    </form>
    <?php
}*/


?>


