 
<?php   include("include/header.php");   ?>
<br>
<br>

    
    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
<?php  include('include/navbar.php');           ?>
        
            <!-- <div class="row">
                <div class="col-md-3">
                
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="account-nav"  href="my-account.php" ><i class="fa fa-user"></i>Account Details</a>
                        <a class="nav-link" id="orders-nav" href="my_orders.php" ><i class="fa fa-shopping-bag"></i>My Orders</a>
                        <a class="nav-link" id="payment-nav" href="my_orders_report.php" ><i class="fa fa-credit-card"></i> Orders Reports </a>
                        
                        
                        <!-- <a class="nav-link" href="index.php"><i class="fa fa-sign-out-alt"></i>Logout</a> -->
                    <!-- </div>
                </div> --> 
              <div class="col-md-9">
                    <div class="tab-content">
                    <!-- Report Form -->
                    <div class="col-md-9">
                        <div class="tab-content">
                         <div class=" " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Orders Reports</h4>
                                <form action="" method="POST">
                                <div class="row">
                                
                                <div class="col-md-5">
                                
                                                                    <!-- <select id="" class="form-control"  name="user_id" >
                                                                         <option value="">--Order Number--</option>
                                                                         <?php //$sql="SELECT * FROM orders o , users u WHERE o.user_id = u.user_id ";
                               //$query= mysqli_query($conn,$sql);
                               //while($row= mysqli_fetch_array($query)){
                                ?>     
                                                                   <option value="<?php //echo $row['user_id'] ?>"><?php //echo $row['full_name']  ?></option>
                                                                
                                                                   <?php //}  ?>
                                                                   
                                                                   </select> -->
                                                                   <input type = "text" placeholder="Enter Customer Name"  name = "user_name" class="form-control">
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
                                                                         <?php $sql="select * from orders ";
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
                                    //   $user_id = $_SESSION['user_Session'];
                                    if(isset($_POST['search'])){
                                         $user_name = $_POST['user_name'];
                                         $status = $_POST['status'];
                                         $date = $_POST['date'];
                                        if($user_name !='' || $status !='' || $date !=''){
                                      $get_admin_order_search = Get_admin_orders_search($user_name,$status,$date);
                                        }else{
                                            echo '<center><b style="color:#f00;"> Erorr: Select Order Number,Date or Status ! </b></center>' ;
                                        }
                                      ?> 
                                <?php if(isset($get_admin_order_search)){       ?>
                                




<div class="table" id="printMe" role="tabpanel" aria-labelledby="orders-nav">
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        
                                    </thead>
                                    <tbody>
                                  
                                <tr>
                                            <th>Order No #</th>
                                            <th> User Name    </th>
                                            <!-- <th>Product</th> -->
                                            <th>Order Date</th>
                                             <th>Recive Type</th>
                                             <th>phone number</th>

                                            <!-- <th>Color</th>
                                            <th>Size</th> 
                                            <th>Price</th>
                                            <th>Quantity</th> -->
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                <?php 
                        
                                
                                    while($row = mysqli_fetch_array($get_admin_order_search)){
                                      
                                        //$tot_p=($tot_p+$row['price']);
                                        //$tot_q=($tot_q+$row['c_quantity']);
                                       // $tot= ($tot+$row['c_price'] * $row['c_quantity']);
                                        //$tot=($tot_q*$tot_p)+$tot;
                                        
                                    ?> 
                                   
                                     <tr>
                                       
                                            <td><?php echo $row['order_id']; ?></td>
                                            <td><?php  echo $row['full_name']; ?></td>

                                            <!--  -->
                                            <!-- <td><?php // echo $row['product_name']; ?></td> -->
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td>  <?php  if( $row['recieve_type']==0)echo'In the Shop';else{echo 'Delivary fees 700  SDG '; }   ?></td>
                                              <td><?php echo $row['phone']; ?></td> 
                                             <!--<td><?php //echo $row['c_size']; ?></td> 
                                            <td><?php //echo $row['c_price']; ?></td>
                                             <td><?php //echo $row['c_quantity']; ?></td> -->
                                             <!-- <td><?php //if( $row['order_status']==0 ){ ?>
                                              <span class="alert alert-warning">Cart..</span>
                                             <?php //} ?> -->
                                             <td>
                                             <?php if( $row['order_status']==1 ){ ?>
                                              <span class="alert alert-warning">Pending</span>
                                              <br>
                                              <br>
                                             <a href="orders_view_report.php?order_id=<?php echo $row["order_id"];?>&user_id=<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>
                                             
                                             <?php } ?>
                                             <?php if( $row['order_status']==2 ){ ?>
                                              <span class="alert alert-success">Confirmed</span>
                                              <br>
                                              <br>
                                             <a href="orders_view_report.php?order_id=<?php echo $row["order_id"];?>&user_id=<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>
                                             
                                             <?php } ?>
                                             <?php if( $row['order_status']==3 ){ ?>
                                              <span class="alert alert-danger">Rejected</span>
                                              <br>
                                              <br>
                                             <a href="orders_view_report.php?order_id=<?php echo $row["order_id"];?>&user_id=<?php echo $row["user_id"];  ?>"class="btn btn-success " target="_blank">View</a>

                                             <?php } ?>


                                             
                                             </td>
                               
                                             <?php   //$total_price  = $row['total_price'];      ?> 

                                            <!-- <td><button class="btn">View</button></td> -->
                                            <!-- </tr> -->
                                           
                                            <?php  }       ?>
                                
                             
                                       
                                    </tbody>
                                    <?php
                            }else{?>
                            <center><b style="color:#f00;">NO Data Selected !</center>
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