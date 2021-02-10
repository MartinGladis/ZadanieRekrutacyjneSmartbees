<?php
    include "classes/User.php";
    $user = new User("https://jsonplaceholder.typicode.com/users/1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zadanie </title>
</head>
<body>
    <?php $user->getPersonData() ?>
</body>
</html>