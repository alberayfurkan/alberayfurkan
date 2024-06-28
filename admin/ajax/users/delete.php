<?php
include '../../ajax.php';
$system = System::getInstance();

$lng     = Lang::getInstance()->lang;

$table_name         = 'users';
$module_name        = 'users';

// Eğer ajax isteği yapılmışsa burayı çalıştır
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if(!is_numeric($_COOKIE['user_id']))
    {
        header("HTTP/1.0 404 Not Found"); exit();
    }
    
    $ip_address = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
    $key        = sha1($config->get('SECRET_KEY').$ip_address.session_id());
    
    if ($_COOKIE['user_id']=="0")
    {
        $sql        = "SELECT COUNT(*) FROM users WHERE token = '".$key."' AND id =".$_COOKIE['user_id']." AND ip_address = '".$ip_address."' AND status > 0 AND trash = 1";
    }
    else
    {
        $sql        = "SELECT COUNT(*) FROM users WHERE token = '".$key."' AND id =".$_COOKIE['user_id']." AND ip_address = '".$ip_address."' AND status > 0 AND trash != 1";
    }
    
    if($db->getValue($sql) == 0)
    {
        header("HTTP/1.0 404 Not Found"); exit();
    }
    
    extract($_POST);

    $sql = "UPDATE $table_name SET trash = 1, updated = NOW() WHERE id = $id";
	$sql1 = "SELECT * FROM users WHERE id = $id";
    
	$detail = $db->getRow($sql1);
    
    if($db->query($sql))
    {
        $sql = "INSERT INTO logs (actions, module, content, detail, user, created) VALUES('Silindi', 'Kullanıcı Yönetimi', ".$id.", '".$detail['fullname']."', '".$_COOKIE['fullname']."' , NOW())";
        $db->query($sql);
        $result = array('status' => true, 'title' => 'Başarılı', 'message' => 'Kayıt başarıyla silindi', 'alert' => 'success');
    }
    else
        $result = array('status' => false, 'title' => 'Hata', 'message' => 'Kayıt silinirken sorun oluştu', 'alert' => 'alert');

    $system->response($result);
    
}
else
{
    header("HTTP/1.0 404 Not Found"); exit();
}
?>