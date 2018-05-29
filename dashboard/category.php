<?php
require_once("header.php");

require_once("src/style/Category.php");

$category = new Category();
?>


    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <form>
                        <div class="row" style="localhostmargin-top: 10px;">
                            <div class="col-md-10">
                                <a href="createcategory.php"><span class="btn btn-primary mb-2 pull-right">Create category</span></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>

                    </form>

                    <?php
                    $category->generateParentAndChild();
                    ?>
                </div>
            </div>


        </div>
    </div>
<?php
include "footer.php";
?>