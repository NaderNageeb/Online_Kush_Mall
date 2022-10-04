
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
                    
                      <h4>Add Product</h4>
                    
                      <br>
                    
                     <form action="add_product.php" method="POST"  enctype="multipart/form-data">
                    
                      <div class="row">
<!-- ------------------- -->
    <div class="col-md-6">
        <input class="form-control" name="p_name" type="text" required="required" placeholder="Product Name">
        <input class="form-control"   name="p_quantity"  type="number" required="required" placeholder="Quantity">
        <select class="form-control"   name="p_size" required="required">
        <option value="">Select Size</option>
        <option value="small">Small</option>
        <option value="medium">Medium</option>
        <option value="Large">Large</option>
        </select>
        <input class="form-control" type="text"   name="p_price"  required="required"  placeholder="Price">

   <select id="color" class="form-control" required="required" name="Color">
     <option value="">Select Color</option>
  <option value="white">White</option>
  <option value="black">Black</option>
     <option value="pink">Pink</option>
     <option value="blue">Blue</option>
     <option value="Green">Green</option>
     <option value="red">Red</option>
      </select>
                                   


      <select id="" class="form-control" required="required" name="Cat_id">
      <option value="">Select Cateogory </option>
     <?php  while($row = mysqli_fetch_array($get_cat))  {     ?>
    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cateogory'];    ?></option>
     <?php } ?>



     </select>



             <input class="form-control" type="file"  required="required" name="p_photo"  placeholder="Product Photo">
           <textarea class="form-control" type="text" name="p_desc" required="required" placeholder="Discription"></textarea>          
    </div>
                         
                                
      <div class="col-md-12">
          <input type="submit" name="add_product" value="Add Product" required="required" class="btn">
         <br><br>
                                
    </div>
     </form>
<!-- ------------------------------------------- -->



<?php
if (isset($_POST['add_product'])) {
    move_uploaded_file($_FILES['p_photo']['tmp_name'], "./images/".$_FILES['p_photo']['name']);
    $p_name = $_POST['p_name'];
   $p_quantity = $_POST['p_quantity'];
     $p_size = $_POST['p_size'];
      $p_price = $_POST['p_price'];
      $color = $_POST['Color'];
      $cat_id = $_POST['Cat_id'];
     $p_desc = $_POST['p_desc'];

    // echo 'Sql_chack Not Work';
    //$query_check = "SELECT * FROM products where `product_name` = '$p_name' and `cat_id`='$cat_id' and `color`='$color' and `price`='$p_price' and `product_photo` = {$_FILES['p_photo']['name']} and `p_quantity` = '$p_quantity' and `size`= '$p_size'";

  echo  $query_check = "SELECT * FROM products where `product_name` = '$p_name' and `cat_id`=$cat_id and `color`='$color' and `price`=$p_price and `product_photo` = '{$_FILES['p_photo']['name']}' and `size`='{$p_size}' ";
	if($query_check = mysqli_query($conn,$query_check))
	If(mysqli_num_rows($query_check))
	{
	echo "<script>alert('This Product Exists');window.location = '/Kush_Online_Store/add_product.php';</script>";
   }else{
  echo $query = "insert into products(`product_name`,`p_quantity`,`size`,`price`,`color`,`cat_id`,`discription`,`product_photo`) value ('$p_name','$p_quantity','$p_size','$p_price','$color','$cat_id','$p_desc','{$_FILES['p_photo']['name']}')";
   if(mysqli_query($conn,$query)){
		 
 		echo "<script>alert('Product Added Successfully');window.location = '/Kush_Online_Store/add_product.php';</script>";
      
  	 }else{
 		  echo "<script>alert('Product Added Faild');window.location = '/Kush_Online_Store/add_product.php';</script>";
      }
    }

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
