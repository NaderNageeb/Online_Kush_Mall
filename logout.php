<?php 
// session_start();
// if(isset($_SESSION["Admin_session"]))
// {
//     unset($_SESSION["Admin_session"]);
//     session_destroy();
//    header("location:login.php");

// };

// if(isset($_SESSION["user_Session"]))
// {
//     unset($_SESSION["user_Session"]);
//     session_destroy();
//    header("location:login.php");

// };



?>
<?php

if (!session_id())
	session_start(); 
	
$_SESSION['Admin_session'] = ''; 
$_SESSION['user_Session'] = '';
$_SESSION['customer_name'] = '';
$_SESSION['manager_session'] = '';

session_destroy(); 

header('Location:index.php'); 

?>





