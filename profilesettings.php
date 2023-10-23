<?php
if(isset($_POST['profile-button'])){ 

    include 'includes/class-autoloader.inc.php'; ?>
    <title>Profile Settings</title>
        <div class="flex">
            <header class="userHeader">
                <h1>Profile Settings</h1>
            </header>
            <div class="profile">
                <h2 class="pad">Edit Profile Information</h2>   
                <form action="includes/profileinfo.inc.php" method="post">
                    <textarea id="about" name="about" rows="4" cols="50" placeholder="Change Your About Section:"></textarea>
                    <input type="text" id="profile_intro" name="title" maxlength="100" placeholder="Change Your Profile Page Title:">
                    <input type="text" id="text" name="text" maxlength="50" placeholder="Change Your Text:">
                    <button  class="profile-button" type="submit">Save Changes</button>
                </form>
                <h2 class="upload-heading">Upload Profile Photo</h2>
                <form class="upload-form" action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
                    <input class="file-input" type="file" name="photo" id="fileToUpload">
                    <button class="profile-button" type="submit" name="submit-upload">Upload Photo</button>
                </form>
            </div>
        </div>
<?php 
    }else{
            header('location: index.php?');
        }?>