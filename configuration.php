<?php


    $AUTH          = false;
    
    #$AUTH = FITUR LOGIN & REGISTER
    #Ubah isi variable $AUTH dari false menjadi true, jika ingin mengaktifkan fitur Login & Register

    $REDIRECT      = "backend/dashboard";
    //$REDIRECT = UNTUK REDIRECT / PINDAH HALAMAN PADA SAAT PANDORACODE DIAKSES

    $CHECKDB       = false;

    #$CHECK = PENGECEKAN DATABASE
    #Ubah isi variable $CHECK dari false menjadi true, jika ingin mengaktifkan fungsi check database

    $HOST          = "";
    $USER          = "";
    $PASSWORD      = "";
    $DATABASE      = "new_pandoracode";

    #Jika Host, User, Password tidak diisi maka otomatis akan mengikuti settingan default XAMPP