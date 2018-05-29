<?php
require_once('header.php');
require_once('src/style/Post.php');

$post = new Post();
$post->createPost();
?>

<div class="container margin-bottom-100">
    <div class="row justify-content-between no-margin">
        <div class="col-md-12 post-container ">
            <div class="">
                <div class="row margin-bottom-20">
                    <div class="col-md-10">
                        <p class="page-title">Create Post</p>

                    </div>
                </div>

                <div class="row margin-bottom-20">
                    <div class="col-md-12 padding-bottom-50 padding-top-20">
                    <form method="post" id="post_form">
                        <p class="login-form-information">Titlu Post</p>
                        <p><input name="post_title" class="width-340" type="text"></input></p>


                        <p class="login-form-information">Post Content</p>
                        <textarea name="post_content" id="page_real_content" style="display: none"></textarea>
                        <textarea  class="summernote" id="page_content" title="Contents"></textarea>




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
</div>


<?php
include 'footer.php';
?>
