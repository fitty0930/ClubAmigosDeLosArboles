<?php

require_once "controllers/visitor.controller.php"; // visitante
// require_once "controllers/usuario.controller.php"; // usuarios del sitio
require_once "Router.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

if (!isset($_GET['action'])){
    $_GET['action'] = '';
}


$r= new Router();

$r->addRoute("home","GET","VisitorController", "showTrees");

// DEFAULT
$r->setDefaultRoute("VisitorController", "showTrees");

$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 