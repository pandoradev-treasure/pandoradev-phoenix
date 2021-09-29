<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Data Kategori
        </h3>
        <a href="form" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-striped data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach (Query::select('kategori') as $value) {
                        tr();
                            td($no++);
                            td($value['nama']);
                            td(
                                tombolHapus()
                            );
                        endtr();
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>