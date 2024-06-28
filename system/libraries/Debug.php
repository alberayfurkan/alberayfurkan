<?php if (!defined('RUN')) { header("HTTP/1.0 404 Not Found"); exit(); }
/************************************************
 *          Hata Ayıklama Sınıfı                *
 ************************************************
 * @author      BFA                             *          
 * @version     1.1                             *
 * @copyright   Copyright (c) 2020 BFA          *
 ************************************************/

final class Debug {
    private static $instance = null;
    private $config;
    private $op;
    private $err;

    /**
     * Sınıf oluşturulduğunda otomatik çalışan method
     */
    private function __construct()
    {
        $this->config = Config::getInstance();
    }

    /**
    * Debug::getInstance()
    * 
    * Sınıfın o anki örneğini geri döndürür.
    * Eğer örnek yoksa yeni bir tane oluşturur.
    * 
    * @access public
    * @return Debug
    */
    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
    * Hata yakalamayı başlatır.
    * 
    * @param String $op 
    */
    public function startDebug($op, $err)
    {
        # Debug ile ilgili ayarları getirir.
        $cnf = $this->config->get('DEBUG');
        
        # Debug mode aktif olup olmadığını kontrol eder.
        if($cnf > 0)
        {
            $this->op = $op;
            $this->err = $err;

            switch($cnf)
            {
                # Hataları ekrana basar
                case 1:return $this->debugShow(); break;
                # Hataları belirtilen dosyalara kayıt eder.
                case 2: return $this->debugSave(); break;
            }
        }
    }

    /**
    * Hataları ekrana basar.
    *
    * @return string $str 
    */
    private function debugShow()
    {
        if(!empty($_SERVER['HTTP_REFERER'])) 
            $ref = $_SERVER['HTTP_REFERER']; 
        else 
            $ref = '';

        $str = '<div style="background-color: #FFE1D9; border: 1px solid #cc3300; padding: 5px; font: 12px/20px Verdana">';
        $str .= '<strong>DEBUG MODE</strong><br />';
        $str .= 'Referer: ' . $ref . '<br />';
        $str .= 'User Agent: ' . $_SERVER['HTTP_USER_AGENT'] . '<br />';
        $str .= 'File: ' . $_SERVER['SCRIPT_NAME'] . '<br />';
        $str .= 'Error: ' . $this->err . '<br />';
        $str .= 'Operation: ' . $this->op . '<br />';

        if(isset($_GET))
        {
            foreach($_GET as $key => $val)
                $str .= '<br />GET: ' . $key . ' = ' . $val;
        }

        if(isset($_POST))
        {
            foreach($_POST as $key => $val)
                $str .= '<br />POST: ' . $key . ' = ' . (is_array($val) ? print_r($val, true) : $val);
        }

        if(isset($_FILES))
        {
            foreach($_FILES as $key => $val)
                $str .= '<br />FILES: ' . $key . ' = ' . (is_array($val) ? print_r($val, true) : $val);
        }

        if(isset($_SESSION))
        {
            foreach($_SESSION as $key => $val)
                $str .= '<br />SESSION: ' . $key . ' = ' . (is_array($val) ? print_r($val, true) : $val);
        }
        $str .= '</div>';
        return $str;
    }

    /**
    * Hataları dosyayalara kayıt eder.
    * 
    * @return true 
    */
    private function debugSave()
    {
        $str = '<meta http-equiv="content-type" content="text/html; charset=utf-8" /><div style="background-color: #FFE1D9; border: 1px solid #cc3300; padding: 5px; margin: 5px 0 5px 0; font: 12px/20px Verdana">';
        $str .= '<strong>DEBUG MODE - '. date('d.m.Y H:i:s') .'</strong><br />';

        if(isset($_SERVER['HTTP_REFERER'])) $str .= 'Referer: ' . $_SERVER['HTTP_REFERER'] . '<br />';
        $str .= 'User Agent: ' . $_SERVER['HTTP_USER_AGENT'] . '<br />';
        $str .= 'File: ' . $_SERVER['SCRIPT_NAME'] . '<br />';
        $str .= 'Error: ' . $this->err . '<br />';
        $str .= 'Operation: ' . $this->op . '<br />';

        if(isset($_GET))
        {
            foreach($_GET as $key => $val)
                $str .= '<br />GET: ' . $key . ' = ' . $val;
        }

        if(isset($_POST))
        {
            foreach($_POST as $key => $val)
                $str .= '<br />POST: ' . $key . ' = ' . (is_array($val) ? print_r($val, true) : $val);
        }

        if(isset($_FILES))
        {
            foreach($_FILES as $key => $val)
                $str .= '<br />FILES: ' . $key . ' = ' . (is_array($val) ? print_r($val, true) : $val);
        }

        if(isset($_SESSION))
        {
            foreach($_SESSION as $key => $val)
                $str .= '<br />SESSION: ' . $key . ' = ' . (is_array($val) ? print_r($val, true) : $val);
        }

        $str .= '</div>';

        $fileName = $this->config->get('cnf.root_dir') . 'debug/Debug_' . date('d_m_Y') . '.html';
        $file = fopen($fileName, 'a') or die('Dosya Açılamadı');
        fputs($file, $str);
        fclose($file);
    }
}