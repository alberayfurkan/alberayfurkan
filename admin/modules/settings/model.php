<?php
class M_settings extends AdminModel
{

    public function getSettings($id)
    {
        $sql = "SELECT * FROM settings WHERE id = " . $id;
        return $this->db->getRow($sql);
    }

    public function updateSetting($arr)
    {
        extract($arr);

        $sql = "UPDATE settings SET
                    lang_id                 = '" . $lang_id . "',
                    site_name               = '" . $site_name . "',
                    meta_title              = '" . $meta_title . "',
                    meta_description        = '" . $meta_description . "',
                    email                   = '" . $email . "',
                    whatsapp                = '" . $whatsapp . "',
                    image                   = '" . $image . "',
                    mobil_image             = '" . $mobil_image . "',
                    logo_square             = '" . $square_image . "',
                    favicon                 = '" . $favicon_image . "',
                    updated                 = NOW()
                WHERE id = $id";

        if ($this->db->query($sql)) {
            $this->msg->add('s', 'İçerik başarıyla düzenlendi');
            $this->system->route('admin', 'settings');
        } else {
            $this->db->cancelOperation();
            $this->msg->add('w', 'İçerik düzenlenirken sorun oluştu.');
            return false;
        }
    }
}
