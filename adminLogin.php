<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>TPL</title>
    <link rel="icon" href="./images/logo.png">
</head>

<body>
    
<?php 
$username = "admin";
$password = "123";

if ($_POST['user'] == $username && $_POST['password'] === $password){
    echo "loged in";
    $_SESSION["loggedIn"] = true;
    header('Location: '.'adminDashboard.php');
} 
    else {
    echo "bad login";
    $_SESSION["loggedIn"] = false;

}
?>

<div>admin login</div>
<form action="adminLogin.php" method="POST">
    <label for="user">Enter User</label>
    <input type="text" name="user" id="user" require>
    <br>
    <label for="password">Enter Password</label>
    <input type="password" name="password" id="password" require>
    <br>
    <input type="submit" value="Login">
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>