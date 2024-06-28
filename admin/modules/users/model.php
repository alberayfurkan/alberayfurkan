<?php
// Ürün Model
class M_users extends AdminModel {

    // Ürün Listesi
    public function getUsers() 
    {
        $sql = "SELECT * FROM users WHERE status > 0 AND trash != 1";
        return $this->db->getRows($sql);
    }

    // Ürün Listesi
    public function getLogDetail($id) 
    {
        $sql = "SELECT * FROM logs WHERE module = 'Kullanıcı Yönetimi' AND content = $id";
        return $this->db->getRows($sql);
    }
    
    // Ürün Sil
    public function deleteUser($id)
    {
        if($id > 0)  
        {
            $count = $this->db->getValue("SELECT COUNT(*) FROM users WHERE id = $id");
            
            if($count == 1)
            {
                $sql = "DELETE FROM users WHERE id = $id";
                if( $this->db->query($sql) ){
                    $this->msg->add('s', 'İçerik başarıyla silindi.');
                    return true;
                }
            }
            else
            {
                $this->msg->add('w', 'İçerik bulunamadı, daha önce silinmiş olabilir.');
                return false;
            }
            
            
        }
        $this->msg->add('w', 'İçerik silinemedi');
        return false;
    }
    
    public function getModuleList(){
        $sql = "SELECT * FROM modules WHERE status > 0 AND trash != 1";
        return $this->db->getRows($sql);
    }
    
    public function getAccessModuleList($user_id){
        $sql = "SELECT * FROM permissions WHERE admin_id = $user_id";
        return $this->db->getRows($sql);
    }
    
    // Ürün Ekle
    public function createUsers($arr)
    {
        extract($arr);
        $req = array($fullname, $email, $phone, $password, $repassword);
        
        $status = empty($status) ? 0 : 1;

        if( $this->system->is_arr_var_empty( $req ) )
        {
            $this->msg->add( 'w', 'Lütfen gerekli alanları doldurunuz.');
            return false;
        }
        
        if( !$this->system->validate_password($password, $repassword) )
        {
            $this->msg->add( 'w', 'Şifre ile şifre tekrarı uyuşmuyor.' );
            return false;
        }
        
        if( $this->system->validete_email($email) )
        {
            $this->msg->add( 'w', 'Lütfen geçerli bir e-posta adresi giriniz.' );
            return false;
        }
        
        $email_control = $this->db->getValue("SELECT COUNT(*) FROM users WHERE email='".trim($email)."'");
        if($email_control > 0)
        {
            $this->msg->add('w', 'Bu e-posta adresi zaten kayıtlı.');
            return false;
        }
        
        $sql = "INSERT INTO users(
                                    fullname,
                                    email, 
                                    phone,
                                    image,
                                    password, 
                                    status
                                )
                                values
                                (
                                    '".$fullname."',
                                    '" .trim($email). "', 
                                    '" .trim($phone). "', 
                                    '" .$image. "', 
                                    '" .sha1($password). "', 
                                    "  .$status. "
                                )
                ";
        
        $this->db->beginOperation();
        if($this->db->query($sql))
        {
            $id = $this->db->getLastInsertId();
            $this->setLog('Eklendi', 'Kullanıcı Yönetimi', $id, $fullname); 

            foreach($modules as $key => $value)
            {
                $sql = "INSERT INTO permissions(
                         admin_id, module_id 
                         )
                         values
                         (
                         ".$id.", ".$modules[$key]."
                         )
                        ";
                if( $this->db->query($sql) )
                {
                    continue;
                }else
                {
                    $this->db->cancelOperation();
                    return false;
                }
            }

            // 1 numaralı izni Admin/Anasayfa izni
            $sql = "INSERT INTO permissions (admin_id, module_id)
            VALUES (".$id.", 1)";
            $this->db->query($sql);
                        
            $this->db->applyOperation();
            $this->msg->add('s', 'Kullanıcı başarıyla eklendi.');
            $this->system->route('admin', 'users');
            return true;
        }
        else
        {
            $this->msg->add('w', 'Kullanıcı oluşturulurken sorun oluştu.');
            $this->db->cancelOperation();
            return false;
        }
    }
    
    // Ürün Detayı
    public function getUserDetail($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        return $this->db->getRow($sql);
    }
    
    // Ürün Güncelleme
    public function updateUser($arr) 
    {

        extract($arr);
        $req = array($fullname, $email, $phone, $password, $repassword, $id);

        if ($this->system->is_arr_var_empty($req)) {
            $this->msg->add('w', 'Gerekli alanları doldurun!');
            return false;
        }
        
        if( !$this->system->validate_password($password, $repassword) )
        {
            $this->msg->add( 'w', 'Şifre ile şifre tekrarı uyuşmuyor.' );
            return false;
        }
        
        if( $this->system->validete_email($email) )
        {
            $this->msg->add( 'w', 'Lütfen geçerli bir e-posta adresi giriniz.' );
            return false;
        }

        $status = empty($status) ? 0 : 1;
        
        $email_control = $this->db->getValue("SELECT COUNT(*) FROM users WHERE email='".$email."' AND id != $id");
        if($email_control > 0)
        {
            $this->msg->add('w', 'Bu eposta adresini kullanan başka bir kullanıcı var.');
            return false;
        }
        
        if($password == '*')
        {
            $password = '';
        }
        else
        {
            $password = "password        = '".sha1($password)."',";
        }

        //print_r($arr);
        
        $sql = " UPDATE users SET
                        fullname        = '".$fullname."',
                        email           = '".$email."',
                        phone           = '".$phone."',
                        image           = '".$image."',
                        ".$password."
                        status          = ".$status.",
                        updated         = NOW()
                WHERE id = $id ";
        
        $this->db->beginOperation();
        if($this->db->query($sql))
        {

            $num = $this->db->getValue("SELECT COUNT(*) FROM permissions WHERE admin_id=$id");
            if($num > 0)
            {
                if($this->db->query("DELETE FROM permissions WHERE admin_id=$id"))
                {
                    foreach($modules as $key => $value)
                    {
                        $sql = "INSERT INTO permissions (
                                 admin_id, module_id
                                 )
                                 values
                                 (
                                 ".$id.", '".$modules[$key]."'
                                 )
                                ";
                        if( $this->db->query($sql) )
                        {
                            continue;
                        }else
                        {
                            $this->db->cancelOperation();
                            return false;
                        }
                    }
                }
                else{
                    $this->db->cancelOperation();
                     return false;
                }
            }
            else
            {
                foreach($modules as $key => $value)
                {
                    $sql = "INSERT INTO permissions(
                                admin_id, module_id 
                             )
                             values
                             (
                                ".$id.", '".$modules[$key]."'
                             )
                            ";
                    if( $this->db->query($sql) )
                    {
                        continue;
                    }else
                    {
                        $this->db->cancelOperation();
                        return false;
                    }
                }
            }

            // 1 numaralı izni Admin/Anasayfa izni
            $sql = "INSERT INTO permissions (admin_id, module_id)
            VALUES (".$id.", 1)";
            $this->db->query($sql);

            $this->setLog('Güncellendi', 'Kullanıcı Yönetimi', $id, $fullname); 
            $this->db->applyOperation();
            
            $this->msg->add('s', 'Kullanıcı düzenleme işlemi başarıyla gerçekleştirildi.');
            $this->system->route('admin', 'users');
            return true;
        }
    }
    
    
    // Ürün Güncelleme
    public function updateUserProfile($arr, $id) 
    {
        extract($arr);
        $req = array($fullname, $password, $repassword);

        if ($this->system->is_arr_var_empty($req)) {
            $this->msg->add('w', 'Gerekli alanları doldurun!');
            return false;
        }
        
        if( !$this->system->validate_password($password, $repassword) )
        {
            $this->msg->add( 'w', 'Şifre ile şifre tekrarı uyuşmuyor.' );
            return false;
        }
        
        if($password == '*')
        {
            $password = '';
        }
        else
        {
            $password = "password        = '".sha1($password)."',";
        }

        //print_r($arr);

        $sql = " UPDATE users SET
                        fullname        = '".$fullname."',
                        phone           = '".$phone."',
                        image           = '".$image."',
                        ".$password."
                        updated         = NOW()
                WHERE id = $id ";
        
        if($this->db->query($sql))
        {
            $this->msg->add('s', 'Kullanıcı düzenleme işlemi başarıyla gerçekleştirildi.');
            $this->system->route('admin', 'users', 'profile');
            return true;
        }
        else
        {
            $this->msg->add('w', 'Bilgileriniz güncelleniren sorun oluştu');
            $this->system->route('admin', 'users', 'profile');
            return true;
        }
    }
}