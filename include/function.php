<?php
session_start();
///LocalConnectionz//////
$conn = mysqli_connect("localhost","root","","shop");
//$conn = mysqli_connect("localhost","rushaid","e&pp54T8","fu_odms");
mysqli_set_charset($conn,'UTF8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');
if($conn){
    "connection done";
}
else
{
	echo "Error,".mysqli_connect_error($conn);
	die;
}


function alerts($type,$message)
{
	switch($type)
	{
		case 1: {$res = '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Green
		case 2: {$res = '<div class="alert alert-info alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Blue
		case 3: {$res = '<div class="alert alert-warning alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Yellow
		case 4: {$res = '<div class="alert alert-danger alert-dismissible fade in" role="alert" style="text-align:center">'.$message.'</div>';break;}//Red	
	}
	return $res;
}


function Login($username, $pass)
{
    global $conn;

     $sql = "SELECT * FROM `users` where `user_name` = '$username' and `password` = '$pass'";
    if ($query = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($query)) {
            $row = mysqli_fetch_array($query);
            $user_type = $row['user_type'];

            if ($user_type == 1) {
                 $_SESSION['Admin_Session'] = $row['user_id'];
                 $_SESSION['Admin_name'] = $row['user_name'];
				
            //    header("location:./admin_page.php");
               echo "<script>
				window.location = '/Kush_Online_Store/account_details.php';
				</script>";
            }

            if ($user_type == 2) {
                 $_SESSION['manager_Session'] = $row['user_id'];
                 $_SESSION['manager_name'] = $row['user_name'];
				
            //    header("location:./admin_page.php");
               echo "<script>
				window.location = '/Kush_Online_Store/manager_account.php';
				</script>";
            }

            if ($user_type == 3) {
                 $_SESSION['user_Session'] = $row['user_id'];
                 $_SESSION['customer_name'] = $row['user_name'];

                // header("location:./index.php");
				   echo "<script>
				window.location = '/Kush_Online_Store/index.php';
				</script>";
            }
        } else {
        echo "<script>alert('Wrong User Name Or Password');window.location = '/Kush_Online_Store/login.php';</script>";
        }
    }
	
}

function Add_user($user_name,$full_name,$phone,$gender,$user_type,$email,$address,$new_pass){
global $conn ;

$query_check = "SELECT * FROM users where user_name = '$user_name' and user_type = '$user_type'";
	if($query_check = mysqli_query($conn,$query_check))
	If(mysqli_num_rows($query_check))
	{
	echo "<script>alert('This User Exists');window.location = '/Kush_Online_Store/add_user.php';</script>";
	}
	else{
 $query = "insert into users(user_name,email,phone,address,gender,full_name,password,user_type)
	 values ('$user_name','$email','$phone','$address','$gender','$full_name','$new_pass','$user_type')";
	 if(mysqli_query($conn,$query)){
		 
 echo "<script>alert('User Added Successfully');window.location = '/Kush_Online_Store/manage_users.php';</script>";
	 }else{
echo "<script>alert('User Added Faild');window.location = '/Kush_Online_Store/add_user.php';</script>";
	 }
	}
	 
}
 

function Register($user_name,$email,$phone,$add, $gender,$full_name,$pass){

	global $conn;

	$query_check = "SELECT * FROM users where user_name = '$user_name' ";
	if($query_check = mysqli_query($conn,$query_check))
	If(mysqli_num_rows($query_check))
	{
	echo "<script>alert('This User Exists');window.location = '/Kush_Online_Store/Register.php';</script>";
	}else{
	$query = "insert into users(user_name,email,phone,address,gender,full_name,password)
	 values ('$user_name','$email','$phone','$add','$gender','$full_name','$pass')";
	 if(mysqli_query($conn,$query)){
		 
		 echo "<script>alert('Registration Successfully');window.location = '/Kush_Online_Store/login.php';</script>";
	 }else{
		  echo "<script>alert('Registration Faild');window.location = '/Kush_Online_Store/Register.php';</script>";
	 }
	}
	 

}


function G_sh($order_number,$status,$date){
	global $conn;
	if($order_number !=""){
	 $sql = "SELECT * FROM cart c , orders o , products p where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and o.order_id = $order_number and o.user_id = {$_SESSION['user_Session']} and p.product_id = c.cart_product_id ORDER BY o.order_id ";
	
	}
	if($status !=""){
	 $sql = "SELECT * FROM cart c , orders o , products p  where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and o.order_status = $status and o.user_id = {$_SESSION['user_Session']} and p.product_id = c.cart_product_id ORDER BY o.order_id";
	
	}
	if($date !=""){
	 $sql = "SELECT * FROM cart c , orders o  , products p where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and o.order_date = '{$date}' and o.user_id = {$_SESSION['user_Session']} and p.product_id = c.cart_product_id ORDER BY o.order_id ";
	
		}
	
	if($query = mysqli_query($conn,$sql))
	{
		return $query;	
		}
		
	else
		{
		echo $sql;die;
		}

}




















function Get_details($user_id){

	global $conn;

	$sql = "SELECT * FROM `users` where `user_id` = '$user_id'";
	if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}
	

}

function get_my_orders($user_id){
	
		global $conn;
		
	 	$sql = "SELECT * FROM order_list  where `user_id` = $user_id  ";
		if($query = mysqli_query($conn,$sql))
		{
			
			return $query;	
			}
		else
			{
			echo $sql;die;
			}
		}

		
		function Get_my_orders_search($user_id,$order_id,$status,$date){
			
				global $conn;
				
				if($order_id !=""){
				// $sql = "SELECT * FROM cart c , orders o , products p where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and o.order_id = $order_id and o.user_id = $user_id and p.product_id = c.cart_product_id ORDER BY o.order_id ";
				 
				 $sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and u.user_id = $user_id and o.order_id = $order_id ";
				}
				if($status !=""){
//				 $sql = "SELECT * FROM cart c , orders o , products p  where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and o.order_status = $status and o.user_id = $user_id and p.product_id = c.cart_product_id ORDER BY o.order_id";
				 $sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and u.user_id = $user_id and o.order_status = $status ";
				
				}
				if($date !=""){
				// $sql = "SELECT * FROM cart c , orders o  , products p where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and o.order_date = '{$date}' and o.user_id = $user_id and p.product_id = c.cart_product_id ORDER BY o.order_id ";
				 $sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and u.user_id = $user_id and o.order_date = '{$date}' ";
				
					}
				

				if($query = mysqli_query($conn,$sql))
				{
					return $query;	
					}
					
				else
					{
					echo $sql;die;
					}
				}
				
			
	function Get_admin_orders_search($user_name,$status,$date){
		global $conn;
		if($user_name !=""){
			// $sql = "SELECT * FROM cart c , orders o , products p , users u where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and u.user_id = o.user_id and u.user_name = '$user_name'  and  p.product_id = c.cart_product_id ORDER BY o.order_id ";
			$sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and u.user_name = '$user_name' ORDER BY o.order_id ";
		   }
		   if($status !=""){
			//$sql = "SELECT * FROM cart c , orders o , products p , users u  where o.order_id = c.cart_order_id  and c.cart_user_id = o.user_id and   u.user_id = o.user_id  and o.order_status = $status and  p.product_id = c.cart_product_id ORDER BY o.order_id";
			$sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and o.order_status = $status ORDER BY o.order_id ";
		   
		   }
		   if($date !=""){
			//$sql = "SELECT * FROM cart c , orders o  , products p , users u where o.order_id = c.cart_order_id  and u.user_id = o.user_id  and  c.cart_user_id = o.user_id and o.order_date = '{$date}' and  p.product_id = c.cart_product_id ORDER BY o.order_id ";
			$sql = "SELECT * FROM orders o , users u WHERE o.user_id = u.user_id and o.order_date = '{$date}' ORDER BY o.order_id ";
		   
			   }
			   // if($order_id ="" && $status ="" && $date =""){
			   
			   // }


		   if($query = mysqli_query($conn,$sql))
		   {
			   return $query;	
			   }
			   
		   else
			   {
			   echo $sql;die;
			   }
	}

function Update_account($user_name,$full_name,$phone,$user_id,$email,$address,$new_pass){
	global $conn;

 echo  $sql = " UPDATE users SET `user_name` = '$user_name',`Full_name`= '$full_name',`Phone` = '$phone',`address` = '$address',`email`= '$email',
	`password` = '$new_pass' where `user_id` = $user_id ";
	 if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Updating Successfully');window.location = '/Kush_Online_Store/account_details.php';</script>";
 
	 }else{
echo "<script>alert('Updating Faild');window.location = '/Kush_Online_Store/account_details.php';</script>";

	 echo $sql;
	echo "Error Updating : " . $conn->error;
	 }


}


function Update_manager_account($user_name,$full_name,$phone,$user_id,$email,$address,$new_pass){
	global $conn;

  $sql = " UPDATE users SET `user_name` = '$user_name',`Full_name`= '$full_name',`Phone` = '$phone',`address` = '$address',`email`= '$email',
	`password` = '$new_pass' where `user_id` = $user_id ";
	 if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Updating Successfully');window.location = '/Kush_Online_Store/manager_account.php';</script>";
 
	 }else{
echo "<script>alert('Updating Faild');window.location = '/Kush_Online_Store/manager_account.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
	 }


}




function Get_users()
{
	global $conn ;

$sql = "SELECT * FROM `users` WHERE `del`  = 0 ";
if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
	echo $sql;die;
	}
}

function Del_user($del_user){
	global $conn;

	 $sql = "UPDATE users set `del` = 1 where `user_id` = '$del_user'";
if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Deleted Successfully');window.location = '/Kush_Online_Store/manage_users.php';</script>";
 
	 }else{
echo "<script>alert('Deleted Faild');window.location = '/Kush_Online_Store/manage_users.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
	 }


}


function Edit_User($user_id){
	global $conn;
	$sql = "SELECT * FROM `users` where `user_id` = '$user_id'";
	if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}
	
	
}



function Update_user_account($user_name,$full_name,$phone,$user_id,$email,$address,$new_pass){
	global $conn;

   $sql = " UPDATE users SET `user_name` = '$user_name',`Full_name`= '$full_name',`Phone` = '$phone',`address` = '$address',`email`= '$email',
	`password` = '$new_pass' where `user_id` = $user_id ";
	 if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Updating Successfully');window.location = '/Kush_Online_Store/manage_users.php';</script>";
 
	 }else{
echo "<script>alert('Updating Faild');window.location = '/Kush_Online_Store/manage_users.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
	 }


}


function Get_cateogory(){
	global $conn;

$sql = "SELECT * FROM `cateogories` WHERE `del`  = 0 ";
if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
	echo $sql;die;
	}
}

function Get_products(){
	global $conn;
$sql = "SELECT * FROM products p , cateogories c WHERE p.cat_id = c.cat_id  and p.del  = 0 ";
if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
	echo $sql;die;
	}


}



function Del_product($del_product){
	global $conn;

	 $sql = "UPDATE products set `del` = 1 where `product_id` = '$del_product'";
if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Deleted Successfully');window.location = '/Kush_Online_Store/manage_product.php';</script>";
 
	 }else{
echo "<script>alert('Deleted Faild');window.location = '/Kush_Online_Store/manage_product.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
	 }


}



function Get_product($product_id){

global $conn;


$sql = "SELECT * FROM products p , cateogories c WHERE p.product_id = $product_id and c.cat_id = p.cat_id and p.del = 0";
	if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}
	
	
}


function Get_cat($cat_id){

global $conn;

$sql = "SELECT * FROM `cateogories`  WHERE `cat_id` = '$cat_id' ";
	if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}


}

function Del_cat($del_cat){
	global $conn;

	 $sql = "UPDATE cateogories set `del` = 1 where `cat_id` = '$del_cat'";
if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Deleted Successfully');window.location = '/Kush_Online_Store/manage_cat.php';</script>";
 
	 }else{
echo "<script>alert('Deleted Faild');window.location = '/Kush_Online_Store/manage_cat.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
	 }

}



function Cat_detils($cat_id){
	global $conn;

$sql = "SELECT * FROM products p , cateogories c WHERE c.cat_id = $cat_id and c.cat_id = p.cat_id and p.del = 0";
	if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
	echo $sql;die;
	}


}
	
	
function Product_detils($product_id){
global $conn;

 $sql = "SELECT * FROM products p , cateogories c WHERE p.product_id = $product_id and c.cat_id = p.cat_id and p.del = 0";
if($query = mysqli_query($conn,$sql))
	{   
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}



}


function Add_to_cart($qty,$order_id,$price_total,$size,$color,$user_id,$product_id){

	global $conn;
		 $sql_select = "SELECT * FROM products where `product_id` = $product_id";
             if ($query = mysqli_query($conn, $sql_select)) {
                 $row  = mysqli_fetch_array($query);
              	   $new_qty = $row['p_quantity'] - $qty ;
                   if($new_qty>=0){
                $sql_update = "UPDATE products set `p_quantity` = $new_qty where `product_id` = $product_id";
              if ($query = mysqli_query($conn, $sql_update)) {
				 $query=mysqli_query($conn,"select * from order_list where cart_product_id=$product_id and cart_user_id={$_SESSION['user_Session']}");
				  $num=mysqli_num_rows($query);
                  if ($num>0) {
                      $show=mysqli_fetch_array($query);
					  $new_quantity = $show['c_quantity'] + $qty;
					  $sql="update cart set c_quantity=$new_quantity where cart_id={$show['cart_id']} ";
					  $query=mysqli_query($conn,$sql);
                  }else{
				   $aql_insert = "insert into cart(cart_product_id,cart_user_id,c_color,c_size,c_quantity,c_price,cart_order_id) value ('$product_id','$user_id','$color','$size','$qty',$price_total,$order_id)";
                     if (mysqli_query($conn, $aql_insert)) {
                    echo "<script>alert('Added Successfully');window.location = '/Kush_Online_Store/cart.php';</script>";
                     } else {                 
                        echo "<script>alert('Added Faild');window.location = '/Kush_Online_Store/product-detail.php?product_id=$product_id';</script>";
                     }
                  }
				  }
			    }  if($new_qty<0){ ?>
				 	<script>alert(" The quantity That You have Ordered is not Available Now ")</script>
					<?php 
				 }
             }


}


function Get_cart($user_id){
global $conn ;

  $sql = "SELECT * FROM order_list  WHERE cart_user_id = $user_id and order_status=0 order by order_id DESC";
	if($query = mysqli_query($conn,$sql))
	{
	return $query;	
	}
else
	{
	echo $sql;die;
	}


}



function User_data($user_id){
	global $conn;

$sql = "SELECT * FROM users where user_id = $user_id  and del = 0";
	if($query = mysqli_query($conn,$sql))
	{
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}



}


function Upuser($username,$fullname ,$phone,$email,$add, $pass,$user_id){
	global $conn;


 $sql = " UPDATE users SET `user_name` = '$username',`Full_name`= '$fullname',`Phone` = '$phone',`address` = '$add',`email`= '$email',
	`password` = '$pass' where `user_id` = $user_id ";
	 if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Updating Successfully');window.location = '/Kush_Online_Store/my-account.php';</script>";
 
	 }else{
echo "<script>alert('Updating Faild');window.location = '/Kush_Online_Store/my-account.php';</script>";

		
	 }


}


function Del_cart($del_cart){

	global $conn;
	 $sql = "UPDATE cart set `cart_del` = 1 where `cart_id` = '$del_cart'";
if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Deleted Successfully');window.location = '/Kush_Online_Store/index.php';</script>";
 
	 }else{
echo "<script>alert('Deleted Faild');window.location = '/Kush_Online_Store/index.php.php';</script>";

		//  echo $sql;
		// echo "Error Updating : " . $conn->error;
	 }


}



function Checkout($Total_pill,$Receive_type, $user_id,$order_id){
	global $conn;
	echo $sql = "UPDATE orders set `order_status` = 1  , `total_price`= $Total_pill , `recieve_type` = $Receive_type where `user_id` = $user_id and `order_id`='$order_id' ";
if($query = mysqli_query($conn,$sql)){
	//echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
echo "<script>alert('Order submitted successfully');window.location = '/Kush_Online_Store/index.php';</script>";
 
	 }else{
echo "<script>alert(' Cart submitted Faild');window.location = '/Kush_Online_Store/index.php';</script>";

	
	 }


}



function get_admin_orders(){
	
		global $conn;
		
   $sql = "SELECT * FROM order_list o , users u where u.user_id = o.user_id ";
		if($query = mysqli_query($conn,$sql))
		{
			
			return $query;	
			}
		else
			{
			echo $sql;die;
			}
		}


 function get_admin_orders_By($order_id){
	global $conn;
		
   $sql = "SELECT * FROM order_list o , users u where u.user_id = o.user_id and o.order_id = $order_id  ";
		if($query = mysqli_query($conn,$sql))
		{
			
			return $query;	
			}
		else
			{
			echo $sql;die;
			}



}








// function Get_admin_orders_search($order_id){

// 	global $conn;
				
// 	 $sql = "SELECT * FROM order_list o , users u  where order_id = $order_id and o.user_id = u.user_id ";
// 	if($query = mysqli_query($conn,$sql))
// 	{
					
// 		return $query;	
// 		}
// 	else
// 		{
// 		echo $sql;die;
// 		}
// 	}
				



function Get_order_details($order_id){

	global $conn;
	
$sql = "SELECT * FROM order_list where order_id = $order_id";
	if($query = mysqli_query($conn,$sql))
	{
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}

}


function  Admin_confirm($order_id,$user_id){
	global $conn;

	echo $sql = "UPDATE orders set `order_status` = 2 where `order_id` = $order_id ";
if ($query = mysqli_query($conn, $sql)) {
  echo $sql_2 = "UPDATE cart set `admin_id` = $user_id where `cart_order_id` = $order_id ";
    if ($query = mysqli_query($conn, $sql_2)) {
 // echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
        echo "<script>alert('Order Confirmed');window.location = '/Kush_Online_Store/orders.php';</script>";
    } else {
        echo "<script>alert('Order Faild');window.location = '/Kush_Online_Store/orders.php';</script>";
    }
}

}




function  Admin_reject($order_id,$user_id){
	global $conn;

	echo $sql = "UPDATE orders set `order_status` = 3 where `order_id` = $order_id ";
if ($query = mysqli_query($conn, $sql)) {
  echo $sql_2 = "UPDATE cart set `admin_id` = $user_id where `cart_order_id` = $order_id ";
    if ($query = mysqli_query($conn, $sql_2)) {
 // echo '<div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align:center"> Updating Successfully </div>';
        echo "<script>alert('Order Rejected');window.location = '/Kush_Online_Store/orders.php';</script>";
    } else {
        echo "<script>alert('Order Rejected Faild');window.location = '/Kush_Online_Store/orders.php';</script>";
    }
}

}

function Get_user_order_details($order_id,$user_id){

	global $conn;
	
  $sql = "SELECT * FROM order_list where order_id = $order_id and user_id = $user_id";
	if($query = mysqli_query($conn,$sql))
	{
	$res  = mysqli_fetch_array($query);
	return $res;	
	}
else
	{
	echo $sql;die;
	}

}



function Get_admin_name($admin_id){
	global $conn;


  $sql = "SELECT * FROM users where user_id = $admin_id";
	if($query = mysqli_query($conn,$sql))
	{
	$res  = mysqli_fetch_array($query);
	echo $res['user_name']; 	
	}
else
	{
	echo $sql;die;
	}




}
































































































































































?>