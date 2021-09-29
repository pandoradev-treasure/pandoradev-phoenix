<?php

    include '../configuration.php';

    $host = 
    mysqli_connect(
        $HOST     == "" ? 'localhost': $HOST,
        $USER     == "" ? 'root'     : $USER,
        $PASSWORD == "" ? ''         : $PASSWORD,
        $DATABASE
    );
    
    //Notif
    if (@$CHECKDB) {
        if ($GLOBALS['koneksi']) {
            echo '<div style="display:none"></div>';
            echo ' <script type="text/javascript">
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: "Berhasil konek dengan database '.$DATABASE.'",
                        })
                </script> ';
        }else{
            echo '<div style="display:none"></div>';
            echo ' <script type="text/javascript">
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Gagal konek dengan database '.$DATABASE.'",
                        })
                    </script> ';
                    
        }
    }
?>