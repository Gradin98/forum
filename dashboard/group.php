<?php
require_once("header.php");
require_once("src/style/Group.php");
$groups = new Group();
$groups->createDefaultGroup()
?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->

            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-10">
                                <a href="creategroup.php"><span class="btn btn-primary mb-2 pull-right">Create group</span></a>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>

                    </form>

                    <div class="margin-top-50">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Groups</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                $groups->generateGroupList();

                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
<?php
include "footer.php";
?>