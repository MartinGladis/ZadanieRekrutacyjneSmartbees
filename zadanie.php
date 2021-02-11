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
        $user->getDomain();
        echo '<br>';
        $user->getPersonData();
    ?>
</body>
</html>