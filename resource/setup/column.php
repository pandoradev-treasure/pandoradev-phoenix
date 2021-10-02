<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri"> <i class="fa fa-file"></i> <?= $data->table[0]; ?></span>
                    <button class="btn float-right add-column btn-primary" type="submit"> <i class="fa fa-plus"></i> </button>
                </div>
                <div class="card-body">
                    <form action="<?= controller('setup@processColumn') ?>" method="POST">
                        <table class="table table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th width="30%">Nama</th>
                                    <th width="20%">Jenis</th>
                                    <th width="20%">Panjang / Nilai</th>
                                    <th><center>Auto Increment</center></th>
                                    <th><center>Primary</center></th>
                                    <th><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php  

                                        $table = $data->table[0];
                                        $query = $host->query("SHOW COLUMNS FROM ".$table);

                                        $no = 1;
                                        while ($see = mysqli_fetch_row($query)) {

                                            $tipe     = explode("(", $see[1]); 
                                            $dataType = $tipe[0];
                                            
                                            @$jumlah  = explode(")", $tipe[1]); 
                                    ?>
                                    <input type="hidden" value="<?= $table ?>" name="table">
                                    <tr>
                                        <td><input name="name_column[]" tabindex="1" required type="text" class="form-control" value="<?php echo $see[0]; ?>"></td>
                                        <td>
                                            <select name="type_data[]" id="" class="form-control js-example-basic-single">
                                                <?php
                                                    $data = $host->query("SELECT * FROM type_data");
                                                    var_dump($data);
                                                    while ($listTypeData = mysqli_fetch_assoc($data)) {
                                                        ?>
                                                            <option  
                                                            <?php
                                                            
                                                                if ($listTypeData['type_data'] == strtoupper($dataType)) {
                                                                    echo "selected";
                                                                }
                                                            ?>
                                                            value="<?= $listTypeData['type_data'] ?>"><?= $listTypeData['type_data'] ?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>

                                        </td>
                                        <td><input name="lenght[]" required type="number" class="form-control" value="<?php echo $jumlah[0]; ?>"></td>
                                        <td><center><input 
                                                <?php  
                                                    if ($see[2] == "NO") {
                                                        echo "checked";
                                                    }
                                                ?> 
                                            name="auto_increment[]" type="radio"></center></td>
                                        <td>
                                            <center><input
                                                <?php  
                                                    if ($see[3] == "PRI") {
                                                        echo "checked";
                                                    }
                                                ?> 
                                            name="primary_key[]" type="radio"></center>
                                        </td>
                                        <td>
                                            <center><a class="btn btn-danger btn-sm delete-column"><i class="fa fa-trash"></i></a></center>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table><br>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary btn-sm" name="send">
                                Simpan
                            </button>
                            <?php
                                if (@$_GET['first']) {
                                    ?>
                                    <a href="../../Config/database.php?cancel-table=<?= $table ?>" class="btn btn-danger btn-sm">
                                        Batal
                                    </a>
                                    <?php
                                }else{
                                    ?>
                                    <a href="<?= url('setup/table') ?>" class="btn btn-danger btn-sm">
                                        Kembali
                                    </a>
                                    <?php
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>