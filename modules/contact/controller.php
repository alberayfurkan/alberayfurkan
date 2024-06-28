<?php
class C_contact extends Controller
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            //form işlemlerinde problem olursa buraya bak
            session_start();
        }

        $this->data['title']            = $this->data['settings']['site_name'] . ' - ' . $this->data['settings']['meta_title'];
        $this->data['description']      = $this->data['settings']['meta_description'];
        $this->data['lang']             = $this->model->getLanguageDetail();
        $this->data['detail']           = $this->model->getContact($this->data['lang']['id']);

        $this->load->view('contact', 'index', $this->data);
    }
}
