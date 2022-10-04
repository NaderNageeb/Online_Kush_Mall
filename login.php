<?php
 
               

include("include/header.php");  

?>

<br>
<br>

        <br>
        <br>
        <br>

       
<center>
        <div class="login">
                        
            <div class="col-lg-6 ">    
                <div class="login-form" >
                            
                       <br>
        <br>
                       

            <div class="col-md-10">
            <form action="" method="POST">
                 <!-- <label>User Name</label> -->
                 <input class="form-control" type="text" name="username" required = "required" placeholder="User Name">
             </div>
             <!-- <div class="col-md-10">

                                    <select id="gender" class="form-control" required="required" name="user_type" >
                                         <option value="">--Select User Type--</option>
                                   <option value="3">Customer</option>
                                   <option value="1">Admin</option>
                                   <option value="2">Manager</option>
                                   </select>
             </div> -->
             <br>
             <div class="col-md-10">
                <!-- <label>Password</label> -->
                <input class="form-control" type="password" name="pass" required = "required" placeholder="Password">
                </div>
                               
             <div class="col-md-12">
             
                  <input type="submit" name="login" class="btn"  value ="login">
                  <br>
                  <br>
                   <p>If YOU DONT HAVE ACCOUNT !! <a href="register.php">Go To Regstration</a> </p>
                  
             </div>
             </center>
            
                            </div>
                    </div>
        </div>
     </form>

                    <?php
                    if(isset($_POST['login'])){

                     $username = $_POST['username'];
                       $pass = $_POST['pass'];
                       // $user_type = $_POST['user_type'];

                        Login($username , $pass);
                    }
                    
        
                    ?>
          

  
        
        <!-- Login End -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
           <br>
        <br>   <br>
        <br>   <br>
        <br>
      
<?php   include("include/footer.php");          ?>