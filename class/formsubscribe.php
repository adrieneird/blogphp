<?php

class FormSubscribe {
    public $pseudo;
    public $mail;
    public $mail2;
    public $pwd;
    public $pwd2;
    
    public function __construct() {
        $this->pseudo = $this->sanitize('pseudo');
        $this->mail = $this->sanitize('mail');
        $this->mail2 = $this->sanitize('mail2');
        $this->pwd = $this->sanitize('pwd');
        $this->pwd2 = $this->sanitize('pwd2');
    }
    
    private function sanitize($name) {
        if (isset($_POST[$name])) {
            if (!empty($_POST[$name])) {
                return trim(htmlentities($_POST[$name]));
            }
        }
        return null;
    }
    
    private function checkMail() {
        if ($this->mail !== $this->mail2) {
            echo "Mails différents";
            return false;
        }
        return true;
    }
    
    private function checkPwd() {
        if ($this->pwd !== $this->pwd2) {
            echo "Pwd différents";
            return false;
        }
        return true;
    }
    
    private function checkMailUnique() {
        $query = "SELECT mail FROM user WHERE mail=:mail";
        $stmt = Db::getDb()->prepare($query);
        $stmt->execute(['mail' => $this->mail]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "Mail déjà existant";
            return false;
        }
        return true;
    }
    
    public function process() {
        if (!empty($this->pseudo) && !empty($this->mail) && !empty($this->mail2) && !empty($this->pwd) && !empty($this->pwd2)) {
            $check = true;
                
            // Vérification des emails
            if (!$this->checkMail()) {
                $check = false;
            }
            
            // Vérification des pwd
            if (!$this->checkPwd()) {
                $check = false;
            }
            
            // Vérification des emails
            if (!$this->checkMailUnique()) {
                $check = false;
            }
                
            if ($check) {
                $user = new User();
                $user->mail = $this->mail;
                $user->nickname = $this->pseudo;
                $user->password = password_hash($this->pwd, PASSWORD_DEFAULT);
                $user->save();
            } else {
                echo "Erreur dans la saisie";
            }
        } else {
            echo "Certains champs sont vides";
        }
    }
}