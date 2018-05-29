<?php
require_once('header.php');
require_once('src/style/Profile.php');
?>



<div class="container margin-bottom-100">
    <div class="row justify-content-between no-margin">
        <div class="col-md-12 post-container">
            <div class="">
                <div class="row margin-bottom-20">
                    <div class="col-md-2 ">
                        <center>
                            <img class="user-profile-widget margin-bottom-20"
                                 src="<?php Profile::setAvatar();?>">
                        </center>
                    </div>
                    <div class="col-md-8">
                        <?php
                            Profile::setUserInformation();
                        ?>

                    </div>
                    <div class="col-md-2">

                            <a href="editprofile.php?id=<?php echo $_SESSION['id'];?>"><button class="submit-button"><i class="far fa-edit"></i> Edit Profile</a></span></a>

                    </div>
                </div>

                <?php
                Profile::setUserProfileActivity();
                ?>

            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
