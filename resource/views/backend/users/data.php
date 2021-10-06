<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            DATA USERS
        </h3>
        <a href="form" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>                        
                        <th>Nama</th>                   
                        <th>Email</th>                   
                        <th>Password</th>                   
                        <th>Action</th>                        
                    </tr>
                </thead>
                <tbody>
                   <?php foreach( query()->table('users')->get() as $data ) { ?>
										<tr>
												 <td><?= $no++ ?></td>
												 <td><?= $data['nama'] ?></td>
												 <td><?= $data['email'] ?></td>
												 <td><?= $data['password'] ?></td>
												<td>
														<a href="<?= controller('UsersController@HapusData',$data['id']) ?>" class="btn btn-danger">Hapus</a>
														<a href="<?= controller('UsersController@EditData',$data['id']) ?>" class="btn btn-warning">Edit</a>
												</td>
										</tr>
										<?php } ?>
                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>