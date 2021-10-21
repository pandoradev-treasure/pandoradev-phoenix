<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tambah Buku
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("BukuController@TambahData") ?>" method="POST" enctype="multipart/form-data">
        
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
								
								<div class="form-group">
                    <label for="">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control">
                </div>
								
								<div class="form-group">
                    <label for="">Cover</label>
                    <input type="file" name="cover" class="form-control">
                </div>
								
								<button type="button" class="tambah-detail btn btn-primary btn-sm shadow mb-3">
										Tambah Detail
								</button>
								
								<table class="table table-striped table-responsive">
										<thead>
											<tr>
												<td>Nama Penerbit</td>
					            </tr>
										</thead>
										<tbody></tbody>
								</table>
								
                <?php tombolForm() ?>
                <!-- Agar fungsi tombol kembali berfungsi dengan baik, pastikan anda punya file dengan nama data.php -->
								
            </form>
        </div>
    </div><!-- /.card-body -->
</div>