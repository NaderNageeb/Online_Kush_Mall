

<?php  

if (isset($_SESSION['user_Session'])) {
	$user_id =$_SESSION['user_Session'];
    $conn = mysqli_connect("localhost", "root", "", "shop");
    $sql = "SELECT COUNT(cart_id) As c from order_list where cart_user_id = $user_id and order_status=0";
    $query = mysqli_query($conn, $sql);
    $values = mysqli_fetch_assoc($query);
    $num_rows = $values['c'];
    echo $num_rows;
}
	?>
