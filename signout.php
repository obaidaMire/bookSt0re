<?php 
if(isset($_COOKIE['user'])) {
    setcookie('user',"ss",strtotime("-1 year"));
    header("location:index.php");
    exit();
}
?>