<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


class ProfileCtrl {
    
    public $id;
    public $userData;
    
    public function validate() {
        $exists = App::getDB()->count("user","iduser",[
           'iduser' => $this->id 
        ]);
        
        if($exists != 1){
            Utils::addErrorMessage("Użytkownik o podanym id nie istnieje!");
        }
        
        if(App::getMessages()->isError()) return false;
        else return true;
    }
    
    public function getUserDB($id){
        $user = null;

        try{
            $user = App::getDB()->get("user", 
            [
                'user.iduser',
                'user.login',
                'user.email',
                'user.role'
            ],[
                'user.iduser' => $id
            ]);
            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return $user;
    }

    
    public function generateView(){
        $this->userData = $this->getUserDB($this->id);
        App::getSmarty()->assign("profile", $this->userData);
        App::getSmarty()->display('ProfileView.tpl');
    }
    
    public function action_Profile() {
        if (empty($this->id)) $this->id = SessionUtils::load("iduser", true);
        
        if(!$this->validate()){
            $this->id = SessionUtils::load("iduser", true);
        }
        $this->generateView();
    }
    
}
