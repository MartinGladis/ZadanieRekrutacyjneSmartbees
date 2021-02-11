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
        $dbName = "domains";
        $tableName = "Domeny";
        $user->createDatabase($dbName);
        $user->createTable($dbName ,$tableName);
    ?>
</body>
</html>