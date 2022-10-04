<?php   include("include/header.php");   ?>

<div class="my-account">
        <div class="container-fluid">

                <?php include("include/navbar.php");        ?>
                </div> 
              <div class="col-md-9">
                    <div class="tab-content">
                    <div class="col-md-9">
                        <div class="tab-content">
                         <div class=" " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>My Orders Reports</h4>
                                <form action="m_o_r.php" method="POST">
                                <div class="row">
                                
                                <div class="col-md-5">
                                
                                                                    <select id="" class="form-control"  name="order_number" >
                                                                         <option value="">--Order No--</option>
                                                                         <?php     $order_n = $_SESSION['user_Session'];      ?>
                                                                         <?php $sql="select * from orders where user_id=$order_n";
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
                                        <button class="btn" name="done" type="submit">SEARCH</button>
                                        <br><br>
                                        
                                      </form>
                                    </div>
                                </div>
                                </div>
                                </div>
                    <?php
if(isset($_POST['done'])){
    echo  $order_number = $_POST['order_number'];
    echo  $status = $_POST['status'];
    echo $date = $_POST['date'];

    if($order_number != '' || $status != '' || $date != ''){
        $g_sh = G_sh($order_number,$status,$date);
    }else{?>
        <script> 
alert( 'Search By Order Number , Date or Status !')
window.location.replace('m_o_r.php');
</script>
    <?php }
                    
                           ?>



                            <?php                       
                           
                           if($g_sh)
                           {
                           
                           
                           ?> 



<div class="table" id="printMe" role="tabpanel" aria-labelledby="orders-nav">
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        
                                    </thead>
                                    <tbody>
                                  
                                <tr>
                                            <th>Order No #</th>
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
                                        $total=0;
                                        ?>
                                <?php 
                        
                                    //  $get_my_order_search = Get_my_orders_search($user_id,$order_id,$status,$date);
                                
                                    while($row = mysqli_fetch_array($g_sh)){
                                      
                                        // $tot_p=($tot_p+$row['c_price']);
                                        // $tot_q=($tot_q+$row['c_quantity']);
                                        // $tot= $tot+($row['price'] * $row['c_quantity']);
                                        // $total=($row['price'] * $row['c_quantity'])+$tot;
                                    ?> 
                                   
                                     <tr>
                                       
                                            <td><?php echo $row['order_id']; ?></td>
                                            <!--  -->
                                            <td><?php  echo $row['product_name']; ?></td>
                                            <td><?php echo $row['order_date']; ?></td>
                                            <td>  <?php  if( $row['recieve_type']==0)echo'In the Shop';else{echo 'Delivary fees 700  SDG '; }   ?></td>
                                            <td><?php echo $row['c_color']; ?></td>
                                            <td><?php echo $row['c_size']; ?></td>
                                            <td><?php echo $row['c_price']; ?></td>
                                             <td><?php echo $row['c_quantity']; ?></td>
                                             <td><?php if( $row['order_status']==0 ){ ?>
                                              <span class="alert alert-warning">Cart..</span>
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

                                                       <?php    // $recieve_type = $row['recieve_type'];          ?>

                                             </td>
                               
                                             <?php   //$total_price  = $row['total_price'];      ?> 

                                            <!-- <td><button class="btn">View</button></td> -->
                                            <!-- </tr> -->
                                           
                                            <?php  }       ?>

                                 <tr><td colspan=9> Total  Price : <?php// echo $tot_p ?> SDG / Total  Quantity : <?php// echo $tot_q ?>Piece   / Total : <?php //echo $total=$total+$recieve_type; ?> SDG </td></tr>

                                <?php ?>
                                     <!-- <script> 
                                     alert( "Search By Order Number , Date or Status !");
                                     window.location.replace('m_o_r.php');
                                     </script> -->
                                     <?php
                                 
                               //}else{

                                             //}  ?>           
                                    </tbody>
                                <!-- <?php }else{      ?>
                                    <script> 
                         alert( "Search By Order Number , Date or Status !");
                         window.location.replace('m_o_r.php');
                         </script>
                         <?php } 
                         }?>  -->



                                </table>
                                             
                            </div>
