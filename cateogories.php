<?php    include("include/header.php");       

 $get_cat = Get_cateogory();

?>

<?php     if(isset($_GET['cat_id'])){
$cat_id = $_GET['cat_id'];

$cat_detils = Cat_detils($cat_id);

}
?>

        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                               <marquee><img src="include/img/new_logo.JPG" alt="Logo" width="1000" height="60"></marquee>

                                    <div class="row">
                                        <!-- <div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" value="Search">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Popular</a>
                                                        <a href="#" class="dropdown-item">Most sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">$0 to $50</a>
                                                        <a href="#" class="dropdown-item">$51 to $100</a>
                                                        <a href="#" class="dropdown-item">$101 to $150</a>
                                                        <a href="#" class="dropdown-item">$151 to $200</a>
                                                        <a href="#" class="dropdown-item">$201 to $250</a>
                                                        <a href="#" class="dropdown-item">$251 to $300</a>
                                                        <a href="#" class="dropdown-item">$301 to $350</a>
                                                        <a href="#" class="dropdown-item">$351 to $400</a>
                                                        <a href="#" class="dropdown-item">$401 to $450</a>
                                                        <a href="#" class="dropdown-item">$451 to $500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- ///////// -->
<?php  while($row = mysqli_fetch_array($cat_detils)) {   ?>

                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?php echo $row['product_name'];  ?></a>
                                       
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="images/<?php echo $row['product_photo'] ;   ?>" width="450" height="400" alt="Product Image">
                                        </a>
                                        <?php if(isset($_SESSION['user_Session'])) {?>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                        <?php  }?>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>Price</span><?php   echo $row['price'] ;   ?></h3>
                                        
                                       <a class="btn" href="product-detail.php?product_id=<?php  echo $row["product_id"];?>"><i class="fa fa-shopping-cart"></i>Show More</a>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php  } ?>
                        </div>
                            


<!-- ////// -->

                            
                        
                        
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
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
                        
                       
                </div>
            </div>
        </div> 
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    
        
<?php   include("include/footer.php");                ?>