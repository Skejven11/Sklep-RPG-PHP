<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('Home'); #default action
App::getRouter()->setLoginRoute('LoginShow');

Utils::addRoute('Home', 'HomeCtrl');
Utils::addRoute('HomeOrder', 'HomeCtrl', ['user','admin','sprzedawca']);

Utils::addRoute('Order', 'OrderCtrl', ['user', 'admin', 'sprzedawca']);
Utils::addRoute('OrderFinish', 'OrderFinishCtrl', ['user', 'admin', 'sprzedawca']);

Utils::addRoute('OrderManage', 'OrderManageCtrl', ['sprzedawca']);
Utils::addRoute('ChangeStatus', 'OrderManageCtrl', ['sprzedawca']);

Utils::addRoute('UserManage', 'UserManageCtrl', ['admin']);
Utils::addRoute('ChangeRole', 'UserManageCtrl', ['admin']);

Utils::addRoute('Profile', 'ProfileCtrl', ['user', 'admin', 'sprzedawca']);
Utils::addRoute('Address', 'AddressCtrl');
Utils::addRoute('Addinit', 'AddressCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('LoginShow', 'LoginCtrl');
Utils::addRoute('Logout', 'LoginCtrl');

Utils::addRoute('RegiSave', 'RegiCtrl');
Utils::addRoute('RegiShow', 'RegiCtrl');

Utils::addRoute('AddItem', 'AddItemCtrl', ['sprzedawca']);