<?php 

  // import db connection function
  require "../connectDB.php";
  // run the function
  $pdo = connectToDB();
  
  // get the form data
  $matchID = $_POST['match_id'];
  

  try {

    $query = "DELETE FROM matches WHERE id = $matchID;
    ";
    $pdo->exec($query);
    echo "Match remmoved.";
} catch (PDOException $e) {
    die("Unabel to remove match: " . $e->getMessage());
}
  
?> 


