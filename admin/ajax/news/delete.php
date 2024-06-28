<?php
include '../../ajax.php';
$system = System::getInstance();
$msg    = Messages::getInstance();
	
// Eğer ajax isteği yapılmışsa burayı çalıştır
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    extract($_POST);
    
    if(empty($id))
    {
        echo 0;
        exit();
    }
    
    $sql = "UPDATE settings SET trash = 1, updated = NOW() WHERE id = $id";
    
    if($db->query($sql))
    {
        $result = array('status' => true, 'title' => 'Başarılı', 'message' => 'Kayıt başarıyla silindi.', 'alert' => 'success');
    }
    else
        $result = array('status' => false, 'title' => 'Hata', 'message' => 'Kayıt silinirken sorun oluştu.', 'alert' => 'alert');
    
    $system->response($result);
    
    
}
else
{
    header("HTTP/1.0 404 Not Found"); exit();
}

?>