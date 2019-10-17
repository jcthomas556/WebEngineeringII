<?php
​
try {
    $dbvars = parse_url(getenv('DATABASE_URL'));
​
    $dbHost = $dbvars['host'];
    $dbPort = $dbvars['port'];
    $dbUser = $dbvars['user'];
    $dbPass = $dbvars['pass'];
    $dbName = ltrim($dbvars['path'], '/');
​
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
​
} catch (PDOException $e) {
    echo 'ERROR: ' . $ex->getMessage();
    die();
}
​

function get_db() {
    $db = NULL;
    try
    {
      $dbUrl = getenv('DATABASE_URL');
      $dbOpts = parse_url($dbUrl);
​
      $dbHost = $dbOpts["host"];
      $dbPort = $dbOpts["port"];
      $dbUser = $dbOpts["user"];
      $dbPassword = $dbOpts["pass"];
      $dbName = ltrim($dbOpts["path"],'/');
​
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
​
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }
    return $db;
}

?>