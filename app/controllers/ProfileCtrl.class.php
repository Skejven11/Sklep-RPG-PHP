<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;


class ProfileCtrl {
    
    public $id;
    private $userData;
    public $exists;
    private $addressData;
    
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
    
    public function getAddress($id) {
        $address;
        
        try{
            $this->exists = App::getDB()->count("address","user_iduser",[
           'user_iduser' => $this->id 
            ]);
            
            if ($this->exists == '0') {
                $address['first_name'] = '-';
                $address['last_name'] = '-';
                $address['street'] = '-';
                $address['house'] = '-';
                $address['apartment'] = '-';
                $address['postal_code'] = '-';
                $address['city'] = '-';
                $address['country'] = '-';
                
                return $address;
            }
            
            $address = App::getDB()->get("address",
            [
                'first_name',
                'last_name',
                'street',
                'house',
                'apartment',
                'postal_code',
                'city',
                'country'
                ],[
                'user_iduser' => $id
            ]);
            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
        return $address;
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
        
        $this->addressData = $this->getAddress($this->id);
        
        App::getSmarty()->assign('exists', $this->exists);
        App::getSmarty()->assign('address', $this->addressData);
        
        
        $this->generateView();
    }
    
}
