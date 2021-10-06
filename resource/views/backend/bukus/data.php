<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
        <a href="<?= url('backend/buku/form') ?>" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
										<?php
												foreach( query()->table('buku')->get() as $dataBuku ){
										?>
                    <tr>
												<td><?= $no++ ?></td>
												<td><?= $dataBuku['judul'] ?></td>
												<td><?= $dataBuku['deskripsi'] ?></td>
												<td>
													<a href="<?php controller('BukuController@delete', $dataBuku['id']) ?>" class="btn btn-danger btn-sm">hapus</a>
												</td>
                    </tr>
										<?php } ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>