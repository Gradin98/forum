<?php
require_once('header.php');
require_once('src/style/CategoryIndex.php');
require_once('MysqlConnect.php');
$category = new CategoryIndex();
?>

<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-8 ">

            <div class="category-title">
                <div class="row no-margin">
                    <div class="col-md-12">
                        <p class="category-title-text"><i class="far fa-folder icon-color"></i> Subforums</p>
                    </div>
                </div>
            </div>
            <?php

            $category->setChild();
            ?>

            <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
                <div class="col-md-9"></div>
                <?php
                if(MysqlConnect::instance()->checkPermission("create_post",$_SESSION['id'])) {
                    ?>
                    <div class="col-md-3">
                        <center>
                            <a href="createpost.php?id=<?php echo $_GET['id']; ?>"><span class="submit-button"><i
                                            class="far fa-edit"></i> Create post</a></span></a>
                        </center>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="category-title">
                <div class="row no-margin">
                    <div class="col-md-12">
                        <p class="category-title-text"><i class="far fa-folder icon-color"></i> Posts</p>
                    </div>
                </div>
            </div>

            <?php
                $category->setListOfPosts();
            ?>


        </div>

        <?php
        include 'sidebar.php';
        ?>



    </div>
</div>
</div>

<?php
include 'forumstats.php';
?>


<?php
include 'footer.php';
?>


