
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
        <a href="admin.php">Users</a>
        <a href="a-posts.php">Posts</a>
        <a href="index.php"><===</a>
     </div>

     <div class="container grid grid-2">
     <?php
        $users = SelectFromBD($pdo, 'SELECT * FROM users', [], true);

        foreach ($users as $user):
    ?>
    <div class="card container grid grid-1 post">
        <a><?=$user['nickname']?></a>
    </div>
    <?php echo "<form class='container grid' action='app/users/delete.php' method='POST'>
    <button class='button-solved ' name='id' value='".$user['id']."'>Delete User</button>
    </form> ";?>
    <?php
        endforeach;
    ?>
     </div>
    </div>
</body>
</html>


