<?php
declare(strict_types=1);
require __DIR__.'/views/header.php';
if (isset($_SESSION['userid'])) {
    redirect('.');
}
?>
<main class="container grid grid-2">

    <div>
        <div>
            <form class="form-loginPage2" name="loginUserForm">
                <h2>Login</h2>
                <div class="form-control">
                    <label for="loginEmail">Email address</label>
                    <input name="email" type="email" class="form-control input" placeholder="Enter email" required>
                </div>
                <div class="form-control">
                    <label for="loginPassw">Password</label>
                    <input name="passw" type="password" class="form-control input" placeholder="Password" required>
                </div>
                <input name="sessid" type="hidden" value="<?php echo session_id(); ?>">
                <button type="submit" class="button2  btn-loginUser">Login</button>
            </form>
        </div>
    </div>


    <div>
        <div>
            <form class="form-loginPage2"name="regUserForm" onsubmit="return false;">
                <h2>Register</h2>
                <div class="form-control">
                    <label for="regUsername">Username</label>
                    <input name="username" type="username" class="form-control input" placeholder="Enter username" required>
                </div>
                <div class="form-control">
                    <label for="regEmail">Email address</label>
                    <input name="email" type="email" class="form-control input" aria-describedby="regEmailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-control">
                    <label for="regPassw">Password</label>
                    <input name="passw" type="password" class="form-control input" placeholder="Password" required>
                </div>
                <div class="form-control">
                    <label for="regPassw">Repeat Password</label>
                    <input name="passw_repeat" type="password" class="form-control input" placeholder="Password" required>
                </div>
                <button type="submit" class="button2 btn-regUser">Register</button>
            </form>
        </div>
    </div>
</main>
<script src="assets/scripts/login.js"></script>
<?php require __DIR__.'/views/footer.php'; ?>
