
<?php   include("include/header.php");   ?>
    <br>
    <br>

        <?php   if(isset($_SESSION['Admin_Session'])){

            echo $user_session = $_SESSION['Admin_Session'];
         }else{
             header('Location:logout.php');
         }
        
  ?>

<?php

if(isset($_GET['cat_id'])){
echo $cat_id = $_GET['cat_id'];

$get_cat = Get_cat($cat_id);



?>
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
               <?php  include('include/navbar.php');           ?>

                  <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Update Cateogory</h4>
                                <br>
<form action="" method="POST"  enctype="multipart/form-data">

                                <div class="row">
<!-- ------------------- -->
                                    <div class="col-md-6">
                                        <input class="form-control" name="cat_name" value="<?php  echo $get_cat['cateogory'];        ?>" type="text" placeholder="Categori Name" >
                                        <img src="images/<?php  echo $get_cat['cat_icon']; ?>" alt="Image" width="250" height="">
                                        <input class="form-control"   name="cat_icon"  type="file" >
                                        <input type="hidden" name = "cat_id" value = "<?php echo $get_cat['cat_id'];         ?>">
                                        <input class="form-control"   name="cat_disc"  value="<?php  echo $get_cat['cat_desc'];   ?>"  type="text" placeholder="Category Discription"  >
                                    </div>
                         
                                    <div class="col-md-12">
                                        <input type="submit" name="update_cat" value="Add Cateogory" class="btn">
                                        <br>
                                        <br>
                                    </div>
                                    
<!-- ------------------------------------------- -->

<?php    

if (isset($_POST['update_cat'])) {
    move_uploaded_file($_FILES['cat_icon']['tmp_name'], "./images/".$_FILES['cat_icon']['name']);

    $cat_name = $_POST['cat_name'];
     $cat_disc = $_POST['cat_disc'];
    $cat_id = $_GET['cat_id'] ;


  echo  $sql = "UPDATE `cateogories` set `cateogory` = '$cat_name', `cat_desc` = '$cat_disc' , `cat_icon` = '{$_FILES['cat_icon']['name']}' where `cat_id` = $cat_id";
    if ($query = mysqli_query($conn, $sql)) {
        //echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
  
        echo "<script>alert('Updated Successfully');window.location = '/Kush_Online_Store/manage_cat.php';</script>";
    } else {
       echo "<script>alert('Updated Faild');window.location = '/Kush_Online_Store/manage_cat.php';</script>";


        // echo "Error Updating : " . $conn->error;
    }
}


?>

            </div>
            
              </div>
              
                </div>
                  </form>
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


 }elseif (!isset($_GET['cat_id'])) {
        echo "<script>
				window.location = '/Kush_Online_Store/logout.php';
				</script>";
 }      ?>






?>

        <br>
     <?php   include("include/footer.php");   ?>
