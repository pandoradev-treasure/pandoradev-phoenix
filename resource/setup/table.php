<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="alert alert-light" role="alert">
            <span style="font-size: 20px;font-family:calibri"><?= $DATABASE ?></span> <a href="database" style="cursor: pointer;" class="">⚙️</a>
            </div>
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri"><?= $DATABASE ?></span> <a href="database" style="cursor: pointer;" class="">⚙️</a>
                    <a href="<?= controller('setup@backupAllTable') ?>" class="float-right btn btn-sm btn-primary"><i class="far fa-task"></i>Backup Table</a>
                    <a class="delete-table" data-denied="gagal cuy" data-url="<?= controller('setup@importAllTable') ?>" class="float-right btn btn-sm btn-success"><i class="far fa-task"></i>Import Table</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
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
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-group">

                                            <a  href="<?= controller('setup@backupTable', $see[0]) ?>" class="btn btn-success btn-sm hover-btn mr-1" data-toggle="tooltip" title="Backup This Table"><i class="fa fa-file"></i></a>
                                            <a href="<?= controller('setup@viewData',$see[0]) ?>" class="btn btn-warning btn-sm hover-btn mr-1" data-toggle="tooltip" title="Show Data"><i class="fa fa-eye"></i></a>
                                            <a href="<?= controller('setup@edit', $see[0]) ?>" class="btn btn-primary btn-sm hover-btn mr-1" data-toggle="tooltip" title="Edit Table"><i class="fa fa-edit"></i></a>
                                            <a data-table="<?= $see[0] ?>" data-url="<?= controller('setup@deleteTable', $see[0]) ?>" class="btn btn-danger btn-sm hover-btn mr-1 delete-table" data-toggle="tooltip" title="Delete Table"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
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