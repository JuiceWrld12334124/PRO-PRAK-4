<?php
declare(strict_types=1);
require __DIR__.'/../app/autoload.php';
?>
<!doctype html>
<html lang="en">
  <head>
   <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Myves</title>
    <link rel="stylesheet" href="assets/styles/style.css">
  </head>

  <body>
    <?php if (isset($_SESSION['userid'])): ?>
    <div data-userid="<?php echo $_SESSION['userid'] ?>"></div>
    <?php endif; ?>
    <?php require __DIR__.'/navbar.php'; ?>