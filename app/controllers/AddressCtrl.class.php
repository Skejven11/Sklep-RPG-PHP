<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\AddressForm;
use core\Validator;

class AddressCtrl {
    
    private $form;
    public $id;
    public $exists;
    
    public function __construct() {
        $this->form = new AddressForm();
    }
    
     public function getAddress() {
        $exists;
        try{
            $exists = App::getDB()->count("address","user_iduser",[
           'user_iduser' => $this->id 
        ]);
            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        return $exists;
    }
    
    public function getParams()
    {
        $this->form->name = ParamUtils::getFromRequest("name");
        $this->form->surname = ParamUtils::getFromRequest("surname");
        $this->form->street = ParamUtils::getFromRequest("street");
        $this->form->house = ParamUtils::getFromRequest("house");
        $this->form->apartment = ParamUtils::getFromRequest("apartment");
        $this->form->postal = ParamUtils::getFromRequest("postal");
        $this->form->city = ParamUtils::getFromRequest("city");
        $this->form->country = ParamUtils::getFromRequest("country");
      
        if (App::getMessages()->isError())
            $this->generateView();
    }
    
    public function validate() {
        
        $valid = new Validator();
        $valid->validate($this->form->name,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Imię jest wymagane',
        ]);
        
        $valid->validate($this->form->surname,[
            'required' => true,
            'required_message' => 'Nazwisko jest wymagane',
        ]);
        
        $valid->validate($this->form->street,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Ulica jest wymagana',
        ]);
        
        $valid->validate($this->form->house,[
            'numeric' => true,
            'trim' => true,
            'required' => true,
            'required_message' => 'Nr domu jest wymagany',
            'validator_message' => 'Nr domu powinien być liczbą',
        ]);
        
        $valid->validate($this->form->apartment,[
            'trim' => true,
            'numeric' => true,
            'validator_message' => 'Nr domu powinien być liczbą',
        ]);
        
        if ($this->form->apartment==0) $this->form->apartment='-';
        
        $valid->validate($this->form->postal,[
            'trim' => true,
            'required' => true,
            'min_length' => 6,
            'max_length' => 6,
            'required_message' => 'Kod pocztowy jest wymagany',
            'validator_message' => "Nieprawidłowy kod pocztowy",
        ]);
        
        $valid->validate($this->form->city,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Miasto jest wymagane',
        ]);
        
        $valid->validate($this->form->country,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Kraj jest wymagany',
        ]);
        
        if(!App::getMessages()->isError()) return true;
        else return false;
    }
    
    public function toDB(){
        try{
            App::getDB()->insert("address",[
                'first_name' => $this->form->name,
                'last_name' => $this->form->surname,
                'street' => $this->form->street,
                'house' => $this->form->house,
                'apartment' => $this->form->apartment,
                'postal_code' => $this->form->postal,
                'city' => $this->form->city,
                'country' => $this->form->country,
                'user_iduser' => $this->id,
            ]);
            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
    
    public function updateDB(){
        try{
            App::getDB()->update("address",[
                'first_name' => $this->form->name,
                'last_name' => $this->form->surname,
                'street' => $this->form->street,
                'house' => $this->form->house,
                'apartment' => $this->form->apartment,
                'postal_code' => $this->form->postal,
                'city' => $this->form->city,
                'country' => $this->form->country,
                'user_iduser' => $this->id,
            ]);
            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
    
    
    public function action_Address() {	   
        $this->id = SessionUtils::load("iduser", true);
        $this->getParams();
        $this->exists = $this->getAddress();
        
        if($this->validate()){
            if ($this->exists==0) $this->toDB();
            else $this->updateDB();
            header("Location: ".App::getConf()->app_url."/Profile");
        }
        else{
            App::getSmarty()->display('AddressView.tpl');
        }
        
        $this->generateView();  
    }
    
    public function action_Addinit() {
        $this->generateView();
    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('AddressView.tpl');
    }
    
}
