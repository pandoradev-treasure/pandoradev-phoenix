<?php

    function store($request)
    {
        global $host;

        $table = $request->nama_table;

        @$query = "DROP TABLE type_data";
        $host->query($query);

        $query = "CREATE TABLE type_data (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, type_data VARCHAR(30) NOT NULL, name_data VARCHAR(30) NOT NULL)";
        $host->query($query);

        // numeric
        query()->insert('type_data',["numeric","INT"]);
        query()->insert('type_data',["numeric","TINYINT"]);
        query()->insert('type_data',["numeric","SMALLINT"]);
        query()->insert('type_data',["numeric","MEDIUMINT"]);
        query()->insert('type_data',["numeric","BIGINT"]);
        query()->insert('type_data',["numeric","DECIMAL"]);
        query()->insert('type_data',["numeric","FLOAT"]);
        query()->insert('type_data',["numeric","DOUBLE"]);
        query()->insert('type_data',["numeric","BIT"]);
        query()->insert('type_data',["numeric","BOOLEAN"]);

        // string
        query()->insert('type_data',["string","VARCHAR"]);
        query()->insert('type_data',["string","TEXT"]);
        query()->insert('type_data',["string","CHAR"]);
        query()->insert('type_data',["string","BINARY"]);
        query()->insert('type_data',["string","VARBINARY"]);
        query()->insert('type_data',["string","TINYBLOB"]);
        query()->insert('type_data',["string","BLOB"]);
        query()->insert('type_data',["string","MEDIUMBLOB"]);
        query()->insert('type_data',["string","LONGBLOB"]);
        query()->insert('type_data',["string","TINYTEXT"]);
        query()->insert('type_data',["string","MEDIUMTEXT"]);
        query()->insert('type_data',["string","LONGTEXT"]);
        query()->insert('type_data',["string","ENUM"]);
        query()->insert('type_data',["string","SET"]);

        // date
        query()->insert('type_data',["date","DATE"]);
        query()->insert('type_data',["date","TIME"]);
        query()->insert('type_data',["date","DATETIME"]);
        query()->insert('type_data',["date","TIMESTAMP"]);
        query()->insert('type_data',["date","YEAR"]);
        
        // spatial
        query()->insert('type_data',["spatial","GEOMETRY"]);
        query()->insert('type_data',["spatial","POINT"]);
        query()->insert('type_data',["spatial","LINESTRING"]);
        query()->insert('type_data',["spatial","POLYGON"]);
        query()->insert('type_data',["spatial","GEOMETRYCOLLECTION"]);
        query()->insert('type_data',["spatial","MULTILINESTRING"]);
        query()->insert('type_data',["spatial","MULTIPOINT"]);
        query()->insert('type_data',["spatial","MULTIPOLYGON"]);


        $query = "CREATE TABLE $table (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
        $host->query($query);

        $table = [$table];
        $check = [$request->check];

        view('setup/column', compact('table','check'));
    }

    // function processColumn($request)
    // {
    //     global $host;

    //     $table = $request->table;
    //     $table_new = $request->nama_table;


    //     $query = "DROP TABLE ".$table;
    //     $host->query($query);

    //     $data  = "CREATE TABLE $table_new (";

    //     for ($i=0; $i < count($request->name_column); $i++) { 

    //         if (@$request->primary_key[$i] == "on") {
    //             $primaryKey = " PRIMARY KEY";
    //         }else{
    //             $primaryKey = "";
    //         }

    //         if (@$request->auto_increment[$i] == "on") {
    //             $ai = " AUTO_INCREMENT";
    //         }else{
    //             $ai = "";
    //         }

    //         $data .= $request->name_column[$i]." ".$request->type_data[$i]."(".$request->length[$i].")".@$ai.$primaryKey.",";
    //     }

    //     $data  .= ")";

        
    //     $data   = str_replace(",)",")",$data);

    //     $host->query($data);

    //     view('setup/table');
    // }
    
    function updateColumn($request)
    {
        global $host;

        $table           = $request->table;
        $table_new       = $request->nama_table;
        
        echo "<pre>";
        $desc_table      = $host->query("DESC $table");
        
        //COLUMN
        $name_column    = $request->name_column;
        $length         = $request->length;
        $status_delete  = $request->deleted;
        $data_type_data = $request->type_data;
        $type_column    = $request->new_data;
        
        
        // PRIMARY
        $old_primary     = $request->primary_old;
        $new_primary     = $request->primary_key;
        
        // AUTO INCREMENT
        $old_auto_increment     = $request->auto_increment_old;
        $new_auto_increment     = $request->auto_increment;
        

        $sql_table = "";

        if ($table != $table_new) {
            $sql_table .= "RENAME TABLE $table TO $table_new";
        }
        for ($i=0; $i < count($request->total_column); $i++) { 
            $pecah_type_data = explode("-",$data_type_data[$i]);
            $type_data          = $pecah_type_data[0];
            $nama_type_data     = $pecah_type_data[1];

            $see_field = mysqli_fetch_array($desc_table);

            $pecah_old_type_data   = explode("(", $see_field[1]);
            $old_name_type_data    = strtoupper($pecah_old_type_data[0]);
            @$old_length_type_data = explode(")", $pecah_old_type_data[1]);

            // ADD FIELD
            if (!empty($name_column[$i]) && !empty($nama_type_data) && !empty($length[$i]) && $type_column[$i] == "yes") {
                $sql_table .= "ALTER TABLE $table ADD COLUMN ".$name_column[$i]." ".$nama_type_data."(".$length[$i].");";
            }

            // EDIT FIELD
            if ($type_column[$i] == "no") {
                if ($see_field[0] != $name_column[$i] || $old_name_type_data != $nama_type_data || $old_length_type_data[0] != $length[$i] ) {
                    if ($name_column[$i] == $old_auto_increment) {
                        $sql_table .= "ALTER TABLE $table CHANGE ".$see_field[0]." ".$name_column[$i]." ".$nama_type_data."(".$length[$i].") AUTO_INCREMENT;";
                    }else{
                        $sql_table .= "ALTER TABLE $table CHANGE ".$see_field[0]." ".$name_column[$i]." ".$nama_type_data."(".$length[$i].");";
                        
                    }
                }
            }
                
            // DELETE FIELD
            if (!empty($status_delete[$i])) {
                $sql_table .= "ALTER TABLE $table DROP COLUMN ".$name_column[$i].";";
            }

            // CHANGE PRIMARY
            if ($new_primary == $name_column[$i] && !empty($new_primary) && $old_primary != $new_primary){
                if ($old_primary == $old_auto_increment) {
                    $sql_table .= "ALTER TABLE $table CHANGE $old_auto_increment $old_auto_increment ".$nama_type_data."(".$length[$i].");";
                }
                $sql_table .= "ALTER TABLE $table DROP PRIMARY KEY;";
                
                $sql_table .= "ALTER TABLE $table ADD PRIMARY KEY ($new_primary);";
            }
            
            // CHANGE AUTO INCREMENT
            if ($new_auto_increment == $name_column[$i] && !empty($new_auto_increment)  && $old_auto_increment != $new_auto_increment) {
                
                $sql_table .= "ALTER TABLE $table CHANGE $old_auto_increment $old_auto_increment ".$nama_type_data."(".$length[$i].");";
                $sql_table .= "ALTER TABLE $table DROP PRIMARY KEY;";
                        
                $sql_table .= "ALTER TABLE $table ADD PRIMARY KEY ($new_auto_increment);";
                $sql_table .= "ALTER TABLE $table CHANGE $new_auto_increment $new_auto_increment ".$nama_type_data."(".$length[$i].") AUTO_INCREMENT;";

                if ($type_data != "numeric") {
                    $sql_table = "";
                }
            }
        }

        
        $all_sql = explode(";", $sql_table);
        for ($i=0; $i < count($all_sql); $i++) { 
            if (!empty($all_sql[$i])) {
                var_dump($all_sql[$i]);
                $check = $host->query($all_sql[$i].";");
                var_dump($check);
            }
        }
        
        view('setup/table');
    }

    function fixingUpdateColumn($request)
    {

    }
    
    function edit($request, $table)
    {
        $table = [$table];
        view('setup/column', compact('table'));
    }

    function viewData($request, $table)
    {
        $table = [$table];
        view('setup/view', compact('table'));
    }

    function cancel_table($request)
    {
        return deleteTable($request, $request->id, true);
    }

    function deleteTable($request, $table, $cancel = false)
    {
        global $host;

        $query = "DROP TABLE ".$table;
        $host->query($query);

        if ($cancel) {
            $_SESSION["alert_delete_table"] = "Berhasil Dihapus!";
        }

        view('setup/table');

    }
    function deleteRowData($request, $data)
    {
        $data  = explode('/',$data);

        $id    = $data[0];
        $table = $data[1];

        query()->delete($table, $id);

        $table = [$table];
        
        view('setup/view',compact('table'));
    }

    function createDB($request)
    {

        $host     = "" ? 'localhost': $request->host;
        $user     = "" ? 'root'     : $request->user;
        $password = "" ? ''         : $request->password;
        $auth     = $request->featured_auth;
        $redirect = $request->redirect;

        if ($request->exist_database) {

            $database = $request->exist_database;

        }else{

            $database = $request->database;
            
            //Create Database
            $conn = new mysqli('localhost','root','');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Create database
            $sql = "CREATE DATABASE $database";

            if($conn->query($sql) === TRUE){
                view('setup/table');
            }else{
            }

            // if ($conn->query($sql) === TRUE) {

            //     echo '<div style="display:none"></div>';
            //     echo ' <script type="text/javascript">
            //                 Swal.fire({
            //                     icon: "success",
            //                     title: "Berhasil!",
            //                     text: "Konfigurasi berhasil untuk database '.$database.'",
            //                 })
            //         </script> ';

            // } else {
            //     echo '<div style="display:none"></div>';
            //     echo ' <script type="text/javascript">
            //                 Swal.fire({
            //                     icon: "error",
            //                     title: "Oops...",
            //                     text: "Gagal konek dengan database '.$DATABASE.' '.$conn->error.'",
            //                 })
            //             </script> ';
            // }

            $conn->close();
            
        }

        if ($auth == "active") {
            $auth = true;
            $auth = str_replace('1','true',$auth);
        }else{
            $auth = 0;
            $auth = str_replace('0','false',$auth);
        }

        $myfile  = fopen("configuration.php", "w") or die("Unable to open file!");

        $content = "<?php\n\n";

$content .= '
    $AUTH          = '.$auth.';
    
    #$AUTH = FITUR LOGIN & REGISTER
    #Ubah isi variable $AUTH dari false menjadi true, jika ingin mengaktifkan fitur Login & Register

    $REDIRECT      = "'.$redirect.'";
    //$REDIRECT = UNTUK REDIRECT / PINDAH HALAMAN PADA SAAT PANDORACODE DIAKSES

    $CHECKDB       = false;

    #$CHECK = PENGECEKAN DATABASE
    #Ubah isi variable $CHECK dari false menjadi true, jika ingin mengaktifkan fungsi check database

    $HOST          = "'.$host.'";
    $USER          = "'.$user.'";
    $PASSWORD      = "'.$password.'";
    $DATABASE      = "'.$database.'";

    #Jika Host, User, Password tidak diisi maka otomatis akan mengikuti settingan default XAMPP';

        fwrite($myfile, $content);
        fclose($myfile);

        /* Store the path of source file */

        $filePath = 'configuration.php';

        

        /* Store the path of destination file */

        $destinationFilePath = '../configuration.php';

        

        /* Move File from images to copyImages folder */

        if( !rename($filePath, $destinationFilePath) ) {  

            echo "File can't be moved!";  

        }  

        else {  
            view('setup/table');
        }
    }

    function importAllTable()
    {
        $hit = 0;
        foreach (glob("../database/table/*") as $see) {
            $hit = count(glob($see."/*.*"));
            foreach (glob($see."/*.*") as $lihat) {
                if ($hit == 1) {
                    $content = file_get_contents($lihat);
                    $backup  = query()->raw($content);
                }else{
                    $hit--;
                }
            }   
        }   
        view('setup/table');
    }

    function backupAllTable()
    {
        global $DATABASE;
        $query = query()->raw("SHOW TABLES");
        while($see = mysqli_fetch_assoc($query)){
            $nama_table = $see['Tables_in_'.$DATABASE];
            mkdir("../database/table/".$nama_table);
            $myfile  = fopen("../database/table/$nama_table/".date("d-m-Y").".sql", "w") or die("Unable to open file!");

            $show_table = mysqli_fetch_object(query()->raw("SHOW CREATE TABLE $nama_table"));

            $content = $show_table->{"Create Table"};
            fwrite($myfile, $content);
            fclose($myfile);
        }
        view('setup/table');
    }

    function backupTable($table)
    {
        global $DATABASE;
        $table = $table->id;
        mkdir("../database/table/".$table);
        $myfile  = fopen("../database/table/$table/".date("d-m-Y").".sql", "w") or die("Unable to open file!");

        $show_table = mysqli_fetch_object(query()->raw("SHOW CREATE TABLE $table"));

        $content = $show_table->{"Create Table"};
        fwrite($myfile, $content);
        fclose($myfile);

        view('setup/table');
    }

    function backupDataTable($table)
    {
        global $DATABASE;
        $table = $table->id;
        mkdir("../database/table/".$table);
        $myfile  = fopen("../database/table/$table/".date("d-m-Y").".sql", "w") or die("Unable to open file!");

        $show_table = mysqli_fetch_object(query()->raw("SHOW CREATE TABLE $table"));

        $content = $show_table->{"Create Table"};
        fwrite($myfile, $content);
        fclose($myfile);

        view('setup/table');
    }


    /*
    * Setup Controller
    */

    function CreateController($request)
    {
        
        $cekFile  = false;
        $namaFile = str_replace('.php','',$request->controller).".php";

        foreach (glob("../controller/$namaFile") as $see) {
            $cekFile = true;
        }

        if ($cekFile) {

            alert('Nama File Sudah Ada!','Gunakan nama lain','error');
            view('setup/controller');
            
            die();
            exit();
            
        }

        $controllerName = str_replace(".php","",$request->controller);
        

        $myfile  = fopen("../controller/$controllerName.php", "w") or die("Unable to open file!");

        $content = "<?php";

        if ($request->auto_function) {
            $content .= "
            
    function TambahData('$'request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk tambah data, berikut contoh kode insert :
        */
        query()->insert('table',[

            '$'request->x

        ])->view('folder/file','Berhasil Ditambahkan!');

    }

    function EditData('$'request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk persiapan edit data
        */

    }

    function UpdateData('$'request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk update data
        */

    }

    function HapusData('$'request)
    {

        /*
        *[PandoraCode]
        *di function ini anda bisa memberikan kode
        *untuk delete data
        */

    }"
    
    ;    
        }

        $content = str_replace("'$'request",'$request',$content);

        fwrite($myfile, $content);
        fclose($myfile);

        alert('Berhasil menambahkan controller!');

        view('setup/controller');
    }


    /*
    * Detail File
    * Get File
    */

    function detailFile($request)
    {
        $file = [$request->id];
        view('setup/detail-file', compact('file'));
    }
    
    function detailFileBackend($request)
    {
        $file = [$request->id];
        view('setup/backend-detail-file', compact('file'));
    }

    function deleteFolderBackend($request, $namaFolder)
    {
        $files = glob('../resource/views/'.$namaFolder.'/*');

        
        foreach ($files as $key => $value) {
            
            $files = explode('/', $value);
            unlink('../resource/views/'.$namaFolder.'/'.$files[5]);
        }

        rmdir('../resource/views/'.$namaFolder);

        alert("Berhasil !","Berhasil Hapus Folder Beserta File Di dalamnya!");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    function UpdateController($request, $name)
    {
        $myfile  = fopen("../controller/$name", "w") or die("Unable to open file!");

        $content = $request->data_new_code;

        fwrite($myfile, $content);
        fclose($myfile);

        alert('Berhasil mengupdate controller '.$name);
        
        $file = [$name];

        view('setup/detail-file', compact('file'));
    }

    function UpdateFileBackend($request, $name)
    {
        $myfile  = fopen("../resource/views/backend/$name", "w") or die("Unable to open file!");
        
        $content = $request->data_new_code;

        fwrite($myfile, $content);
        fclose($myfile);

        alert('Berhasil mengupdate file '.$name);
        
        $file = [$name];

        view('setup/backend-detail-file', compact('file'));
    }

    function deleteFileController($request)
    {
        unlink('../controller/'.$request->id);
        alert('Berhasil Dihapus!');
        view('setup/controller');
    }

    function editNamaController($request)
    {
        $cekFile  = false;

        $file     = [$request->old_file];

        $namaFile = str_replace('.php', '', $request->new_name_file).".php";

        foreach (glob("../controller/$namaFile") as $see) {
            $cekFile = true;
        }

        if ($cekFile) {

            alert('Nama File Sudah Ada!','Gunakan nama lain','error');
            view('setup/detail-file', compact('file'));
            
        }else{
            
            unlink('../controller/'.$request->old_file);

            $myfile  = fopen("../controller/$namaFile", "w") or die("Unable to open file!");

            $content = $request->data_new_code;

            fwrite($myfile, $content);
            fclose($myfile);

            alert('Berhasil','Berhasil mengupdate nama file controller!');
            
            $file = [$namaFile];

            view('setup/detail-file', compact('file'));

        }

    }


    /*
     *Update File layouts/backend/menu.php 
     */

     function UpdateFileMenuBackend($request)
     {
        
        $myfile  = fopen("../resource/layouts/backend/menu.php", "w") or die("Unable to open file!");

        $content = $request->data_new_code;

        fwrite($myfile, $content);
        fclose($myfile);

        alert('Berhasil','Berhasil mengupdate file menu.php!','success');

        view('setup/backend-menu');
     }

     function CreateFolderAndFileBackend($request)
     {

        $folder = "";
        if ($request->exist_folder) {

            $folder = $request->exist_folder;

        }else{

            $folder = $request->folder;

        }

        $cekFile  = false;

        $namaFile = str_replace('.php', '', $request->file).".php";

        foreach (glob("../resource/views/backend/$folder/$namaFile") as $see) {
            $cekFile = true;
        }

        if ($cekFile) {

            alert('Nama file sudah ada, gunakan nama file lain!','Gunakan nama lain','error');
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }else{
            

            mkdir('../resource/views/backend/'.$folder);

            $file = str_replace('.php','',$request->file);

            $myfile  = fopen("../resource/views/backend/$folder/$file.php", "w") or die("Unable to open file!");

            if ($request->type_view == "table") {
                $content = '<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
        <a href="" class="btn btn-sm btn-primary shadow float-right">Tambah</a>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <table class="table table-striped data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kolom 1</th>
                        <th>Kolom 2</th>
                        <th>Kolom 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>A</td>
                        <td>B</td>
                        <td>C</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->
</div>';
            }

            if ($request->type_view == "form") {
                $content = '<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Judul
        </h3>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0">
            <form action="" method="POST">
        
                <div class="form-group">
                    <label for="">Label</label>
                    <input type="text" name="name_of_field" class="form-control">
                </div>

                <?php tombolForm() ?>

            </form>
        </div>
    </div><!-- /.card-body -->
</div>';
            }

            if (!$request->type_view || $request->type_view == "blank") {
                $content = "";
            }

            fwrite($myfile, $content);
            fclose($myfile);

            alert('Berhasil','Berhasil membuat file '.$request->file.'!','success');

            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

     }

     function deleteFileBackend($request, $id)
     {
        unlink('../resource/views/backend/'.$id);
        alert('Berhasil Dihapus!');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
     }

     function editNamaFileBackend($request, $id)
     {

        $cekFile  = false;

        $namaFile = str_replace('.php', '', $request->new_name_file).".php";

        foreach (glob("../resource/views/$id/$namaFile") as $see) {
            $cekFile = true;
        }

        if ($cekFile) {

            alert('Nama File Sudah Ada!','Gunakan nama lain','error');
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }else{
            $oldfile = $request->old_file;
            $newfile = str_replace('.php','',$request->new_name_file).".php";

            rename("../resource/views/$id/$oldfile","../resource/views/$id/$newfile");

            alert('Berhasil','Berhasil merubah nama file menjadi '.$newfile.'!','success');

            // view('setup/backend-list-view');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
         
     }

     function editNamaFolderBackend($request, $id)
     {
         /* Store the path of source file */

        $folderPath = "../resource/views/$id";

        

        /* Store the path of destination file */

        $destinationFolderPath = "../resource/views/backend/$request->new_name_file";

        if(rename($folderPath, $destinationFolderPath) ) {  

            
            alert('Nama folder sudah diganti menjadi '.$request->new_name_file.'','Berhasil','success');
            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }  else{
            alert('Mungkin nama folder sudah terpakai folder lain','error','error');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
     }

     function ExecuteCmd($request)
     {
        $cmd = system($request->execute);
        $cmd = [$cmd];
        view('setup/cmd', compact('cmd'));
     }