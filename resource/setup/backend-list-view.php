<style>
    .export-png {
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
    }

    .delete-png {
        filter: invert(48%) sepia(42%) saturate(3927%) hue-rotate(333deg) brightness(99%) contrast(86%);
    }

    .link:hover {
        color: #0fbcf9
    }
</style>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri">Buat Folder & File</span>
                </div>
                <form action="<?= controller('setup@CreateFolderAndFileBackend') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Folder </label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-4">

                                        <input class="form-control name-folder" name="folder" type="text" required placeholder="AwesomeFolder">
                                        <small id="emailHelp" class="form-text text-muted">Isikan nama folder yang
                                            ingin anda buat.</small>

                                    </div>
                                    <div class="col-md-4">

                                        <select name="exist_folder" id="" class="exist_folder form-control">
                                            <option value="" selected disabled>-Pilih Folder-</option>

                                            <?php

                                            foreach (glob("../resource/views/backend/*") as $key => $see) {

                                                $see = explode('/', $see);

                                                ?>
                                                <option value="<?= $see[4] ?>"><?= $see[4] ?></option>
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

                                        <input placeholder="AwesomeFile" type="text" name="file" class="form-control">

                                        <small id="emailHelp" class="form-text text-muted">Isikan nama file yang
                                            ingin anda buat di dalam folder <code class="append-folder-name"></code>.</small>

                                    </div>
                                    <div class="col-md-4" style="margin-top: 8px;">

                                        <select name="type_view" class="form-control" id="">
                                            <option disabled selected>-Pilih Tipe-</option>
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
                            <button type="submit" class="btn btn-outline-info btn-sm">Bantuan</button>
                            <button type="submit" class="btn btn-sm btn-primary">Buat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri">Folder & File</span>
                </div>
                <div class="card-body" style="margin-top: -30px;">
                    <div id="accordion">
                        <?php
                        foreach (glob("../resource/views/backend/*") as $key => $see) {

                            $see = explode('/', $see);

                            ?>
                            <br>
                            <span style="color:#4b6584; margin-top:150px">
                                <?= $see[4] ?>
                            </span>
                            <?php
                                foreach (glob("../resource/views/backend/$see[4]/*") as $key => $seefile) {

                                    $seefile = explode('/', $seefile);
                                    $seefile = $seefile[5];
                                    ?>
                                <div style="padding: 5px;border-bottom: 2px solid #e1e1e1;">
                                    <img src="<?= asset('setup/file.png') ?>" style="max-width:20px"> <a href="<?= controller('setup@detailFileBackend', $see[4] . "/" . $seefile) ?>" class="link" style="color:#1e272e"><?= $seefile ?></a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>