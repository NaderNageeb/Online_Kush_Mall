<?php include("include/header.php");   ?>
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="include/img/new_logo.JPG" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
  
        
        <!-- Login Start -->
<center>
        <div class="login">
                    
            <div class="col-lg-4">    
                <div class="login-form">
                           

                       <br>
                       <br>
                        <!-- <span>Registration</span> -->
                       <form action ="Register.php" method="POST">

             <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="text" placeholder="user Name" name= "user_name" required="required" >
                                </div>
                                <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="text" placeholder="Full Name" name="full_name" required="required">
                                </div>
                                <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="email" name="email" required="required" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="number" required="required" name="phone" placeholder="Mobile No">
                                </div>
                                <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="text" name="address" required="required" placeholder="Address">
                                </div>
                                 <!-- <div class="col-md-6">
                                    <label alighn ="left">birth</label>
                           <input class="form-control" type="date" name="date_of_birth" required="required" placeholder="Birth Date">
                                </div> -->
                                  <div class="col-md-6">
                                    <label for="gender" ></label>
                                    <select id="gender" class="form-control" required="required" name="gender" >
                                         <option value="">Gender</option>
                                   <option value="male">Male</option>
                                   <option value="fmale">Fmale</option>
                                   
                                   </select>
                                   </div>

                               <!-- <div class="col-md-6">
                                    <label for="user_type" ></label>
                                    <select id="gender" class="form-control" required="required" name="user_type" >
                                       <option value="">User Type</option>
                                   <option value="1">admin</option>
                                   <option value="2">employe</option>
                                    <option value="3">Customer</option>
                                   
                                   </select>
                                   </div> -->


                                 <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="password" name="pass" required="required" placeholder="Password">
                                </div>
                                <!-- <div class="col-md-6">
                                    <label></label>
                                    <input class="form-control" type="text" placeholder="Retype password">
                                </div> -->
                                <div class="col-md-12">
                                    <input type = "submit" class="btn" name="register" value="Register">
                                </div>
          </form>
                            </div>
                    </div>
        </div>
     
   </center>

   <?php
   
   if(isset($_POST['register']))
   {
      $user_name = $_POST['user_name'];
      $email  = $_POST['email'];
      $phone = $_POST['phone'];
      $add = $_POST['address'];
      $gender = $_POST['gender'];
      $full_name  = $_POST['full_name'];
    //   $user_type = $_POST['user_type'];
      $pass =  $pass = $_POST['pass'];

      $Register = Register($user_name,$email,$phone,$add, $gender,$full_name,$pass);

   }

   
   
   
   
   
   
   
   ?>
                    
          

  
        
        <!-- Login End -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      
<?php   include("include/footer.php");          ?>