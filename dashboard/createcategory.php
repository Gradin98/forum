<?php
require_once("header.php");

require_once("src/style/Category.php");

$category = new Category();
$category->createCategory();

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->

        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Category Title</p>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="category_name" id="inputPassword6" class="form-control width-300 mx-sm-3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Category Description </p>
                                </div>
                                <div class="col-md-6">
                                        <textarea name="category_description" class="form-control width-300 mx-sm-3"
                                                  id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Category Parent </p>
                                </div>
                                <div class="col-md-6">
                                    <select id="category_parent" name="category_parent" class="form-control width-300 mx-sm-3">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Category Image </p>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="category_input" class="form-control-file width-300 mx-sm-3"
                                           id="exampleFormControlFile1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                        <input type="submit" name="group_submit" class="btn btn-primary mb-2"></input>
                    </center>
                </form>


            </div>
        </div>

    </div>
</div>
<?php
$category->getCategoryNames();
include "footer.php";
?>
