<?php
if(!defined('RUN')){ header("HTTP/1.0 404 Not Found"); exit();}
/************************************************
 *                Ayarlar Sınıfı                *
 ************************************************
 * @author      BFA                             *          
 * @version     1.1                             *
 * @copyright   Copyright (c) 2020 BFA          *
 ************************************************/
final class Config
{
    /**
    * Ayarları birbirinden ayırmak için
    * kullanılacak karakter
    */
    const SEPARATOR = '.';

    /**
    * @var tutulan ayarlar
    * @access private
    */
    private static $conf = array();

    /**
    * @var sınıfın örneğini tutar
    * @access private
    */
    private static $instance = NULL;

    /**
    * @var en son alınan (get edilen) ayarlar
    * @access private
    */
    private static $cache = array();

    /**
    * @var ayarlar obje olarak alınsın mı?
    * @access private
    */
    private $as_object = FALSE;

    // kullanılmasını istemediğimiz metotlar
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    /***********************************
    * Config:getInstance()             *
    *                                  *
    * Sınıfın o anki örneğini geri     *
    * döndürür. Eğer örnek yoksa yeni  *
    * bir tane oluşturur.              *
    *                                  * 
    * @access public                   *
    * @return Config                   *
    ************************************/
    public static function getInstance()
    {
        if(!self::$instance instanceof self)
            self::$instance = new self();
        return self::$instance;
    }

    /************************************
    * System:set()                      *
    *                                   *
    * CONF dizisinin herhangi bir       *
    * noktasındaki eski ayarlar ile     *
    * yeni ayarları yer değiştirir      *
    *                                   *
    * @param array $conf                * 
    * @access public                    *
    * @return Config                    *
    ************************************/
    public function set($path = null, $conf = null)
    {
        // Config::set(array('type' => 'name'));
        if(is_array($path) && $conf === null)
        {
            self::$conf = $path; // bütün ayarlar değişti.
            $this->_resetCache();
            
            return $this;
        }

        // Config::set('dbase.type', 'sqlite');
        // Scalar: integer, float, string, boolean
        if(is_string($path) && is_scalar($conf))
        {
            $this->_insertConf($path, $conf);
            $this->_saveToCache($path, $conf); // güncelle
            
            return $this;
        }

        // Config::set('dbase.conf', array('port' => 9986));
        if(is_string($path) && is_array($conf))
        {
            $oldConf = (array) $this->get($path);
            // eski ayarın üstüne yeni ayarı yazalım
            $newConf = array_merge($oldConf, $conf);
            // elde edilen yeni ayarı istediğimiz yola yerleştirelim
            $this->_insertConf($path, $newConf);
            // yeni ayarı Cache' e gönderiyoruz
            $this->_saveToCache($path, $newConf);

            return $this;
        }
        
        throw new Config_Exception ("Belirtilen ayar geçerli değil: $path");
    }

    /**
    * Config::add();
    * 
    * şu an geçerli olan ayarlar ile yeni atanacak
    * ayarları birbirleriyle birleştirir.
    * 
    * @param mixed $newConf eklenecek yeni ayarlar
    * @return Config
    */
    public function add($newConf = array())
    {
        if(is_array($newConf))
        {
            self::$conf += $newConf;
            // Yeni ayarlar eklendikten sonra Cache' deki veriler eski olduğu için
            // resetleme işlemi yapıyoruz.
            $this->_resetCache();
            return $this;
        }

        throw new Config_Exception('Girilen argüman dizi olmalıdır.');
    }

    /**
    * Config::get()
    * 
    * CONF dizisinin herhangi bir noktasındaki
    * ayarları geri döndürür
    * 
    * @param mixed $path erişilmek istenen ayar yolu
    * @return mixed
    */
    public function get($path = NULL)
    {
        // yol boşsa bütün ayarları al
        if(empty($path))
        {
            $conf = $this->_checkConfigFormat(self::$conf);
            return $conf;
        }

        // Cache'de ayar var mı kontrol et
        $conf = $this->_getFromCache($path);

        if(empty($conf))
        {
            // yolu kullanarak ayarlara eriş
            $conf = $this->_accessConf($path);
            // eriştiğimiz ayarları Cache'e kaydet
            $this->_saveToCache($path, $conf);
        }
        
        // ayarların çıktı biçimini kontrol et
        $conf = $this->_checkConfigFormat($conf);

        return $conf;
    }

    /**
    * Config::del();
    * 
    * belirtilen ayarı siler
    * 
    * @param mixed $path silinecek ayar yolu
    * @return void
    */
    public function del($path = NULL)
    {
        if(empty($path))
        {
            self::$conf = NULL;
            return  $this;
        }

        // dizi için referans oluşturuyoruz
        // daha sonra dizinin içindeki elemanı unset ediyoruz
        $path = explode(self::SEPARATOR, $path);
        $last = array_pop($path);
        $path = implode(self::SEPARATOR, $path);

        if($path === '' && isset(self::$conf[$last]))
        {
            unset(self::$conf[$last]);
            return $this;
        }

        // silmek istediğimiz elemanın içinde bulunduğu kapsayıcı eleman.
        // 'uye.adres.sehir' yolunu silmek için 'uye.adres' yoluna eriş.
        // daha sonra $data['sehir'] yaparak silme işlemini yapabilirsin.
        $data =& $this->_accessConf($path);

        if(is_array($path) && isset($data[$last]))
        {
            unset($data[$last]);
            return $this;
        }

        throw new Config_Exception (
            "Yol bulunamadı: " . ($path.self::SEPARATOR.$last)
        );
    }

    /**
    * Config::as_object()
    * 
    * Ayarların obje olarak alınmasını sağlar
    * Config::get() metodundan önce kullanılması şarttır
    * 
    * @access public
    * @return Config
    */
    public function as_object()
    {
        $this->as_object = TRUE;
        return $this;
    }

    public function __destruct()
    {
        self::$instance = NULL;
        self::$cache = NULL;
        self::$conf = NULL;
    }

    /**
    * Config::_accessConf()
    * 
    * CONF dizisinin herhangi bir noktasına erişerek
    * o noktadaki ayarların referansını geri döndürür
    * 
    * @param mixed $path erişilmek istenen yol
    * @access private
    * @return mixed
    */
    private function & _accessConf($path)
    {
        // erişim yolunu parçalara ayır
        $key = explode(self::SEPARATOR, $path);
        $num = count($key);
        $tmp = NULL;
        $ref =& self::$conf;

        // her bir yol parçasını tek tek gez
        for($i = 0; $i < $num; $i++)
        {
            $tmp = $key[$i];

            if(!array_key_exists($tmp, $ref))
            {
                echo $tmp;
                throw new Config_Exception("Yol bulunamdı:" . $path);
            }

            $ref =& $ref[$tmp];
        }
        return $ref;
    }

    /**
    * Config::_insertConf()
    * 
    * CONF dizisinin istenilen herhangi bir noktasına
    * erişerek, oradaki eski ayarları yenisiyle değiştir
    * 
    * @param mixed $path erişilmek istenen yol
    * @param mixed $newConf yerleştirilecek olan yeni ayarlar
    * @access private
    * @return boolean
    */
    private function _insertConf($path, $newConf)
    {
        // yolu verilen ayarlara eriş ve referansını al
        $confRef =& $this->_accessConf($path);

        // geriye bir referans yerine FALSE dönüyorsa
        if($confRef === false) return false;

        // referans noktasına yeni ayarları yerleştir
        $confRef = $newConf;
        return true;
    }

    /**
    * Ön bellekteki ayarları sıfırlamanızı sağlar
    * 
    * @access private
    * @return vodi
    */
    public function _resetCache()
    {
        self::$cache = array();
    }
    
    /**
    * yolu verilen ayarı ön belleğe kaydetmemizi sağlar
    * 
    * @param string $path
    * @param mixed $conf
    * @access private
    * @return void
    */
    private function _saveToCache($path, $conf)
    {
        // hem kayıt hemde güncelleme görevi görür
        self::$cache[$path] = $conf;
    }

    /**
    * yolu verilen ayarları ön bellekten alır
    * 
    * @param string $path
    * @access private
    * @return mixed
    */
    private function _getFromCache($path)
    {
        if(array_key_exists($path, self::$cache))
        {
            return self::$cache[$path];
        }
        return array();
    }

    /**
    * ayarların dışarıya array olarak mı yoksa
    * obje olarak mı verileceğini belirler
    * 
    * @param mixed $output
    * @access private
    * @return mixed
    */
    private function _checkConfigFormat($conf)
    {
        if(!is_array($conf) || !$this->as_object)
        {
            return $conf;
        }

        // bu ayarı resetliyoruz ki sonraki GET metotlarında
        // kullanıcı yeniden Array/Object kararı verebilsin
        $this->as_object = FALSE;
        $conf = $this->_array2object($conf);

        return $conf;
    }

    /**
    * bir dizi rekürsif olarak objeye dönüştürür
    * 
    * @param array $arr
    * @return object
    */
    private function _array2object(array $arr)
    {
        $obj = new stdClass();

        foreach ($arr as $key => $val)
        {
            if(is_array($val))
            {
                $obj->$key = $this->_array2object($val);
            }
            else
            {
                $obj->$key = $val;
            }
        }
        return $obj;
    }
}