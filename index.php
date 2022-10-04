 
 
 
 <?php   
 include("include/header.php");   

//    $user_id = $_SESSION['user_Session'];
  
 
 $get_cat = Get_cateogory();
 $get_product = Get_products();
 
 ?>
 


 
  <?php  //  echo $_SESSION['user_Session']  ;          ?>
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="include/img/new_logo.JPG"  alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
<?php if(isset($_SESSION['user_Session'])){   
    
    ?>
                    <div class="col-md-3">
                        <div class="user">
                            <!-- <a href="wishlist.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a> -->
                            
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(<?php include('include/Count.php');?>) </span>

                            </a>
                            
                        </div>
                    </div>
                    <?php   } ?>

                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->       
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <?php while($row  = mysqli_fetch_array($get_cat)){   ?>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="#"><i class="fa fa-home"></i></a> -->
                                    <a href="cateogories.php?cat_id=<?php  echo $row["cat_id"];?>"class="nav-link"><?php  echo $row['cateogory']; ?></a></i>
                                </li>
                                <?php } ?>
                              
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img src="include/img/slider-1.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>It's Time To How Who You Really Are </p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="include/img/Accessories.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Buy Two and Get The Third For Free</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img src="include/img/clothes3.jpg" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>We Have Everything you Need </p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="include/img/clothes2.jpg" />
                                <a class="img-text" href="">
                                    <p> Men's and Women's Clothing</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="include/img/whatche1.jpg" />
                                <a class="img-text" href="">
                                    <p>Best Watchs in Our Store </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="include/img/category-2.jpg" />
                            <a class="category-name" href="">
                                <p>Kids & Babies Clothes</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="include/img/category-4.jpg" />
                            <a class="category-name" href="">
                                <p>Fashion & Beauty</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="include/img/category-5.jpg" />
                            <a class="category-name" href="">
                                <p>Electronics & Accessories</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="include/img/category-6.jpg" />
                            <a class="category-name" href="">
                                <p>Gadgets & Accessories</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="include/img/category-7.jpg" />
                            <a class="category-name" href="">
                                <p>Gadgets & Accessories</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="include/img/clothes.jpg" />
                            <a class="category-name" href="">
                                <p>Men & Women Clothes</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->     
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+24912319595</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <br>
        <br>
        <!-- Featured Product Start -->
<div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <br>
<!--  -->
                <div class="row align-items-center product-slider product-slider-4">
<?php   while( $row = mysqli_fetch_array($get_product)){         ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?php echo $row['product_name'];        ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                             
                                    <img src="images/<?php echo $row['product_photo'];?>" width="470" height="470" alt="Product Image">
                                </a>
                                <?php if(isset($_SESSION['user_Session'])){   ?>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="product-price">
                                <h3><span>price</span> <?php echo $row['price']; ?></h3>
                    
                                <a class="btn" href="product-detail.php?product_id=<?php  echo $row["product_id"];?>"><i class="fa fa-shopping-cart"></i>Show More</a>
                            </div>
                        </div>
                    </div>
                    <?php  }  ?>

<!--  -->
                  
                </div>
            </div>
        </div>
       
           
      <?php  include("include/footer.php"); ?>
