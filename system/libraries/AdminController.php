<?php if(!defined('RUN')){ header("HTTP/1.0 404 Not Found"); exit();}

class AdminController
{
    private static $instance = null;
    public $load;
    public $arg = null;
    public $config;
    public $system;
    public $model;
    public $msg;
    public $data;

    private function __construct()
    {
        $this->load         = Load::getInstance();
        $this->config       = Config::getInstance();
        $this->system       = System::getInstance();
        $this->msg          = Messages::getInstance();

        $cls                = explode('_', get_class($this)); 
        $this->model        = $this->load->getModel($cls[1]); 
        $this->data['LANG']     = Lang::getInstance()->lang;

        $this->loginCheck();
    }
    
    public static function getInstance($classname)
    {
        if(!self::$instance instanceof $classname)
            self::$instance = new $classname;
        return self::$instance;      
    }
    
    public function loginCheck()
    {
        // Cookie Login
        if(empty($_COOKIE['user_id']))
        {
            $this->msg->add('w', 'Oturum sonlandırıldı.');
            $this->system->route('admin', 'login', 'logout');
        }
        
        if($this->model->getUserControl())
        {
            $this->msg->add('w', 'Oturum sonlandırıldı.');
            $this->system->route('admin', 'login', 'logout');
        }
        
        if($this->model->getPermissions($_COOKIE['user_id']) == false){
            $this->system->route('admin', 'home', 'noaccess');
        }
    }
    
}