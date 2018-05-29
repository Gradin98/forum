<?php
require_once("header.php");
require_once("src/style/Page.php");

$page = new Page();
$page->updatePage($_GET['id']);

?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" id="page_form">
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Page Title</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="inputPassword6" name="page_title" class="form-control width-300 mx-sm-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .note-editable {
                                border-left: 1px solid rgba(0,0,0,.400)!IMPORTANT;
                            }
                            .card-block{
                                border-left: 1px solid rgba(0,0,0,.400)!IMPORTANT;
                            }
                        </style>
                        <div class="margin-top-50">
                            <textarea name="page_content" id="page_real_content" style="display: none"></textarea>
                            <textarea  class="summernote" id="page_content" title="Contents"></textarea>
                        </div>

                        <center>
                            <input type="submit" name="page_submit" class="btn btn-primary mb-2 margin-top-50"></input>
                        </center>
                    </form>




                    <script>



                        $('#page_content').summernote({
                            tabsize: 2,
                            height: 400,

                        });


                        var ceva = $('#page_content')

                        $('#page_form').submit(function (e) {

                            ceva.summernote()
                            $('#page_real_content').val(ceva.summernote('code'));
                            console.log($('#page_real_content').val());
                        });
                    </script>
                </div>
            </div>

        </div>
    </div>
<?php


$page->checkID($_GET['id']);

include "footer.php";
?>