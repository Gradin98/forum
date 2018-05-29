<?php
require_once("header.php");

require_once("src/style/User.php");

$user = new User();
$user->sendAction();
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
                                        <p>Username</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mx-sm-3" id="user_username"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mx-sm-3" id="user_email"></p>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Data nastere</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mx-sm-3" id="user_birthday"></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>IP</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mx-sm-3" id="user_ip"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Numar Posturi</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mx-sm-3" id="user_number_post"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <form method="post">
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Unelte Rapide</p>
                                    </div>
                                    <div class="col-md-6">
                                        <select id="inputState" name="action_value" class="form-control width-300 mx-sm-3">
                                            <option value="1">Sterge Avatar</option>
                                            <option value="2">Sterge Toate posturile</option>
                                            <option value="3">Sterge User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="submit_action" class="btn btn-primary mb-2" value="Send Action"></input>
                            </div>
                        </div>

                    </form>


                </div>
            </div>

        </div>
    </div>
<?php
$user->checkID();

include "footer.php";
?>