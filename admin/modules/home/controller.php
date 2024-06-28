<?php
class C_home extends AdminController
{
    public function index()
    {
        $this->load->view('home', 'index', $this->data);
    }

    public function noaccess()
    {
        $this->loginCheck();

        $this->load->view('home', 'noaccess', $this->data);
    }
}
