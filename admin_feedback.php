<?php //  include("include/function.php");   ?>
<?php   include("include/header.php");   ?>
    <br>
    <br>
    <?php  
    
    if(isset($_GET['order_id'])){

       $order_id = $_GET['order_id'];
       $user_id  = $_SESSION['Admin_Session'];

       $get_order_details = Get_order_details($order_id);

           
          ?> 
        









        <!-- My Account Start -->
 <div class="my-account">
 <div class="container-fluid">

<?php  include('include/navbar.php');           ?>

 <div class="col-md-9">
   <div class="tab-content">
    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
        <h4>Order Feedback</h4>
     <br>
     <form action="" method="POST">
       <div class="row">
   <!---------------------------  -->
   
   <div class="col-md-6">
    <input class="form-control" type="text" required="required" name="user_name" value="<?php  if($get_order_details['recieve_type']==0)echo'In the Shop';else{echo 'By Delivary'; }  ?>" placeholder="" readonly="readonly">
    <input class="form-control" type="hidden" required="required" name="user_name" value="<?php  echo $order_id; ?>" placeholder="" readonly="readonly">

    <input class="form-control" type="text" required="required" name="feedback" value="" placeholder="FeedBack">
      </div>
  
   <div class="col-md-12">
   <input type="submit" class="btn" name="confirm" value="Confirm Order">
   <input type="submit" onclick="myFun()" class="btn btn-denger" name="reject" value="Reject Order">
      <br>
       <br>
</form>


      <?php 
      if(isset($_POST['confirm'])){
      //  $feedback   =  $_POST['feedback'];
       $order_id = $_GET['order_id'];
          $user_id  = $_SESSION['Admin_Session'];

          $admin_confirm  = Admin_confirm($order_id,$user_id,$feedback);

      }

      ?>
  

   <?php 
      if(isset($_POST['reject'])){
        //$feedback   =  $_POST['feedback'];
       $order_id = $_GET['order_id'];
          $user_id  = $_SESSION['Admin_Session'];

          $admin_reject  = Admin_reject($order_id,$user_id,$feedback);

      }

      ?>

                     
<!-- --------------------- -->


            </div>

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
         <?php 
           }else{
            
        header('Location:logout.php'); 
         
      }
     
     
     ?>
        <br>
     <?php   include("include/footer.php");   ?>
    
     
   
