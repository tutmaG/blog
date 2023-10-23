<?php include 'header.php'; ?>
<title>Log In</title>
<style>
    .hide_login{
        display: none;
    }
</style>
<div class="login-container">
        <h2 class="align-center">Log In</h2>

        <?php  if(isset($_GET['error']) == 'emptyinput'){ ?>
                    <h3 class="error">Pleas fill inputs!</h3>
                 <?php } ?>

        <form action="includes/login.inc.php" method="post">
            <input type="text" id="username" name="usernameORemail" placeholder="Username or Email:">
            <input type="password" id="password" name="password" placeholder="Password:">
            <button type="submit" name="submit-login">Log In</button>
        </form>
    </div>