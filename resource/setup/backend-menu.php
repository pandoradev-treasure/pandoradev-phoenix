<style>
    .export-png {
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div>
            <div class="" style="box-shadow:2px 2px 36px #e1e1e1">
                <form action="<?= controller('setup@UpdateFileMenuBackend') ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri;padding:5px;border-radius: 4px;color:#2c3e50">layouts/backend/menu.php</span>

                        <button type="submit" class="btn save-file btn-outline-primary float-right btn-sm">
                            Simpan
                        </button>
                    </div>
                    <textarea class="mb-3 data-code-old" id="code-mirror">
<?= file_get_contents('../resource/layouts/backend/menu.php') ?>
                </textarea>
                    <div class="card-body">
                        <textarea style="display: none;" name="data_new_code" class="data-code" id="" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>