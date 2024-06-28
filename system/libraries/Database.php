<?php if (!defined('RUN')) { header("HTTP/1.0 404 Not Found"); exit(); }
/* * **********************************************
 *           Mysql Bağlantı Sınıfı              *
 * ***********************************************
 * @author      BFA                             *
 * @version     1.1                             *
 * @copyright   Copyright (c) 2020 BFA          *
 * ********************************************** */

final class Database {

    private static $instance = null;
    private $conn;
    private $config;

    private function __construct() {
        $this->config = Config::getInstance();
        $this->connection();
    }

    private function __clone() {}
    private function __wakeup() {}

    private function characterSet($val) {
        $this->conn->query("SET NAMES '" . $val . "'");

        $this->conn->query("SET CHARACTER SET '" . $val . "'");
    }

    public static function getInstance() {

        if (!self::$instance instanceof self)
            self::$instance = new self();
        
        return self::$instance;
    }

    private function connection() {
        try {
            $cnf = $this->config->get('DATABASE');
            $this->conn = new PDO($cnf['DRIVER'] . ':dbname=' . $cnf['NAME'] . ';host=' . $cnf['HOST'], $cnf['USER'], $cnf['PASSWORD']);
            $this->characterSet($cnf['CHARSET']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function beginOperation(){
        $this->conn->beginTransaction();
    }

    public function cancelOperation() {
        $this->conn->rollBack();
    }

    public function applyOperation() {
        $this->conn->commit();
    }

    public function query($sql, $cache = false, $exp = 60) {
        $response = $this->conn->exec($sql);
        // $res = $this->conn->exec($sql)or die($this->debug($sql));
        // return $res;
        if ($response === false) {
            die($this->debug($sql));
        }
        else {
            return $response;
        }
    }

    public function queries($sql, $cache = false, $exp = 60, $assoc = 0) {
        if($assoc == 1){
            $res = $this->conn->query($sql, PDO::FETCH_ASSOC) or die($this->debug($sql));
        }
        else{
            $res = $this->conn->query($sql) or die($this->debug($sql));
        }
        
        return $res;
    }

    public function getRow($sql, $cache = true, $exp = 60) {
        $res = $this->queries($sql,  $cache, $exp, 1);
        $res = $res->fetch();
        return $res;
    }

    public function getRows($sql, $cache = true, $exp = 60) {
        $res = $this->queries($sql, $cache, $exp, 1);
        $arr = array();
        foreach ($res as $row)
            $arr['row'][] = $row;

        $arr['num'] = isset($arr['row']) ? count($arr['row']) : 0;

        return $arr;
    }

    public function getRowss($sql, $cache = true, $exp = 60) {
        // only_full_group_by modunu devre dışı bırakma
        $this->setSqlMode("(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

        // Sorguyu çalıştırma
        $res = $this->queries($sql, $cache, $exp, 1);
        $arr = array();
        foreach ($res as $row) {
            $arr['row'][] = $row;
        }

        $arr['num'] = isset($arr['row']) ? count($arr['row']) : 0;

        // only_full_group_by modunu tekrar etkinleştirme
        $this->resetSqlMode();

        return $arr;
    }

    public function setSqlMode($mode) {
        $this->conn->exec("SET SESSION sql_mode = {$mode}");
    }

    public function resetSqlMode() {
        // SQL modunu eski haline getirme
        $this->conn->exec("SET SESSION sql_mode = (SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'))");
    }


    public function getValue($sql, $cache = true, $exp = 60) {
        $res = $this->queries($sql, $cache, $exp);
        $res = $res->fetch();

        return $res[0];
    }

    public function getLastInsertId() {
        return $this->conn->lastInsertId();
    }

    public function getNextResult($sql = "") {
        return true;
    }

    private function debug($sql = 'N/A') {
        $debug = Debug::getInstance();
        print_r($this->conn->errorInfo());
        return $debug->startDebug($sql, $this->conn->errorCode());
    }

    public function varEscape() {
        if ($_GET)
            $_GET = $this->arrayEscape($_GET);

        if ($_POST)
            $_POST = $this->arrayEscape($_POST);

        if ($_COOKIE)
            $_COOKIE = $this->arrayEscape($_COOKIE);
    }

    public function arrayEscape($arr) {

        foreach ($arr as $key => $val)
            $arr[$key] = is_array($val) ? $this->arrayEscape($val) : $this->strEscape($val);

        return $arr;
    }

    public function strEscape($str) {

        if (get_magic_quotes_gpc())
            $str = addslashes($str);

        $str = trim($str);
        $str = $this->strControl($str);

        return $str;
    }

    public function strControl($str) {
        $str = addslashes($str);
        $s = array('/*', '*/', 'UNION', 'NULL', '<!--', '-->');
        $r = array('', '', '', '', '', '', '');
        return $str = trim(str_replace($s, $r, $str));
    }
}