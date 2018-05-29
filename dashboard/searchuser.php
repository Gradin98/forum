<?php
require_once("header.php");

require_once("src/style/User.php");

$user = new User();

?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->

            <div class="row">
                <div class="col-md-12">
                    <form method="get">
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <center><p>Cauta user</p></center>
                                    </div>
                                    <div class="col-md-6">
                                        <center><input name="search_user" type="text" id="inputPassword6"
                                                       class="form-control width-300 mx-sm-3"></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <center>
                                    <input type="submit" name="search_submit" class="btn btn-primary mb-2" value="Search User"></input>
                                </center>
                            </div>
                        </div>

                    </form>

                    <?php
                        $user->findUser();
                    ?>


                </div>
            </div>

        </div>
    </div>
<?php
include "footer.php";
?>