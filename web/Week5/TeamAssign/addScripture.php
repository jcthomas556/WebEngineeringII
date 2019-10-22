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
    <title>Insert</title>
</head>
<body>
    <form>  
        <input type="text" name="book" id="book">
        <input type="text" name="chapter" id="chapter">
        <input type="text" name="verse" id="verse">
        <textarea name="content" id="content">  

        </textarea>
<?php
        foreach($db->query("Select name FROM topic") as $row){
            echo "<label> " . $row['name'] . " <input type='checkbox' name='topic[]' value='" . $row['name'] . "'> </label>"
        }

?>

        <input type="submit" value="submit">

    </form>
</body>
</html>