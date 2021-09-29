<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header" >
                    <span style="font-size: 20px;font-family:calibri">Konfigurasi Database</span>
                </div>
                <form action="<?= controller('SetupController@createDB') ?>" method="POST">
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Database</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <input class="form-control form-control-sm" name="database" type="text" placeholder="Nama Database">

                                        <small id="emailHelp" class="form-text text-muted">Isikan nama database yang ingin anda buat.</small>
                                    </div>
                                    <div class="col-md-6">

                                        <select name="exist_database" class="js-example-basic-single form-control">
                                            <option value="" selected>-Pilih yang sudah tersedia-</option>
                                            <?php
                                                    // Usage without mysql_list_dbs()
                                                    $link = mysqli_connect('localhost', 'root', '');
                                                    $res = mysqli_query($link,"SHOW DATABASES");

                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                        ?>
                                            <option value="<?= $row['Database'] ?>"><?= $row['Database'] ?></option>
                                                <?php
                                                    }
                                                ?>
                                        </select>
                                        
                                        <small id="emailHelp" class="form-text text-muted">Atau pilih dari yang sudah tersedia.</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Host</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="host" type="text" value="" placeholder="localhost">
                                <small id="emailHelp" class="form-text text-muted">Isikan nama server database
                                    anda, default <b>localhost</b>.</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">User</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="user" type="text" placeholder="root">
                                <small id="emailHelp" class="form-text text-muted">Isikan nama user database anda, default <b>root</b>.</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="password" type="text" placeholder="password">
                                <small id="emailHelp" class="form-text text-muted">Isikan password database anda.</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Auth</label>
                            <div class="col-sm-10">
                                <select name="featured_auth" class="form-control w-50" id="">
                                    <option value="" disabled selected>-Pilih Opsi-</option>
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Tidak Aktif</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Jika anda pilih <b>aktif</b>
                                    maka fitur login & register akan otomatis terbuat.</small>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" name="process-configuration"
                                class="btn btn-sm btn-primary">Selesai</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>