<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow:2px 2px 36px #e1e1e1">
                <div class="card-header">
                    <span style="font-size: 20px;font-family:calibri"> <b>Tabel : </b> <?= $data->table[0] ?></span>
                    <a href="../../Config/database.php?backupAllData=<?= $data->table[0] ?>"></a>
                </div>
                
                <div class="card-body">
                    <form class="table-responsive">
                        <table class="table table-bordered table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <?php  
                                        $table = $data->table[0];
                                        $database = $data->table[0];
                                        $data = $host->query("SELECT DATA_TYPE,COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$DATABASE' AND TABLE_NAME = '$table'");
                                        while ($list = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <th class="th" data-column="<?= $list['COLUMN_NAME'] ?>"><?= $list['COLUMN_NAME'] ?></th>
                                            <?php
                                        }
                                    ?>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        $query = $host->query("SELECT * FROM $table");
                                        while ($listColumn = mysqli_fetch_row($query)) {
                                            ?>
                                                <tr>
                                                    <?php
                                                        for ($i=0; $i < count($listColumn)  ; $i++) { 
                                                            echo "<td class='name-of-column'>".$listColumn[$i]."</td>";
                                                        }
                                                    ?>
                                                    <td>
                                                        <a href="<?= controller('SetupController@deleteRowData',$listColumn[0]."/".$table) ?>" class="btn btn-danger btn-sm hover-btn"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php    
                                        }
                                    ?>
                            </tbody>
                        </table><br>
                    </form>
                    <div class="float-right mt-4">
                        <a href="<?= url('setup/table') ?>" class="btn btn-danger btn-sm">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>