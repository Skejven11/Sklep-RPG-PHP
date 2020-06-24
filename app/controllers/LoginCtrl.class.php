<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\LoginForm;
use core\Validator;

class LoginCtrl {

    private $form;
    private $accountData;

    public function __construct() {
        $this->form = new LoginForm();
    }
    
    public function getParams(){
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->pass = ParamUtils::getFromRequest("pass");
    }

    public function validate() {
        
     if(!$this->form->checkIsNull()) return false;
     
     $valid = new Validator();
     
     $valid->validate($this->form->login,[
        'trim' => true,
        'required' => true,
        'required_message' => 'Login jest wymagany',
        'min_length' => 3,
        'max_length' => 32,
        'validator_message' => 'Login powinien zawierać od 3 do 32 znaków'
     ]);
     
     $valid->validate($this->form->pass,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
     ]);
     
     if(App::getMessages()->isError()) return false;
     
     try{
         $this->accountData = App::getDB()->get("user", [
            'iduser',
            'login',
            'pass',
            'role',
        ],[
            'login' => $this->form->login,
            'pass' => md5($this->form->pass),
        ]);
         
         if(empty($this->accountData)){
            Utils::addErrorMessage("Nieprawidłowy login lub hasło");
        }
        
     } catch (\PDOException $e) {
         Utils::addErrorMessage("Błąd połączenia z bazą danych");
     }
     
     if(!App::getMessages()->isError()) return true;
     else return false;
     
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        $this->getParams();
        if ($this->validate()) {
            SessionUtils::store("iduser", $this->accountData["iduser"]);
            SessionUtils::store("role", $this->accountData["role"]);
            RoleUtils::addRole($this->accountData['role']); 
            header("Location: ".App::getConf()->app_url."/Home");
        } 
        else {
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('Home');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); 
        App::getSmarty()->display('LoginView.tpl');

    }

}
