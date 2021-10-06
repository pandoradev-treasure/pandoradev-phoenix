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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php asset('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
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
    <link rel="stylesheet" href="<?= asset('codemirror/theme/the-matrix.css') ?>">
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

    .delete-png {
        filter: invert(48%) sepia(42%) saturate(3927%) hue-rotate(333deg) brightness(99%) contrast(86%);
    }

    .export-png {
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
    }

    *{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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
        <?php
            @$dataUrlSekarang = explode('/',$_SERVER['REQUEST_URI']);
            $attrForSideBar = null;
            if (@$dataUrlSekarang[3] == "") {
                $attrForSideBar = "style='display:none'";
            }
        ?>
        <div <?= $attrForSideBar ?> class="menu-sidebar border-end bg-white first-sidebar" id="sidebar-wrapper">
            <div class=" sidebar-heading border-bottom bg-light" style="font-size: 17px;">
                <a href="<?= url('setup') ?>">
                    Pandora<b>Setup</b>
                </a>
            </div>
            <div class=" list-group list-group-flush layouts">
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku"
                    href="<?= url('setup/database') ?>"><img src="<?= asset('setup/database.png') ?>"
                        style="max-width:20px"> Database </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku"
                    href="<?= url('setup/table') ?>"><img src="<?= asset('setup/table.png') ?>" style="max-width:20px">
                    Table </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku"
                    href="<?= url('setup/controller') ?>"><img src="<?= asset('setup/controller.png') ?>"
                        class="export-png" style="max-width:20px"> Controller
                </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku"
                    href="<?= url('setup/cmd') ?>"><img src="<?= asset('setup/coding.png') ?>" style="max-width:20px"> Terminal
                </a>

                <span class="title-menu">Views</span>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 layoutku"
                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne"><img src="<?= asset('setup/web-settings.png') ?>"
                        style="max-width:20px"> Backend </a>
                <div id="accordion">

                    <div class="card">
                        <?php
                        if (strstr($_SERVER['REQUEST_URI'], 'backend')) {

                            $class = "show";
                        }

                        ?>
                        <div id="collapseOne" class="collapse <?= $class ?>" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">

                                <a href="<?= url('setup/backend-header') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light"><img
                                        src="<?= asset('setup/header.png') ?>" style="max-width:20px"> Header </a>

                                <a href="<?= url('setup/backend-menu') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light "><img
                                        src="<?= asset('setup/menu.png') ?>" style="max-width:20px"> Menu </a>

                                <a href="<?= url('setup/backend-footer') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light"><img
                                        src="<?= asset('setup/footer.png') ?>" style="max-width:20px"> Footer </a>

                                <a href="<?= url('setup/backend-list-view') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light"><img
                                        src="<?= asset('setup/list-view.png') ?>" style="max-width:20px"> List View </a>

                            </div>
                        </div>
                    </div>

                </div>

                <a style="margin-top: -17px;"
                    class="list-group-item list-group-item-action list-group-item-light p-3 layoutku"
                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo"><img src="<?= asset('setup/front-end.png') ?>" style="max-width:20px">
                    Frontend </a>
                <div id="accordionSecond">

                    <div class="card">
                        <?php
                        if (strstr($_SERVER['REQUEST_URI'], 'frontend')) {

                            $classFrontend = "show";
                        }

                        ?>
                        <div id="collapseTwo" class="collapse <?= $classFrontend ?>" aria-labelledby="headingOne"
                            data-parent="#accordionSecond">
                            <div class="card-body">

                                <a href="<?= url('setup/frontend-header') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light"><img
                                        src="<?= asset('setup/header.png') ?>" style="max-width:20px"> Header </a>

                                <a href="<?= url('setup/frontend-menu') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light"><img
                                        src="<?= asset('setup/menu.png') ?>" style="max-width:20px"> Menu </a>

                                <a href="<?= url('setup/frontend-footer') ?>"
                                    class="list-group-item list-group-item-action list-group-item-light"><img
                                        src="<?= asset('setup/footer.png') ?>" style="max-width:20px"> Footer </a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
            @$dataUrlSekarang = explode('/',$_SERVER['REQUEST_URI']);
            if (@$dataUrlSekarang[3] == "detail-file") {
        ?>
        <!-- for controller files -->
        <div class="remove-display border-end bg-white second-sidebar" id="sidebar-wrapper">
            <div class="remove-display sidebar-heading border-bottom bg-light" style="font-size: 17px;">Controllers
            </div>
            <div class="remove-display list-group list-group-flush">
                <div class="card-body" style="margin-top: -30px;">
                    <div id="accordion" style="margin-top: 20px;">
                        <?php

                            foreach (glob("../controller/*") as $key => $fileController) {
                                
                            $fileController = explode('/', $fileController);

                            ?>
                        <span style="color:#4b6584">

                            <img class="export-png" src="<?= asset('setup/controller.png') ?>" style="max-width:15px;">
                            <a target="" href="<?= controller('setup@detailFile', $fileController[2]) ?>"
                                style="color: #2c3e50;cursor:pointer">
                                <span style="margin-left: 7px;"><?= $fileController[2] ?></span>
                            </a>
                        </span><br>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end for controller files -->
        <?php
            }else{
        ?>
        <!-- for menu -->
        <div class="remove-display border-end bg-white second-sidebar" id="sidebar-wrapper">
            <div class="remove-display sidebar-heading border-bottom bg-light" style="font-size: 17px;">Views</div>
            <div class="remove-display list-group list-group-flush">
                <div class="card-body" style="margin-top: -30px;">
                    <div id="accordion" style="margin-top: 20px;">
                        <div style="margin-bottom:10px">
                            <a data-toggle="modal" data-target="#AddNewFileOrFolder" style="cursor:pointer"><img
                                    src="<?= asset('setup/add-file.png') ?>" style="max-width: 20px;cursor:pointer" alt=""><span
                                    style="margin-left: 7px;">Buat baru</span></a>
                        </div>
                        <!-- Modal Add File / Folder-->
                        <div class="modal fade" id="AddNewFileOrFolder" tabindex="-1" role="dialog"
                            aria-labelledby="AddNewFileOrFolderLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <span style="font-size: 20px;font-family:calibri">Buat Folder & File</span>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <div>
                                        <form action="<?= controller('setup@CreateFolderAndFileBackend') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama Folder </label>
                                                    <div class="col-sm-10">
                                                        <div class="row">
                                                            <div class="col-md-4">

                                                                <input class="form-control form-control-sm  name-folder" name="folder" type="text" required placeholder="AwesomeFolder">
                                                                <small id="emailHelp" class="form-text text-muted">Isikan nama folder yang
                                                                    ingin anda buat.</small>

                                                            </div>
                                                            <div class="col-md-4">

                                                                <select name="exist_folder" id="" class="exist_folder js-example-basic-single form-control">
                                                                    <option value="" selected disabled>-Pilih Folder-</option>

                                                                    <?php

                                                                    foreach (glob("../resource/views/backend/*") as $key => $see) {

                                                                        $see = explode('/', $see);

                                                                        $attr = '';

                                                                        if ($see[4] == "dashboard.php") {
                                                                            ?>
                                                                            
                                                                            <?php
                                                                        }else{

                                                                        ?>
                                                                        <option <?= $attr ?> value="<?= $see[4] ?>"> <?= $see[4] ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    
                                                                </select>


                                                                <small id="emailHelp" class="form-text text-muted">Atau pilih dari folder yang sudah ada.</small>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Nama File</label>
                                                    <div class="col-sm-10">
                                                        <div class="row">
                                                            <div class="col-md-4" style="margin-top: 8px;">

                                                                <input placeholder="AwesomeFile" type="text" name="file" class="form-control form-control-sm">

                                                                <small id="emailHelp" class="form-text text-muted">Isikan nama file yang
                                                                    ingin anda buat di dalam folder <code class="append-folder-name"></code>.</small>

                                                            </div>
                                                            <div class="col-md-4" style="margin-top: 8px;">

                                                                <select name="type_view" class="form-control form-control-sm" id="">
                                                                    <option disabled selected>-Pilih Tipe-</option>
                                                                    <option value="blank">Blank Page</option>
                                                                    <option value="table">Table</option>
                                                                    <option value="form">Form</option>
                                                                </select>

                                                                <small id="emailHelp" class="form-text text-muted">
                                                                    Pilih tipe untuk desain file anda.
                                                                </small>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-sm btn-primary">Buat</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            foreach (glob("../resource/views/backend/*") as $key => $see) {
                                
                                $attr = null;
                                $see = explode('/', $see);
                                if ($see[4] == "dashboard.php") {
                                    $attr = "style='display:none'";
                                }
                                ?>
                        <span <?= $attr ?> style="color:#4b6584">

                            <img src="<?= asset('setup/folder.png') ?>" style="max-width:15px;">
                            <a style="color: #2c3e50;cursor:pointer" data-toggle="collapse"
                                data-target="#demo<?= $see[4] ?>">
                                <span style="margin-left: 7px;"><?= $see[4] ?></span>
                            </a>
                            <a class="delete-table" data-table="<?= $see[4] ?>" data-url="<?= controller('setup@deleteFolderBackend',  'backend/'.$see[4]) ?>">
                                <img class="delete-png" src="<?= asset('setup/cancel.png') ?>" style="max-width:10px;margin-left: 5px;margin-bottom: 3px;">
                            </a>

                            <!-- Edit Nama Folder -->
                            <a data-toggle="modal" data-target="#EditFolderNameInDetail<?= str_replace('.','',$see[4]) ?>">
                                <img class="export-png" src="<?= asset('setup/edit.png') ?>"
                                    style="max-width:10px;margin-left: 5px;margin-bottom: 3px;">
                            </a>

                            <!-- Modal Edit Name Folder -->
                            <div class="modal fade" id="EditFolderNameInDetail<?= str_replace('.','',$see[4]) ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Nama Folder </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= controller('setup@editNamaFolderBackend', 'backend/'.$see[4]) ?>" method="POST">
                                            <div class="modal-body">
                                                <div class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                                                            value="<?= $see[4] ?>">
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="inputPassword2" class="sr-only">Nama Baru</label>
                                                        <input name="new_name_file" required type="text" class="form-control"
                                                            id="inputPassword2" placeholder="Nama Baru">
                                                    </div>
                                                    <input type="hidden" name="old_file" value="<?= $seefile ?>">
                                                    <textarea style="display: none;" name="data_new_code" class="data-code" id="" cols="30"
                                                        rows="10"></textarea>
                                                    <button type="submit" class="btn btn-primary btn-sm mb-2">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </span>
                        <?php
                            //For Views Files
                            foreach (glob("../resource/views/backend/$see[4]/*") as $key => $seefile) {

                                $seefile = explode('/', $seefile);
                                $seefile = $seefile[5];
                            ?>

                        <div style="margin-left: 17px;" id="demo<?= $see[4] ?>" class="collapse">
                            <img src="<?= asset('setup/file.png') ?>" style="max-width:14px"> <a
                                href="<?= controller('setup@detailFileBackend', $see[4] . "/" . $seefile) ?>"
                                class="link" style="color:#1e272e"><?= $seefile ?></a>
                            <a class="delete-table float-right" data-table="<?= $seefile ?>"
                                data-url="<?= controller('setup@deleteFileBackend',  $see[4] . "/" . $seefile) ?>">
                                <img class="delete-png" src="<?= asset('setup/delete.png') ?>"
                                    style="max-width:14px;margin-left: 5px;margin-bottom: 3px;">
                            </a>
                            <a data-toggle="modal" class="float-right"
                                data-target="#exampleModals<?= str_replace('.','',$seefile) ?>">
                                <img class="export-png edit-name" src="<?= asset('setup/edit.png') ?>"
                                    style="max-width:14px;margin-left: 5px;margin-bottom: 3px;">
                            </a>
                        </div>

                        <div style="margin-bottom: 8px;">


                            <div class="modal fade" id="exampleModals<?= str_replace('.','',$seefile) ?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalsLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalsLabel">Edit Nama File </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form
                                            action="<?= controller('setup@editNamaFileBackend', 'backend/'.$see[4]) ?>"
                                            method="POST">
                                            <div class="modal-body">
                                                <div class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            id="staticEmail2" value="<?= $seefile ?>">
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="inputPassword2" class="sr-only">Nama Baru</label>
                                                        <input autofocus name="new_name_file" required type="text"
                                                            class="form-control nama-file-baru" id="inputPassword2"
                                                            placeholder="Nama Baru">
                                                    </div>
                                                    <input type="hidden" name="old_file" value="<?= $seefile ?>">
                                                    <textarea style="display: none;" name="data_new_code"
                                                        class="data-code" id="" cols="30" rows="10"></textarea>
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm mb-2">Ubah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end for menu -->
        <!-- end else -->
        <?php } ?>


        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid" style="padding: 3.5px;">
                    <button class="show-hide btn btn-warning mr-2 btn-sm">Tampil / Sembunyikan</button>
                    <!-- <p>Hai</p>
                    <p >Lorem</p> -->
                    <button class="btn btn-primary btn-sm sidebarHide" id="sidebarToggle"> Tampil / Sembunyikan Sidebar </button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <form action="" method="POST">
                                <button name="cek-update" class="btn btn-outline-primary btn-sm">Update versi</button>
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

                    alert('Berhasil Diperbarui');

                    header('location:');

                }
                
            ?>