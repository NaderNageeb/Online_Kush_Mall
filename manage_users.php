
<?php   include("include/header.php");  
$get_users =Get_users();
?>
    <br>
    <br>

        <?php   if(isset($_SESSION['Admin_Session'])){

         $user_session = $_SESSION['Admin_Session'];
         }else{
             header('Location:logout.php');
         }
        
  ?>
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <?php  include('include/navbar.php');           ?>

                  <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4> Manage Users</h4>
                                <br>
                                <div class="row">
<!-- ------------------- -->


                             <!-- <div class="tab-pane" id="users-tab" > -->
                                <div class="table-responsive">
                                    <table class="table table-bordered-15">
                                        <thead class="">
                                            <tr>
                                                <!-- <th>No</th> -->
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>User Type</th>
                                                <th>action</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php    while($row = mysqli_fetch_array($get_users))    {             ?>
                                        <tbody>
                                            <tr>
                                                <!-- <td><?php // echo $row['user_id'];           ?></td> -->
                                                <td><?php  echo $row['user_name'];           ?></td>
                                                <td><?php  echo $row['email'];           ?></td>
                                                <td><?php  echo $row['address'];           ?></td>
                                               <td><?php  echo $row['phone'];           ?></td>
                                               <td><?php  if($row['user_type'] == 1)echo 'Admin'; if($row['user_type'] == 3)echo 'Customer'; if($row['user_type'] == 2)echo 'Maneger';    ?></td>
                                               <td>  
                                               <form action="manage_users" method="GET">
                                             <a href="update_user.php?user_id=<?php echo $row["user_id"];?>"class="btn btn-success " target="_blank">Edit</a></div>
                                             <a href="manage_users.php?del_user=<?php echo $row["user_id"];?>"class="btn btn-secondary" onclick="alert('You Want Delete This User?')" >Delete</div></a>
                                               </form>
                                               
                                                 </td>
                                            </tr>
                                           
                                        </tbody>
                                         <?php } ?>
                                    </table>
                                </div>
                            </div>


<!-- ------------------------------------------- -->


<?php  

if(isset($_GET["del_user"])){
$del_user = $_GET["del_user"];

Del_user($del_user);

}
?>



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
        <br>
     <?php   include("include/footer.php");   ?>
