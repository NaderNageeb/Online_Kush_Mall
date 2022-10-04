<?php  include("include/header.php");    
?>


<?php if(isset($_SESSION['user_Session'])){
$user_id = $_SESSION['user_Session'];
$get_cart = Get_cart($user_id);
$num=mysqli_num_rows($get_cart);
}

?>
        <!-- Bottom Bar End -->
        
        <!-- Breadcrumb Start -->
        <!-- <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div> -->
        <!-- Breadcrumb End -->
      
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                      <?php if($num>0){?>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th> Quantity</th>
                                            <th>Remove</th>
                                        </tr>
                                      <?php }else{?>  

                                    <center>  <tr><td> <div class="alert alert-warning"> Your Cart iS Empty  </div></td></tr></center>
                                      
                                      <?php } ?>
                                      
                                    </thead>
                                    <?php
                                $tot=0;
                                 $tot_p=0;
                                 $tot_q=0;
                                    
                                    
                                    
                                    while($row = mysqli_fetch_array($get_cart)){    
                                       $tot_p=($tot_p+$row['price']);
                                      $tot_q=($tot_q+$row['c_quantity']);
                                        $tot= ($tot+$row['price'] * $row['c_quantity']);
                                        
                                        ?>
                                   
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="images/<?php echo $row['product_photo'];    ?>" alt="Image"></a>
                                                    <p><?php echo $row['product_name'];    ?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $row['price'];    ?></td>
                                            <td>  <div class="qty">    
                                                    <input type="text"  value="<?php echo $row['c_quantity'];    ?>">
                                                </div> 
                                                 </td>
                                                <input type = "hidden" value="<?php echo $row['cart_order_id']; ?>">
                                                  <td> <a href="cart.php?del_cart=<?php echo $row['cart_id'];?>" onclick="return confirm('Remove From Cart ?!')" class="btn">Delete</a>          </td>
                                            <!-- <td><button ><i class="fa fa-trash"></i></button> </a></td> -->
                                        </tr>
                                      
                                    </tbody>
                                     <?php       $order_id = $row['cart_order_id'];           ?>
                                    <?php } 
                                   
                                    
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>


<?php  

if(isset($_GET["del_cart"])){
$del_cart = $_GET["del_cart"];

Del_cart($del_cart);

}
?>

                    <?php if($num>0){?>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="coupon">
                                       
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                            <form action="" method="POST">
                                            <h1>Cart Summary</h1>
                                            <p> <select id="mySelect" class="" onchange="myFunction()" name="Receive_type" required = required>
                                               <span><option value="">Select Recive Way</option></span>
                                            <span><option value="0">In The Shop</option></span>
                                            <option value="700">Delivary</option></p>
                                                </select>
                                                <br>
                                                <p id="demo"><span> </span> </p>
                                            <p>Total Price<span><?php echo $tot_p; ?> SDG</span> </p>
                                            <p>Total  Quantaty<span><?php echo $tot_q ; ?> Pieces</span></p>
                                            <h2>Grand Total<span id="msg"></span></h2>
                                            <input type="hidden" id="gtotal" value="<?php echo $tot ; ?>" >
                                        </div>
                                        <div class="cart-btn">
                                            <!-- <button>Update Cart</button> -->
                                            <button type="submit" onclick="return confirm('Confirm Order ? ')" name="checkout">Checkout</button>
                                        </div>
                                </form>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

<?php
if(isset($_POST['checkout'])){

$tot;
$Receive_type = $_POST['Receive_type'];

$Total_pill = $tot +  $Receive_type;

 echo $user_id;
 echo $order_id;

Checkout($Total_pill,$Receive_type, $user_id,$order_id);


}





?>

<script>
function myFunction() {
    var y,z,total,Msg;
 y = document.getElementById("mySelect").value;

 z=document.getElementById("gtotal").value;
 total=(parseInt(z)+parseInt(y));
 Msg=document.getElementById("msg").innerHTML = total + " " + "SDG ";
    
  var b = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "Delivery Charge: " + b  + " " +"SDG ";

  
}



</script>






<script>
//  var y,z,total;
//  y = document.getElementById("mySelect").value;
//  z=document.getElementById("gtotal").value;

//  total=(parseInt(z)+parseInt(y));

// function myFun() {

// //  Msg=document.getElementById("msg").innerHTML = total+ " SDG";
//  confirm("Your Total Bill is");


// }
</script> 
     



     
                </div>
            </div>
        </div>

        

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Cart End -->
     <?php    include("include/footer.php");         ?>