<?php
if (empty(getenv("DATABASE_URL"))){
      $pdo = new PDO('postgres://tdylryslfgqiwa:07c735ad2a5754f13d2ef6a2c96900527a6693ac87d2d412ad436a43b44b0792@ec2-174-129-253-62.compute-1.amazonaws.com:5432/dclu7v4hmgtt67');
  } 
 else {
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));

  }
  

//this is used to execute all SQL queries
function queryMysql($query) {
    global $pdo;
    $result = $pdo->query($query);
    if (!$result) {
        die ($pdo->error);
    }
    return $result;
}


