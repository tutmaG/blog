<?php include_once 'includes/class-autoloader.inc.php'; 
      $profileInfo = new profileInfoViwe();
?>
<style> 
    #profile{
        color: #c50b08;
        border-color: rgb(135, 29, 29);
        box-shadow: 0px 1px 20px rgb(85, 0, 255);
        }
</style>
<title>Profile</title>

    <?php if(isset($_SESSION['id'])){ ?>
        <div class="flex">
            <header class="userHeader">
                <h1>User Profile</h1>
            </header>
            <div class="profile">
                <?php if(isset($_SESSION['photo'])){?>
                    <img class="prof-img" src="uploads/<?php echo $_SESSION['photo']; ?>" alt="User Profile Image:">
                    <!-- <a href="./includes/remove.inc.php" class="profile-button">Remove profile img</a> -->
                <?php  }else{ ?>
                    <img class="prof-img" src="img/default-profile-img.jpg" alt="User Profile Image:">
                <?php }?>
                <h2>User: <?php echo $_SESSION['username'];?></h2>
                <p>Email: <?php  echo $_SESSION['email'];?></p>
                <p>Title:  <?php $profileInfo->fetachTitle($_SESSION['id']); ?></p>
                <p>Text:   <?php $profileInfo->fetachText($_SESSION['id']); ?></p>
                <p class="pad">About Me: <?php $profileInfo->fetachAbout($_SESSION['id']); ?></p>
                <form action="profilesettings.php" method="post">
                    <button name="profile-button" class="profile-button">Profile Settings</button>
                </form>
            </div>
        </div>
        

    <?php } else{ ?>
        <div class="center">
            <h1>YOU ARE NOT LOGGED IN</h1>
            <P>Please create an account or log in</P>
        </div>
    <?php } ?>

    
