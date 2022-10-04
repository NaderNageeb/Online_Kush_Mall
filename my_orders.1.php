 
<?php   include("include/header.php");   ?>
    <br>
    <br>

        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
         <div class="row">
                    <div class="col-md-3">
                    
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="account-nav"  href="my-account.php" ><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" id="orders-nav" href="my_orders.php" ><i class="fa fa-shopping-bag"></i>My Orders</a>
                            <a class="nav-link" id="payment-nav" href="my_orders_report.php" ><i class="fa fa-credit-card"></i> Orders Reports </a>
                            
                            
                        </div>
                    </div>
                  <div class="col-md-9">
                        <div class="tab-content">
                        
 <div class="table" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            
                                        </thead>
                                        <tbody>
                                      
                                        <?php 
                                   
                                    $user_id=$_SESSION['user_Session'];
                               $get_my_order=get_my_orders($user_id);
                                while($result = mysqli_fetch_array($get_my_order)){  ?> 
                                
                                <tr><td colspan=10> Order # <?php echo $result['order_id'] ?> </td></tr>
                                <tr>
                                            <th>No</th>
                                            <th>Product Name</th>
                                            <th>Order Date</th>
                                            <th>Recieve Type</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                              <?php if($result['order_status']== 2  || $result['order_status']== 3 ){ ?>
                                            <th>Action</th>
                                            <?php }  ?>
                                        </tr>
                                <?php 
                                 $i=1;
                                 $tot=0;
                                 $tot_p=0;
                                 $tot_q=0;
                                    $sql = "SELECT * FROM order_list  where cart_order_id={$result['order_id']} ";
                                   $query=mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_array( $query)){
                                      
                                        $tot_p=($tot_p+$row['c_price']);
                                        $tot_q=($tot_q+$row['c_quantity']);
                                        $tot= ($tot+$row['price'] * $row['c_quantity']);
                                        //$tot=($tot_q*$tot_p)+$tot;
                                    ?> 
                                   
                                     <tr>
                                       
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td>  <?php  if($recieve_type = $row['recieve_type']==0)echo'In the Shop';else{echo 'Delivary fees 700  SDG '; }   ?></td>

                                            <td><?php echo $row['c_color']; ?></td>
                                            
                                            <td><?php echo $row['c_size']; ?></td>
                                            <td><?php echo $row['c_price']; ?></td>
                                             <td><?php echo $row['c_quantity']; ?></td>
                                             <td><?php if( $row['order_status']==0 ){ ?>
                                              <span class="alert alert-warning">On cart</span>
                                             <?php } ?>
                                             <?php if( $row['order_status']==1 ){ ?>
                                              <span class="alert alert-warning">Pending</span>
                                             <?php } ?>
                                             <?php if( $row['order_status']==2 ){ ?>
                                              <span class="alert alert-success">Confirmed</span>
                                             <?php } ?>
                                              <?php if( $row['order_status']==3 ){ ?>
                                              <span class="alert alert-danger">Rejected</span>
                                             <?php } ?>
                                             
                                             </td>
                                              <?php if($row['order_status']== 2 || $row['order_status']== 3 ){ ?>
                                            <td><a href="user_feedback.php?order_id=<?php echo $row["order_id"];?>"class="btn btn-success " target="_blank">View</a></td>
                                            <?php  } ?>
                                            </tr>
                                        
                                           
                                <?php
                                $recieve_type = $row['recieve_type'];
                                } 
                                
                                ?>
                                 <tr><td colspan=10> Total  Price : <?php echo $tot_p ?> SDG / Total  Quantity : <?php echo $tot_q ?> Piece   / Total :<?php echo $tot + $recieve_type?> SDG </td></tr>
                                <?php
                            }?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
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
                             <br>
                              
     <?php   include("include/footer.php");   ?>