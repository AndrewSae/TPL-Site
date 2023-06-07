<?php
session_start();
if ( ! isset($_SESSION['loggedIn'])) {
  $_SESSION["loggedIn"] = false;
  header('Location: '.'/admin/adminLogin.php'); 
} elseif ($_SESSION['loggedIn'] == false) {
    header('Location: '.'/admin/adminLogin.php'); 
}
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
    <link rel="icon" href="../images/logo.png">
</head>

<body>
  
  <div class="dashboardTitle">Admin Dashboard</div>
  <div class="dashboardTitle">What would you like to do?</div>


  <div class="dashboardContainer">
  <div class="dashboardTitle">Teams</div>

  <a href="./addTeam.php"><button class="btn btn-success">Add Team</button></a>
  <a href="./removeTeam.php"><button class="btn btn-danger">Remove Team</button></a>
  <a href="./allTeams.php"><button class="btn btn-primary">View Teams</button></a>
</div>

<div class="dashboardContainer">
  <div class="dashboardTitle">Matches</div>
  <a href="./addMatch.php"><button class="btn btn-success">Add Match</button></a>
  <a href="./removeMatch.php"><button class="btn btn-danger">Remove Match</button></a>
    <a href="./allMatches.php"><button class="btn btn-primary">View Matches</button></a>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>