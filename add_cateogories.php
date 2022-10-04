
<?php   include("include/header.php");   ?>
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
                                <h4>Add Categories</h4>
                                <br>
<form action="add_cateogories.php" method="POST"  enctype="multipart/form-data">

                                <div class="row">
<!-- ------------------- -->
                                    <div class="col-md-6">
                                        <input class="form-control" name="cat_name" type="text" placeholder="Categori Name" required='required'>
                                        <input class="form-control"   name="cat_icon"  type="file" placeholder="Categori Photo" required='required' >
                                        <input class="form-control"   name="cat_disc"    type="text" placeholder="Categori Discription" required='required' >
                                    </div>
                         
                                    <div class="col-md-12">
                                        <input type="submit" name="add" value="Add Cateogory" class="btn">
                                        <br>
                                        <br>
                                    </div>
                                    
<!-- ------------------------------------------- -->

<?php    

if(isset($_POST['add'])){



$cat_name = $_POST['cat_name'];
move_uploaded_file($_FILES['cat_icon']['tmp_name'],"./images/".$_FILES['cat_icon']['name']);
$cat_disc = $_POST['cat_disc'];

	$query_check = "SELECT * FROM cateogories where `cateogory` = '$cat_name' and `cat_icon` = '{$_FILES['cat_icon']['name']}'";
	if($query_check = mysqli_query($conn,$query_check))
	If(mysqli_num_rows($query_check))
	{
	echo "<script>alert('This cateogory Exists');window.location = '/Kush_Online_Store/add_cateogories.php';</script>";
	}else{
$query = "insert into cateogories(`cateogory`,`cat_icon`,`cat_desc`) value ('$cat_name','{$_FILES['cat_icon']['name']}','$cat_disc')";
 if(mysqli_query($conn,$query)){
		 
		 echo "<script>alert('Added Successfully');window.location = '/Kush_Online_Store/add_cateogories.php';</script>";
	 }else{
		  echo "<script>alert('Added Faild');window.location = '/Kush_Online_Store/add_cateogories.php';</script>";
     }
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
        <br>
     


        
        
      
        
     <?php   include("include/footer.php");   ?>
