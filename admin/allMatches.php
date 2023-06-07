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



  <form class="queryForm" method='post' action='./allMatches.php'>
    <div class="form-floating mb-3">   
      <input type="number" class="form-control" id="floatingInput" name="season_number" min="1" required>
      <label for="floatingInput">Season #</label>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
  </form>

  
<table class="dataTable">
  <tr>
    <th>Match id</th>
    <th>Team 1 id</th>
    <th>Team 1 name</th>

    <th>Team 2 id</th>
    <th>Team 2 name</th>

    <th>Team 1 Score</th>
    <th>Team 2 Score</th>

    <th>Date</th>
    <th>Time</th>

    <th>Season</th>
    <th>Round</th>
  </tr>

<?php 
    // import db connection function
    require "../connectDB.php";
    // run the function
    $pdo = connectToDB();

    if(isset($_POST['season_number']) && !empty($_POST['season_number'])) {
        $seasonNumber = $_POST['season_number'];
        $query = "SELECT m.id AS match_id, t1.name AS team1_name, t1.id AS team1_id, t2.name AS team2_name, t2.id AS team2_id, m.Team1score AS team1_score, m.Team2score AS team2_score, m.time, m.date, m.season, m.round
                  FROM matches m
                  JOIN teams t1 ON m.team1 = t1.id
                  JOIN teams t2 ON m.team2 = t2.id
                  WHERE m.season = '$seasonNumber'
                  ORDER BY m.date, m.time;";
        } else {
        $query = "SELECT m.id AS match_id, t1.name AS team1_name, t1.id AS team1_id, t2.name AS team2_name, t2.id AS team2_id, m.Team1score AS team1_score, m.Team2score AS team2_score, m.time, m.date, m.season, m.round
                  FROM matches m
                  JOIN teams t1 ON m.team1 = t1.id
                  JOIN teams t2 ON m.team2 = t2.id;";
    }
    $statement = $pdo->query($query);

    if ($statement) {
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Process the data or access specific fields
        foreach ($data as $row) {
          echo '<tr>';
          echo '<td>' . $row["match_id"]. '</td>';
          echo '<td>' . $row["team1_id"]. '</td>';
          echo '<td>' . $row["team1_name"]. '</td>';
          echo '<td>' . $row["team2_id"]. '</td>';
          echo '<td>' . $row["team2_name"]. '</td>';
          echo '<td>' . $row["team1_score"]. '</td>';
          echo '<td>' . $row["team2_score"]. '</td>';
          echo '<td>' . $row["date"]. '</td>';
          echo '<td>' . $row["time"]. '</td>';
          echo '<td>' . $row["season"]. '</td>';
          echo '<td>' . $row["round"]. '</td>';
          echo '</tr>';
        
        }
    } else {
        // Query execution failed
        echo "Error executing the query: " . $conn->errorInfo()[2];
    }
?>

</table>

</html>