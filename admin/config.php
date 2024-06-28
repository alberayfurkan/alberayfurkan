<?php if(!defined('RUN')){ header("HTTP/1.0 404 Not Found"); exit();}
/*******************************************************************************
 * CONFIG                                                                      *
 ******************************************************************************/
define('__RUN_DIR__', dirname(__FILE__).'/');

$_CONFIG['SITE_DIR']                = 'PCA_Grade/'; // Örn.: site/dir/

/// VERİTABANI AYARLARI ////////////////////////////////////////////////////////
$_CONFIG['DATABASE']['HOST']        = 'localhost';
$_CONFIG['DATABASE']['USER']        = 'root';
$_CONFIG['DATABASE']['PASSWORD']    = '123QweQwe**';
$_CONFIG['DATABASE']['NAME']        = 'PCA_Grade';
$_CONFIG['DATABASE']['PORT']        = '3306';
$_CONFIG['DATABASE']['DRIVER']      = 'mysql';
$_CONFIG['DATABASE']['CHARSET']     = 'utf8';

/// SİTE ADI ///////////////////////////////////////////////////////////////////
$_CONFIG['SITE_GENERATOR']          = 'Woorkon Digital';          // UYGULAMA ADI


/// DEBUG MODE /////////////////////////////////////////////////////////////////
$_CONFIG['DEBUG']                   = 1;  // HATA KODU 0-Kapalı, 1-Göster, 2-Dosyaya Yaz 

/// CHARSET ////////////////////////////////////////////////////////////////////
$_CONFIG['CHARSET']                 = 'UTF-8';

$_CONFIG['SECRET_KEY']              = 'BFA';

/// UYGULAMA KLASÖRLERİ ////////////////////////////////////////////////////////
$_CONFIG['PLG_DIR']                 = 'plugins';
$_CONFIG['TEMPLATE']                = 'default';

/// SİTE URL ///////////////////////////////////////////////////////////////////
$_CONFIG['URL']                     = 'http://'.$_SERVER['HTTP_HOST'].'/'.$_CONFIG['SITE_DIR'];

/// SAAT DİLİMİ ////////////////////////////////////////////////////////////////
$_CONFIG['TIMEZONE']                = 'Europe/Istanbul';

/// LANGUAGE ///////////////////////////////////////////////////////////////////
$_CONFIG['LOCALE']        = 'tr';

