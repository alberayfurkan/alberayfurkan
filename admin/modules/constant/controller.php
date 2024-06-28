<?php
class C_constant extends AdminController
{

    // Haber Yönetimi
    public function index()
    {
        $this->load->view('constant', 'index', $this->data);
    }

    // Haber Ekle
    public function tr()
    {
        $id = 'tr';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $updated_ini_content = $_POST["detail"];
            $updated_ini_content = stripslashes($updated_ini_content);

            // Yeni "php.ini" dosyasını oluşturur
            $updated_ini_file = fopen("../lang/tr.ini", "w");

            fwrite($updated_ini_file, $updated_ini_content);

            fclose($updated_ini_file);

            $this->data['content']  = $updated_ini_file;
            $this->data['createLog']    = $this->model->createLog($id);

            $this->msg->add('s', 'İçerik başarıyla düzenlendi');
            $this->system->route('admin', 'constant', 'tr');

        } else {
            $ini_file = fopen("../lang/tr.ini", "r");
            $ini_content = fread($ini_file, filesize("../lang/tr.ini"));
            fclose($ini_file);

            $this->data['content']  = $ini_content;
        }
        
        $this->data['detailLog']    = $this->model->getLogDetail($id);

        $this->load->view('constant', 'tr', $this->data);
    }

    // Haber Düzenle
    public function en()
    {
        $id = 'en';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $updated_ini_content = $_POST["detail"];
            $updated_ini_content = stripslashes($updated_ini_content);

            // Yeni "php.ini" dosyasını oluşturur
            $updated_ini_file = fopen("../lang/en.ini", "w");

            fwrite($updated_ini_file, $updated_ini_content);

            fclose($updated_ini_file);

            $this->data['content']  = $updated_ini_file;
            $this->data['createLog']    = $this->model->createLog($id);

            $this->msg->add('s', 'İçerik başarıyla düzenlendi');
            $this->system->route('admin', 'constant', 'en');

        } else {
            $ini_file = fopen("../lang/en.ini", "r");
            $ini_content = fread($ini_file, filesize("../lang/en.ini"));
            fclose($ini_file);

            $this->data['content']  = $ini_content;
        }
        $this->data['detailLog']    = $this->model->getLogDetail($id);

        $this->load->view('constant', 'en', $this->data);
    }

    public function de()
    {
        $id = 'de';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $updated_ini_content = $_POST["detail"];
            $updated_ini_content = stripslashes($updated_ini_content);

            // Yeni "php.ini" dosyasını oluşturur
            $updated_ini_file = fopen("../lang/de.ini", "w");

            fwrite($updated_ini_file, $updated_ini_content);

            fclose($updated_ini_file);

            $this->data['content']  = $updated_ini_file;
            $this->data['createLog']    = $this->model->createLog($id);

            $this->msg->add('s', 'İçerik başarıyla düzenlendi');
            $this->system->route('admin', 'constant', 'de');

        } else {
            $ini_file = fopen("../lang/de.ini", "r");
            $ini_content = fread($ini_file, filesize("../lang/de.ini"));
            fclose($ini_file);

            $this->data['content']  = $ini_content;
        }
        $this->data['detailLog']    = $this->model->getLogDetail($id);

        $this->load->view('constant', 'de', $this->data);
    }
}
