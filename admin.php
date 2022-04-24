
<?php
require 'app/autoload.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">

    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <h1>Admin</h1>
        <a href="">Users</a>
        <a href="">Posts</a>
     </div>


     <div class="container grid grid-2">
     <?php
     $statement = $pdo->prepare('SELECT * FROM users');
     $statement->execute();

     foreach ($statement as $user): 
        $username = $user['nickname'];
        $userid = $user['id'];
        ?>
        <?php endforeach; ?>
     </div>

    </div>
    
</body>
</html>


