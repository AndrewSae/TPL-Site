<?php 

// import db connection function
require "../connectDB.php";
// run the function
$pdo = connectToDB();

// get the form data
$team1 = $_POST['team1_id'];
$team2 = $_POST['team2_id'];
$team1Score = $_POST['team1_score'];
$team2Score = $_POST['team2_score'];
$season = $_POST['season'];
$round = $_POST['round'];
$dateTime = $_POST['dateTime'];

$x = explode('T', $dateTime);

  try {

  $query = "INSERT INTO matches (team1, team2, team1Score, team2Score, season, round, date, time) 
            VALUES ('$team1', '$team2', '$team1Score', '$team2Score', '$season', '$round', '$x[0]', '$x[1]')";
  
    $pdo->exec($query);
    echo "match added.";
} catch (PDOException $e) {
    die("Unabel to add match: " . $e->getMessage());
}









  
?> 

