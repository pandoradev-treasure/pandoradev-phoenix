<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        Form Edit Buku
    </h3>
  </div><!-- /.card-header -->
  <div class="card-body">

    <div class="tab-content p-0">

      <form action="<?= controller('BukuController@update', $data->dataBuku->id) ?>" method="POST">

        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" value="<?= $data->dataBuku->judul ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Kategori</label>
            <select name="kategori_id" id="" class="form-control">
              <option value="">- Pilih Kategori -</option>
              <?php
                foreach ($data->kategori as $key => $value) {
                  ?>

                  <option value="<?= $value->id; ?>"><?= $value->nama; ?></option>

                  <?php
                }
              ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" name="deskripsi" value="<?= $data->dataBuku->deskripsi ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Deskripsi Singkat</label>
            <input type="text" name="deskripsi_singkat" value="<?= $data->dataBuku->deskripsi_singkat ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Penulis</label>
            <input type="text" name="penulis" value="<?= $data->dataBuku->penulis ?>" class="form-control">
        </div>
        

        <button name="submit" class="btn btn-primary btn-sm shadow float-right" type="submit">Update</button>

      </form>

    </div>
  </div><!-- /.card-body -->
</div>