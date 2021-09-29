<?php

    session_start();
    

    @include 'helper.php';
    @include 'database.php';
    
    error_reporting(0);
    ini_set('display_errors', 0);


    if (strpos($_GET['params'],'setup') !== false) {
        
        $url           = $_GET['params'];
        $url           = explode("/",$url);

        $layoutsHeader = include "../resource/layouts/setup/header.php";
        $getfile       = include "../resource/setup/$url[1].php";
        $layoutsFooter = include "../resource/layouts/setup/footer.php";

    }else{
        //auto redirect
        if ($_GET['params']) {

            $url           = $_GET['params'];

            $layoutsHeader = include "../resource/layouts/backend/header.php";
            $getfile       = include "../resource/views/$url.php";
            $layoutsFooter = include "../resource/layouts/backend/footer.php";
            

        }
        //end
    }