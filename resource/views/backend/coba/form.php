<div class="card">
    <div class="card-header">
        <h3 class="card-title">
        <?php 
                var_dump($_SESSION)
                 
            ?>
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="<?php controller("coba_controller@TambahData") ?>" method="POST">
        
                <div class="form-group">
                    <label for="">nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>

                <?php tombolForm() ?>

            </form>
        </div>
    </div><!-- /.card-body -->
</div>