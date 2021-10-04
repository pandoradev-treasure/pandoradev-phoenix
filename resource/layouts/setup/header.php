<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PandoraSetup</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= asset('setup/css/styles.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php asset('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php asset('plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php asset('dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php asset('plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php asset('plugins/summernote/summernote-bs4.min.css') ?>">
    <!-- Datatable -->
    <link rel="stylesheet" href="<?php asset('plugins/dataTables.bootstrap4.min.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?= asset('codemirror/lib/codemirror.css') ?>">
    <link rel="stylesheet" href="<?= asset('codemirror/theme/material-darker.css') ?>">
</head>
<style>
    .select2-container--default .select2-selection--single {
        padding: 2px;
    }

    .title-menu {
        margin-left: 16px;
        margin-top: 10px;
        color: #7f8c8d;
    }
</style>

<body>
    <audio id="myAudioSuccess">
        <source src="<?= asset('success.mp3') ?>" type="audio/ogg">
        <source src="<?= asset('success.mp3') ?>" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <audio id="myAudioError">
        <source src="<?= asset('windows_error.mp3') ?>" type="audio/ogg">
        <source src="<?= asset('windows_error.mp3') ?>" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light" style="font-size: 17px;">PandoraSetup</div>
            <div class="list-group list-group-flush layouts">
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku" href="database"><img src="<?= asset('setup/server.png') ?>" style="max-width:20px"> Database </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku" href="table"><img src="<?= asset('setup/list.png') ?>" style="max-width:20px"> Table </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku" href="controller"><img src="<?= asset('setup/controller.png') ?>" style="max-width:20px"> Controller </a>

                <span class="title-menu">Views</span>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><img src="<?= asset('setup/web-settings.png') ?>" style="max-width:20px"> Backend </a>
                <div id="accordion">

                    <div class="card">
                        <?php
                        if (strstr($_SERVER['REQUEST_URI'], 'backend')) {

                            $class = "show";
                        }

                        ?>
                        <div id="collapseOne" class="collapse <?= $class ?>" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">

                                <a href="backend-header" class="list-group-item list-group-item-action list-group-item-light"><img src="<?= asset('setup/header.png') ?>" style="max-width:20px"> Header </a>

                                <a href="backend-menu" class="list-group-item list-group-item-action list-group-item-light "><img src="<?= asset('setup/menu.png') ?>" style="max-width:20px"> Menu </a>

                                <a href="backend-footer" class="list-group-item list-group-item-action list-group-item-light"><img src="<?= asset('setup/footer.png') ?>" style="max-width:20px"> Footer </a>

                                <a href="backend-list-view" class="list-group-item list-group-item-action list-group-item-light"><img src="<?= asset('setup/list-view.png') ?>" style="max-width:20px"> List View </a>

                            </div>
                        </div>
                    </div>

                </div>

                <a style="margin-top: -17px;" class="list-group-item list-group-item-action list-group-item-light p-3 layoutku" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><img src="<?= asset('setup/front-end.png') ?>" style="max-width:20px"> Frontend </a>
                <div id="accordionSecond">

                    <div class="card">
                        <?php
                        if (strstr($_SERVER['REQUEST_URI'], 'frontend')) {

                            $classFrontend = "show";
                        }

                        ?>
                        <div id="collapseTwo" class="collapse <?= $classFrontend ?>" aria-labelledby="headingOne" data-parent="#accordionSecond">
                            <div class="card-body">

                                <a href="frontend-header" class="list-group-item list-group-item-action list-group-item-light"><img src="<?= asset('setup/header.png') ?>" style="max-width:20px"> Header </a>

                                <a href="frontend-menu" class="list-group-item list-group-item-action list-group-item-light"><img src="<?= asset('setup/menu.png') ?>" style="max-width:20px"> Menu </a>

                                <a href="frontend-footer" class="list-group-item list-group-item-action list-group-item-light"><img src="<?= asset('setup/footer.png') ?>" style="max-width:20px"> Footer </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"> Sidebars </button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <form action="" method="POST">
                                <button name="cek-update" class="btn btn-outline-primary btn-sm">Cek Pembaruan</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php

                if (isset($_POST['cek-update'])) {
                    return ExecuteShell();
                }

                function ExecuteShell()
                {

                    $check = shell_exec('git pull origin featured/yuz');
                    alert('Already up to date');

                }
                
            ?>