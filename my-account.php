
<?php   include("include/header.php");  

if(isset($_SESSION['user_Session'])){  
    $user_id =  $_SESSION['user_Session'];  
    
    $user_data = User_data($user_id);
    
    
    ?>

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
                            
                            
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                         <div class=" " id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <form action="" method="POST">
                                <div class="row">
                                
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="username" value="<?php echo $user_data['user_name'];?>" placeholder="<?php echo $user_data['user_name'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="fullname" value="<?php echo $user_data['full_name'];?>" placeholder="<?php echo $user_data['full_name'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="phone" value="<?php echo $user_data['phone'];?>" placeholder="<?php echo $user_data['phone'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="email" name="email" value="<?php echo $user_data['email'];?>" placeholder="<?php echo $user_data['email'];?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="add" value="<?php echo $user_data['address'];?>" placeholder=" <?php echo $user_data['address'];?>">
                                    </div>
                                     <div class="col-md-6">
                                        <input class="form-control" type="password" name="pass" value="<?php echo $user_data['password'];?>" placeholder=" <?php echo $user_data['address'];?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" name="Update" type="submit">Update Account</button>
                                        <br><br>
                                        
                                      </form>
                                    </div>
                                </div>
                                <?php if(isset($_POST['Update'])){
                                
                                $username    = $_POST['username'];
                                $fullname   = $_POST['fullname'];
                                $phone  = $_POST['phone'];
                                $email  = $_POST['email'];
                                $add  = $_POST['add'];
                                $pass  = $_POST['pass'];
                                $user_id ;

                                $upuser = Upuser($username,$fullname ,$phone,$email,$add, $pass,$user_id);
                                
                                }
                                
                                
                                
                                ?>









                               
                           
                                </div>
                            </div>
                                                       </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        <?php
        
         }else  {
        echo "<script>
				window.location = '/Kush_Online_Store/logout.php';
				</script>";
 }      ?>
        
        
        
        
        
        
        
      
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
  
     <?php   include("include/footer.php");   ?>
