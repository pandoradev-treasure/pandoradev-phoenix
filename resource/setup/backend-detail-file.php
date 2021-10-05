<style>
    .export-png {
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div>
            <div class="" style="box-shadow:2px 2px 36px #e1e1e1">
                <form action="<?= controller('setup@UpdateFileBackend', $data->file[0]) ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="card-header">
                        <?php
                            if ($data->file[0]) {
                        ?>
                        <span
                            style="font-size: 20px;font-family:calibri;padding:5px;border-radius: 4px;color:#2c3e50"><?= $data->file[0] ?></span>

                        <button type="submit" class="btn ml-2 btn-outline-primary float-right btn-sm save-file">
                            Simpan
                        </button>
                        <a class="btn btn-outline-warning float-right btn-sm preview" data-toggle="modal"
                            data-target="#exampleModalPreview">
                            Preview
                        </a>
                        <?php }else{
                            echo "<code>Pilih file terlebih dahulu!</code>";
                        } ?>

                    </div>
                    <textarea class="mb-3 data-code-old" id="code-mirror"><?= file_get_contents('../resource/views/backend/'.$data->file[0]) ?></textarea>
                    <div class="card-body">
                        <textarea style="display: none;" name="data_new_code" class="data-code" id="" cols="30"
                            rows="10"></textarea>
                    </div>
                </form>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Nama Controller </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= controller('setup@editNamaController') ?>" method="POST">
                                <div class="modal-body">
                                    <div class="form-inline">
                                        <div class="form-group mb-2">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                                                value="<?= $data->file[0] ?>">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="inputPassword2" class="sr-only">Nama Baru</label>
                                            <input name="new_name_file" required type="text" class="form-control"
                                                id="inputPassword2" placeholder="Nama Baru">
                                        </div>
                                        <input type="hidden" name="old_file" value="<?= $data->file[0] ?>">
                                        <textarea style="display: none;" name="data_new_code" class="data-code" id=""
                                            cols="30" rows="10"></textarea>
                                        <button type="submit" class="btn btn-primary btn-sm mb-2">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- for preview result -->
    <div class="modal fade" id="exampleModalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="result-preview"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
</div>