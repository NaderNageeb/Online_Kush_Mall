  <div class="row">
 <div class="col-md-3">
     <div class="nav flex-column nav-pills" aria-orientation="vertical">
     <?php if(isset($_SESSION['Admin_Session'])) {  ?>
    <a class="nav-link"   href="account_details.php"><i class="fa fa-user"></i>Account Details</a>
    <a class="nav-link"   href="add_user.php"><i class="fa fa-edit"></i>Add User</a>

      <a class="nav-link"  href="manage_users.php" ><i class="fa fa-users"></i>Manage Users</a>
     <a class="nav-link"   href="orders.php" ><i class="fa fa-shopping-bag"></i>Orders</a>
     <a class="nav-link"   href="manage_product.php" ><i class="fa fa-cog"></i>Manage Product</a> 
   <a  href="add_product.php" class="nav-link"   ><i class="fa fa-credit-card"></i>Add Product</a>
 <a class="nav-link"   href="add_cateogories.php" ><i class="fa fa-plus-circle"></i>Add cateogories</a>  <!-- <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a> -->
     <a class="nav-link"   href="manage_cat.php" ><i class="fa fa-cogs"></i>manage cateogories</a> 

            <!-- <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a> -->
    <a class="nav-link" href="admin_reports.php"><i class="fa fa-file"></i>Reports</a>
     <a class="nav-link" href="logout.php"><i class="fa fa-share"></i>Logout</a>
     <?php  }   ?>
<?php  if(isset($_SESSION['manager_Session'])) {  ?>
    <a class="nav-link"   href="manager_account.php"><i class="fa fa-user"></i>Account Details</a>
    <a class="nav-link" href="manager_orders_report.php"><i class="fa fa-file"></i>Orders Report</a>
     <a class="nav-link"   href="product_report.php" ><i class="fa fa-file"></i>Product Report</a> 
<?php } ?>

<?php  if(isset($_SESSION['user_Session'])) {  ?>
  
  <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
  <a class="nav-link" id="account-nav"  href="my-account.php" ><i class="fa fa-user"></i>Account Details</a>
 <a class="nav-link" id="orders-nav" href="my_orders.php" ><i class="fa fa-shopping-bag"></i>My Orders</a>
 <a class="nav-link" id="payment-nav" href="my_orders_report.php" ><i class="fa fa-credit-card"></i> Orders Reports </a>
                            
<?php } ?>




   </div>
 </div>