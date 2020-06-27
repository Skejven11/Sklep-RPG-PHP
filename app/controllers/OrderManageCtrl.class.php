<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\SearchForm;

class OrderManageCtrl {
    
    private $order;
    private $search;
    private $idOrder;
    private $id;
    private $status;
    private $items;
    
    public function __construct() {
        $this->search = new SearchForm();
    }
    
    public function getParams()
    {
        $this->search->name = ParamUtils::getFromRequest('order_id');
        $this->status = ParamUtils::getFromRequest('status');
        $this->idOrder = ParamUtils::getFromCleanURL(1);
    }
    
    public function getOrders()
    {
        $order;
        
        $search_params = [];
        if (isset($this->search->name) && strlen($this->search->name) > 0) {
            $search_params['idorder[~]'] = $this->search->name . '%';
        }
        
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        
        $where ["ORDER"] = "idorder";

        try{
            $order = App::getDB()->select("order", [
                "[>]status" => ["status_idstatus" => "idstatus"],
                "[>]user" => ["user_iduser" => "iduser"]
                ],[
                'order.idorder',
                'order.total_price',
                'status.name',
                'order.date',
                'user.login'
            ], $where
                    );
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
            
        return $order;
    }
    
    public function getItems() {
        $item;
        try {
        $item = App::getDB()->select("rpg_has_order", [
                "[>]rpg" => ["RPG_idRPG" => "idRPG"],
                ],[
                    'rpg_has_order.order_idorder',
                    'rpg_has_order.amount',
                    'rpg.name',
                ]);
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        return $item;
    }
    
    public function orderStatus() {
        try {
            App::getDB()->update("order",[
                    'status_idstatus' => $this->status
                    ],[
                    'idorder' => $this->idOrder
                    ]);
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
   

    public function action_OrderManage() {
        $this->getParams();
        $this->order = $this->getOrders();
        $this->items = $this->getItems();
        
        App::getSmarty()->assign('items', $this->items);
        App::getSmarty()->assign('orders', $this->order);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->display("OrderManageView.tpl");
        
    }
    
    public function action_ChangeStatus() {
        $this->getParams();
        $this->orderStatus();
        $this->order = $this->getOrders();
        $this->items = $this->getItems();
        
        App::getSmarty()->assign('items', $this->items);
        App::getSmarty()->assign('orders', $this->order);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->display("OrderManageView.tpl");
    }
    
}
