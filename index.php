<?php
require_once('header.php');
require_once('src/style/CategoryIndex.php');
?>

<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-8 ">

            <div class="category-title">
                <div class="row no-margin">
                    <div class="col-md-12">
                        <p class="category-title-text"><i class="far fa-folder icon-color"></i> Forums</p>
                    </div>
                </div>
            </div>

            <?php
                $category = new CategoryIndex();
                $category->setParent();
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


