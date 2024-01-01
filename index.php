<?php

declare(strict_types = 1);
session_start();
require_once __DIR__ . "/env/settings.php";
require_once __DIR__ . "/vendor/autoload.php";

use OlineShop\App\Router;

$mainControllerNameSpace = "OlineShop\\Controllers\\MainController";
$cartControllerNameSpace = "OlineShop\\Controllers\\CartController";
$productsControllerNameSpace = "OlineShop\\Controllers\\ProductsController";
$usersControllersNameSpace = "OlineShop\\Controllers\\UsersController";

Router::add('/', 'get', $mainControllerNameSpace, 'index');
Router::add('/login', 'get', $usersControllersNameSpace, 'login');
Router::add('/login', 'post', $usersControllersNameSpace, 'authenticate');
Router::add('/logout', 'get', $usersControllersNameSpace, 'logout');
Router::add('/register', 'get', $usersControllersNameSpace, 'index');
Router::add('/register', 'post', $usersControllersNameSpace, 'add');
Router::add('/cart', 'get', $cartControllerNameSpace, 'index');
Router::add('/notfound', 'get', $mainControllerNameSpace, 'pageNotFound');
Router::add('/product/{id}', 'get',$productsControllerNameSpace , 'index');


Router::run();