<style>
    .export-png{
        filter: invert(38%) sepia(33%) saturate(2930%) hue-rotate(193deg) brightness(112%) contrast(102%);
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

                                        <input class="form-control" name="controller" type="text"
                                            placeholder="AwesomeController">
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
                    <?php
                        foreach (glob("../controller/*") as $key => $see) {
                        
                        $explode = explode("/",$see);
                    ?>
                    <p>
                        <a class="btn btn-outline-primary" style="max-width: 400px;margin-bottom:10px"
                            data-toggle="collapse" href="#collapseExample<?= str_replace(".","",$explode[2]) ?>"
                            role="button" aria-expanded="false"
                            aria-controls="collapseExample<?= str_replace(".","",$explode[2]) ?>">
                            <?= $explode[2] ?>
                        </a>
                        <a href="<?= controller('setup@detailFile', $explode[2]) ?>">
                            <img class="export-png" src="<?= asset('export.png') ?>" style="max-width:20px;margin-left: 5px;margin-bottom: 8px;">
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample<?= str_replace(".","",$explode[2]) ?>">

                         <div style="background-color: #dfe4ea;padding:8px">
                             
                            <span>
                            📁 <code><?= $explode[2] ?></code>
                            </span>
                         </div>
                            
                        <textarea class="mb-3" id=<?= $explode[2] ?>>
<?= file_get_contents('../controller/'.$explode[2]) ?>
                        </textarea>

                        <hr>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>