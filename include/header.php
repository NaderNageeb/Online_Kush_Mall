<?php    include("function.php"); 
                 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Kush Mall</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="include/img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="include/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="include/lib/slick/slick.css" rel="stylesheet">
        <link href="include/lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="include/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope">Kush@email.com</i><p>
                      
                    </div>
                    <div class="col-sm-6">
                    <?php if(isset($_SESSION['Admin_name'])){?>
                        <i class="fa fa-user">  

                           <?php echo 'Welcome'. '      '.$_SESSION['Admin_name'] ;?>
                           
                           
                            
                        <?php }if(isset($_SESSION['user_Session'])){          ?>
                        <i class="fa fa-user">
                        <?php echo 'Welcome'.  '  ' . $_SESSION['customer_name'] ;
                
                        ?>
                    <?php }if(isset($_SESSION['manager_Session'])){          ?>
                        <i class="fa fa-user">
                        <?php echo 'Welcome'.  '  ' . $_SESSION['manager_name'] ; 
                
                        ?>


                        <?php  }else{     }       ?>
                        <!-- +012-345-6789 -->
                        <?php      ?></i><p>
                      
                        <i class=""></i><p>

                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
<?php
if(isset($_SESSION['Admin_Session'])){

?>

     <a href="index.php" class="nav-item nav-link">Home</a>
     <a href="product-list.php" class="nav-item nav-link">Products</a>
      <a href="account_details.php" class="nav-item nav-link">My Account</a>
      <a href="logout.php"  class="nav-item left nav-link">Logout</a></div>
 

  


                        <?php  }elseif (isset($_SESSION['user_Session'])) {?>

                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="product-list.php" class="nav-item nav-link">Products</a>          
                        <a href="cart.php" class="nav-item nav-link">Cart</a>
                        <a href="my-account.php" class="nav-item nav-link">My profile</a>

                      <a href="logout.php"  class="nav-item left nav-link">Logout</a></div>
                           
                        
                        <?php }elseif (isset($_SESSION['manager_Session'])) {?>
                        
                        <a href="manager_account.php" class="nav-item nav-link">My Account</a>
                        <!-- <a href="logout.php" class="nav-item nav-link ">Logout</a> -->
                        <a href="product-list.php" class="nav-item nav-link">Products</a>
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                      <a href="logout.php"  class="nav-item left nav-link">Logout</a></div>

                     <?php }else{ ?>
                        
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="login.php" class="nav-item nav-link">Login</a> 
                             <a href="Register.php" class="nav-item nav-link">Register</a>
                            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                            <a href="product-list.php" class="nav-item nav-link">Products</a>
                            <!-- <a href="about.php" class="nav-item nav-link"> صفحة about us No </a> -->
                                                     
<?php   }   ?>
                        </div>
                   
                    </div>
                </nav>
            </div>
        </div>
          
       
            <!-- <a href="product-detail.php" class="nav-item nav-link">Product Detail</a> -->
                            <!-- <a href="cart.php" class="nav-item nav-link">Cart</a> -->
                            <!-- <a href="checkout.php" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.php" class="nav-item nav-link">My Account</a> -->
                             <!-- <a href="cart.php" class="nav-item nav-link">Cart</a> -->
                            <!-- <a href="checkout.php" class="nav-item nav-link">Checkout</a> -->
                            <!-- <a href="checkout.php" class="nav-item nav-link">Checkout</a> -->
                      <!-- <a href="product-detail.php" class="nav-item nav-link">Product Detail</a> -->
