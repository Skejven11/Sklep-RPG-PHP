<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class OrderCtrl {
    
    private $orders;
    private $items;
    private $id;
    private $status;
    private $delete;
    private $idItem, $itemPrice;
    
    public function getParams() {
        $this->status = ParamUtils::getFromRequest('status');
        if ($this->status == '') $this->status = '1';
        $this->delete = ParamUtils::getFromCleanURL(1);
        $this->idItem = ParamUtils::getFromCleanURL(2);
        $this->itemPrice = ParamUtils::getFromCleanURL(3);
    }
    
    public function showOrders() {
        $order;
        try{
            $order = App::getDB()->select("order", [
                "[>]status" => ["status_idstatus" => "idstatus"],
                ],[
                'order.idorder',
                'order.total_price',
                'order.date',
                'status.name',
                'status.idstatus'
                ],[
                'user_iduser' => $this->id,
                'status.idstatus' => $this->status
                ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
        return $order;
    }
    
    public function getItems() {
        $item;
        try{
            $item = App::getDB()->select("rpg_has_order", [
                "[>]rpg" => ["RPG_idRPG" => "idRPG"],
                ],[
                    'rpg_has_order.order_idorder',
                    'rpg_has_order.RPG_idRPG',
                    'rpg_has_order.amount',
                    'rpg.name',
                    'rpg.price'
                ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
        return $item;
    }
    
    public function getOrder () {
        $order;
        
        try {
            $order = App::getDB()->get("order",[
                'idorder'
                ],[
                'user_iduser' => $this->id,
                'status_idstatus' => $this->status
            ]);
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
        return $order;
    }
    
    public function deleteOrder() {
        try {
            $order = $this->getOrder();
            App::getDB()->delete("rpg_has_order",[
                'order_idorder' => $order['idorder']
            ]);
            App::getDB()->delete("order",[
                    'status_idstatus' => 1,
                    'user_iduser' => $this->id
           ]);
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
    }
    
    public function deleteItem() {
        try {
            $order = $this->getOrder();
            $item = App::getDB()->get("rpg_has_order",[
                'amount'
                ],[
                'RPG_idRPG' => $this->idItem,
                'order_idorder' => $order['idorder']
            ]);
            $this->itemPrice *= $item['amount'];
            App::getDB()->delete("rpg_has_order",[
                'RPG_idRPG' => $this->idItem,
                'order_idorder' => $order['idorder']
            ]);
            
            App::getDB()->update("order",[
               'total_price[-]' => $this->itemPrice, 
                ],[
                'user_iduser' => $this->id,
                'status_idstatus' => $this->status
            ]);
            
            $count = App::getDB()->count("rpg_has_order",[
                    'order_idorder' => $order['idorder']
                    ]);
            
            if (!$count) $this->deleteOrder ();
            
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
    }
    
    public function action_Order() {
        $this->getParams();
        $this->id = SessionUtils::load("iduser", true);
        if ($this->delete=='DeleteO') $this->deleteOrder();
        if ($this->delete=='DeleteI') $this->deleteItem();
        $this->orders = $this->showOrders();
        $this->items = $this->getItems();
        
        App::getSmarty()->assign("items",$this->items);  
        App::getSmarty()->assign("orders",$this->orders);        
        App::getSmarty()->display("OrderView.tpl");
        
    }
    
    
}
