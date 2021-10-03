<style>
    .export-png {
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
    }

    .delete-png {
        filter: invert(48%) sepia(42%) saturate(3927%) hue-rotate(333deg) brightness(99%) contrast(86%);
    }
</style>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri">Buat Controller</span>
                </div>
                <form action="<?= controller('setup@CreateController') ?>" method="POST" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-sm btn-primary">Buat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri">File Controller</span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <?php
                            foreach (glob("../controller/*") as $key => $see) {

                                $explode = explode("/", $see);
                                ?>
                                <tr>
                                    <th>
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= str_replace('.','',$explode[2]) ?>">
                                            <?= $explode[2] ?>
                                        </button>
                                    </th>
                                    <th>
                                        <a target="_blank" href="<?= controller('setup@detailFile', $explode[2]) ?>">
                                            <img class="export-png" src="<?= asset('setup/export.png') ?>" style="max-width:20px;margin-left: 5px;margin-bottom: 3px;">
                                        </a>
                                        <a class="delete-table" data-table="<?= $explode[2] ?>" data-url="<?= controller('setup@deleteFileController', $explode[2]) ?>">
                                            <img class="delete-png" src="<?= asset('setup/delete.png') ?>" style="max-width:20px;margin-left: 5px;margin-bottom: 3px;">
                                        </a>
                                    </th>
                                </tr>
                                <div class="modal fade" id="exampleModal<?= str_replace('.','',$explode[2]) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= $explode[2] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="mb-3" id=<?= $explode[2] ?>>
<?= file_get_contents('../controller/' . $explode[2]) ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>