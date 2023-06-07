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


<div class="pageTitle">Season 7 teams</div>
  
  <div class="teams">

  <?php 
    // import db connection function
    require "../../connectDB.php";
    // run the function
    $pdo = connectToDB();


    $query = "SELECT * FROM Teams WHERE Season = 7";
    $statement = $pdo->query($query);

    if ($statement) {
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        // Process the data or access specific fields
        foreach ($data as $row) {
        $imageData = stream_get_contents($row['logo']);
        
        // Convert the image data to base64-encoded string
        $imageData = base64_decode($imageData);
          
          // Convert the image data to base64-encoded string

          echo '<div class="teamContainer">';
          echo '<img class="teamLogoTeam" src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="Image">';
          echo '<div class="teamName">'. $row["name"] . '</div>';
          echo '</div>';
        }
    } else {
        // Query execution failed
        echo "Error executing the query: " . $conn->errorInfo()[2];
    }
?>
    </div>

  

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>