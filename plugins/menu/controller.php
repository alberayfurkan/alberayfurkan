<?php

class PC_menu extends PController
{
    public function index()
    {
        $lang                       = $this->model->getLangDetail();
        $this->data['logo']         = $this->model->getLogo($lang['id']);

        $this->load->getPView('menu', $this->data);
    }

}
