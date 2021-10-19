<?php 
    // var_dump($_SESSION);
    if(isset($_SESSION["data"])){
        foreach($_SESSION as $see){
            foreach($see as $lihat){
                $nama_array = array_keys($see);
                if(isset($_SESSION["data"][$nama_array[0]]["url"])){
                    if(isset($_SESSION["data"]) && $_SESSION["data"][$nama_array[0]]["url"] && $_SESSION["data"][$nama_array[0]]["url"] != this_url()){
                        unset($_SESSION["data"][$nama_array[0]]);
                        // echo "Lorem ipsummmmmmmmmmmmmmmm";
                    }
                }else{
                    $_SESSION["data"][$nama_array[0]]["url"] = this_url();	
                }
            }
        }
    }
    // echo this_url();
    // var_dump($_SESSION);
?>