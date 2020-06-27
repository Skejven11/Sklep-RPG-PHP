<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\SearchForm;

class UserManageCtrl {
    
    private $user;
    private $search;
    private $idUser;
    private $id;
    private $role;
    
    public function __construct() {
        $this->search = new SearchForm();
    }
    
    public function getParams()
    {
        $this->search->name = ParamUtils::getFromRequest('user_nick');
        $this->role = ParamUtils::getFromRequest('role');
        $this->idUser = ParamUtils::getFromCleanURL(1);
    }
    
    public function getUsers()
    {
        $user;
        
        $search_params = [];
        if (isset($this->search->name) && strlen($this->search->name) > 0) {
            $search_params['login[~]'] = $this->search->name . '%';
        }
        
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        
        $where ["ORDER"] = "login";

        try{
            $user = App::getDB()->select("user", [
                'iduser',
                'login',
                'email',
                'role'
            ], $where
                    );
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
            
        return $user;
    }
    
    public function userRole() {
        try {
            App::getDB()->update("user",[
                    'role' => $this->role
                    ],[
                    'iduser' => $this->idUser
                    ]);
        } catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
   

    public function action_UserManage() {
        $this->getParams();
        $this->user = $this->getUsers();
        $this->id = SessionUtils::load("iduser", true);
        
        App::getSmarty()->assign('id', $this->id);
        App::getSmarty()->assign('users', $this->user);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->display("UserManageView.tpl");
        
    }
    
    public function action_ChangeRole() {
        $this->getParams();
        $this->userRole();
        $this->user = $this->getUsers();
        $this->id = SessionUtils::load("iduser", true);
        
        App::getSmarty()->assign('id', $this->id);
        App::getSmarty()->assign('users', $this->user);
        App::getSmarty()->assign('search', $this->search);
        App::getSmarty()->display("UserManageView.tpl");
    }
    
}
