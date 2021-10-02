<?php

    function store($request)
    {
        global $host;

        $table = $request->nama_table;

        @$query = "DROP TABLE type_data";
        $host->query($query);

        $query = "CREATE TABLE type_data (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, type_data VARCHAR(30) NOT NULL)";
        $host->query($query);

        query()->insert('type_data',["INT"]);
        query()->insert('type_data',["VARCHAR"]);
        query()->insert('type_data',["TEXT"]);
        query()->insert('type_data',["DATE"]);

        $query = "CREATE TABLE $table (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
        $host->query($query);

        $table = [$table];

        view('setup/column', compact('table'));
    }

    function processColumn($request)
    {
        global $host;

        $table = $request->table;


        $query = "DROP TABLE ".$table;
        $host->query($query);

        $data  = "CREATE TABLE $table (";

        for ($i=0; $i < count($request->name_column); $i++) { 

            if (@$request->primary_key[$i] == "on") {
                $primaryKey = " PRIMARY KEY";
            }else{
                $primaryKey = "";
            }

            if (@$request->auto_increment[$i] == "on") {
                $ai = " AUTO_INCREMENT";
            }else{
                $ai = "";
            }

            $data .= $request->name_column[$i]." ".$request->type_data[$i]."(".$request->lenght[$i].")".@$ai.$primaryKey.",";
        }

        $data  .= ")";

        
        $data   = str_replace(",)",")",$data);

        $host->query($data);

        view('setup/table');
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

    function deleteTable($request, $table)
    {
        global $host;

        $query = "DROP TABLE ".$table;
        $host->query($query);

        $_SESSION["alert_delete_table"] = "Berhasil Dihapus!";

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