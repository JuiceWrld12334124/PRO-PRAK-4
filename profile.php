<?php
    require 'views/header.php';
    if (!isset($_SESSION['userid'])) {
        redirect('./login.php');
    }

    if (isset($_GET['targetUser'])) {
        $target = $_GET['targetUser'];
    } else {
        $target = $_SESSION['userid'];
    }

    $data = SelectFromBD($pdo, 'SELECT id, nickname, email, bio, avatar_url, banner_url, regDate from users WHERE id=?', [$target], false);
    if ($data === false) {
        echo 'No user found with that idea.';
        die;
    }
    $getsum = SelectFromBD($pdo, 'SELECT SUM(vote) as sum FROM postVotes WHERE userID=?', [$target], false);
    if ($getsum['sum'] >= 1){$rep = "green";}
    elseif ($getsum['sum'] == 0){$rep = "bold";}
    else {$rep = "red";}
?>

<img class="banner-img mt-3" src="<?php echo $data['banner_url']; ?>">
<div class="container grid grid-1 ">
    <div class="card reviews">

    <div class="row blockquote">
        <div class="container grid grid-username">
        <img class="profile-img" src="<?php echo $data['avatar_url']; ?>">
        <h4><?php echo $data['nickname'] ?></h4>
        </div>
        <div>
        <p class="review-text"><?php if (strlen($data['bio']) == 0) {
    echo 'No bio.';
} else {
    echo $data['bio'];
} ?></p>
        <small class="review-date"><?php echo $data['email']; ?></small>
        <small class="review-date"><br>Member since: <?php echo $data['regDate']; ?></small>
        <small class="review-date <?php echo $rep ?>"><br>Reputation: <?php echo $getsum['sum']; ?></small>
        </div>
    </div>
    </div>
</div>
<div class="container grid grid-1">
<div class="card">
<?php
    if ($_SESSION['userid'] == $data['id']):
        if (isset($_GET['passchange']) && $_GET['passchange'] == 'true'):
?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Password changed.
    </div>
<?php elseif (isset($_GET['passchange']) && $_GET['passchange'] == 'false'): ?>
    <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Indicates a warning that might need attention.
    </div>
<?php endif; ?>
    <form name="updateUserForm" class="container grid grid-1" enctype="multipart/form-data" action="app/users/update.php" method="post">
        <div class="form-group">
            <label for="regEmail">Email address</label>
            <input name="email" type="text" class="form-control" id="regEmail" aria-describedby="regEmailHelp" placeholder="Enter email" value="<?php echo $data['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="bio">Biography</label>
            <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="About you"><?php echo $data['bio']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="updateAvatar">Avatar</label>
            <input name="avatar" type="file" class="form-control" id="updateAvatar" aria-describedby="updateAv" placeholder="Select file" accept="image/*">
        </div>
        <div class="form-group">
            <label for="updateBanner">Banner</label>
            <input name="banner" type="file" class="form-control" id="updatebanner"  placeholder="Select file" accept="image/*"> 
        </div>
        <button type="submit" class="btn btn-primary btn-regUser">Update</button>
    </form>
</div>
<?php
    endif;
?>

</div>
<div class="container">
    <h3>Accounts posts</h3>
    <?php
        $posts = SelectFromBD($pdo, 'SELECT * FROM posts WHERE authorID=? ORDER BY postID DESC', [$target], true);
        foreach ($posts as $post):
    ?>
    <div class="card mt-4 post" data-postid="<?php echo $post['postID']; ?>">
        <a href="<?php echo $post['image_url']; ?>" target="_blank" class="card-header postTitle" onclick="if(this.getAttribute('href') == '') return false;"><?php echo $post['title']; ?></a>
        <input type="text" class="editTitle d-none">
        <div class="card-body row">
            <blockquote class="blockquote mb-0 col-10">
                <p class="postText"><?php echo $post['postText']; ?></p>
                <textarea name="" id="" cols="30" rows="10" class="editText d-none"></textarea>
                <footer class="blockquote-footer"> <cite title="Source Title"><?php echo $post['postTime']; ?></cite> (<span class="updateTime"><?php echo $post['updateTime']; ?></span>)</footer>
            </blockquote>
        </div>
    </div>
    <?php
        if ($_SESSION['userid'] == $post['authorID']):
    ?>
        Edit: <input type="checkbox" class="editPostCheck" data-postid="<?php echo $post['postID']; ?>">
        <a href="app/posts/delete.php?post=<?php echo $post['postID']; ?>" class="btn btn-sm btn-danger" onclick="if(!confirm('Are you sure?')) return false;">Remove</a>
    <?php
        endif;
        endforeach;
    ?>
</div>
<script src="assets/scripts/profile.js"></script>
<?php require 'views/footer.php'; ?>
