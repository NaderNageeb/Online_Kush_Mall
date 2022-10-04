<?php        include("include/header.php");  

 $get_cat = Get_cateogory();
 $get_product = Get_products();


?>
        <?php
 if (isset($_GET['product_id'])) {
     $product_id = $_GET['product_id'];

     $product_detils = Product_detils($product_id); ?>
        
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="include/img/new_logo.JPG" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                <?php  if (isset($_SESSION['user_Session'])) {  $user_id =  $_SESSION['user_Session'];?>
                    <div class="col-md-3">
                        <!-- <div class="user">
                            <a href="wishlist.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a> -->
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(<?php include('include/Count.php');            ?>)</span>
                            </a>
                        </div>
                    </div>
                <?php  } ?>
                </div>
            </div>
        </div>
        
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="images/<?php echo  $product_detils['product_photo']; ?>" style="width:500px;height:350px; alt="Product Image">
                                       
                                      
                                    </div>
                        
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo $product_detils['product_name']; ?></h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p><?php echo $product_detils['price']; ?></p>
                                        </div>

                                          <?php  if (isset($_SESSION['user_Session'])) {          ?>
                                        <form action="" method="POST">
                                        <div class="price">
                                            <h4>Quantity:</h4>
                                            <p><input type="number" min="1" max="20" name="qty" required="required" class="btn"></p>
                                        </div>
                                        <?php }else{           ?>
                                           <form action="" method="POST">
                                        <div class="price">
                                            <h4>Quantity:</h4>
                                            <p><input type="number" min="1" max="20" name="qty" value = "1" readonly="readonly" required="required" class="btn"></p>
                                        </div>
                                         <?php } ?>


                                        <!-- <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <select name="qty" required = "required" class="btn">
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>

                                              </select>
                                            </div>
                                        </div> -->
                                   

                                        <div class="price">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                            <p><?php echo $product_detils['size']; ?></p>
                                            <input type="hidden" name="size" value="<?php echo $product_detils['size']; ?>"> 
                                              

                                            
                                            </div> 
                                        </div>
                                        <div class="price">
                                            <h4>Color:</h4>
                                            <p><?php echo $product_detils['color']; ?></p>
                                             <input type="hidden" name="color" value="<?php echo $product_detils['color']; ?>"> 
                                            </div>
                                            

           
                                        <?php  if (isset($_SESSION['user_Session'])) {          ?>
                                        
                                        <div class="fa fa-shopping-bag">

                                         <input type="submit" name="add_to_cart" class="btn" value="Add to Cart">
                                        
                                        </div>
                                     
                                        </form>
                                        <?php }  elseif (isset($_SESSION['Admin_Session']) || isset($_SESSION['manager_Session']))  { ?>
                                        <!-- <a class="btn" href="login.php"><i class="fa fa-shopping-bag"></i>Buy Now</a> -->
                                        <?php  }else{ ?>
                                         <a class="btn" href="login.php"><i class="fa fa-shopping-bag"></i>Buy Now</a> 
                                             <?php } 
                                             
                                             
                                             ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        if (isset($_SESSION['user_Session'])) {
                            $s_check="select * from orders where user_id={$_SESSION['user_Session']} and order_status=0 order by order_id DESC ";
                            $q=mysqli_query($conn,$s_check);
                            $check_exist=mysqli_num_rows($q);
                            if ($check_exist==0) {
                                $sql="insert into orders (user_id) values ({$_SESSION['user_Session']})";
                                $query=mysqli_query($conn, $sql);
                                $get_last_order="select * from orders where user_id={$_SESSION['user_Session']} and order_status=0 order by order_id DESC ";
                                $q=mysqli_query($conn, $get_last_order);
                                $show_last_order=mysqli_fetch_array($q);
                                $order_id = $show_last_order['order_id'];
                            }

                            if (isset($_POST['add_to_cart'])) {
                                $s_check="select * from orders where user_id={$_SESSION['user_Session']} and order_status=0 order by order_id DESC ";
                                $q=mysqli_query($conn, $s_check);
                                $check_exist=mysqli_num_rows($q);
                                if ($check_exist==0) {
                                    $sql="insert into orders (user_id) values ({$_SESSION['user_Session']})";
                                    $query=mysqli_query($conn, $sql);
                                    $get_last_order="select * from orders where user_id={$_SESSION['user_Session']} and order_status=0 order by order_id DESC ";
                                    $q=mysqli_query($conn, $get_last_order);
                                    $show_last_order=mysqli_fetch_array($q);
                                    $order_id = $show_last_order['order_id'];
                                }
                                
                                $res=mysqli_fetch_array($q);
                                $order_id = $res['order_id'];
                                //  $Receive_type = $_POST['Receive_type'];
                                $qty = $_POST['qty'];
                        
                                $price_total =  $qty * $product_detils['price'];
                     
                                $size = $_POST['size'];
                                $color = $_POST['color'];
                                $user_id = $_SESSION['user_Session'];
                                $product_id = $_GET['product_id'];
                                $order_date  = date("Y/m/d");
                                if ($order_id!=0) {
                                    $add_to_cart = Add_to_cart($qty, $order_id, $price_total, $size, $color, $user_id, $product_id);
                                }
                            }
                        }
                        
                             
    
                        ?>
                    
                  
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>
                            <div class="row align-items-center product-slider product-slider-3">
                               <?php   while ($row = mysqli_fetch_array($get_product)) {         ?>
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
                                <a href="product-detail.php">
                                    <img src="images/<?php echo $row['product_photo'];?>" width="470" height="470" alt="Product Image">
                                </a>
                                
                            </div>
                            <div class="product-price">
                                <h3><span>price</span> <?php echo $row['price']; ?></h3>
             
                                <a class="btn" href="product-detail.php?product_id=<?php  echo $row["product_id"]; ?>"><i class="fa fa-shopping-cart"></i>Show More</a>
                                
    
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                   <ul class="navbar-nav">
                                <?php while ($row  = mysqli_fetch_array($get_cat)) {   ?>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="#"><i class="fa fa-home"></i></a> -->
                                    <a href="cateogories.php?cat_id=<?php  echo $row["cat_id"];?>"class="nav-link"><?php  echo $row['cateogory']; ?></a></i>
                                </li>
                                <?php } ?>
                                       
                                </ul>
                            </nav>
                        </div>
                        
                        
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <?php
 }elseif (!isset($_GET['product_id'])) {
        echo "<script>
				window.location = '/Kush_Online_Store/index.php';
				</script>";
 }      ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Product Detail End -->
       <?php    include("include/footer.php");      ?>