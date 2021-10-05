<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller('BukuController@store') ?>" method="POST">
        
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
								
								<div>
                    <label for="">Deskripsi</label>
                    <input type="text" name="deskripisi" class="form-control">
                </div>

                <?php tombolForm() ?>

            </form>
        </div>
    </div><!-- /.card-body -->
</div>