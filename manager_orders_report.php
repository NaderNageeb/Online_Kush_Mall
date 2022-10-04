 
<?php   include("include/header.php");   ?>
<br>
<br>

    
    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <?php      include("include/navbar.php");            ?>
              <div class="col-md-9">
                    <div class="tab-content">
                    <!-- Report Form -->
                    <div class="col-md-9">
                        <div class="tab-content">
                         <div class=" " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4> Orders Reports</h4>
                                <form action="" method="POST">
                                <div class="row">
                                
                                <div class="col-md-10">
                                
                                                                    <select id="" class="form-control" required="required" name="order_id" >
                                                                         <option value="">--Select User Type--</option>
                                                                         <?php $sql="select * from orders";
                               $query= mysqli_query($conn,$sql);
                               while($row= mysqli_fetch_array($query)){
                                ?>     
                                                                   <option value="<?php echo $row['order_id'] ?>">Order #<?php echo $row['order_id']  ?></option>
                                                                
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
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        
                                    </thead>
                                    <tbody>
                                  
                                    <?php 
                                    //   $user_id=$_SESSION['user_Session'];
                                    if (isset($_REQUEST['search'])) {
                                        $order_id = $_REQUEST['order_id'];
                                        $get_admin_orders_search = get_admin_orders_search($order_id);
                                     
                                   
                                        while ($result = mysqli_fetch_array($get_admin_orders_search)) {  ?> 
                                
                                <tr><td colspan=8> Order # <?php echo $result['order_id'] ?>
                                By   <?php echo $result['full_name'] ?> </td></tr>
                                <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Date</th>
                                            <th>Color</th>
                                            <th>Recive type</th>
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
                                    $sql = "SELECT * FROM order_list o , users u  where o.user_id = u.user_id   and cart_order_id={$result['order_id']} ";
                                   $query=mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $tot_p=($tot_p+$row['c_price']);
                                        $tot_q=($tot_q+$row['c_quantity']);
                                        $tot=($tot + $row['c_price']*$row['c_quantity']);
                                        //$tot=($tot_q*$tot_p)+$tot;?> 
                                   
                                     <tr>
                                       
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td><?php echo $row['c_color']; ?></td>
                                            <td><?php if($row['recieve_type']==0)echo'In the Shop';else{echo 'By Delivary'; }  ?></td>
                                            <td><?php echo $row['c_price']; ?></td>
                                             <td><?php echo $row['c_quantity']; ?></td>
                                             <td><?php if ($row['order_status']==0) { ?>
                                              <span class="alert alert-warning">On cart</span>
                                             <?php } ?>
                                             <?php if ($row['order_status']==1) { ?>
                                              <span class="alert alert-warning">Pending</span>
                                             <?php } ?>
                                             <?php if ($row['order_status']==2) { ?>
                                              <span class="alert alert-success">Confirmed <?php  $admin_id = $row['admin_id']; echo Get_admin_name($admin_id);   ?>  </span>
                                             <?php } ?>
                                               <?php if ($row['order_status']==3) { ?>
                                              <span class="alert alert-danger">Rejected By <?php  $admin_id = $row['admin_id']; echo Get_admin_name($admin_id);   ?>   </span>
                                             <?php } ?>
                                <?php
                                $recieve_type = $row['recieve_type']; 

                                    }
                                      
                                
                                ?>
                                 <tr><td colspan=8> Total  Price : <?php echo $tot_p ?> SDG / Total  Quantity : <?php echo $tot_q ?> Piece   / Total : <?php echo $tot + $recieve_type?> SDG </td></tr>
                                <?php
                                
                            }
                                    }?>
                                       
                                    </tbody>
                                </table>
                                <?php if (isset($_REQUEST['search'])) {   ?>
<button id="toggleButton" onclick="printDiv('printMe');" class="btn btn-success active">Print Table</button>
<?php } ?>
                            </div>
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
                         <br>
                         <br>
                         <br>
                         <br>
                          
 <?php   include("include/footer.php");   ?>