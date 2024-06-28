<?php
class M_contact extends AdminModel
{
    // contact Listesi
    public function getDetail()
    {
        $sql = "SELECT * FROM contact";
        return $this->db->getRows($sql);
    }
}
