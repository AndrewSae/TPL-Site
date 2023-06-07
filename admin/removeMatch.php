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

<?php 
  // add the data added to from to the teams tabel in the database
  ?>


<div class="formContainer"> 
<form action="handelRemoveMatch.php" method="POST">
  <div class="formTitle">Remove Match</div>

  
  <div class="form-floating mb-3">
    <input type="number" class="form-control" id="floatingInput" name="match_id" min="1" required>
    <label for="floatingInput">Match ID</label>
  </div>
  <button type="submit" class="btn btn-danger">Remove</button>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>