<?php
class M_contact extends Model
{

    public function getContact($lang_id)
    {
        $sql = "SELECT address, phone, email, maps, facebook, twitter, youtube, instagram from settings WHERE lang_id =" . $lang_id;
        return $this->db->getRow($sql);
    }
}
