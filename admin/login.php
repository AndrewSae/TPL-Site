<?php 

session_start();

$username = "admin";
$password = getenv('ADMIN_PASSWORD');

if ($_POST['user'] == $username && $_POST['password'] === $password){
    $_SESSION["loggedIn"] = true;
    header('Location: '.'adminDashboard.php');

} 
    else {
    $_SESSION["loggedIn"] = false;
    header('Location: '.'adminLogin.php');

}
?>
