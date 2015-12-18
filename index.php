<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require_once 'Autoloader.php';


\Mobius\Autoloader::init();

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];

$directories = str_replace(basename($self), '', $self);
$requestString = str_replace($directories, '', $uri);

$requestString = strtolower($requestString);

$requestParams = explode("/", $requestString);

$controller = array_shift($requestParams);

$action = array_shift($requestParams);

\Mobius\Core\Database::setInstance(
    \Mobius\Config\DatabaseConfig::DB_INSTANCE,
    \Mobius\Config\DatabaseConfig::DB_DRIVER,
    \Mobius\Config\DatabaseConfig::DB_USER,
    \Mobius\Config\DatabaseConfig::DB_PASS,
    \Mobius\Config\DatabaseConfig::DB_NAME,
    \Mobius\Config\DatabaseConfig::DB_HOST
);

if($controller =="index.php"){
    $controller = 'users';
    $action = 'register';
}

$app = new \Mobius\Application($controller, $action, $requestParams);
$app->start();

//to register user you must go: http://localhost:(your port)/MobiusTask/users/register
//to login user you must go: http://localhost:(your port)/MobiusTask/users/login
//I use port 8004, to work links you must change 8004 to your port.
//SQL script in repository.









