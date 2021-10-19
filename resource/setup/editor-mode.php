<div class="tools-editor">
    <span class="show-hide" style="font-family: roboto;cursor: pointer;">
        Pandora<b>Editor</b> 
    </span>

    <span style="margin-left: 10px;">|</span>

    <a style="margin-left: 10px;color:white" type="button" data-toggle="collapse" href="#CollapseMenuView" role="button" aria-expanded="false"
        aria-controls="CollapseMenuView">
        Views
    </a>
    <a style="margin-left: 10px;color:white" type="button" data-toggle="collapse" data-target="#CollapseMenuController" aria-expanded="false"
        aria-controls="CollapseMenuController">
        Controllers
    </a>

    <!-- <a class="tools-btn" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="CollapseMenuView CollapseMenuController">Toggle both elements</a> -->
</div>
<div>
    <div class="row">
        <?php 
            
            $file = null;
            if ($data->file->{0}) {
                $file = $data->file->{0};
            }else{
                $file = $data->file[0];
            }

        ?>
        <form action="<?php controller('setup@EditorModeSaveFile', $file) ?>" method="POST">
            <div style="color: white;padding-top:3px;padding-bottom:3px;">
                <img src="<?= asset('setup/folder.png') ?>" style="max-width: 15px;margin-right:7px" alt=""><?= str_replace("../","",str_replace("resource/views/","",$file)) ?>

                <!-- TOMBOL ROCKET -->
                <?php
                    $namefile = str_replace("../","",str_replace("resource/views/","",$file));
                    $hideElements = "";
                    if (strpos($namefile, 'controller') !== false) {
                        $hideElements = 'style="display:none !important"';
                    }
                ?>
                <a title="Ke halaman <?= str_replace('../resource/views/backend/','',$file) ?>" target="_blank" href="<?= url('backend/'.str_replace('resource/views/','',str_replace('.php','',$file))) ?>" <?= $hideElements ?>>
                    <img src="<?= asset('setup/rocket.png') ?>" style="max-width: 15px;margin-left:4px" alt="">
                </a>
                <button class="btn-save save-file">simpan</button>
            </div>
            <textarea style="position: absolute;" class="text-editor" name="new_code" id="code-mirror"><?= @file_get_contents($file) ?></textarea>
        </form>
        <div class="col-md-2" style="position: absolute;z-index: 9999;">
            <div class="collapse multi-collapse ml-2 mt-2" id="CollapseMenuView">
                <div class="card">
                    <div class="card-header" style="background-color: #EAB543;color:white">
                        Views
                        <a data-toggle="modal" data-target="#AddNewFileOrFolder" style="cursor:pointer;float:right"><img src="<?= asset('setup/add-file.png'); ?>" style="max-width: 20px;cursor:pointer" alt=""></a>
                    </div>
                    <div class="card-body">
                        <?php
                            foreach (glob("../resource/views/backend/*") as $key => $folderBackend) :
                            $attr          = null;
                            $folderBackend = explode('/', $folderBackend);

                            if ($folderBackend[4] == "dashboard.php") {
                                $attr = "style='display:none !important'";
                            }
                        ?>
                        <span <?= $attr ?> data-toggle="collapse" href="#multiCollapseExample1<?= $folderBackend[4] ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1<?= $folderBackend[4] ?>">
                            <img src="<?= asset('setup/folder.png'); ?>" style="max-width:16px;">
                            <?= $folderBackend[4] ?>

                            <!-- HAPUS FOLDER -->
                            <a class="delete-table" data-table="<?= $folderBackend[4] ?>" data-url="<?= controller('setup@deleteFolderBackend',  'backend/'.$folderBackend[4]); ?>">
                                <img class="delete-png float-right" src="<?= asset('setup/cancel.png'); ?>" style="max-width:10px;margin-left: 5px;margin-top:9px">
                            </a>

                            <!-- Edit Nama Folder -->
                            <a data-toggle="modal" data-target="#EditFolderNameInDetail<?= str_replace('.','',$folderBackend[4]); ?>">
                                <img class="float-right export-png" src="<?= asset('setup/edit.png'); ?>"
                                    style="max-width:10px;margin-left: 5px;margin-top:9px">
                            </a>

                            <!-- Modal Edit Name Folder -->
                            <div class="modal fade" id="EditFolderNameInDetail<?= str_replace('.','',$folderBackend[4]); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Nama Folder </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= controller('setup@editNamaFolderBackend', 'backend/'.$folderBackend[4]); ?>" method="POST">
                                            <div class="modal-body">
                                                <div class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                                                            value="<?= $folderBackend[4] ?>">
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

                        <!-- Collapse untuk detail file dari folder -->
                        <div class="collapse multi-collapse" id="multiCollapseExample1<?= $folderBackend[4] ?>">
                            <!-- Looping untuk mendapatkan file -->
                            <?php
                                foreach (glob("../resource/views/backend/$folderBackend[4]/*") as $key => $fileBackend) :
                                $fileBackend = explode('/', $fileBackend);
                            ?>
                            <span class="file-backend" data-file="backend/<?= "$folderBackend[4]/$fileBackend[5]" ?>" style="margin-left: 10px;" data-toggle="collapse" href="#multiCollapseExample1<?= $fileBackend[5] ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1<?= $folderBackend[4] ?>">
                                <img src="<?= asset('setup/file.png'); ?>" style="max-width:16px;">
                                <a href="<?php controller('setup@EditorModeDetailFile', "../resource/views/backend/$folderBackend[4]/$fileBackend[5]") ?>"><?= $fileBackend[5] ?></a>

                            <!-- HAPUS FILE -->
                            <a class="delete-table float-right" data-table="<?= $fileBackend[5] ?>"
                                data-url="<?= controller('setup@deleteFileBackend',  $folderBackend[4] . "/" . $fileBackend[5]); ?>">
                                <img class="delete-png" src="<?= asset('setup/cancel.png'); ?>"
                                    style="max-width:8px;margin-left: 5px;margin-bottom: 3px;">
                            </a>

                            <!-- EDIT NAMA FILE -->
                            <a data-toggle="modal" class="float-right"
                                data-target="#modalEditNamaFile<?= str_replace('.','',$fileBackend[5]); ?>">
                                <img class="export-png edit-name" src="<?= asset('setup/edit.png'); ?>"
                                    style="max-width:8px;margin-left: 5px;margin-bottom: 3px;">
                            </a>

                            <!-- MODAL EDIT NAMA FILE -->
                            <div class="modal fade" id="modalEditNamaFile<?= str_replace('.','',$fileBackend[5]); ?>" tabindex="-1"
                                role="dialog" aria-labelledby="modalEditNamaFileLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalEditNamaFileLabel">Edit Nama File </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form
                                            action="<?= controller('setup@editNamaFileBackend', 'backend/'.$fileBackend[4]); ?>"
                                            method="POST">
                                            <div class="modal-body">
                                                <div class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <input type="text" readonly class="form-control-plaintext"
                                                            id="staticEmail2" value="<?= $fileBackend[5] ?>">
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="inputPassword2" class="sr-only">Nama Baru</label>
                                                        <input autofocus name="new_name_file" required type="text"
                                                            class="form-control nama-file-baru" id="inputPassword2"
                                                            placeholder="Nama Baru">
                                                    </div>
                                                    <input type="hidden" name="old_file" value="<?= $fileBackend[5] ?>">
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
                            
                            </span><br>
                            <?php endforeach ?>
                        </div>
                        <br <?= $attr ?>>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse ml-2 mt-2" id="CollapseMenuController">
                <div class="card">
                    <div class="card-header" style="background-color: #3B3B98;color:white">
                        Controllers
                        <a data-toggle="modal" data-target="#AddNewFileController" style="cursor:pointer;float:right"><img src="<?= asset('setup/add-file.png'); ?>" style="max-width: 20px;cursor:pointer" alt="">
                        </a>
                    </div>
                    <div class="card-body">
                        <?php
                            foreach (glob("../controller/*") as $key => $fileController) :
                            $fileController = explode('/', $fileController);
                        ?>
                        <span>
                            <img class="export-png" src="<?= asset('setup/controller.png'); ?>" style="max-width:16px;">
                            <a href="<?php controller('setup@EditorModeDetailFile', "../controller/$fileController[2]") ?>"><?= $fileController[2] ?></a>

                            <!-- HAPUS CONTROLLER -->
                            <a class="delete-table" data-table="<?= $fileController[2] ?>" data-url="<?= controller('setup@deleteFileController', $fileController[2]); ?>">
                                <img class="delete-png float-right" src="<?= asset('setup/cancel.png'); ?>" style="max-width:8px;margin-left: 5px;margin-top:11.3px">
                            </a>
                        </span><br>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ADD FILE BACKEND -->
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
                    <form action="<?= controller('setup@CreateFolderAndFileBackend'); ?>" method="POST" enctype="multipart/form-data">
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
                                <button type="submit" class="btn btn-sm btn-primary shadow">Buat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END ADD FILE BACKEND -->

<!-- ADD FILE CONTROLLER -->
<div class="modal fade" id="AddNewFileController" tabindex="-1" role="dialog"
    aria-labelledby="AddNewFileControllerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span style="font-size: 20px;font-family:calibri">Buat Controller</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                <div>
                    <form action="<?= controller('setup@CreateController'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Controller </label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <input class="form-control" name="controller" type="text" required placeholder="AwesomeController">
                                            <small id="emailHelp" class="form-text text-muted">Isikan nama controller yang
                                                ingin anda buat.</small>

                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fungsi Otomatis</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6" style="margin-top: 8px;">

                                            <input type="checkbox" checked name="auto_function" id="">
                                            <small id="emailHelp" class="form-text text-muted">
                                                Jika anda centang, maka <code>function dasar</code> otomatis akan terbuat,
                                                seperti : <br>
                                                <code>TambahData()</code>, <code>EditData()</code>,
                                                <code>UpdateData()</code>, <code>HapusData()</code>
                                            </small>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-outline-info btn-sm">Bantuan</button>
                                <button type="submit" class="btn btn-sm btn-primary shadow">Buat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END FILE CONTROLLER -->