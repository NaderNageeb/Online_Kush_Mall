<?php //  include("include/function.php");   ?>
<?php   include("include/header.php");   ?>
    <br>
    <br>
   <?php   
   
   if (isset($_GET['user_id'])) {
       $user_id = $_GET['user_id'];
    
       $edit_user = Edit_User($user_id); 
       ?>
        <!-- My Account Start -->
 <div class="my-account">
 <div class="container-fluid">
<?php  include('include/navbar.php');           ?>

 <div class="col-md-9">
   <div class="tab-content">
    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
        <h4>User Details</h4>
     <br>
     <form action="" method="POST">
       <div class="row">
   <!---------------------------  -->
   <div class="col-md-6">
    <input class="form-control" type="text" required="required" name="user_name" value="<?php  echo  $edit_user['user_name']; ?>" placeholder="First Name">
      </div>
      <div class="col-md-6">
       <input class="form-control" type="text"  required="required" name="full_name" value="<?php  echo  $edit_user['full_name']; ?>" placeholder="Last Name">
       </div>
    <div class="col-md-6">
   <input class="form-control" type="text"required="required"  name="phone" value="<?php  echo  $edit_user['phone']; ?>" placeholder="Mobile">

     <input type="hidden" name="user_id" value="<?php echo $edit_user['user_id'];?>">
    </div>
    <div class="col-md-6">
    <input class="form-control" name="email" required="required" value="<?php  echo  $edit_user['email']; ?>" type="text" placeholder="Email">
  </div>
    <div class="col-md-6">
       <input class="form-control" type="text" required="required" name="address" value="<?php  echo  $edit_user['address']; ?>" placeholder="Address">
    </div>
    <div class="col-md-6">
       <input class="form-control" type="password" required="required" name="new_pass" value="<?php  echo  $edit_user['password']; ?>" placeholder="Password">
    </div>
   <div class="col-md-12">
   <input type="submit" class="btn" name="Update_Account" value="Update">
      <br>
       <br>
</form>
      <?php
      if (isset($_POST['Update_Account'])) {
          $user_name   =  $_POST['user_name'];
           $full_name   =  $_POST['full_name'];
           $phone       =  $_POST['phone'];
           $user_id     =  $_GET['user_id'];
           $email       =  $_POST['email'];
           $address     =  $_POST['address'];
           $new_pass    =  $_POST['new_pass'];

         $update_user_account  = Update_user_account($user_name, $full_name, $phone, $user_id, $email, $address, $new_pass);
      } 
      ?>
  

                     
<!-- --------------------- -->


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
        <?php
   }elseif (!isset($_GET['user_id'])) {
        echo "<script>
				window.location = '/Kush_Online_Store/logout.php';
				</script>";
 }      ?>
    
        <br>
        <br>
        <br>
     <?php   include("include/footer.php");   ?>
