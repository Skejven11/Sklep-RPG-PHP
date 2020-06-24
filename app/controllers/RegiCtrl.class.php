<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\RegiForm;
use core\Validator;

class RegiCtrl {
    
    private $form;
    
    public function __construct() {
        $this->form = new RegiForm();
    }
    
    public function getParams()
    {
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->password = ParamUtils::getFromRequest("password");
        $this->form->email = ParamUtils::getFromRequest("email");
        
        if (App::getMessages()->isError())
            $this->generateView();
    }
    
    public function validate() {
        
        $valid = new Validator();
        $valid->validate($this->form->login,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Login jest wymagany',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Login powinien zawierać od 3 do 32 znaków'
        ]);
        
        $valid->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
            'min_length' => 3,
            'max_length' => 32,
            'validator_message' => 'Hasło powinno zawierac od 3 do 32 znaków'
        ]);
        
        $valid->validate($this->form->email,[
            'email' => true,
            'trim' => true,
            'required' => true,
            'min_length' => 4,
            'max_length' => 128,
            'required_message' => 'Email jest wymagany',
            'validator_message' => "Nieprawidłowy adres email"
        ]);
        
        $this->Duplicate();
        
        if(!App::getMessages()->isError()) return true;
        else return false;
    }
    
    public function toDB(){
        try{
            App::getDB()->insert("user",[
                'login' => $this->form->login,
                'pass' => md5($this->form->password),
                'email' => $this->form->email,
                'role' => 'user'
            ]);
            
            Utils::addInfoMessage("Konto zostało utworzone");
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
    
    public function Duplicate(){
        try{
            $loginCount = App::getDB()->has("user", [
                'login' => $this->form->login
            ]);
            
            $emailCount = App::getDB()->has("user",[
                'email' => $this->form->email
            ]);
            
            if($loginCount){
                Utils::addErrorMessage("Podany login jest zajęty");
            }

            if($emailCount){
                Utils::addErrorMessage("Podany email jest zajęty");
            }

        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }
    
    public function action_RegiShow() {	        
        $this->generateView();  
    }
    
     public function action_RegiSave() {	        
        $this->getParams();
        if($this->validate()){
            $this->toDB();
            App::getSmarty()->display('LoginView.tpl');
        }
        else{
            App::getSmarty()->display('RegiView.tpl');
        }
    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('RegiView.tpl');
    }
    
}
