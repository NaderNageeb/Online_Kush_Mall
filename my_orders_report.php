 
<?php   include("include/header.php");   ?>
<br>
<br>

    
    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-md-3"> -->
                <?php include("include/navbar.php");        ?>
                    <!-- <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="account-nav"  href="my-account.php" ><i class="fa fa-user"></i>Account Details</a>
                        <a class="nav-link" id="orders-nav" href="my_orders.php" ><i class="fa fa-shopping-bag"></i>My Orders</a>
                        <a class="nav-link" id="payment-nav" href="my_orders_report.php" ><i class="fa fa-credit-card"></i> Orders Reports </a>
                         -->
                        
                        <!-- <a class="nav-link" href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a> -->
                    <!-- </div>-->
                </div> 
              <div class="col-md-9">
                    <div class="tab-content">
                    <!-- Report Form -->
                    <div class="col-md-9">
                        <div class="tab-content">
                         <div class=" " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>My Orders Reports</h4>
                                <form action="my_orders_report.php" method="POST">
                                <div class="row">
                                
                                <div class="col-md-5">
                                
                                                                    <select id="" class="form-control"  name="order_id" >
                                                                         <option value="">--Order No--</option>
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
                                    <?php 
                                    if(isset($_POST['search'])){
                                      $user_id = $_SESSION['user_Session'];

                                         $order_id = $_POST['order_id'];
                                         $status = $_POST['status'];
                                         $date = $_POST['date'];
                                        if($order_id !='' || $status !='' || $date !=''){
                                      $get_my_order_search = Get_my_orders_search($user_id,$order_id,$status,$date);
                                        }else{?>
                                            <script>alert('Select Order Number,Date or Status !');
                                            window.location = '/Kush_Online_Store/my_orders_report.php';</script>
                                          
                                        <?php } ?>
                                      
                                  

<?php



?>





<div class="table" id="printMe" role="tabpanel" aria-labelledby="orders-nav">
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        
                                    </thead>
                                    <tbody>
                                  
                                <tr>
                                            
                                <th>Order Number</th>
                                            <th>Order Date</th>
                                            <th>Recive Way</th>
                                            <!-- <th>Price</th> -->
                                            <!-- <th>Quantity</th> -->
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                        <?php
                                        // $i=1;
                                        // $tot=0;
                                        // $tot_p=0;
                                        // $tot_q=0;
                                        // $total=0;
                                        ?>
                                <?php 
                        
                                      $get_my_order_search = Get_my_orders_search($user_id,$order_id,$status,$date);
                                
                                    while($row = mysqli_fetch_array($get_my_order_search)){
                                      
                                        // $tot_p=($tot_p+$row['c_price']);
                                        // $tot_q=($tot_q+$row['c_quantity']);
                                        // $tot= $tot+($row['price'] * $row['c_quantity']);
                                        // $total=($row['price'] * $row['c_quantity'])+$tot;
                                    ?> 
                                   
                                     <tr>
                                       

                                            <td><?php echo $row['order_id']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td><?php if ($row['recieve_type']==0) {
                                            echo'In the Shop';
                                        } else {
                                            echo 'By Delivary';
                                        } ?></td>
                                          
                                             <td><?php echo $row['phone']; ?></td>

                                             <td><?php if ($row['order_status']==0) { ?>
                                              <span class="alert alert-warning">On cart</span>
                                              <br>
                                              <br>
                                             <!-- <a href="orders_view_user.php?order_id=<?php// echo $row["order_id"];?>"class="btn btn-success " target="_blank">View</a> -->

                                             <?php } ?>
                                             <?php if ($row['order_status']==1) { ?>
                                              <span class="alert alert-warning">Pending</span>
                                              <br>
                                              <br>
                                             <a href="orders_report_detils.php?order_id=<?php echo $row["order_id"];?>"class="btn btn-success " target="_blank">View</a>

                                             <?php } ?>
                                             <?php if ($row['order_status']==2) { ?>
                                              <span class="alert alert-success">Confirmed</span>
                                              <br>
                                              <br>
                                             <a href="orders_report_detils.php?order_id=<?php echo $row["order_id"];?>"class="btn btn-success " target="_blank">View</a>

                                             <?php } ?>
                                             <?php if ($row['order_status']==3) { ?>
                                              <span class="alert alert-danger">Rejected</span>
                                              <br>
                                              <br>
                                             <a href="orders_report_detils.php?order_id=<?php echo $row["order_id"];?>"class="btn btn-success " target="_blank">View</a>

                               
                                             <?php   //$total_price  = $row['total_price'];      ?> 

                                            <!-- <td><button class="btn">View</button></td> -->
                                            <!-- </tr> -->

                                           
                                            <?php  }       ?>


                                
                             
                                       
                                    </tbody>
                                    <?php
                                }
                    }
                            ?>
                                </table>
                            </div>
                            <br>
                            <br>
<?php if (isset($_REQUEST['search'])) {   ?>
<center><button id="toggleButton" onclick="printDiv('printMe');" class="btn btn-success active">Print Table</button></center>
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