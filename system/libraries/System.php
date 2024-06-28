<?php

if (!defined('RUN')) {
    header("HTTP/1.0 404 Not Found");
    exit();
}

/* * *****************************************************************************
 * Sistem Sınıfı                                                                *
 * ******************************************************************************
 * @author BFA                                                                  *
 * @version     1.1                                                             *
 * @copyright   Copyright (c) 2020 BFA                                          *
 * ***************************************************************************** */

final class System {

    private static $instance = null;
    private $config;
    private $key = "BFA8520";

    /*     * **********************************
     * System:getInstance()             *
     *                                  *
     * Config Sınıfının örneğini        *
     * oluşturur ve $config değişkenine *
     * atar.                            *
     *                                  * 
     * @access private                  *
     * @return void                     *
     * ********************************** */

    private function __construct() {
        $this->config = Config::getInstance();
    }

    /*     * **********************************
     * System:getInstance()             *
     *                                  *
     * Sınıfın o anki örneğini geri     *
     * döndürür. Eğer örnek yoksa yeni  *
     * bir tane oluşturur.              *
     *                                  * 
     * @access public                   *
     * @return System                   *
     * ********************************** */

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /*     * **********************************
     * System:permakink()               *
     *                                  *
     * Sef linkler oluşturur            *
     *                                  * 
     * @access public                   *
     * @return string                   *
     * ********************************** */

    public function permalink($str) {
        $str = strip_tags($str);
        // Değiştirilecek karakterler
        $src = array(
            'ç', 'Ç', 'ö', 'Ö', 'ğ', 'Ğ', 'ü', 'Ü',
            'ş', 'Ş', 'ı', 'İ', ' ', '&#287;', '&#351;',
            '&#305;'
        );

        // Yerine gelecek karakterler
        $rep = array(
            'c', 'C', 'o', 'O', 'g', 'G', 'u', 'U',
            's', 'S', 'i', 'I', '-', 'g', 's',
            'i'
        );

        $str = str_replace($src, $rep, $str);
        $str = trim($str);
        $str = preg_replace("([^A-Za-z0-9-/]+)", "", $str);
        $str = preg_replace("/\-+/", "-", $str);
        $str = strtolower($str);

        return $str;
    }

    /*     * **********************************
     * System:getRequestUri()           *
     *                                  *
     * Sayfanın URL adresini döndürür   *
     *                                  * 
     * @access public                   *
     * @return string                   *
     * ********************************** */
    public function getRequestUri() {
        $protocol = $this->config->get('URL');

        $this_page = $_SERVER['REQUEST_URI'];

        if (strpos($this_page, "?") !== false)
            $this_page = reset(explode("?", $this_page));
        return $protocol . $this_page;
    }
    /*     * **********************************
     * System:getFormatDate()           *
     *                                  *
     * @access public                   *
     * @param [tarih,saat,hafta,time]   *  
     * @return array                    *
     * ********************************** */
    public function getFormatDate($date = '', $time = false, $week = false, $dayStr = true) {
        $month = array(
            '', 'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
        );

        $weeks = array(
            'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'
        );

        $str = strtotime($date == '' ? date('Y-m-d') : $date);
        $dataTime = strtotime(date('Y-m-d', $str));
        $date = array();
        if ($dayStr) {
            $today = strtotime(date('Y-m-d'));
            $yesterday = time() - (1 * 24 * 60 * 60);
            $yesterday = strtotime(date('Y-m-d', $yesterday));

            if ($dataTime == $today)
                $date['date'] = 'Bugün';
            else if ($dataTime == $yesterday)
                $date['date'] = 'Dün';
            else
                $date['date'] = date('d', $str) . ' ' . $month[date('n', $str)] . ' ' . date('Y', $str);
        } else
            $date['date'] = date('d', $str) . ' ' . $month[date('n', $str)] . ' ' . date('Y', $str);
        if ($time)
            $date['time'] = date('H:i', $str);
        if ($week)
            $date['week'] = $weeks[date('w', $str)];
        return $date;
    }
    
    /*     * **********************************
     * System:trToLower()               *
     *                                  *
     * Trükçe karakterleri küçültür     *
     *                                  * 
     * @access public                   *
     * @param [string]                  *  
     * @return string                   *
     * ********************************** */
    public function trToLower($str) {
        $s = array('İ', 'I');
        $r = array('i', 'ı');
        return(mb_convert_case(str_replace($s, $r, $str), MB_CASE_LOWER, $this->config->get('CHARSET')));
    }
    
    /*     * **********************************
     * System:trToUpper()               *
     *                                  *
     * Trükçe karakterleri büyütür      *
     *                                  * 
     * @access public                   *
     * @param [string]                  *  
     * @return string                   *
     * ********************************** */
    public function trToUpper($str) {
        return(mb_convert_case(str_replace('i', 'İ', $str), MB_CASE_UPPER, $this->config->get('CHARSET')));
    }
    
    /*     * **********************************
     * System:trUcWords()               *
     *                                  *
     * Tüm karakterleri büyütür         *
     *                                  * 
     * @access public                   *
     * @param [string]                  *  
     * @return string                   *
     * ********************************** */
    public function trUcWords($str) {
        $str = $this->trToLower($str);
        return(mb_convert_case(str_replace('i', 'İ', $str), MB_CASE_TITLE, $this->config->get('cnf.charset')));
    }

    /*     * **********************************
     * System:trUcFirst()               *
     *                                  *
     * İlk karakterleri büyütür         *
     *                                  * 
     * @access public                   *
     * @param [string]                  *  
     * @return string                   *
     * ********************************** */
    public function trUcFirst($str) {

        $str = $this->trToLower($str);
        $count = strlen($str);
        $first = mb_substr($str, 0, 1, $this->config->get('CHARSET'));
        $end = mb_substr($str, 1, $count, $this->config->get('CHARSET'));
        $first = $this->trToUpper($first);

        return $first . $end;
    }
    
    /*     * **********************************
     * System:createPassword()          *
     *                                  *
     * Girilen uzunlukta rastgele       * 
     * parola oluşturur                 *
     *                                  * 
     * @access public                   *
     * @param [int]                     *  
     * @return string                   *
     * ********************************** */
    public function createPassword($length) {

        $str = '1234567890abcdefghijklmnopqrstuvwxyz';
        $key = 0;

        for ($i = 0; $i < $length; $i++)
            $key .= $str[rand(0, strlen($str) - 1)];

        return $key;
    }

    /*     * **********************************
     * System:tagSystem()               *
     *                                  *
     * Etiket sistemi                   *
     *                                  * 
     * @access public                   *
     * @param [etiketler]               *  
     * @return string                   *
     * ********************************** */
    public function tagSystem($arr = array()) {

        $i = 1;
        $c = count($arr);

        foreach ($arr as $etiket) {
            $etiket = trim($etiket['tag']);
            echo '<a href="', $this->config->get('URL'), 'e/', $this->permalink($etiket), '" title="', $etiket, '">', $etiket, '</a> ';
            $i = $i + 1;
        }
    }

    /*     * **********************************
     * System:seoClean()                *
     *                                  *
     * Anahtar kelimeleri açıklamaları  *
     * ve başlıklardaki tek ve çift     *
     * tırnakları temizler              *
     *                                  * 
     * @access public                   *
     * @param [string]                  *  
     * @return string                   *
     * ********************************** */
    public function seoClean($str) {
        $str = strip_tags($str);
        $str = str_replace('"', "'", $str);
        $str = str_replace('&amp;', '', $str);

        return $str;
    }

    /*     * ****************************
     * System:mobileLocation()          *
     *                                  *
     * Mobil tarayıcılar için kontrol   *
     *                                  * 
     * @access public                   *
     * @return string                   *
     * ********************************** */
    public function mobileLocation() {
        $op = strtolower($_SERVER['HTTP_X_OPERAMINI_PHONE']);
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        $ac = strtolower($_SERVER['HTTP_ACCEPT']);

        return strpos($ac, 'application/vnd.wap.xhtml+xml') !== false || $op != '' || strpos($ua, 'sony') !== false || strpos($ua, 'symbian') !== false || strpos($ua, 'nokia') !== false || strpos($ua, 'samsung') !== false || strpos($ua, 'mobile') !== false || strpos($ua, 'windows ce') !== false || strpos($ua, 'epoc') !== false || strpos($ua, 'opera mini') !== false || strpos($ua, 'nitro') !== false || strpos($ua, 'j2me') !== false || strpos($ua, 'midp-') !== false || strpos($ua, 'cldc-') !== false || strpos($ua, 'netfront') !== false || strpos($ua, 'mot') !== false || strpos($ua, 'up.browser') !== false || strpos($ua, 'up.link') !== false || strpos($ua, 'audiovox') !== false || strpos($ua, 'blackberry') !== false || strpos($ua, 'ericsson,') !== false || strpos($ua, 'panasonic') !== false || strpos($ua, 'philips') !== false || strpos($ua, 'sanyo') !== false || strpos($ua, 'sharp') !== false || strpos($ua, 'sie-') !== false || strpos($ua, 'portalmmm') !== false || strpos($ua, 'blazer') !== false || strpos($ua, 'avantgo') !== false || strpos($ua, 'danger') !== false || strpos($ua, 'palm') !== false || strpos($ua, 'series60') !== false || strpos($ua, 'palmsource') !== false || strpos($ua, 'pocketpc') !== false || strpos($ua, 'smartphone') !== false || strpos($ua, 'rover') !== false || strpos($ua, 'ipaq') !== false || strpos($ua, 'au-mic,') !== false || strpos($ua, 'alcatel') !== false || strpos($ua, 'ericy') !== false || strpos($ua, 'up.link') !== false || strpos($ua, 'vodafone/') !== false || strpos($ua, 'wap1.') !== false || strpos($ua, 'wap2.') !== false || strpos($ua, 'htc') !== false || strpos($ua, 'iphone') !== false;
    }
    
    /*     * ****************************
     * System:redirect()                *
     *                                  *
     * Sayfa yönlendirme                *
     *                                  * 
     * @access public                   *
     * @param [url, target]             *
     * @return string                   *
     * **********************************/
    public function redirect($url) {
        $js = '<script type="text/javascript">window.location = "' . $url . '";</script>'
                . '<noscript><meta http-equiv="refresh" content="0; url=app_error.php?msg_no=3" /></noscript>';
        echo $js;
        exit;
    }
    
    /*     * ****************************
     * System:route()                   *
     *                                  *
     * Route Yönlendirme                *
     *                                  * 
     * @access public                   *
     * @param [url, target]             *
     * @return string                   *
     * ********************************** */
    public function route($path = '', $mod = 'home', $met = '', $id = '') {
        
        $url = '';
        
        if($path != '')
            $path = 'admin/';
        
        if($met != '' && $id != '')
            $url = $mod.'/'.$met.'/'.$id.'/';
        elseif($met != '' && $id == '')
            $url = $mod.'/'.$met.'/';
        else{
            $url = $mod.'/';
        }
        
        $js = '<script type="text/javascript">window.location = "' . $this->config->get('URL') .''.$path.''.$url.'";</script>'
                . '<noscript><meta http-equiv="refresh" content="0; url=notfound" /></noscript>';
        echo $js;
        exit;
    }
    
    /*     * ****************************
     * System:route()                   *
     *                                  *
     * Route Yönlendirme                *
     *                                  * 
     * @access public                   *
     * @param [url, target]             *
     * @return string                   *
     * ********************************** */
    public function router($path = '', $mod = 'home', $met = '', $id = '') {
        
        $url = '';
        
        if($path != '')
            $path = 'admin/';
        
        if($met != '' && $id != '')
            $url = $mod.'/'.$met.'/'.$id.'/';
        elseif($met != '' && $id == '')
            $url = $mod.'/'.$met.'/';
        else{
            $url = $mod.'/';
        }
        
        echo $this->config->get('URL') .''.$path.''.$url;
    }

    /*     * ****************************
     * System:is_arr_var_empty()        *
     *                                  *
     * Dizi Kontrolü                    *
     *                                  * 
     * @access public                   *
     * @param [array]                   *
     * @return boolean                  *
     * ********************************** */
    public function is_arr_var_empty($arr) {
        foreach ($arr as $var)
            if ($var == '')
                return true;

        return false;
    }

    /*  * *******************************
     * System:is_arr_var_digit()        *
     *                                  *
     * Sayı kontrolü                    *
     *                                  * 
     * @access public                   *
     * @param [array]                   *
     * @return boolean                  *
     * ********************************** */
    public function is_arr_var_digit($arr) {
        foreach ($arr as $var)
            if (!ctype_digit("$var"))
                return true;

        return true;
    }

    /*  * *******************************
     * System:is_arr_var_digit()        *
     *                                  *
     * email kontrolü                   *
     *                                  * 
     * @access public                   *
     * @param [string]                  *
     * @return boolean                  *
     * ********************************** */
    public function validete_email($email) {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
        
        if (preg_match($pattern, $email))
            return true;
        else
            return false;
    }

    /*  * *******************************
     * System:is_arr_var_digit()        *
     *                                  *
     * password kontrolü                *
     *                                  * 
     * @access public                   *
     * @param [string]                  *
     * @return boolean                  *
     * ********************************** */
    public function validate_password($password, $repassword) {
        if ($password == $repassword)
            return true;
        else
            return false;
    }

    /*  * ******************************
    * Returns a sanitized CSRF token.  *
    *                                  * 
    * @access public                   *
    * @param string|null $csrf_token   *
    * CSRF token to sanitize.          *
    * @return string Sanitized CSRF    *
    * token.                           *
    * ********************************** */
    public function sanitize($val) {
        $val = htmlspecialchars($val ?? '', ENT_QUOTES, 'UTF-8');
        return $val;
    }

    /*  * ***********************************
    * Bir sayıyı özel bir base64 formatında *
    * kodlar.                               *
    *                                       * 
    * @param int $number Kodlanacak sayı.   *
    *                                       *
    * @return string Kodlanmış base64 dizesi*
    * ************************************* */
    function encode($number) {
        return strtr(rtrim(base64_encode(pack('i', $number)), '='), '+/', '-_');
    }
    
    /*  * ***********************************
    * Özel base64 formatında kodlanmış bir  *
    * sayıyı çözer.                         *
    *                                       * 
    * @param string $base64 Çözülecek base64*
    * dizesi.                               *
    *                                       *
    * @return int Çözülmüş sayı.            *
    * ************************************* */
    function decode($base64) {
        $number = unpack('i', base64_decode(str_pad(strtr($base64, '-_', '+/'), strlen($base64) % 4, '=')));
        return $number[1];
    }

    /*  * ***********************************
    * Base64 kodlu bir dizeyi JPEG dosyasına*
    * dönüştürür ve kaydeder*               *
    *                                       * 
    * @param string $base64_string Base64   *
    * kodlu resim dizesi.                   *
    * @param string $output_file            *
    * kaydedilecek dosyanın yolu.           *
    *                                       *
    * @return string Kaydedilen dosyanın adı*
    * ************************************* */
    function base64_to_jpeg($base64_string, $output_file ) {
        $ifp = fopen($output_file, "wb" ); 
        fwrite( $ifp, base64_decode( $base64_string) ); 
        fclose( $ifp ); 
        $filename = explode('/', $output_file);
        return($filename[1]); 
    }
    
    /*  * ***********************************
    * Verilen sonucu JSON formatında        *
    * döndürür ve betiği sonlandırır.       *
    *                                       * 
    * @param mixed $result JSON formatında  *
    * döndürülecek sonuç.                   *
    *                                       *
    * @return void                          *
    * ************************************* */
    public function response($result)
    {
        header('Content-Type: application/json');
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        exit();
    }

    /*  * ***********************************
    * UTM parametrelerini ayarlar ve        *
    *  oturuma kaydeder.                    *
    *                                       * 
    * @access public                        *
    * @param array $arr UTM parametrelerini *
    * içeren dizi.                          *
    *                                       *
    * @return void                          *
    * ************************************* */
    public function setUtm($arr)
    {
        extract($arr);
        if( empty( $_GET['utm_source'] ) AND empty( $_SESSION['utm_source'] ) )
        {
            if(empty($_SERVER['HTTP_REFERER']))
            {
                $_SESSION['utm_source']  = 'Direct';
                $_SESSION['utm_medium']  = 'None';
                $_SESSION['utm_campaign']= 'None';
            }
            else
            {
                $none_https  = str_ireplace('http://', '', $_SERVER['HTTP_REFERER']);
                $none_http  = str_ireplace('https://', '', $none_https);
                $none_www   = str_ireplace('www.', '', $none_http);
                $none_url   = explode('/', $none_www);
                $non_last_slash = str_ireplace('/', '', $none_url[0]);

                $_SESSION['utm_source']  = $non_last_slash;
                $_SESSION['utm_medium']  = 'Referrer';
                $_SESSION['utm_campaign']= 'None';
            }
        }
        elseif( isset( $_GET['utm_source'] ) )
        {
            $_SESSION['utm_source']  = isset($utm_source)    ? $utm_source   : '';
            $_SESSION['utm_medium']  = isset($utm_medium)    ? $utm_medium   : '';
            $_SESSION['utm_campaign']= isset($utm_campaign)  ? $utm_campaign : '';
        } 
    }

    /*  * ***********************************
    * Returns a sanitized CSRF token.       *
    *                                       * 
    * @param $dateString biçimlendirilmek   * 
    * istenen tarih dizesi                  *
    * (Y-m-d formatında).                   *
    * @param string $lang Kullanılacak dil  *
    * kodu ('tr', 'de', 'en' gibi).         *
    * @return string belirtilen dilde       *
    * biçimlendirilmiş tarih.               *
    * @throws Exception Verilen tarih dizesi*
    * geçerli bir tarih değilse bir istisna *
    * fırlatır.                             *
    * ************************************* */
    function formatNationalDate($dateString, $lang) {
        $date = new DateTime($dateString);
    
        // Locale ayarları
        $locales = [
            'tr' => 'tr_TR.UTF-8',
            'de' => 'de_DE.UTF-8',
            'en' => 'en_US.UTF-8'
        ];
    
        // Seçilen dil için locale ayarlarını yap
        if (array_key_exists($lang, $locales)) {
            setlocale(LC_TIME, $locales[$lang]);
        } else {
            // Dil desteklenmiyorsa varsayılan olarak tr'yi kullan
            setlocale(LC_TIME, 'tr_TR.UTF-8');
        }
    
        // Dil formatına göre tarih formatlama
        $formattedDate = strftime('%e %B %A', $date->getTimestamp());
    
        // `strftime` fonksiyonunun doğru çalışması için UTF-8 olarak kodlama
        return mb_convert_encoding($formattedDate, 'UTF-8', mb_internal_encoding());
    }

}