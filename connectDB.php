<?php 

function connectToDB() {
  $database_url = getenv('DATABASE_URL');
  $db = parse_url($database_url);
  
  $host = $db["host"];
  $port = $db["port"];
  $dbname = ltrim($db["path"], "/");
  $user = $db["user"];
  $pass = $db["pass"];
  
  try {
      $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$pass");
      return $pdo;
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
  }
}



// try {
// $query = "ALTER TABLE matches ADD COLUMN date VARCHAR;";
  

//     $pdo->exec($query);
//     echo "Table created successfully.";
// } catch (PDOException $e) {
//     die("Table creation failed: " . $e->getMessage());
// }
  
?> 
