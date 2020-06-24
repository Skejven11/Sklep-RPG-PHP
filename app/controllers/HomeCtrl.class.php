<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\SearchForm;

class HomeCtrl {
    
    public $genreDis;
    public $rpgs;
    public $search;
    
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
    
    public function action_Home() {
		        
        $this->genreDis = $this->getGenreDB();
        $this->rpgs = $this->getRpgDB();
        App::getSmarty()->assign('rpg', $this->rpgs);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->assign('genres', $this->genreDis);
        App::getSmarty()->display("HomeView.tpl");
        
    }
    
}
