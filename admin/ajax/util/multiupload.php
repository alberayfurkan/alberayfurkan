<?php
include '../../ajax.php';
$valid_extensions = array('jpeg', 'jpg', 'JPG', 'png', 'jpeg', 'jfif');
$uploaddir = '../../../uploads/images/';

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
        
        $nimage = explode('.', $img);
        
        $final_image = $system->permalink($nimage[0]).'.'.strtolower($nimage[1]);
        $final_web_p_image = $system->permalink($nimage[0]).'.webp';
        
        if(in_array($ext, $valid_extensions)) 
        {
            $path = $uploaddir.strtolower($final_image);
            if(move_uploaded_file($tmp,$path)) 
            {
                if($i == 0)
                   $data = array('status' => 1, 'files' => array());
                
                convertImageToWebP($path, $uploaddir.$final_web_p_image);
                $data['files'][$i] = array('url' => $config->get('URL').'uploads/images/'.$final_web_p_image, 'image' => $final_web_p_image);
                //$data = array('status' => 1, 'url' => $config->get('URL').'uploads/images/'.$final_image, 'image' => $final_image);
            }
            else
                $data = array('status' => 0, 'message' => 'Dosya yüklenirken hata oluştu. Hata Kodu : '.$system->fileErrorText($_FILES["file"]["error"])) ;       
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


function convertImageToWebP($source, $destination, $quality = 50){
    
    $file_extension = pathinfo($source, PATHINFO_EXTENSION);
    if ($file_extension == 'jpeg' || $file_extension == 'jpg'){
        $image = imagecreatefromjpeg($source);
    } 
    else if($file_extension == 'gif'){
        $image = imagecreatefromgif($source);
    }
    else if($file_extension == 'png') {
        $image = imagecreatefrompng($source);
    }else{
        die("Unsupported format!");
    }
    
    return imagewebp($image, $destination, $quality);
}
?>