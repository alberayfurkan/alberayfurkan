<?php
include '../../ajax.php';
$valid_extensions = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpg', 'png');
$uploaddir = '../../../uploads/files/';

$system = System::getInstance();

$data = array();

if (isset($_FILES)) {
    $error = false;
    $files = array();
    
    for($i = 0; $i < count($_FILES['files']['name']); $i++) 
    {
        $img = $_FILES['files']['name'][$i];
        $tmp = $_FILES['files']['tmp_name'][$i];

        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        
        $new_image = str_replace('.'.$ext, '', $img);
        $new_image = $system->permalink($new_image);

        $final_image = $new_image.'-'.rand(1000,1000000).'.'.$ext;

        if(in_array($ext, $valid_extensions)) 
        {
            $path = $uploaddir.strtolower($final_image);
            if(move_uploaded_file($tmp,$path)) 
            {
                if($i == 0)
                   $data = array('status' => 1, 'files' => array());
                
                $data['files'][$i] = array('url' => $config->get('URL').'uploads/files/'.$final_image, 'image' => $final_image);
                //$data = array('status' => 1, 'url' => $config->get('URL').'uploads/images/'.$final_image, 'image' => $final_image);
            }
            else
                $data = array('status' => 0, 'message' => 'Dosya yüklenirken hata oluştu.') ;      
        }
        else
        {
            $data = array('status' => 0, 'message' => 'Dosya uzantısı geçerli değil.') ;
        }
    }
} 
else 
{
    $data = array('status' => 0, 'message' => 'Dosya yüklenirken hata oluştu.') ;
}
header('Content-Type: application/json');
echo json_encode($data);
?>