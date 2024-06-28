<?php

class PC_cForm extends PController
{
    public function index()
    {
        $this->load->getPView('cForm', $this->data);
    }
}
