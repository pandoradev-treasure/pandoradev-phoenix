<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        Form Kategori
    </h3>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content p-0">

      <form action="<?= controller('KategoriController@store') ?>" method="POST">

        <div class="form-group">
            <label for="">Nama Kategoi</label>
            <input type="text" name="nama_kategori" class="form-control">
        </div>

        <?php tombolForm() ?>

      </form>

    </div>
  </div><!-- /.card-body -->
</div>