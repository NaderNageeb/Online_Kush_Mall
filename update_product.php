
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
<?php

if (isset($_GET['product_id'])) {
   $product_id = $_GET['product_id'];
    $get_product = Get_product($product_id); ?>

        
        <!-- My Account Start -->
         <div class="my-account">

 <div class="container-fluid">
    
    <?php  include('include/navbar.php');           ?>

        
         <div class="col-md-9">
            
             <div class="tab-content">
                
                  <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                    
                      <h4>Update Product</h4>
                    
                      <br>
                    
                     <form action="" method="POST"  enctype="multipart/form-data">
                    
                      <div class="row">
<!-- ------------------- -->
    <div class="col-md-6">
        <input class="form-control" name="p_name" type="text" value="<?php echo $get_product['product_name']; ?>"  placeholder="Product Name">
        <input class="form-control"   name="p_quantity"  value="<?php echo $get_product['p_quantity']; ?>" type="number"  placeholder="Quantity">
        <select class="form-control"   name="p_size" >
        <option value="<?php echo $get_product['size']; ?>"><?php echo $get_product['size']; ?></option>
        <option value="small">Small</option>
        <option value="medium">Medium</option>
        <option value="Large">Large</option>
        </select>
        <input type="hidden" value="<?php echo $get_product['product_id']; ?>" name ="product_id">
        <input class="form-control" type="text"   name="p_price" value="<?php echo $get_product['price']; ?>"  placeholder="Price">

   <select id="color" class="form-control" name="Color">
     <option value="<?php echo $get_product['color']; ?>"><?php echo $get_product['color']; ?></option>
  <option value="white">White</option>
  <option value="black">Black</option>
     <option value="pink">Pink</option>
     <option value="blue">Blue</option>
     <option value="Green">Green</option>
     <option value="red">Red</option>
      </select>


      <select id="" class="form-control" name="Cat_id">
      <option value="<?php echo $get_product['cat_id']; ?>"><?php echo $get_product['cateogory']; ?></option>
     <?php  while ($row = mysqli_fetch_array($get_cat)) {     ?>
    <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cateogory'];    ?></option>
     <?php } ?>



     </select>
     <img src="images/<?php  echo $get_product['product_photo']; ?>" alt="Image" width="250" height="">
             <input class="form-control" type="file" name="p_photo"  placeholder="Product Photo">
           <input class="form-control" type="text" name="p_desc" value ="<?php  echo $get_product['discription']; ?>" placeholder="<?php  echo $row['discription']; ?>">         
    </div>
                         
                                
      <div class="col-md-12">
          <input type="submit" name="update_product" value="Update Product" class="btn">
         <br><br>
                                
    </div>
     </form>
<!-- ------------------------------------------- -->



<?php
if (isset($_POST['update_product'])) {

   move_uploaded_file($_FILES['p_photo']['tmp_name'], "./images/".$_FILES['p_photo']['name']);
    $p_name = $_POST['p_name'];
    $p_quantity = $_POST['p_quantity'];
    $p_size = $_POST['p_size'];
    $p_price = $_POST['p_price'];
    $color = $_POST['Color'];
   echo $cat_id = $_POST['Cat_id'];
    $p_desc = $_POST['p_desc'];
    $product_id = $_GET['product_id'];
    $p_photo  = $_FILES['p_photo']['name'];

    
    // `product_photo` = '{$_FILES['p_photo']['name']}'    
	 $sql = "UPDATE products set 
     `product_name` = '$p_name',
     `p_quantity` = '$p_quantity',
      `size`= '$p_size',
      `price` = '$p_price',
      `color` = '$color',
      `cat_id` = $cat_id,
      `discription` = '$p_desc',
     `product_photo` = '$p_photo'          
     where `product_id` = $product_id";
if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Updated Successfully');window.location = '/Kush_Online_Store/manage_product.php';</script>";
 
	 }else{
echo "<script>alert('Updated Faild');window.location = '/Kush_Online_Store/manage_product.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
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
        <?php
 }elseif (!isset($_GET['product_id'])) {
        echo "<script>
				window.location = '/Kush_Online_Store/logout.php';
				</script>";
 }      ?>

        <br>
     <?php   include("include/footer.php");   ?>
