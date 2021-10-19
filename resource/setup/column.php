<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <form action="<?= controller('setup@updateColumn') ?>" method="POST">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group" data-toggle="tooltip" title="Nama Table">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-table"></i></div>
                                    </div>
                                    <input type="text" name="nama_table" class="form-control form-control-sm" placeholder="Nama Table" value="<?= $data->table[0]; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group " data-toggle="tooltip" title="Total Kolom">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" ><i class="fa fa-calculator"></i></div>
                                    </div>
                                    <input type="text" class="form-control form-control-sm total-table" placeholder="Nama Table" disabled>
                                </div>
                            </div>
                            <div class="col-md-1 ml-auto">
                                <button class="btn float-right add-column btn-primary btn-sm" type="button"> <i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th width="30%">Nama Kolom</th>
                                    <th width="20%">Jenis</th>
                                    <th width="20%">Panjang / Nilai</th>
                                    <th>
                                        <center data-toggle="tooltip" data-placement="top" title="Auto Increment">A_I</center>
                                    </th>
                                    <th>
                                        <center>Primary</center>
                                    </th>
                                    <th>
                                        <center>Null</center>
                                    </th>
                                    <th>
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $table = $data->table[0];
                                $query = $host->query("DESC " . $table);
                                

                                $no = 1;

                                $db_primary_key = "";
                                $db_auto_increment = "";
                                while ($see = mysqli_fetch_assoc($query)) {
                                    $primary_key = ($see["Key"] == "PRI") ? "checked value='".$see["Field"]."'" : "";
                                    if ($see["Key"] == "PRI") {
                                        $db_primary_key = $see["Field"];
                                    }
                                    if ($see["Extra"] == "auto_increment") {
                                        $db_auto_increment = $see["Field"];
                                    }

                                    $tipe     = explode("(", $see["Type"]);
                                    $dataType = $tipe[0];
                                    @$jumlah  = explode(")", $tipe[1]);
                                ?>
                                    <input type="hidden" value="<?= $table ?>" name="table">
                                    <tr>
                                        <td><input name="name_column[]" tabindex="1" required type="text" class="form-control input-table name_column <?php echo ($see["Key"] == "PRI") ? "old_primary" : ""; ?> <?php echo ($see["Extra"] == "auto_increment") ? "old_auto_increment" : ""; ?>" value="<?php echo $see["Field"]; ?>" ></td>
                                        
                                        <td>
                                            <select name="type_data[]" tabindex="3" id="" class="form-control js-example-basic-single input-table">
                                                <?php
                                                    $type_data = $host->query("SELECT * FROM type_data");
                                                    while ($listTypeData = mysqli_fetch_assoc($type_data)) {
                                                ?>
                                                    <option <?php echo ($listTypeData['name_data'] == strtoupper($dataType)) ? "selected" : "";?> value="<?= $listTypeData['type_data'] ?>-<?= $listTypeData['name_data'] ?>"><?= $listTypeData['name_data'] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>

                                        </td>
                                        <td><input name="length[]" tabindex="5" required type="number" class="form-control input-table" value="<?php echo $jumlah[0]; ?>"></td>
                                        <td>
                                            <center><input class="input-table" tabindex="6" <?php echo ($see["Extra"] == "auto_increment") ? "checked value='".$see["Field"]."'" : ""; ?> name="auto_increment" type="radio"></center>
                                        </td>
                                        <td>
                                            <center><input class="input-table" tabindex="7" <?php echo ($see["Key"] == "PRI") ? "checked value='".$see["Field"]."'" : ""; ?> name="primary_key" type="radio"></center>
                                        </td>
                                        <td>
                                            <center><input class="input-table" tabindex="7" <?php echo ($see["Null"] == "YES") ? "checked" : ""; ?> name="is_null[]" type="checkbox"></center>
                                        </td>
                                        <td>
                                            <center><a class="btn btn-danger btn-sm delete-column"><i class="fa fa-trash"></i></a></center>
                                        </td>
                                        <input name="deleted[]" type="hidden" class="deleted" value="">
                                        <input name="total_column[]" type="hidden" value="">
                                        <input name="primary" type="hidden" value="">
                                    </tr>
                                    <input name="new_data[]" type="hidden" value="no">
                                    <?php } ?>
                                    <input name="primary_old" type="hidden" <?php echo (!empty($db_primary_key)) ? "value='$db_primary_key'" : ""; ?>>
                                    <input name="auto_increment_old" type="hidden" <?php echo (!empty($db_auto_increment)) ? "value='$db_auto_increment'" : ""; ?>>
                            </tbody>
                        </table>
                        <div class="float-right mt-3">
                            <button tabindex="8" type="submit" class="btn btn-primary btn-sm" name="send">
                                Simpan
                            </button>
                            <?php
                            if (@$data->check[0]) {
                            ?>
                                <a href="<?= controller('setup@cancel_table', $data->check[0]) ?>" class="btn btn-danger btn-sm">
                                    Batal
                                </a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= url('setup/table') ?>" class="btn btn-danger btn-sm">
                                    Kembali
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>