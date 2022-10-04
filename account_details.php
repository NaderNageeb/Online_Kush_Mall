<?php //  include("include/function.php");   ?>
<?php   include("include/header.php");   ?>
    <br>
    <br>
    <?php  
    
    if(isset($_SESSION['Admin_Session'])){
            $user_id = $_SESSION['Admin_Session'];
            $get_details = Get_details($user_id);
          ?> 
        



        <!-- My Account Start -->
 <div class="my-account">
 <div class="container-fluid">

<?php  include('include/navbar.php');           ?>

 <div class="col-md-9">
   <div class="tab-content">
    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
        <h4>Account Details</h4>
     <br>
     <form action="account_details.php" method="POST">
       <div class="row">
   <!------>
   <div class="col-md-6">
    <input class="form-control" type="text" required="required" name="user_name" value="<?php  echo  $get_details['user_name']; ?>" placeholder="First Name">
      </div>
      <div class="col-md-6">
       <input class="form-control" type="text"  required="required" name="full_name" value="<?php  echo  $get_details['full_name']; ?>" placeholder="Last Name">
       </div>
    <div class="col-md-6">
   <input class="form-control" type="text"required="required"  name="phone" value="<?php  echo  $get_details['phone']; ?>" placeholder="Mobile">

     <!-- <input type="te" name="user_id" value="<?php //echo $get_details['user_id'];   ?>"> -->
    </div>
    <div class="col-md-6">
    <input class="form-control" name="email" required="required" value="<?php  echo  $get_details['email']; ?>" type="text" placeholder="Email">
  </div>
    <div class="col-md-6">
       <input class="form-control" type="text" required="required" name="address" value="<?php  echo  $get_details['address']; ?>" placeholder="Address">
    </div>
    <div class="col-md-6">
       <input class="form-control" type="password" required="required" name="new_pass" value="<?php  echo  $get_details['password']; ?>" placeholder="Password">
    </div>
   <div class="col-md-12">
   <input type="submit" class="btn" name="Update_Account" value="Update Account">
      <br>
       <br>
</form>
      <?php 
      if(isset($_POST['Update_Account'])){
          $user_name   =  $_POST['user_name'];
          $full_name   =  $_POST['full_name'];
          $phone       =  $_POST['phone'];
          $user_id     =  $_SESSION['Admin_Session'];
          $email       =  $_POST['email'];
          $address     =  $_POST['address'];
          $new_pass    =  $_POST['new_pass'];

          $update_account  = Update_account($user_name,$full_name,$phone,$user_id,$email,$address,$new_pass);

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
            
        header('Location:login.php'); 
         
      }
     
     
     ?>
        <br>
     <?php   include("include/footer.php");   ?>
    
     
   
