<?php //  include("include/function.php");   ?>
<?php   include("include/header.php");   ?>
    <br>
    <br>
    <?php  
    
    if(isset($_SESSION['Admin_Session'])){
     $user_id = $_SESSION['Admin_Session'];
          
          ?> 
        



        <!-- My Account Start -->
 <div class="my-account">
 <div class="container-fluid">

<?php  include('include/navbar.php');           ?>

 <div class="col-md-9">
   <div class="tab-content">
    <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
        <h4>Add User</h4>
     <br>
     <form action="" method="POST">
       <div class="row">
   <!---------------------------  -->
   <div class="col-md-6">
    <input class="form-control" type="text" required="required" name="user_name" value="" placeholder="User Name">
      </div>

      <div class="col-md-6">
       <input class="form-control" type="text"  required="required" name="full_name" value="" placeholder="Full Name">
       </div>
        <div class="col-md-6">
                                    <label for="gender" ></label>
                                    <select id="gender" class="form-control" required="required" name="gender" >
                                    <option value="">Gender</option>
                                   <option value="male">Male</option>
                                   <option value="fmale">Fmale</option>
                                   
                                   </select>
                                   </div>

    <div class="col-md-6">
   <input class="form-control" type="text"required="required"  name="phone" value="" placeholder="Mobile">
    </div>
    <div class="col-md-6">
                                    <label for="user_type" ></label>
                                    <select id="gender" class="form-control" required="required" name="user_type" >
                                       <option value="">User Type</option>
                                   <option value="1">Admin</option>
                                   <option value="2">Manager</option>
                          
                                   
                                   </select>
                                   </div>
    <div class="col-md-6">
    <input class="form-control" name="email" required="required" value="" type="text" placeholder="Email">
  </div>
    <div class="col-md-6">
       <input class="form-control" type="text" required="required" name="address" value="" placeholder="Address">
    </div>
    <div class="col-md-6">
       <input class="form-control" type="password" required="required" name="new_pass" value="" placeholder="Password">
    </div>
   <div class="col-md-12">
   <input type="submit" class="btn" name="add_user" value="Add User">
      <br>
       <br>
</form>
      <?php 
      if(isset($_POST['add_user'])){
          $user_name   =  $_POST['user_name'];
          $full_name   =  $_POST['full_name'];
          $phone       =  $_POST['phone'];
          $gender  = $_POST['gender'];
          $user_type = $_POST['user_type'];
          $email       =  $_POST['email'];
          $address     =  $_POST['address'];
          $new_pass    =  $_POST['new_pass'];

          $add_user  = Add_user($user_name,$full_name,$phone,$gender,$user_type,$email,$address,$new_pass);

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
    
     
   
