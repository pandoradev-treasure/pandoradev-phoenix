<?php

    $controller = $_GET['controllerName'];

    include "../controller/$controller";
    include "database.php";
    include "helper.php";

    //Auto Redirect Controller & Function With Params
    @$_GET['function']($object = json_decode(json_encode($_REQUEST)));
