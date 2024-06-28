<?php
class C_users extends AdminController{

    // Ürün Yönetimi
    public function index() 
    {
        $del = empty($_GET['del']) ? 0 : $_GET['del'];
        if ($del != 0)
            $this->model->deleteUser($del);

        $this->data['users'] = $this->model->getUsers();
        
        $this->load->view('users', 'list', $this->data);
    }

    // Ürün Ekle
    public function add() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $this->model->createUsers($_POST);
        
        $this->data['modules'] = $this->model->getModuleList();

        $this->load->view('users', 'add', $this->data);
    }

    // Ürün Düzenle
    public function edit() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            $this->model->updateUser($_POST);

        $id = !empty($_GET['id']) ? $_GET['id'] : 0;

        $this->data['access_modules']   = $this->model->getAccessModuleList($id);
        $this->data['modules']          = $this->model->getModuleList();
        $this->data['detail']           = $this->model->getUserDetail($id);
        $this->data['detailLog']        = $this->model->getLogDetail($id);
       
        $this->load->view('users', 'edit', $this->data);
    }
    
    public function profile() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            $this->model->updateUserProfile($_POST, $_COOKIE['user_id']);
        
        $this->data['detail'] = $this->model->getUserDetail($_COOKIE['user_id']);
       
        $this->load->view('users', 'profile', $this->data);
    }
    
}