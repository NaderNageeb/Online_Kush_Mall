
<?php   include("include/header.php");   ?>
    <br>
    <br>

<?php 
if (isset($_GET['order_id'])) {
   $order_id = $_GET['order_id'];
    $get_admin_order=get_admin_orders_By($order_id);
    $num=mysqli_num_rows($get_admin_order);
}
?>


        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
<?php   include("include/navbar.php");   ?>

                  <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Report Detils</h4>
                                <br>
                                <div class="row">
<!-- ------------------- -->


                        <div class="col-md-15">
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-bordered" id="printMe">
                                 <?php if($num>0){?>
                           
                                      <?php }else{?>  

                                    <center>  <tr><td> <div class="alert alert-warning"> No Orders For Now  </div></td></tr></center>
                                      
                                      <?php } ?>
                                      
                                        <?php 
                                   
                                   
                               //$get_admin_order=get_admin_orders_By($order_id);
                                //while($result = mysqli_fetch_array($get_admin_order)){  ?> 
                                
                                
                               
                                </tr>
                                <tr>
                                            <th>NO</th>
                                            <th>User Name</th>
                                       
                                            <th>Product Name</th>
                                            <th>Order Date</th>
                                            <th>Recive Way</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <?php //if($result['order_status']== 1  || $result['order_status']== 3 ){ ?>
                                            <!-- <th>Action</th> -->
                                            <?php //}  ?>
                                        </tr>
                                <?php 
                                $i=1;
                                $tot=0;
                                $tot_p=0;
                                $tot_q=0;
                                $total=0;
 
                                 $sql = "SELECT * FROM order_list o , users u   where o.cart_order_id= $order_id and u.user_id = o.user_id ";
                                   $query=mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_array( $query)){
                                      
                                        $tot_p=($tot_p+$row['c_price']);
                                        $tot_q=($tot_q+$row['c_quantity']);
                                        $tot= $tot+($row['price'] * $row['c_quantity']);
                                        $total=($row['price'] * $row['c_quantity'])+$tot;
                                        //$tot=($tot_q*$tot_p)+$tot;
                                    ?> 
                                   
                                     <tr>
                                       
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['full_name']; ?></td>
                                         
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td><?php if($row['recieve_type']==0)echo'In the Shop';else{echo 'By Delivary'; }  ?></td>
                                            <td><?php echo $row['c_price']; ?></td>
                                             <td><?php echo $row['c_quantity']; ?></td>
                                             <td><?php echo $row['phone']; ?></td>

                                             <td><?php if( $row['order_status']==0 ){ ?>
                                              <span class="alert alert-warning">cart..</span>
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

                                                       <?php     $recieve_type = $row['recieve_type'];          ?>
                                             
                                             
                                             </td>
                                                <!-- <?php //if($row['order_status']== 1 || $row['order_status']== 3 ){ ?>
                                            <td>  <form action="orders.php" method="POST">
                                            <input type="hidden" name="order_id" value="<?php// echo $row["order_id"];  ?>">
                                            <input type="hidden" name="user_id" value="<?php //echo $row["user_id"];  ?>">
                                            <input type="submit" name="confirm" class="alert alert-success" value="Comfirm">
                                            <input type="submit" name="reject" class="alert alert-danger" value="Reject">
                                            
                                            </form></td>
                                            

                                            <?php //}else{ ?>
                                                <td>  </td>
                                            <?php //} ?>
                                             -->
                                            </tr>
                                           
                                <?php
                                } 

                            //}
                                ?>
                                 <tr><td colspan=9> Total  Price : <?php echo $tot_p ?> SDG / Total  Quantity : <?php echo $tot_q ?>Piece   / Total : <?php echo $total=$total+$recieve_type; ?> SDG </td></tr>
                                 
                                <?php
                            ?>
                                           
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <center><button id="toggleButton" onclick="printDiv('printMe');" class="btn btn-success active">Print Table</button></center>
                        <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
  

	</script>


<!-- ------------------------------------------- -->

            </div>
              </div>
                </div>
                </div>
            
                </div>
            </div>



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
