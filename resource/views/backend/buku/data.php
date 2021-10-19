<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
        <a href="<?php url("backend/folder/file") ?>" class="btn btn-sm btn-primary shadow float-right">
            <i class="fa fa-plus"></i>
        </a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kolom 1</th>
                        <th>Kolom 2</th>
                        <th>Kolom 3</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach( query()->table("nama_table")->get() AS $item ){ ?>

                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $item["name_column"] ?> </td>
                            <td> <?= $item["name_column"] ?> </td>
                            <td> <?= $item["name_column"] ?> </td>
                            <td>
                                <!-- Tombol Hapus -->
                                <a href="<?php controller("NamaController@HapusData", $item["id"]) ?>" class="btn btn-danger btn-sm shadow">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <!-- Tombol Edit -->
                                <a href="<?php controller("NamaController@EditData", $item["id"]) ?>" class="btn btn-primary btn-sm shadow">
                                    <i class="fa fa-edit"></i>
                                </a>

                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>