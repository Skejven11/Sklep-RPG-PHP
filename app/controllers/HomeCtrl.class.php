<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\SearchForm;

class HomeCtrl {
    
    private $genreDis;
    private $rpgs;
    private $search;
    private $idUser;
    private $idItem;
    private $itemPrice;
    
    public function __construct() {
        $this->search = new SearchForm();
    }
    
    public function getParams()
    {
        $this->search->name = ParamUtils::getFromRequest('item_name');
    }
    
    public function getGenreDB()
    {
        $genres;

        try{
            $genres = App::getDB()->select("genre", 
            [
                "Genname",
            ]);
            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return $genres;
    }
    
    public function getRpgDB()
    {
        $rpg;
        
        $this->getParams();
        
        $search_params = [];
        if (isset($this->search->name) && strlen($this->search->name) > 0) {
            $search_params['name[~]'] = $this->search->name . '%';
        }
        
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        
        $where ["ORDER"] = "name";

        try{
            $rpg = App::getDB()->select("rpg", [
                "[>]genre" => ["Genre_idGenre" => "idGenre"],
            ],[
                'rpg.idRPG',
                'rpg.name',
                'rpg.publisher',
                'rpg.author',
                'rpg.price',
                'genre.Genname',
            ], $where
                    );
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
            
        return $rpg;
    }
    
    public function getOrder()
    {
        $order;
        
        try {
            $order = App::getDB()->get("order",
                    [
                        'idorder',
                        'total_price',
                    ],[
                        'user_iduser' => $this->idUser,
                        'status_idstatus' =>1
                    ]);
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
        return $order;
    }
    
    public function toOrder($idItem, $idUser) {
        $exists;
        $order;
        
        try {
            $exists = App::getDB()->has("order",[
                'user_iduser' => $idUser,
                'status_idstatus' => 1,    
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        if (!$exists) {
            try {
                App::getDB()->insert("order",[
                'user_iduser' => $idUser,
                'date' => (new \DateTime())->format('Y-m-d H:i:s'),
                'total_price' => $this->itemPrice,
                'status_idstatus' => 1,
            ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage("Błąd połączenia z bazą danych!");
            }
            $order = $this->getOrder();
        }
        else {
            $order = $this->getOrder();
            $order['total_price'] +=$this->itemPrice; 
            try{
                App::getDB()->update("order",[
                    'total_price' => $order['total_price'],
                ],[
                    'user_iduser' => $this->idUser,
                    'status_idstatus' =>1  
                ]);
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage("Błąd połączenia z bazą danych!");
            }
        }
        
        try {
            App::getDB()->insert("rpg_has_order",[
                'RPG_idRPG' => $this->idItem,
                'order_idorder' => $order['idorder'],
                'amount' => 1,
            ]);
        } catch (\PDOException $e) {
                Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
    }
    
    public function action_Home() {
		        
        $this->genreDis = $this->getGenreDB();
        $this->rpgs = $this->getRpgDB();
        
        App::getSmarty()->assign('rpg', $this->rpgs);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->assign('genres', $this->genreDis);
        App::getSmarty()->display("HomeView.tpl");
        
    }
    
    public function action_HomeOrder () {
        $this->idItem = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->itemPrice = ParamUtils::getFromCleanURL(2, true, 'Błędne wywołanie aplikacji');
        
        $this->idUser = SessionUtils::load("iduser", true);
        $this->toOrder($this->idItem, $this->idUser);
        $this->genreDis = $this->getGenreDB();
        $this->rpgs = $this->getRpgDB();

        App::getSmarty()->assign('rpg', $this->rpgs);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->assign('genres', $this->genreDis);
        App::getSmarty()->display("HomeView.tpl");
    }
    
}
