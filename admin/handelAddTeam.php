  
<?php 
// import db connection function
require "../connectDB.php";
// run the function
$pdo = connectToDB();

// get the form data
$name = htmlspecialchars($_POST['team_name']);
$name = str_replace("'", "''", $name);

$season = $_POST['season'];


  if (isset($_FILES["team_logo"]) && $_FILES["team_logo"]["error"] === UPLOAD_ERR_OK) {
    
    $type=$_FILES[ 'team_logo' ][ 'type' ];     
    $extensions=array( 'image/jpeg', 'image/png');
    
    if( in_array( $type, $extensions )){

    // Read the uploaded file
    $tmpImage = $_FILES["team_logo"]["tmp_name"];
    
    // Convert the image to BYTEA format
    $imageData = file_get_contents($tmpImage);
    $imageData = base64_encode($imageData);

    try {
      $query = "INSERT INTO Teams (name, logo, season) VALUES ('$name', '$imageData', '$season')";

        $pdo->exec($query);
        echo "Team added.";
    } catch (PDOException $e) {
        die("Unabel to add team: " . $e->getMessage());
    }
        }   else {
          echo "Please only upload jpeg or png files";
      }
      } else {
        echo "error uploading file";
      }
?> 
