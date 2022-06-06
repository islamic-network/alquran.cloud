<?php
/** PHP Error handling **/
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
/** PHP Error handling Ends **/

/** Autoloader **/
require_once realpath(__DIR__) . '/../vendor/autoload.php';

// Instantiate the app
$container = new \DI\Container();
\Slim\Factory\AppFactory::setContainer($container);
$app = \Slim\Factory\AppFactory::create();
$app->addRoutingMiddleware();
$container = $app->getContainer();
