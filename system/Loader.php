<?php if(!defined('RUN')){ header("HTTP/1.0 404 Not Found"); exit();}

function autoLoadLibrary($className)
{
    $directories = array(
        __ROOT_DIR__ .'/system/libraries/',
        __ROOT_DIR__ .'/system/libraries/mailer/',
        __ROOT_DIR__ .'/system/libraries/excel/',
    );

    $fileNameFormats = array(
        '%s.class.php',
        '%s.php'
    );

    foreach($directories as $directory) 
    {
        foreach($fileNameFormats as $fileNameFormat)
        {
            $path = $directory.sprintf($fileNameFormat, $className);
            if(file_exists($path))
            {
                include_once $path;
                return;
            }
        }
    }
}
spl_autoload_register('autoLoadLibrary');

