<?php
class C_settings extends AdminController{

    // Haber Yönetimi
    public function index() 
    {
        $this->load->view('settings', 'list', $this->data);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            if (!isset($site_name) || !isset($id))
                $this->msg->add('w', 'Gerekli alanları doldurun!');
            else
                $this->model->updateSetting($_POST);
        }

        $id = !empty($_GET['id']) ? $_GET['id'] : 0;

        $this->data['detail']       = $this->model->getSettings($id);
        $this->data['languages']    = $this->model->getLanguageList();

        $this->load->view('settings', 'edit', $this->data);
    }
    
}