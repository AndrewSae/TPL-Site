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
    <link rel="icon" href="../../images/logo.png">
</head>
<body>



  <form class="queryForm" method='post' action='./allTeams.php'>
    <div class="form-floating mb-3">   
      <input type="number" class="form-control" id="floatingInput" name="season_number" min="1" required>
      <label for="floatingInput">Season #</label>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
  </form>

  
<table class="dataTable">
  <tr>
    <th>Team id</th>
    <th>Name</th>
    <th>Season</th>
  </tr>

<?php 
    // import db connection function
    require "../connectDB.php";
    // run the function
    $pdo = connectToDB();

    if(isset($_POST['season_number']) && !empty($_POST['season_number'])) {
        $seasonNumber = $_POST['season_number'];
        $query = "SELECT * FROM teams WHERE season = '$seasonNumber'";
    } else {
      $query = "SELECT * FROM teams";
    }

    $statement = $pdo->query($query);

    if ($statement) {
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Process the data or access specific fields
        foreach ($data as $row) {
          echo '<tr>';
          echo '<td>' . $row["id"]. '</td>';
          echo '<td>' . $row["name"]. '</td>';
          echo '<td>' . $row["season"]. '</td>';
          echo '</tr>';
        
        }
    } else {
        // Query execution failed
        echo "Error executing the query: " . $conn->errorInfo()[2];
    }
?>

</table>

</html>