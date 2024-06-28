<?php

class PM_menu extends PModel
{
    public function getLogo($lang_id)
    {
        $sql = "SELECT image FROM settings WHERE lang_id = '" . $lang_id . "'";

        return $this->db->getRow($sql);
    }
}
