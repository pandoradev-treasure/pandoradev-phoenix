<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        Data Buku
    </h3>
    <a href="<?= controller('BukuController@create') ?>" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content p-0">
        <table class="table table-striped data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Deskripsi Singkat</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $data = query()->table('buku')
                                   ->select('buku.*, buku.id, kategori.nama AS nama_kategori')
                                   ->join('kategori','kategori.id = buku.kategori_id')
                                   ->orderBy('buku.id','DESC')
                                   ->get();

                    foreach ($data as $value) {
                        
                        tr();
                            
                            td($no++);
                            td($value['judul']);
                            td($value['deskripsi']);
                            td($value['deskripsi_singkat']);
                            td($value['penulis']);
                            td($value['nama_kategori']);
                            td(
                                tombolHapus(controller('BukuController@destroy', $value['id'])).
                                tombolEdit(controller('BukuController@edit', $value['id']))
                            );

                        endtr();

                    }
                    
                ?>
            </tbody>
        </table>
    </div>
  </div><!-- /.card-body -->
</div>