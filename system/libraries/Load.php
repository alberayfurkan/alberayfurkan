<?php if (!defined('RUN')) { header("HTTP/1.0 404 Not Found"); exit(); }
/************************************************
 *          Modül Çağırma Sınıfı                *
 ************************************************
 * @author      BFA                             *          
 * @version     1.1                             *
 * @copyright   Copyright (c) 2020 BFA          *
 ************************************************/
final class Load 
{
    private static $instance = null;
    private $config;
    private $load;
    private $system;
    public  $msg;
    public  $lang;
    public $db = null;

    private function __construct()
    {
        global $db;
        $this->db           = $db;
        $this->config = Config::getInstance();   
        $this->system = System::getInstance(); 
        $this->msg    = Messages::getInstance(); 
        $this->lang   = Lang::getInstance()->lang;
    }

    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance()
    {
        if (!self::$instance instanceof self)
            self::$instance = new self();
        return self::$instance;
    }

    public function start()
    {
        $slug = empty($_GET['slug']) ? 'home' : $_GET['slug'];
        $sql = "SELECT * FROM routes WHERE slug = '".$slug."'";
        $slug = $this->db->getRow($sql);
        $this->module($slug['mod'], $slug['met'], $slug['did']);
    }
    
    public function admin_start()
    {
        if(empty($_GET['mod']))
            $_GET['mod'] = 'home';

        if(empty($_GET['met']))
            $_GET['met'] = 'index';

        $this->module($_GET['mod'], $_GET['met']);
    }

    // Controller
    public function module($moduleName = 'home', $function = 'index', $arg = null)
    {
        $path = __RUN_DIR__.'modules/'. $moduleName . '/controller.php';
        
        if(file_exists($path))
        {
            ob_start();
            
            include_once $path;
            $class = 'C_'.$moduleName;
            $module = call_user_func('C_'.$moduleName.'::getInstance', $class);
            $module->arg = $arg;
            $module->$function();
            $html = ob_get_contents();
            ob_get_flush();

            return true;
        }
        
        $this->data['settings'] = $this->db->getRow("SELECT * FROM settings WHERE id = 1");
        $this->data['title'] = $this->data['settings']['meta_title'];
        $this->data['description'] = $this->data['settings']['meta_description'];
        http_response_code(404);
        $this->view('home', '404', $this->data);
        exit();
    }

    // Model
    public function getModel($modelName)
    {
        $path = __RUN_DIR__.'modules/'. $modelName . '/model.php';
        if(file_exists($path))
        {
            include_once $path;
            $class = 'M_'.$modelName;
            $module = call_user_func('M_'.$modelName.'::getInstance', $class);
            return $module;
        }
        return false;
    }

    // View
    public function view($viewName, $filename = 'view',  $data = null)
    {
        $config = Config::getInstance(); 
        $load   = Load::getInstance();
        $system = System::getInstance();
        $msg    = Messages::getInstance();
        $path = __RUN_DIR__.'templates/'.$this->config->get('TEMPLATE').'/'. $viewName . '/' . $filename .'.php';

        if(file_exists($path))
            include $path;

        return false;
    }

    // Plugins 
    public function plugin($moduleName, $function = 'index', $arg = null)
    {
        $path = __RUN_DIR__.''.$this->config->get('PLG_DIR') .'/'. $moduleName . '/controller.php';

        if(file_exists($path))
        {
            ob_start();
            include_once $path;
            $class = 'PC_'.$moduleName;
            $module = call_user_func('PC_'.$moduleName.'::getInstance', $class);
            $module->arg = $arg;
            $module->$function();
            $html = ob_get_contents();
            ob_get_flush();

            return true;
        }
        return false;
    }

    // Model
    public function getPModel($modelName)
    {
        $path = __RUN_DIR__.''.$this->config->get('PLG_DIR') .'/'. $modelName . '/model.php';

        if(file_exists($path))
        {
            include_once $path;
            $class = 'PM_'.$modelName;
            $module = call_user_func('PM_'.$modelName.'::getInstance', $class);

            return $module;
        }
        return false;
    }

    // View
    public function getPView($viewName, $data = null, $filename = 'view')
    {
        $path = __RUN_DIR__.''.$this->config->get('PLG_DIR') .'/'. $viewName . '/templates/'.$this->config->get('TEMPLATE').'/'. $filename .'.php';
        if(file_exists($path))
        {
            include $path;
        }
        else
        {
            $path = __RUN_DIR__.''.$this->config->get('PLG_DIR') .'/'. $viewName . '/templates/default/'. $filename .'.php';
            if(file_exists($path))
            {
                include $path;
            }
        }
        return false;
    }
}