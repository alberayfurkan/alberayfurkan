<?php if(!defined('RUN')){ header("HTTP/1.0 404 Not Found"); exit();}
class Controller
{
    private static $instance = null;
    public $load;
    public $arg = null;
    public $config;
    public $system;
    public $model;
    public $msg;
    public $data;
    public $lang;

    private function __construct()
    {   
        $this->load         = Load::getInstance();
        $this->config       = Config::getInstance();
        $this->system       = System::getInstance();
        $this->msg          = Messages::getInstance();

        $cls                = explode('_', get_class($this));
        $this->model        = $this->load->getModel($cls[1]);

        $this->data['settings'] = $this->model->getSetting(1);
        $this->data['rich'] = '';

        $this->data['LANG']     = Lang::getInstance()->lang;
    }

    public static function getInstance($classname)
    {
        if(!self::$instance instanceof $classname)
            self::$instance = new $classname;
        return self::$instance;      
    }
}