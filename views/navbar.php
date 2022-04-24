<?php
error_reporting(0);
    if (isset($_GET['targetUser'])) {
        $target = $_GET['targetUser'];
    } else {
        $target = $_SESSION['userid'];
    }
$data = SelectFromBD($pdo, 'SELECT id, nickname, email, bio, avatar_url, banner_url, role ,regDate from users WHERE id=?', [$target], false);
?>


<div class="navbar">
    <div class="container flex">
        <h1 class="logo"><a href="./index.php">Myves</a></h1>
        <nav>
            <div>
                <ul >
                    <li >
                        <a  <?php if (basename($_SERVER['SCRIPT_NAME'] == 'index.php')) { echo 'active';} ?>
                            href=".">Home</a>
                    </li>
                
                <?php if (!$loggedIn): ?>
                <li><a href='login.php'>Login</a></li>
                <?php endif; ?>
                <?php
                    if ($loggedIn):
                    $getUser = $pdo->prepare('SELECT nickname FROM users WHERE id=:ID');
                    $getUser->bindParam(':ID', $_SESSION['userid']);
                    if (!$getUser->execute()) {
                    $user = 'NoNickname';
                    } else {
                    $user = $getUser->fetch()['nickname'];
                    }?>
                
                    <li >
                        <a href="profile.php">
                            <?php echo $user; ?>
                        </a>
                    </li>
                    <li >
                        <a href="app/auth/logout.php">Logout</a>
                    </li>
                    <li>
                     <?php if($data['role'] == "admin") { echo "<a href='admin.php'>Admin</a>  ";  } ?>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</div>