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

$dateTime = new DateTime();
$stringTime = $dateTime->format('Y-m-d H:i:s');
//$com = new \Mobius\BindingModels\Comments\CommentsBindingModel('dffasf',2,$stringTime);
////var_dump($com);
//
//$user = new \Mobius\BindingModels\Users\UserBindingModel('dffsf','12345');

//$result = \Mobius\Models\CommentsRepository::create()->filterById(2)->delete();
//var_dump($result);


//var_dump($comments);


$app = new \Mobius\Application($controller, $action, $requestParams);
$app->start();








