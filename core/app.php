<?php

    session_start();
    

    @include 'helper.php';
    @include 'database.php';

    error_reporting(0);
    ini_set('display_errors', 0);


    if ($_GET['params'] == 'dokumentasi') {
        
        include '../documentation.php';
        die();

    }


    if (strpos($_GET['params'],'setup') !== false) {
        
        $url           = $_GET['params'];
        $url           = explode("/",$url);

        if (!@$url[1]) {
            @$url[1] = "index";
        }

        $layoutsHeader = include "../resource/layouts/setup/header.php";
        $getfile       = include "../resource/setup/$url[1].php";
        $layoutsFooter = include "../resource/layouts/setup/footer.php";

    }else{

        if(!empty($_SESSION["data"])){
            $nama_array = array_keys($_SESSION["data"]);
            if(empty($_SESSION["data"][$nama_array[0]]["url"])){
               $_SESSION["data"][$nama_array[0]]["url"] = this_url();
            }else{
                
            }
        }

        //auto redirect
        if ($_GET['params']) {

            $url           = $_GET['params'];

            $layoutsHeader = require_once "../resource/layouts/backend/header.php";
            $getfile       = require_once "../resource/views/$url.php";
            $layoutsFooter = include "../resource/layouts/backend/footer.php";
            
            
            
            
        }
        //end
    }