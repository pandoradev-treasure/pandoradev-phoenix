<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            KATEGORI
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
                        <th>Action</th>                        
                    </tr>
                </thead>
                <tbody>
                   <?php foreach( query()->table('kategori')->get() as $data ) { ?>
										<tr>
												 <td><?= $no++ ?></td>
												 <td><?= $data['nama'] ?></td>
												<td>
														<a href="<?= controller('KategoriController@HapusData',$data['id']) ?>" class="btn btn-danger">Hapus</a>
														<a href="<?= controller('KategoriController@EditData',$data['id']) ?>" class="btn btn-warning">Edit</a>
												</td>
										</tr>
										<?php } ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>