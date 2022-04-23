<?php
    declare(strict_types=1);
    require '../autoload.php';
    if (!isset($_POST)) {
        echo json_encode(['error'=>true]);
        die;
    }
    if (isset($_POST['getAll']) && $_POST['getAll']) {

        echo json_encode(SelectFromBD($pdo, 'SELECT  p.postID, p.picture_url, p.title, p.postText, p.postTime, p.updateTime, p.image_url, u.nickname AS author, u.id AS userID FROM posts AS p, users AS u WHERE p.authorID=u.id', [], true));
    } elseif (isset($_POST['getLatest']) && $_POST['getLatest']) {

        echo json_encode(SelectFromBD($pdo, 'SELECT p.postID, p.title, p.postText, p.postTime, p.updateTime, p.image_url, u.nickname AS author, u.id AS userID FROM posts AS p, users AS u WHERE p.authorID=u.id ORDER BY p.postID DESC LIMIT 1', [], false));
    } elseif (isset($_POST['getVotes']) && $_POST['getVotes']) {

        if (isset($_POST['id'])) {
            echo json_encode(SelectFromBD($pdo, 'SELECT * FROM postVotes WHERE postID=?', [$_POST['id']], true));
        } else {
            echo json_encode(SelectFromBD($pdo, 'SELECT * FROM postVotes', [], true));
        }
    }
