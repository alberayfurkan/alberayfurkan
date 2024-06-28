<?php

if (!defined('RUN')) {
    header("HTTP/1.0 404 Not Found");
    exit();
}

class Lang {

    private static $instance = null;
    private $UserLng;
    private $langSelected;
    public  $lang = array();
    public  $config;

    public function __construct($userLanguage = 'tr')
    {
        $this->config = Config::getInstance();
        $this->UserLng = $userLanguage;

        //construct lang file
        $langFile = __RUN_DIR__.'lang/'.$_SESSION['lang'].'.ini';

        if(!file_exists($langFile)){
           $langFile = __RUN_DIR__.'lang/tr.ini';
        }
        
        $this->lang = parse_ini_file($langFile);
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self)
            self::$instance = new self();

        return self::$instance;
    }
    
    public function userLanguage(){
        return $this->lang;
    }
}