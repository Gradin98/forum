<?php
require_once('header.php');
require_once('src/style/Post.php');
require_once('MysqlConnect.php');

$post = new Post();
$post->insertAnswer();
$post->deletePost();
$post->movePost();
?>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">

                <?php
                $post->showPost($_GET['id']);


                $post->showAnswers($_GET['id']);
                ?>

                        <div class="row">
                            <?php
                            if(MysqlConnect::instance()->checkPermission("move_post",$_SESSION['id'])){
                            ?>
                            <form method="post">
                                <div class="col-md-5">
                                    <select  class="select-style width-150" name="category_move" id="category_move">
                                    </select>
                                </div>
                                <div class="col-md-3">

                                    <input type="submit" style="width: 200px" name="move_post" value="Move Post">
                                </div>
                            </form>
                            <?php
                            }
                            ?>
                            <?php
                            if(MysqlConnect::instance()->checkPermission("delete_posts",$_SESSION['id'])){
                            ?>
                            <form method="post">
                                <div class="col-md-3">

                                        <input type="submit" style="width: 200px" name="delete_post" value="Delete Post">

                                </div>
                            </form>

                            <?php
                            }
                            ?>
                        </div>



                    <div class="row justify-content-md-center margin-top-50">

                        <div class="col-md-8">
                            <form method="post" id="post_form">
                                <textarea name="post_content" id="page_real_content" style="display: none"></textarea>
                                <textarea  class="summernote" id="page_content" title="Contents"></textarea>
                        </div>
                        <div class="col-md-8">
                            <center>
                                <input name="post_submit" type="submit" class="submit-button" value="Create Post"> </a></input>
                            </center>
                            </form>

                            <script>

                                $('#page_content').summernote({
                                    tabsize: 2,
                                    height: 400,
                                });

                                var ceva = $('#page_content')

                                $('#post_form').submit(function (e) {

                                    ceva.summernote()
                                    $('#page_real_content').val(ceva.summernote('code'));
                                });
                            </script>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php
$post->getCategoryNames();
include 'footer.php';
?>