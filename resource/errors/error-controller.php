<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR : Controller</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background-image: url('../resource/assets/bg.png');background-size: cover;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card" style="border:none;">
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible fade show"
                            style="box-shadow:2px 5px 10px #f2f2f2">
                            <strong>ERROR : </strong> Opps! sepertinya ada yang salah dengan file <u><?= $file ?></u>
                        </div>
                        <div class="alert alert-warning"  style="box-shadow:2px 5px 10px #f2f2f2">
                            <h4 class="alert-heading"> 📁 <?= $file ?> </h4>
                            <p>
                                Sepertinya ada yang salah dengan nama file / fungsi <u><?= $function ?></u>.<br>
                                pastikan fungsi tersebut memang benar ada di file <b><?= $file ?></b>
                            </p>
                        </div>
                        <?php
                            if (file_exists('../controller/'.$file)) {
                        ?>

                            <div class="alert" style="border-left:4px solid #ffa502;background-color: #ffffff;box-shadow:2px 5px 10px #f2f2f2">
                                <div class="card-header mb-2" style="border:none;background-color: #ffa502;">
                                    <b style="color:#ffffff">File : </b> <span style="color:white"><?= $file ?></span>
                                </div>
                                <div class="card-header" style="border:none">
                                <?php

                                    echo str_replace("1","",highlight_string(file_get_contents('../controller/'.$file)));

                                ?>
                                </div>
                            </div>

                        <?php }else{
                         ?>
                            <div class="alert" style="border-left:4px solid #ff6348;background-color: #ffffff;box-shadow:2px 5px 10px #f2f2f2">
                                <div class="card-header mb-2" style="border:none;background-color: #ff6348;">
                                    <b style="color:#ffffff">File : </b> <span style="color:white"><u><?= $file ?></u> tidak ditemukan.</span>
                                </div>
                            </div>
                         <?php   
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>