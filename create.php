<?php
include 'header.php';
?>

<script>
    function makeDateOptions() {

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

    }

</script>

<div class="container margin-bottom-50">
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
                        <p class="category-light-grey padding-10"><span class="activity-message padding-10">Informatii legate de cont</span>
                        </p>
                        <p class="login-form-information">Data nastere</p>
                        <style onload="makeDateOptions()">
                        </style>

                        <
                        p > < select class

                        =
                        "select-style width-70"
                        id

                        =
                        "day"
                        name

                        =
                        "day"
                        >
                        <

                        /
                        select >
                        < select class

                        =
                        "select-style width-150"
                        id

                        =
                        "mounth"
                        name

                        =
                        "mounth"
                        >
                        <

                        /
                        select >
                        < select class

                        =
                        "select-style width-100"
                        id

                        =
                        "year"
                        name

                        =
                        "year"
                        >
                        <

                        /
                        select >
                        <

                        /
                        p >
                        < p class

                        =
                        "login-form-information"
                        > Schimba Email<

                        /
                        p >
                        < p > < input class

                        =
                        "width-340"
                        type

                        =
                        "email"
                        > <

                        /
                        input > <

                        /
                        p >
                        < p class

                        =
                        "login-form-information"
                        > Schimba Parola<

                        /
                        p >
                        < p > < input class

                        =
                        "width-340"
                        type

                        =
                        "password"
                        > <

                        /
                        input > <

                        /
                        p >
                        < p class

                        =
                        "login-form-information"
                        > Schimba Avatar<

                        /
                        p >
                        < p > < label class

                        =
                        "btn btn-default loadbutton"
                        >
                        Browse < input type

                        =
                        "file"
                        style

                        =
                        "display:none"
                        onchange

                        =
                        "$('#upload-file-info').html(this.files[0].name)"
                        >
                        <

                        /
                        label > < span class

                        =
                        "label label-info color-white"
                        id

                        =
                        "upload-file-info"
                        > <

                        /
                        span > <

                        /
                        p >
                        <

                        /
                        div >
                        < div class

                        =
                        "col-md-12 padding-bottom-50 padding-top-20"
                        >
                        < p class

                        =
                        "category-light-grey padding-10"
                        > < span class

                        =
                        "activity-message padding-10"
                        > Informatii personale<

                        /
                        span > <

                        /
                        p >
                        < p class

                        =
                        "login-form-information"
                        > Oras<

                        /
                        p >
                        < p > < input class

                        =
                        "width-340"
                        type

                        =
                        "text"
                        > <

                        /
                        input > <

                        /
                        p >
                        < p class

                        =
                        "login-form-information"
                        > ID discord<

                        /
                        p >
                        < p > < input class

                        =
                        "width-340"
                        type

                        =
                        "text"
                        > <

                        /
                        input > <

                        /
                        p >
                        < p class

                        =
                        "login-form-information"
                        > Descriere<

                        /
                        p >
                        < p > < textarea class

                        =
                        "form-control"
                        rows

                        =
                        "4"
                        cols

                        =
                        "50"
                        > <

                        /
                        textarea > <

                        /
                        p >
                        < center > < button class

                        =
                        "submit-button"
                        > < i class

                        =
                        "far fa-save"
                        > <

                        /
                        i > Save Profile<

                        /
                        a > <

                        /
                        button >
                        <

                        /
                        div >
                        <

                        /
                        div >
                        <

                        /
                        div >
                        <

                        /
                        div >
                        <

                        /
                        div >
                        <

                        /
                        div >

                        <?php
                            include 'footer.php';
                        ?>
