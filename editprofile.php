<?php
require_once 'header.php';
require_once 'src/style/EditProfile.php';

EditProfile::checkAccountForm();
EditProfile::changeAvatar();
?>

<div class="container margin-bottom-100" xmlns="http://www.w3.org/1999/html">
    <div class="row justify-content-between no-margin">
        <div class="col-md-12 post-container ">
            <div class="">
                <div class="row margin-bottom-20">
                    <div class="col-md-10">
                        <p class="page-title">Edit Profile</p>

                    </div>
                </div>

                <div class="row margin-bottom-20">
                    <div class="col-md-12 padding-bottom-50 padding-top-20">
                        <p class="category-light-grey padding-10"><span class="activity-message padding-10">Informatii legate de cont</span>
                        </p>

                        <?php
                            EditProfile::setAccountForm();
                        ?>

                    </div>
                    <div class="col-md-12 padding-bottom-50 padding-top-20">
                        <p class="category-light-grey padding-10"><span class="activity-message padding-10">Informatii personale</span>
                        </p>

                        <?php
                        EditProfile::setPersonalDataForm();
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var day = document.getElementById("day");

        for (var i = 1; i <= 31; i++) {
            var option = document.createElement("option");
            option.text = i;
            day.add(option);
        }

        var mounth = ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie", "Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"];
        var mounthc = document.getElementById("mounth");

        for (var i = 0; i < mounth.length; i++) {
            var option = document.createElement("option");
            option.text = mounth[i];
            mounthc.add(option);
        }

        var year = document.getElementById("year");

        for (var i = 2018; i >= 1800; i--) {
            var option = document.createElement("option");
            option.text = i;
            year.add(option);
        }
    });
</script>

<?php
include 'footer.php';
?>
