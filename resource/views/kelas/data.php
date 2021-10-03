<?php

    foreach (query()->table('kelas')->get() as $key => $value) {

        echo $value['nama']."<br>";
        
    }
?>