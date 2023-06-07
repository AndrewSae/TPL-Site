<?php 
  // import db connection function
  require "../connectDB.php";
  // run the function
  $pdo = connectToDB();
  
  // get the form data
  $teamID = $_POST['team_id'];

  try {
    $query = "DELETE FROM matches WHERE team1 = $teamID OR team2 = $teamID;
    DELETE FROM teams WHERE id = $teamID;
    ";
    $pdo->exec($query);
    echo "Team remmoved.";
} catch (PDOException $e) {
    die("Unabel to remove team: " . $e->getMessage());
}


  
?> 


