<?php
    require_once('src/style/Stats.php');
?>

<div class="container">
    <div class="row padding-footer3">

        <?php

        Stats::setStatsModule('fa-user', Stats::LAST_USER);
        Stats::setStatsModule('fa-comments', Stats::TOTAL_POSTS);
        Stats::setStatsModule('fa-users', Stats::TOTAL_USERS);

        ?>
    </div>


</div>