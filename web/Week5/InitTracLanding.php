<?php

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Team Activity</title>
</head>
<body>
    <h1>Initiative Tracker</h1>
    <h3>All player characters</h3>
    <?php
    foreach ($db->query('SELECT * FROM player_characters', PDO::FETCH_ASSOC) as $row)
    {
        echo '<p><b>' . $row['player_fname'] . ' ' . $row['player_lname'] . 
        'AC:' . $row['player_ac'] . '</b> -- ' . $row['player_race'] . ', ' . $row['player_class'] . '</p>';
    }
    ?>

</body>
</html>