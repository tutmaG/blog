<?php include 'header.php'; ?>
<title>Sign Up</title>
<style>
    .hide_signup{
        display: none;
    }
</style>
<div class="login-container">
        <h2 class="align-center">Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username:">
            <input type="email" id="email" name="email" placeholder="Email:">
            <input type="password" id="password" name="password" placeholder="Password:">
            <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password:">
            <button type="submit" name="submit-signup">Log In</button>
        </form>
    </div>