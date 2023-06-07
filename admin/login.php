<?php 

session_start();

$username = "admin";
$password = "_2_1_3@AdMIN";

if ($_POST['user'] == $username && $_POST['password'] === $password){
    $_SESSION["loggedIn"] = true;
    header('Location: '.'adminDashboard.php');

} 
    else {
    $_SESSION["loggedIn"] = false;
    header('Location: '.'adminLogin.php');

}
?>