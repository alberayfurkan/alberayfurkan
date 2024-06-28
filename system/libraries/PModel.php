<?php
class PModel
{
    private static $instance = null;
    public $db = null;
    public $config;
    public $system;
    public $settings;
    public $lang;
    public $msg;

    private function __construct()
    {
        global $db;
        $this->db       = $db;
        $this->config   = Config::getInstance();
        $this->system   = System::getInstance();
        $this->msg          = Messages::getInstance();
        $this->lang     = $this->getLangDetail();
    }

    public static function getInstance($classname)
    {
        if (!self::$instance instanceof $classname)
            self::$instance = new $classname;
        return self::$instance;
    }

    public function getLangDetail()
    {
        $sql = "SELECT * FROM languages WHERE keywords = '" . $_SESSION['lang'] . "'";
        return $this->db->getRow($sql);
    }
}
