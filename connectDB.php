<?php 

function connectToDB() {
  $database_url = "postgres://pwocrfzipdlbhd:3780a32fb31ce327299db560676145b8aadfaa4da3181302a20f80f6b6aaf672@ec2-44-206-204-65.compute-1.amazonaws.com:5432/d6hoj1cihbehma";
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