
<?php   include("include/header.php");   ?>
    <br>
    <br>
<?php 
$get_admin_order=get_admin_orders();
$num=mysqli_num_rows($get_admin_order);
?>
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
<?php   include("include/navbar.php");   ?>
                  <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Orders</h4>
                                <br>
                                <div class="row">
<!-- ------------------- -->


                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                 <?php if($num>0){?>
                           
                                      <?php }else{?>  

                                    <center>  <tr><td> <div class="alert alert-warning"> No Orders For Now  </div></td></tr></center>
                                      
                                      <?php } ?>
                                      
                                        <?php 
                                   
                                   
                               //$get_admin_order=get_admin_orders();
                                //while ($query = mysqli_fetch_array($get_admin_order)) {
                                    // $query['order_status'];?> 
                                
                                <!-- <tr><td colspan=8> Order # <?php  //echo $result['order_id']?>  
                                By   <?php //echo $result['full_name']?>
                                 </td>
                                
                               
                                </tr> -->
                                <tr>
                                            <th>Order No</th>
                                       
                                            <th>User Name</th>
                                            <th>Order Date</th>
                                            <th>Recive Way</th>
                                            <!-- <th>Price</th> -->
                                            <!-- <th>Quantity</th> -->
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                        
                                            <th>Action</th>
                                            <?php 
                                //} ?>
                                        </tr>
                                <?php 
                                 $i=1;
                                 $tot=0;
                                 $tot_p=0;
                                 $tot_q=0;
                                 $sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and o.order_status = 1 ORDER BY o.order_id ";
                                   $query=mysqli_query($conn,$sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                      
                                       // $tot_p=($tot_p+$row['c_price']);
                                        //  $tot_q=($tot_q+$row['c_quantity']);
                                        //  $tot= ($tot+$row['price'] * $row['c_quantity']);
                                        //$tot=($tot_q*$tot_p)+$tot;?> 
                                   
                                     <tr>
                                       
                                            <td><?php echo $row['order_id'];; ?></td>
                                         
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td><?php if ($row['recieve_type']==0) {
                                            echo'In the Shop';
                                        } else {
                                            echo 'By Delivary';
                                        } ?></td>
                                          
                                             <td><?php echo $row['phone']; ?></td>

                                             <!-- <td><?php// if ($row['order_status']==0) { ?>
                                              <span class="alert alert-warning">On cart</span>
                                              <br>
                                              <br>
                                             <a href="orders_view.php?order_id=<?php// echo $row["order_id"];?>&user_id<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>

                                             <?php //} ?> -->
                                             <td>
                                             <?php if ($row['order_status']==1) { ?>
                                              <span class="alert alert-warning">Pending</span>
                                              <br>
                                              <br>
                                             <a href="orders_view.php?order_id=<?php echo $row["order_id"];?>&user_id=<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>

                                             <?php } ?>
                                             <?php if ($row['order_status']==2) { ?>
                                              <span class="alert alert-success">Confirmed</span>
                                              <br>
                                              <br>
                                             <a href="orders_view.php?order_id=<?php echo $row["order_id"];?>&user_id=<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>

                                             <?php } ?>
                                             <?php if ($row['order_status']==3) { ?>
                                              <span class="alert alert-danger">Rejected</span>
                                              <br>
                                              <br>
                                             <a href="orders_view.php?order_id=<?php echo $row["order_id"];?>&user_id=<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>

                                             <?php } ?>

                                                       <?php     $recieve_type = $row['recieve_type']; ?>
                                                         <?php     $total_bill = $row['total_price']; ?>
                                             
                                             
                                             </td>
                                                <?php if ($row['order_status']== 1 || $row['order_status']== 3) { ?>
                                                
                                            <td> 
                                            <form action="orders.php" method="POST">
                                            <input type="hidden" name="order_id" value="<?php echo $row["order_id"];  ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $row["user_id"];  ?>">
                                            <input type="submit" name="confirm" class="alert alert-success" value="Comfirm">
                                            <br>
                                              
                                            <input type="submit" name="reject" class="alert alert-danger"  onclick="return confirm('you want reject this order !!')" value="Reject">
                                            
                                            </form>

                                            </td>
                                            

                                            <?php }else{ ?>
                                                <td>  </td>
                                            <?php }
                                    }?>
                                            </tr>
                                           
                              
                                 <!-- <tr><td colspan=8>  Total Bill : <?php //echo $total_bill; ?> SDG </td></tr> -->
                         
                                           
                                        </tbody>
                                    </table>
                            </div>
                        </div>


<!-- ------------------------------------------- -->



      <?php 
      if(isset($_POST['confirm'])){
      //  $feedback   =  $_POST['feedback'];
      echo $order_id = $_POST['order_id'];
        echo  $user_id  = $_SESSION['Admin_Session'];

     $admin_confirm  = Admin_confirm($order_id,$user_id);

      }

      ?>
  

   <?php 
      if(isset($_POST['reject'])){
        //$feedback   =  $_POST['feedback'];
       $order_id = $_POST['order_id'];
          $user_id  = $_SESSION['Admin_Session'];

          $admin_reject  = Admin_reject($order_id,$user_id);

      }

      ?>










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
