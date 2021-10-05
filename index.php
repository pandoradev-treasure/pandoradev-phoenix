<?php 
    // include 'core/autoload-htaccess.php'; 
    include 'configuration.php'; 
    if ($REDIRECT) {
        header('location:'.$REDIRECT);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>

    .center{
        margin      : 0;
        position    : absolute;
        top         : 40%;
        left        : 50%;
        text-align: center;
        transform   : translate(-50%, -50%) 
    }
    .title{
        margin-top : 50px;
        font-size  : 30px;
        font-family: lato;
    }

    .text {
        font-weight            : bolder;
        background             : linear-gradient(to right, #5b28ff 30%, #04c3ff 70%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display                : inline-block;
        vertical-align         : middle;
        line-height            : normal;
        font-size              : 45px;
    }

    .desc{
        font-size  : 20px;
        font-family: arial;
        color      : #007bff;
        margin-top : 16px;
    }

    .mt-240{
        margin-top:240px;
    }

    .bg{
        background-image : url('resource/assets/bg.png');
        background-size  : cover;
        background-repeat: no-repeat;
    }

    .high{
        color:#7d5fff;
        text-decoration: underline;
        text-decoration-color:#7d5fff;
    }

    .btn-outline-primary:hover{
        background-color: transparent;
        color:#5f27cd;
        border-color:#5f27cd;
    }

</style>
<body class="bg">
    <div class="center">
        <h1 class="text">
            PANDORACODE 1.2
        </h1>
        <!-- <p class="desc">Lebih <span class="high">simple</span>, dan <span class="high">efisien</span>.</p> -->
        <p href="" class="typewrite desc" data-period="2000" 
            data-type='[ "Sekarang kami lebih simple", "Berkarya bersama pandoracode!" ]'>
            <span class="wrap desc"></span>
        </p>

        <div style="margin-top: 10%;">
            <a href="setup/database"><button type="button" class="btn btn-outline-primary btn-sm">Konfigurasi</button></a>
            <a href=""><button type="button" class="btn btn-outline-primary btn-sm">Documentation</button></a>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    

var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #00a8ff}";
        document.body.appendChild(css);
    };


</script>