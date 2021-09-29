<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri"><?= $DATABASE ?></span> <a href="database" style="cursor: pointer;" class="">⚙️</a>
                    <a href="../../Config/database.php?backupAllTable=true" class="float-right btn btn-sm btn-primary"><i class="far fa-task"></i>Backup Table</a>
                </div>
                <div style="margin-top: 20px;" class="float-left">
                    <form class="form-inline" action="<?= controller('SetupController@store') ?>" method="POST">
                        <div class="form-group mx-sm-3">
                            <input type="text" required class="form-control" placeholder="Nama Tabel" name="nama_table">
                        </div>
                        <button class="btn add-column btn-primary btn-sm" name="tambah_table" type="submit"><i class="fa fa-plus"></i></button>
                    </form>
                </div><br>
                <div class="card-body">
                    <table class="table table-valign-middle table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Tabel</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $query = $host->query("SHOW TABLES FROM $DATABASE WHERE tables_in_".$DATABASE." != 'type_data' ");
                                $no = 1;
                                while ($see = mysqli_fetch_row($query)) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $see[0] ?></td>
                                <td>
                                    <a href="../../Config/database.php?backupTable=<?= $see[0] ?>" class="btn btn-success btn-sm hover-btn"><i class="fa fa-file"></i></a>
                                    <a href="<?= controller('SetupController@viewData',$see[0]) ?>" class="btn btn-warning btn-sm hover-btn"><i class="fa fa-eye"></i></a>
                                    <a href="<?= controller('SetupController@edit', $see[0]) ?>" class="btn btn-primary btn-sm hover-btn"><i class="fa fa-edit"></i></a>
                                    <a href="<?= controller('SetupController@deleteTable', $see[0]) ?>" class="btn btn-danger btn-sm hover-btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table><br>
                </div>
            </div>
        </div>
    </div>
</div>