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
        /* font-weight            : bolder; */
        font-size              : 30px;
        color : #3d3d3d
    }
</style>
<div class="center">
    <span style="display:none" class="text pandora-fade">
        Hi kami <b>pandoradev</b>.
    </span>

</div>

<div class="center">
    <span style="display:none;" class="text pandora-fade-second">
        <img src="<?= asset('setup/hard-work.png') ?>" alt="" style="max-width: 90px;">
    </span>
</div>

<div class="center" style="margin-top:80px">
    <span style="display:none" class="text pandora-fade-second">
        Kami berusaha yang terbaik untuk anda.
    </span>
</div>

<div class="center">
    <span style="display:none;" class="text pandora-fade-four">
        <img src="<?= asset('setup/database.png') ?>" alt="" style="max-width: 90px;">
    </span>
</div>

<div class="center" style="margin-top:80px">
    <span style="display:none" class="text pandora-fade-third">
        Ayo mulai dari konfigurasi <strong>database</strong>
    </span>
</div>

<button style="display: none;" class="button-trigger-pandorasetup"></button>
<button style="display: none;" class="button-trigger-pandorasetup-second"></button>
<button style="display: none;" class="button-trigger-pandorasetup-third"></button>
<button style="display: none;" class="button-trigger-pandorasetup-four"></button>
<button style="display: none;" class="link-database"></button>
