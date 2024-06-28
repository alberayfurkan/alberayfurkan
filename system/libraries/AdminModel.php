<?php

if(!defined('RUN')){ header("HTTP/1.0 404 Not Found"); exit();}

class AdminModel
{
    private static $instance = null;
    public $db = null;
    public $system;
    public $config;
    public $msg;
    public $lang;
    public $data;
    public $module;
    

    private function __construct()
    {
        global $db;
        $this->db               = $db;
        $this->config           = Config::getInstance();
        $this->system           = System::getInstance();
        $this->msg              = Messages::getInstance();
        $this->lang             = Lang::getInstance()->lang;
        
        $cls                = explode('_', get_class($this)); 
        $this->module       = $cls[1];
    }

    public static function getInstance($classname)
    {
        if(!self::$instance instanceof $classname)
            self::$instance = new $classname;
        return self::$instance;      
    }
    
    public function getUserControl()
    {
        $ip_address = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
        $key = sha1($this->config->get('SECRET_KEY').$ip_address.session_id());
        
        $sql = "SELECT COUNT(*) FROM users WHERE token = '".$key."' AND id =".$_COOKIE['user_id']." AND ip_address = '".$ip_address."' AND status > 0 AND trash != 1";
        //$sql = "SELECT COUNT(*) FROM Admin WHERE email = '".$email."' AND id =".$id."  AND blocked = 0 AND status > 0";
        //echo $this->db->getValue($sql); exit();
        
        if($this->db->getValue($sql) == 1)
            return false;
        return true;
    }

    public function setLog($actions, $mdl, $id, $detail)
    { 
         $sql = "INSERT INTO logs (actions, module, content, detail, user, created) VALUES('".$actions."', '".$mdl."', ".$id.", '".$detail."', '".$_COOKIE['fullname']."', NOW())";
         $this->db->query($sql);
    }
    
    public function getLanguageList()
    {
        $sql = "SELECT * FROM languages WHERE trash != 1 ORDER BY sort ASC ";
        return $this->db->getRows($sql);
    }
    
    public function getPermissions($user_id)
    {
        //echo $this->module; exit();
        
        $sql = "SELECT * FROM modules WHERE slug = '".$this->module."' AND status = 1";
        $module_detail = $this->db->getRow($sql);
        if(empty($module_detail['id']))
            return 0;
        $sql = "SELECT COUNT(*) FROM permissions WHERE admin_id=".$user_id." AND module_id = ".$module_detail['id'];
        //echo $sql;
        if($this->db->getValue($sql) == 1)
        {
            return true;
        }
        return false;
    }
}