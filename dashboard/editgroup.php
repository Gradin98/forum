<?php
require_once("header.php");
require_once("src/style/Group.php");

$group = new Group();
if(isset($_GET['id'])){
    $group->editGroup($_GET['id']);
}

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
                                        <p>Group Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="group_name" id="group_name" class="form-control width-300 mx-sm-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Group Image </p>
                                    </div>
                                    <div class="col-md-2">
                                        <img id="group_image" style="width: 100px;margin-left: 20px;">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="file" name="group_image" class="form-control-file width-300 mx-sm-3"
                                               id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="margin-top-50">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Permisie</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <center><span style="margin-left: -15px;">True</span></center>
                                    </th>
                                    <th scope="col">
                                        <center><span style="margin-left: -15px;">False</span></center>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="3">Poate muta posturi</td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios1"
                                                       id="val1-t" value="1" checked></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios1"
                                                       id="val1-f" value="0" checked></center>
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td colspan="3">Poate crea posturi</td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios2"
                                                       id="val2-t" value="1" checked></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios2"
                                                       id="val2-f" value="0" checked></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Poate sterge posturi</td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios3"
                                                       id="val3-t" value="1" checked></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios3"
                                                       id="val3-f" value="0" checked></center>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Poate accesa acp</td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios4"
                                                       id="val4-t" value="1" checked></center>
                                    </td>
                                    <td>
                                        <center><input type="radio" class="form-check-input" name="optionsRadios4"
                                                       id="val4-f" value="0" checked></center>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <center>
                            <input name="group_submit" type="submit" class="btn btn-primary mb-2" value="Update Group"></input>
                        </center>
                        <form>
                </div>
            </div>

        </div>
    </div>
<?php
$group->checkID($_GET['id']);
include "footer.php";


?>