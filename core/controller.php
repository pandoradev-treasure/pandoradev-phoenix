<?php

    $controller = $_GET['controllerName'];
    $id         = $_GET['id'];

    if ($controller == "setup.php") {
      include 'setup.php';
    }

    @include "../controller/$controller";
    @include "database.php";
    @include "helper.php";

    new Query;

    //Auto Redirect Controller & Function With Params
    if (!function_exists($_GET['function'])) {

      
        $file     = @$_GET['controllerName'];
        $function = @$_GET['function'];
  
        include "../resource/errors/error-controller.php";

      }else{

        @$_GET['function']($object = json_decode(json_encode($_REQUEST)), $id);

      }