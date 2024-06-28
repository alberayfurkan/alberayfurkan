<?php 
define('RUN', 1);

include 'config.php';

// SAAT DİLİMİ
date_default_timezone_set($_CONFIG['TIMEZONE']);
session_start();

// ANA DİZİN Örn.: /home/public_html/new_framework/ ////////////////////////////
define('__ROOT_DIR__'   , $_SERVER['DOCUMENT_ROOT'].'/'.$_CONFIG['SITE_DIR']);

// SINIFLARI YÜKLE /////////////////////////////////////////////////////////////
require __ROOT_DIR__.'system/Loader.php'; 

// Config değişkenine sistem ayarlarını yükle
$config = Config::getInstance()->set($_CONFIG);

// VERİTABANINI OLUŞTUR 
$db = call_user_func('Database::getInstance');
$db->varEscape();

$_SESSION["lang"] = 'tr';

header("Content-type: text/html; charset=" . $config->get('CHARSET')); 
$load = Load::getInstance();  
$load->admin_start();
?>