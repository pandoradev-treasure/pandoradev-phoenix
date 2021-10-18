<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            data
        </h3>

        <a href="form" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( query()->table("coba")->get() AS $item ){ ?>
                     <tr>
                        <td> <?= $no++ ?> </td>
                        <td> <?= $item["nama"] ?> </td>
                       
                        <td> 
                            <a href="" class="btn btn-danger btn-sm shadow">Hapus</a>
                            <a href="<?php controller('coba_controller@EditData',$item['id']) ?>" class="btn btn-primary btn-sm shadow">Edit</a>
                        </td>
                     </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>