<?php
class M_login extends Model {
     
    // Kullanıcı Kontrolü
    public function getUserCount($email, $password)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = '".$email."' AND password ='".$password."' AND status > 0 AND trash != 1";
        return $this->db->getValue($sql);
    }
    
    // Kullanıcı Bilgieri
    public function getUserDetail($email, $password)
    {
        $sql = "SELECT id, fullname, email, password FROM users WHERE email = '".$email."' AND password ='".$password."' AND status > 0 AND trash != 1";
        return $this->db->getRow($sql);
    }
    
    // Oturum Bilgilerini veritananına yaz
    public function createSession($id)
    {
        $ip_address = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
        $key = sha1($this->config->get('SECRET_KEY').$ip_address.session_id());
        
        $sql = "UPDATE users SET token='".$key."', ip_address = '".$ip_address."', updated = NOW() WHERE id = $id ";
        if($this->db->query($sql)){
            return true;
        }
        return false;
    }
    
    // Kullanıcı Bilgilerini Al
    public function getUser($email, $password)
    {
        $sql = 'SELECT
                    id, 
                    firstname, 
                    lastname
                    email 
                FROM admin 
                WHERE 
                    email="'.$email.'" AND
                    password="'.$password.'" AND
                    status = 1
                LIMIT 1';
        return $this->db->getRow($sql);
    }
    
    
     
    public function userResetPassword($arr, $data)
    {
        extract($arr);
        $req = array($password, $repassword, $data['e'], $data['a']);

        if ($this->system->is_arr_var_empty($req)) {
            $this->msg->add('w', 'Gerekli alanları doldurunuz!');
            return false;
        }

        if( !$this->system->validate_password($password, $repassword) )
        {
            $this->msg->add( 'w', '<h4>Parola ve Parola Tekrarı Uyuşmuyor!</h4> Şifre ve tekrarı aynı değil .' );
            return false;
        }

        if( $this->system->validete_email($data['e']) )
        {
            $this->msg->add( 'w', '<h4>Hatalı eposta adresi!</h4> Eposta adresini hatalı girdiniz. Lütfen kontrol edip tekrar deneyiniz.' );
            return false;
        }
        
        $sql = "UPDATE admin SET password = '".sha1($password)."' WHERE email='".$data['e']."' AND activation_code='".$data['a']."' AND status > 0";
        if($this->db->query($sql)){
            return true;
        }else{
            return false;
        }
    }
       
    public function userControlReminder($email)
    {
        $sql = 'select count(*) from admin where email="'.$email.'" and status = 1 limit 1';
        return $this->db->getValue($sql);
    }
    
    public function userControlReset($email, $activation_code)
    {
        $sql = 'select count(*) from admin where email="'.$email.'" and activation_code ="'.$activation_code.'" and status = 1 limit 1';
        return $this->db->getValue($sql);
    }
   
    public function reminderPasword($email, $activation_code)
    {
        $sql = "UPDATE admin SET activation_code = '".$activation_code."' WHERE email='".$email."' AND status > 0";
        
        $this->db->beginOperation();
        if($this->db->query($sql))
        {
            try 
            {
                $mail = new PhpMailer(true); //New instance, with exceptions enabled

                $body = '
                       Merhabalar,<br>
                       Aşağıdaki linke tıklayarak şifrenizi sıfırlayabilirsiniz.<br><br>
                       <a href="'.$this->config->get('URL').'login/reset/?a='.$activation_code.'&e='.$email.'">Şifreni Sıfırla</a><br><br>
                        ';

                $mail->IsSMTP();                                // tell the class to use SMTP
                $mail->SMTPAuth   = true;                       // enable SMTP authentication
                $mail->SMTPSecure = 'tls'; 
                $mail->Port       = 587;                        // set the SMTP server port
                $mail->Host       = '';          // SMTP server
                $mail->Username   = '';      // SMTP server username
                $mail->Password   = '';             // SMTP server password

                $mail->From       = '';
                $mail->FromName   = "";

                $to = $email;

                $mail->AddAddress($to);

                $mail->Subject  = 'Şifre Sıfırlama';
                $mail->AltBody    = ""; // optional, comment out and test
                $mail->WordWrap   = 80; // set word wrap

                $mail->MsgHTML($body);
                $mail->IsHTML(true); // send as HTML
                $mail->Send();
            } 
            catch (phpmailerException $e) 
            {
                $this->msg->add('s', 'Teknik bir sorun nedeniyle sıfırlama maili gönderilemedi. Lütfen kısa bir süre sonra tekrar deneyiniz.'. $e->errorMessage());
                $this->db->cancelOperation();
                return false;
            }
            
            $this->db->applyOperation();
            $this->msg->add('s', 'Şifre sıfırlama maili, mail adresinize gönderilmiştir.');
            $this->system->redirect($this->config->get('URL').'admin/login/'); 

        }
    }
}

