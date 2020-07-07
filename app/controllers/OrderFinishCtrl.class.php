<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class OrderFinishCtrl {
    
    private $idOrder;
    private $idUser;
    private $order;
    
    public function updateOrder() {
        try{
            App::getDB()->update("order", [
                'status_idstatus' => 2
                ],[
                'idorder' => $this->idOrder
                ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
    }
    
    public function checkAddress() {
        $exists;
        try {
           $exists = App::getDB()->has("address",[
               'user_iduser' => $this->idUser
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
                'idorder' => $this->idOrder
            ]);
            
        } catch (\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        return $order;
    }
    

    public function action_OrderFinish() {
        $this->idUser = SessionUtils::load("iduser", true);
        $this->idOrder = ParamUtils::getFromCleanURL(1);
        if (!$this->checkAddress()) header("Location: ".App::getConf()->app_url."/Addinit");
        else { 
            $this->order = $this->getOrder();
            $this->updateOrder();
            App::getSmarty()->assign('order',$this->order);
            App::getSmarty()->display("OrderFinishView.tpl");
        }
    }
    
}
