
<?php   include("include/header.php");  

$get_product = Get_products();
?>
    <br>
    <br>

        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
            <?php  include('include/navbar.php');           ?>

                  <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Manage Product</h4>
                                <br>
                                <div class="row">
<!-- ------------------- -->


                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Cateogory</th>
                                            <th>Quantity</th>
                                            <th>Color</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php while($row = mysqli_fetch_array($get_product)) {       ?>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="images/<?php  echo $row['product_photo']; ?>" alt="Image" width="100" height="100"></a>
                                                    <p><?php  echo $row['product_name'];   ?></p>
                                            </td>
                                            <td> <?php       echo $row['price'];        ?></td>
                                            <td>  <?php       echo $row['cateogory'];        ?>          </td>
                                            <td>              <?php $qty= $row['p_quantity'];
                                            
                                            
                                            
                                        if($qty<5)echo'<span class="alert alert-danger">'. $qty  .'</span>';  else{
                                            echo "$qty";
                                        }      ?>                 </td>
                                            <td>  <?php       echo $row['color'];        ?>             </td>
                                          
                                            
                                            <td>
                                             <form action="" method="GET">
                                             <a href="update_product.php?product_id=<?php echo $row["product_id"];?>"class="btn btn-success" target="_blank">Edit</a></div>
                                             <a href="manage_product.php?del_product=<?php echo $row["product_id"];?>"class="btn btn-secondary" onclick="alert('You Want Delete This Product?')" >Delete</div></a>
                                               </form>      </td>
                                          
                                            
                                        </tr>
                                      
                                    </tbody>
                                <?php  } ?>
                                </table>
                                
                            </div>
                        </div>

<?php  

if(isset($_GET["del_product"])){
$del_product = $_GET["del_product"];

Del_product($del_product);

}
?>
























<!-- ------------------------------------------- -->

            </div>
              </div>
                </div>
                </div>
            
                </div>
            </div>

        <!-- My Account End -->
      <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
     <?php   include("include/footer.php");   ?>
