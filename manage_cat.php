
<?php   include("include/header.php");  

$get_cat = Get_cateogory();
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
                                <h4>Manage Product</h4>
                                <br>
                                <div class="row">
<!-- ------------------- -->


                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>NO</th>
                                            <th>Cateogory</th>
                                            <th>cat_icon</th>
                                            <th>cat_desc</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php while($row = mysqli_fetch_array($get_cat)) {       ?>
                                    <tbody class="align-middle">
                                        <tr>
                                         <td> <?php       echo $row['cat_id'];        ?></td>
                                         <td><p><?php  echo $row['cateogory'];   ?></p></td>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="images/<?php  echo $row['cat_icon']; ?>" alt="Image" width="250" height=""></a>   
                                            </td>
                                            <td>  <?php       echo $row['cat_desc'];        ?>             </td>
                                           
                                            
                                            <td>
                                             <form action="" method="GET">
                                             <a href="update_cat.php?cat_id=<?php echo $row["cat_id"];?>"class="btn btn-success" target="_blank">Edit</a></div>
                                             <a href="manage_cat.php?del_cat=<?php echo $row["cat_id"];?>"class="btn btn-secondary" onclick="alert('You Want Delete This cateogory?')" >Delete</div></a>
                                               </form>      </td>
                                          
                                            
                                        </tr>
                                      
                                    </tbody>
                                <?php  } ?>
                                </table>
                                
                            </div>
                        </div>

<?php  

if(isset($_GET["del_cat"])){
$del_cat = $_GET['del_cat'];

Del_cat($del_cat);

}
?>
























<!-- ------------------------------------------- -->

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
