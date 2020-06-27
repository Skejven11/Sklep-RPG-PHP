<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class OrderFinishCtrl {
    
    private $id;
    private $order;
    
    public function updateOrder() {
        try{
            App::getDB()->update("order", [
                'status_idstatus' => 2
                ],[
                'user_iduser' => $this->id,
                'status_idstatus' => 1
                ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
    }
    
    public function checkAddress() {
        $exists;
        try {
           $exists = App::getDB()->has("address",[
               'user_iduser' => $this->id
           ]);
            
        } catch (\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        return $exists;
    }
    
    public function getOrder() {
        $order;
        try {
            $order = App::getDB()->get("order",[
                'total_price',
                'idorder'
                ],[
                'user_iduser' => $this->id,
                'status_idstatus' => 1    
            ]);
            
        } catch (\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        return $order;
    }
    

    public function action_OrderFinish() {
        $this->id = SessionUtils::load("iduser", true);
        if (!$this->checkAddress()) header("Location: ".App::getConf()->app_url."/Addinit");
        else { 
            $this->order = $this->getOrder();
            App::getSmarty()->assign('order',$this->order);
            App::getSmarty()->display("OrderFinishView.tpl");
        }
    }
    
    public function action_OrderEnd() {
        $this->id = SessionUtils::load("iduser", true);
        $this->updateOrder();
        header("Location: ".App::getConf()->app_url."/Order");
    }
}
