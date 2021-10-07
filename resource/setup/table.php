<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="alert alert-light" role="alert">
            <span style="font-size: 20px;font-family:calibri"><?= $DATABASE ?></span> <a href="database" style="cursor: pointer;" class="">⚙️</a>
            </div>
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">

                    <div class="float-left">
                        <form class="form-inline" action="<?= controller('setup@store') ?>" method="POST">
                            <div class="form-group mr-2">
                                <input type="text" required class="form-control form-control-sm" placeholder="Nama Tabel" name="nama_table" autofocus>
                                <input type="hidden" required class="form-control" value="true" name="check">
                            </div>
                            <button class="btn  btn-info btn-sm" name="tambah_table" type="submit"><i class="fa fa-plus"></i></button>

                        </form>
                    </div>
                    
                    <div class="btn-group float-right">
                        <a href="<?= controller('setup@backupAllTable') ?>" class="btn btn-sm btn-outline-primary"><i class="far fa-task"></i>Backup Table</a>
                        <a href="<?= controller('setup@importAllTable') ?>" class="btn btn-sm btn-outline-success"><i class="far fa-task"></i>Import Table</a>
                    </div>
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