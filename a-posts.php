
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
     
    </div>

    <div class="row posts container grid grid-1">

</div>


<main class="container grid grid-1">
<?php
        $posts = SelectFromBD($pdo, 'SELECT * FROM posts', [], true);
        foreach ($posts as $post):
    ?>
    <div class="card container grid grid-1 post" data-postid="<?php echo $post['postID']; ?>">
        <a href="<?php echo $post['image_url']; ?>" target="_blank" class="card-header postTitle" onclick="if(this.getAttribute('href') == '') return false;"><?php echo $post['title']; ?></a>
        <div class="card-body ">
            <blockquote class="blockquote mb-0 col-10">
                <p class="postText"><?php echo $post['postText']; ?></p>
                <footer class="blockquote-footer"> <cite title="Source Title"><?php echo $post['postTime']; ?></cite> (<span class="updateTime"><?php echo $post['updateTime']; ?></span>)</footer>
            </blockquote>
        </div>
    </div>

        Edit: <input type="checkbox" class="editPostCheck" data-postid="<?php echo $post['postID']; ?>">
        <a href="app/posts/delete.php?post=<?php echo $post['postID']; ?>" class="btn btn-sm btn-danger" onclick="if(!confirm('Are you sure?')) return false;">Remove</a>
    <?php
        endforeach;
    ?>

</body>
<script src="assets/scripts/posts.js"></script>
<?php require __DIR__.'/views/footer.php'; ?>
</html>


