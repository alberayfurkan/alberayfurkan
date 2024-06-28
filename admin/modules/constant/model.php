<?php
class M_constant extends AdminModel
{

    public function getLogDetail($id)
    {
        $sql = "SELECT * FROM logs WHERE module = 'Sabit İçerikler' AND detail = '".$id."'";
        return $this->db->getRows($sql);
    }

    public function createLog($id)
    {
        $this->setLog('Güncellendi', 'Sabit İçerikler', "1", $id);
    }
}
