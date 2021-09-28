<div class="card">
  <div class="card-header">
    <h3 class="card-title">
        Data Kota
    </h3>
    <a href="form" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
  </div><!-- /.card-header -->
  <div class="card-body">
    <div class="tab-content p-0">
        <table class="table table-striped data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach (Query::select('kota') as $value) {

                        tr();
                            
                            td($no++);
                            td($value['nama']);
                            td(
                                tombolHapus(controller('PercobaanController','destroy', $value['id']))
                            );

                        endtr();

                    }
                    
                ?>
            </tbody>
        </table>
    </div>
  </div><!-- /.card-body -->
</div>