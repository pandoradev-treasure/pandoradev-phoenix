<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Edit Data
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller('KategoriController@UpdateData',$data->data->id) ?>" method="POST">
        
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data->data->nama ?>">
                </div>

                <?php tombolForm() ?>

            </form>
        </div>
    </div><!-- /.card-body -->
</div>