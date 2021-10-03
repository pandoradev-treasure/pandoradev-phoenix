<style>
    .export-png {
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
    }
</style>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <form action="<?= controller('setup@UpdateController', $data->file[0]) ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="card-header">
                        📁<span style="font-size: 20px;font-family:calibri"><code><?= $data->file[0] ?></code></span> |
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Simpan
                        </button>
                    </div>
                    <div class="card-body">
                        <textarea class="mb-3 data-code-old" id=<?= $data->file[0] ?>>
<?= file_get_contents('../controller/'.$data->file[0]) ?>
                    </textarea>
                        <textarea style="display: none;" name="data_new_code" class="data-code" id="" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>