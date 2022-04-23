<?php
declare(strict_types=1);

session_start();

$loggedIn = isset($_SESSION['userid']);

date_default_timezone_set('UTC');

mb_internal_encoding('UTF-8');

$config = require __DIR__.'/config.php';

$pdo = new PDO($config['database_path']);

$pdo->query('PRAGMA foreign_keys=ON');

require __DIR__.'/functions.php';
