<?php
    require_once "classes/User.php";
    $user = new User("https://jsonplaceholder.typicode.com/users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie </title>
</head>
<body>
    <?php
        foreach($user->getDomains() as $domain)
        {
            echo $domain.'<br>';
        }
        $user->getPersonData();

        $dbName = "domains"; // you can put here your own database name
        $tableName = "Domeny"; // you can put here your own table name
        $user->createDatabase($dbName);
        $user->createTable($dbName ,$tableName);
        $user->insertDomainsToDb($dbName ,$tableName);
    ?>
</body>
</html>