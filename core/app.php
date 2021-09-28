<?php

    @include 'helper.php';
    error_reporting(0);
    ini_set('display_errors', 0);

    //auto redirect
    if ($_GET['params']) {

        $url           = $_GET['params'];

        $layoutsHeader = include "../resource/layouts/backend/header.php";
        $getfile       = include "../resource/views/$url.php";
        $layoutsFooter = include "../resource/layouts/backend/footer.php";
        
        if (!$getfile) {
            echo "File tidak ditemukan!";
        }

    }
    //end