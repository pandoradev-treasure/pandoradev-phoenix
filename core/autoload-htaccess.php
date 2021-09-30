<?php
    
    $projectName = $_SERVER["SCRIPT_NAME"];
    $projectName = explode('/', $projectName);
    $projectName = $projectName[1];

    $myfile  = fopen(".htaccess", "w") or die("Unable to open file!");

    $content = "RewriteEngine  on

RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php

# redirect all requests to non-existing resources to special handler
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-dWWW
RewriteRule ^(.+)$ /$projectName/core/app.php?params=$1 [L,NC]";


    fwrite($myfile, $content);
    fclose($myfile);

    /* Store the path of source file */

    $filePath = '.htaccess';

    

    /* Store the path of destination file */

    $destinationFilePath = '.htaccess';

    

    /* Move File from images to copyImages folder */

    if( !rename($filePath, $destinationFilePath) ) {  

        echo "File can't be moved!";  

    }  

    else {  
        // view('setup/table');
    }

?>