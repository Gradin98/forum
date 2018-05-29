<?php
    require 'src/style/Menu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Platforma Forum</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
            integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
            crossorigin="anonymous"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <link rel="stylesheet" href="lib/css/custom.css">

</head>
<body>

<div class="container header-height">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-dark-custom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">



            <!--
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            -->
            <?php

            Menu::setPages();
            Menu::checkSesion();

            ?>

        </div>
    </nav>

</div>
	


	