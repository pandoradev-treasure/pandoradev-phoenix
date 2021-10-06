<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabel Tambah Kategori
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller('KategoriController@TambahData') ?>" method="POST">
        
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control">
								</div>

                <?php tombolForm() ?>

            </form>
        </div>
    </div><!-- /.card-body -->
</div>