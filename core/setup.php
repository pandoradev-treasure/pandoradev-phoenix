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
        die();

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

    $REDIRECT      = "";
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