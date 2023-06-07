<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>TPL</title>
  <link rel="icon" href="./images/logo.png">
</head>

<body>



<?php include "../../boilerplate/header.php"; ?>


<div class="pageTitle">Season 7 Round 2</div>
  
  <div class="matchesContainer">

  <?php 
    // import db connection function
    require "../../connectDB.php";
    // run the function
    $pdo = connectToDB();
    

      $query = "SELECT t1.name AS team1_name, t1.logo AS team1_logo, t2.name AS team2_name, t2.logo AS team2_logo, m.Team1score, m.Team2score
                FROM matches m
                JOIN teams t1 ON m.team1 = t1.id
                JOIN teams t2 ON m.team2 = t2.id
                WHERE m.season = 7 AND m.round = 2;";
    $statement = $pdo->query($query);

    if ($statement) {
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($data as $row) {

        $team1Logo = stream_get_contents($row['team1_logo']);
        $team1Logo = base64_decode($team1Logo);
        $team2Logo = stream_get_contents($row['team2_logo']);
        $team2Logo = base64_decode($team2Logo);


      echo '<div id="matchInfo">';
      echo '<div class="matchTeams">';
      echo '<div class="teamContainer">';
      echo '<img class="teamLogo" src="data:image/jpeg;base64,' . base64_encode($team1Logo) . '" alt="Image">';
      echo '<div class="teamName">'. $row['team1_name'] . '</div>';
      echo '</div>';
      echo '<div class="middleText">';
      echo '<div>VS</div>';
      if ($row['team1score'] > 0 && $row['team2score'] > 0) {
        echo '<div>' . $row['team1score'] . "-" . $row['team2score'] . "</div>";
      }
      echo '</div>';
      echo '<div class="teamContainer">';
      echo '<img class="teamLogo" src="data:image/jpeg;base64,' . base64_encode($team2Logo) . '" alt="Image">';
      echo '<div class="teamName">'. $row['team2_name'] . '</div>';
      echo '</div>';
      echo '</div>';
      echo '<div class="matchDate">12/12/12 9pm (EST)</div>';
      echo '<div class="line"></div>';
      echo '</div>';
        }
    } else {
        echo "Error executing the query: " . $conn->errorInfo()[2];
    }


?>

  </div>
  


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>