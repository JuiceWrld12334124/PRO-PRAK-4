<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isset($_GET['post'])) {
    redirect('../../profile.php');
}
$removeVotes = $pdo->prepare('DELETE FROM postVotes WHERE postID=:id');
$removeVotes->bindParam(':id', $_GET['post']);
$removeVotes->execute();


$removePost = $pdo->prepare('DELETE FROM posts WHERE postID =:id');
$removePost->bindParam(':id', $_GET['post']);
if (!$removePost->execute()) {
    echo "Something went wrong<br><a href='../../profile.php'>Go back</a>";
}

redirect('../../profile.php');
