<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\ItemForm;
use core\Validator;

class AddItemCtrl {
    
    private $form;
    
    public function __construct() {
        $this->form = new ItemForm();
    }
    
    public function getParams()
    {
        $this->form->name = ParamUtils::getFromRequest("name");
        $this->form->author = ParamUtils::getFromRequest("author");
        $this->form->publisher = ParamUtils::getFromRequest("publisher");
        $this->form->price = ParamUtils::getFromRequest("price");
        $this->form->idgenre = ParamUtils::getFromRequest("genre");      
    }
    
    public function validate() {
        
        if(!$this->form->checkNull()) return false;
        
        $valid = new Validator();
        $valid->validate($this->form->name,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Nazwa jest wymagana',
            'max_length' => 32,
            'validator_message' => 'Nazwa do 32 znaków!!!11111!!11!!'
        ]);
        
        $valid->validate($this->form->author,[
            'required' => true,
            'required_message' => 'Autor (bądź autorzy) jest wymagany',
            'max_length' => 64,
            'validator_message' => 'Hasło powinno zawierac od 3 do 32 znaków'
        ]);
        
        $valid->validate($this->form->publisher,[
            'trim' => true,
            'required' => true,
            'max_length' => 32,
            'required_message' => 'Dystrybutor jest wymagany',
            'validator_message' => "Nieprawidłowy adres email"
        ]);
        
        $valid->validate($this->form->price,[
            'numeric' => true,
            'trim' => true,
            'required' => true,
            'required_message' => 'Cena jest wymagana',
            'validator_message' => "Zła cena"
        ]);
        
        $valid->validate($this->form->idgenre,[
            'trim' => true,
            'required' => true,
            'max_length' => 32,
            'required_message' => 'Gatunek jest wymagany',
            'validator_message' => "Błędny gatunek :)"
        ]);
        
        $this->Duplicate();
        
        if(!App::getMessages()->isError()) return true;
        else return false;
    }
    
    public function toDB(){
        try{
            App::getDB()->insert("rpg",[
                
                'name' => $this->form->name,
                'publisher' => $this->form->publisher,
                'author' => $this->form->author,
                'price' => $this->form->price,
                'Genre_idGenre' => $this->form->idgenre,
            ]);
            
            Utils::addInfoMessage("Produkt został dodany");
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
    
    public function Duplicate(){
        try{
            $nameCount = App::getDB()->has("rpg", [
                'name' => $this->form->name,
            ]);
            
            if($nameCount){
                Utils::addErrorMessage("Produkt już jest w katalogu");
            }

        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }
    
    
     public function action_AddItem() {	        
        $this->getParams();
        if($this->validate()){
            $this->toDB();
            $this->generateView();
        }
        else{
            App::getSmarty()->display('AddItemView.tpl');
        }
    }
    
    public function generateView() {
        header("Location: ".App::getConf()->app_url."/Home");
    }
    
}
