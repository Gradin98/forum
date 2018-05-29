<?php
    include 'src/style/Sidebar.php';
?>

<div class="col-md-4">
    <?php
        Sidebar::setLatestPosts();

        Sidebar::setUserInfo();
    ?>


</div>