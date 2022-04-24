<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


$removeUser = $pdo->prepare('DELETE FROM users WHERE nickname = :nickname');
$removeUser->bindParam(':nickname', $_GET['nickname']);

$removeUser->execute();

if ($removeUser->execute()) {

    redirect('../../admin.php');    
}

