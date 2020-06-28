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
    private $count;
    private $page;
    private $genre;
    public function __construct() {
        $this->search = new SearchForm();
    }
    
    public function getParams() {
        $this->search->name = ParamUtils::getFromRequest('item_name');
        $this->genre = ParamUtils::getFromRequest('genre');
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
    
    public function countRPGs() {
        $count;
        try {
            $count = App::getDB()->count("rpg",[
                'rpg.name[~]' => $this->search->name
                ]);
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        $count /=9;
        $count = intval($count);
        $count +=1;
        
        return $count;
    }
    
    public function getRpgDB()
    {
        $rpg;
        if (!isset($this->page)) $this->page = 1;
        $min = ($this->page-1)*9;
        
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
            ],[
                'rpg.name[~]' => $this->search->name,
                'genre.Genname[~]' => $this->genre,
                "LIMIT" =>[$min,9]
            ],);
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
        $existsO;
        $existsI;
        $order;
        
        try {
            $existsO = App::getDB()->has("order",[
                'user_iduser' => $idUser,
                'status_idstatus' => 1,    
            ]);
        if (!$existsO) {
                App::getDB()->insert("order",[
                'user_iduser' => $idUser,
                'date' => (new \DateTime())->format('Y-m-d H:i:s'),
                'total_price' => $this->itemPrice,
                'status_idstatus' => 1,
            ]);
        }
        else {
                App::getDB()->update("order",[
                    'total_price[+]' => $this->itemPrice,
                ],[
                    'user_iduser' => $this->idUser,
                    'status_idstatus' =>1  
                ]);
                
        }
        
        $order = $this->getOrder();
        
        $existsI = App::getDB()->has("rpg_has_order",[
                'order_idorder' => $order['idorder'],
                'RPG_idRPG' => $this->idItem,    
            ]);
        
        if (!$existsI) {
            App::getDB()->insert("rpg_has_order",[
                'RPG_idRPG' => $this->idItem,
                'order_idorder' => $order['idorder'],
                'amount' => 1
            ]);
        }
        else {
            App::getDB()->update("rpg_has_order",[
                'amount[+]' => 1
                ],[
                'RPG_idRPG' => $this->idItem,
                'order_idorder' => $order['idorder'],
                ]);
        }
        
        } catch (\PDOException $e) {
                Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        
    }

    public function action_Home() {
	$this->getParams();
        $this->page = ParamUtils::getFromCleanURL(1);
        $this->genreDis = $this->getGenreDB();
        $this->rpgs = $this->getRpgDB();
        $this->count = $this->countRPGs();
        
        App::getSmarty()->assign('count', $this->count);
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
        $this->getParams();
        $this->genreDis = $this->getGenreDB();
        $this->rpgs = $this->getRpgDB();
        $this->count = $this->countRPGs();
        
        App::getSmarty()->assign('count', $this->count);
        App::getSmarty()->assign('rpg', $this->rpgs);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->assign('genres', $this->genreDis);
        App::getSmarty()->display("HomeView.tpl");
    }
    
}
