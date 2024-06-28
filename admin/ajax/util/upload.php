<?php
include '../../ajax.php';
$valid_extensions = array('jpeg', 'jpg', 'png', 'jpeg', 'mp4', 'jfif');
$uploaddir = '../../../uploads/images/';

$system = System::getInstance();

$data = array();

if (isset($_FILES)) {
    $error = false;
    $files = array();
    
    foreach ($_FILES as $file) 
    {
        $img = $file['name'];
        $tmp = $file['tmp_name'];

        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        
        $new_image = str_replace('.'.$ext, '', $img);
        $new_image = $system->permalink($new_image);
        
        $final_image = $new_image.'.'.$ext;
        $final_web_p_image = $new_image.'.webp';
        
        if(in_array($ext, $valid_extensions)) 
        {
            $path = $uploaddir.strtolower($final_image); 
            if(move_uploaded_file($tmp,$path))
            {
                convertImageToWebP($path, $uploaddir.$final_web_p_image);
                $data = array('status' => 1, 'url' => $config->get('URL').'uploads/images/'.$final_web_p_image, 'image' => $final_web_p_image);
                
            }
            else
                $data = array('status' => 0, 'message' => 'Dosya yüklenirken hata oluştu. Hata Kodu') ;      
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