<?php

class PM_cForm extends PModel
{
    public function saveApp($arr)
    {
        extract($arr);

        if ($this->system->validete_email($cf_email)) {
            $this->msg->add('w', 'Lütfen geçerli bir e-posta adresi giriniz.');
            return false;
        }

        $email_control = $this->db->getValue("SELECT COUNT(*) FROM contact WHERE email='" . trim($cf_email) . "'");
        if ($email_control > 0) {
            $this->msg->add('w', 'Bu e-posta adresi zaten kayıtlı.');
            return false;
        }

        // $phone_control = $this->db->getValue("SELECT COUNT(*) FROM volunteer_list WHERE phone='".trim($phone)."'");
        // if($phone_control > 0)
        // {
        //     $this->msg->add('w', 'Bu telefon numarası zaten kayıtlı.');
        //     return false;
        // }

        // $id_number_verify = $this->system->idNumberVerify($tckn);
        // if ($id_number_verify == false) {
        //     $this->msg->add('w', 'Hatalı T.C. Kimlik Numarası');
        //     return false;
        // }

        $sql = "
                INSERT INTO contact 
                (
                    fullname,
                    email,
                    message,created
                ) 
                VALUES
                (
                    '" . $cf_name . "',
                    '" . $cf_email . "',
                    '" . $cf_message . "',
                    NOW()
                )
                ";

        // Haberi Ekle
        if ($this->db->query($sql)) {
            $this->msg->add('s', 'Bilgileriniz alınmıştır, sizinle iletişime geçilecektir.');
        } else {
            $this->msg->add('w', 'Bilgileriniz alınırken sorun oluştu.');
            return false;
        }
    }
}
