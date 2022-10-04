<?php 
session_start();
if(isset($_SESSION["Admin_session"]))
{
    unset($_SESSION["Admin_session"]);
    session_destroy();
      echo "<script>
				window.location = '/Nader_online_shoping/login.php';
				</script>";

}

if(isset($_SESSION["user_Session"]))
{
    unset($_SESSION["user_Session"]);
    session_destroy();
     echo "<script>
				window.location = '/Nader_online_shoping/index.php';
				</script>";
}

if(isset($_SESSION["manager_Session"]))
{
    unset($_SESSION["manager_Session"]);
    session_destroy();
     echo "<script>
				window.location = '/Nader_online_shoping/index.php';
				</script>";
}


?>