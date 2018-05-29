<?php
require_once('header.php');
require_once('src/Page.php');

if(isset($_GET['title'])){
    $page = new Page($_GET['title']);
}
else if(isset($_GET['id'])){
    $page = new Page($_GET['id']);
}



?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center><p class="page-title">
                        <?php
                            echo $page->getTitle();
                        ?>
                    </p></center>

                <div class="page-content-margin">
                    <?php
                        echo $page->getContent();
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php
include 'footer.php';
?>