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
    <link rel="icon" href="./images/logo.png">
</head>

<body>





<div class="formContainer"> 
<form action="handelAddTeam.php" method="POST" enctype="multipart/form-data">
  <div class="formTitle">Add Team</div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="team_name" required>
    <label for="floatingInput">Team Name</label>
  </div>
    <div class="form-floating mb-3">
    <input type="number" class="form-control" id="floatingInput" name="season" min="1" required>
    <label for="floatingInput">Season #</label>
  </div>
  <div class="form-floating mb-3">
    <input type="file" class="form-control" id="floatingInput team_logo" name="team_logo" required>
    <label for="floatingInput">Team Logo</label>
  </div>
  <button type="submit" name="submit" class="btn btn-success">Add</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>