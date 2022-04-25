<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$username = $_POST["id"];

$removeUser = $pdo->prepare('DELETE FROM users WHERE id = :id');
$removeUser->bindParam(':id', $username);
$removeUser->execute();



