<?php

class PController
{
    private static $instance = null;
    public $load;
    public $arg = null;
    public $model;
    public $data;
    public $lang;
    public $msg;
    public $system;

    private function __construct()
    {
        $this->load         = Load::getInstance();
        $this->msg          = Messages::getInstance();
        $this->system       = System::getInstance();

        $cls                = explode('_', get_class($this));
        $this->model        = $this->load->getPModel($cls[1]);

        $this->lang         = $this->model->getLangDetail();
        $this->data['LANG'] = Lang::getInstance()->lang;
    }

    // Miras
    public static function getInstance($classname)
    {
        if (!self::$instance instanceof $classname)
            self::$instance = new $classname;
        return self::$instance;
    }
}
