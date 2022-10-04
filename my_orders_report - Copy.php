 
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
                        
                        
                        <!-- <a class="nav-link" href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a> -->
                    </div>
                </div>
              <div class="col-md-9">
                    <div class="tab-content">
                    <!-- Report Form -->
                    <div class="col-md-9">
                        <div class="tab-content">
                         <div class=" " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>My Orders Reports</h4>
                                <form action="" method="POST">
                                <div class="row">
                                
                                <div class="col-md-5">
                                
                                                                    <select id="" class="form-control"  name="order_id" >
                                                                         <option value="">--Order Number--</option>
                                                                         <?php $sql="select * from orders where user_id={$_SESSION['user_Session']}";
                               $query= mysqli_query($conn,$sql);
                               while($row= mysqli_fetch_array($query)){
                                ?>     
                                                                   <option value="<?php echo $row['order_id'] ?>">Order #<?php echo $row['order_id']  ?></option>
                                                                
                                                                   <?php }  ?>
                                                                   </select>
                                             </div>
                                             <div class="col-md-5">
                                             <select id="" class="form-control"  name="status" >
<option value = "" >--Select Status--</option>
<option value = "1" >Pinding</option>
<option value = "2" >Accepted</option>
<option value = "3" >Rejected</option>

</select>

                                             </div>
                                             <div class="col-md-5">
                                             <select id="" class="form-control"  name="date" >
                                                                         <option value="">--Order Date--</option>
                                                                         <?php $sql="select * from orders where user_id={$_SESSION['user_Session']}";
                               $query= mysqli_query($conn,$sql);
                               while($row= mysqli_fetch_array($query)){
                                ?>     
                                                                   <option value="<?php echo $row['order_date'] ?>"><?php echo $row['order_date']  ?></option>
                                                                
                                                                   <?php }  ?>
                                                                   </select>
                                             </div>
                                  
                                    <div class="col-md-12">
                                        <button class="btn" name="search" type="submit">SEARCH</button>
                                        <br><br>
                                        
                                      </form>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <!-- end here -->

<div class="table" id="printMe" role="tabpanel" aria-labelledby="orders-nav">
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        
                                    </thead>
                                    <tbody>
                                  
                                    <?php 
                                      $user_id = $_SESSION['user_Session'];
                                    if(isset($_POST['search'])){
                                        echo $order_id = $_POST['order_id'];
                                        echo $status = $_POST['status'];
                                        echo $date = $_POST['date'];
                                        if($order_id !='' || $status !='' || $date !=''){
                                      $get_my_order=get_my_orders_search($user_id,$order_id,$status,$date);
                                        }else{
                                            echo '<center><b style="color:#f00;"> Erorr: Select Type,Date or Status ! </b></center>' ;
                                        }
                                        
                                    }
                                    else{
                                        $get_my_order = get_my_orders($user_id);
                                    }
                                    $get_my_order = get_my_orders($user_id);
                            
                                while($result = mysqli_fetch_array($get_my_order)){  ?> 
                                
                                <tr><td colspan=10> Order # <?php echo $result['order_id'] ?> </td></tr>
                                <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Recive Type</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
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
                                            <td>  <?php  if( $row['recieve_type']==0)echo'In the Shop';else{echo 'Delivary fees 700  SDG '; }   ?></td>
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
                               

                                            <!-- <td><button class="btn">View</button></td> -->
                                            <!-- </tr> -->
                                           
                                <?php
                                $recieve_type  = $row['recieve_type'];
                                } 
                               
                                ?>
                                 <tr><td colspan=10> Total  Price : <?php echo $tot_p ?> SDG / Total  Quantity : <?php echo $tot_q ?> Piece   / Total : <?php echo $tot + $recieve_type ?> SDG </td></tr>
                                <?php
                            }?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            
<?php if (isset($_REQUEST['search'])) {   ?>
<button id="toggleButton" onclick="printDiv('printMe');" class="btn btn-success active">Print Table</button>
<?php } ?>
                            <div>
                        </div>
                        </div>
                        </div>
                        </div>
                         </div>
                         </div>
<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
  

	</script>
  </center>





                         <br>
                         <br>
                         <br>
                         <br>

                          
 <?php   include("include/footer.php");   ?>