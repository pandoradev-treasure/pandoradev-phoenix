<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        Form Kota
    </h3>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content p-0">

      <form action="<?= controller('PercobaanController','store') ?>" method="POST">
        <label for="">Nama Kota</label>
        <input type="text" name="nama" class="form-control">

        <?php tombolForm() ?>
      </form>

    </div>
  </div><!-- /.card-body -->
</div>