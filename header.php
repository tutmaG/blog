<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
    <header class="blog-header">
        <div class="logo">
            <a href="index.php">YOUR BLOG</a>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="index.php" id="home">Home</a></li>
                <li><a href="profile.php" id="profile" >Profile</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <nav class="login-signup-nav">
            <ul>
            
                <?php if(!isset($_SESSION['id'])){ ?>
                    <li><a href="login.php" class="hide_login all_hide">Log In</a></li>
                    <li><a href="signup.php" class="hide_signup all_hide">Sign Up</a></li>
                <?php } else {?>
                    <li><a href="./includes/logout.inc.php">Log out</a></li>   
                <?php  }?>

            </ul>
        </nav>
    </header>
</body>
</html>
