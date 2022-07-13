<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Slim\Http\Request;
use Slim\Http\Response;
use Psr7Middlewares\Middleware;
use Psr\Http\Message\ServerRequestInterface;

// Dependency Injection

$container->set('helper', function($c) {
    $helper = new \stdClass();
    // Create the logger
    $helper->logger = new Logger('QuranApp');
    // Now add some handlers
    $helper->logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));

    return $helper;
});

$container->set('model', function($c) {
    $model = new \stdClass();

    return $model;
});

$container->set('client', function($c) {
    $client = new \stdClass();
    $baseUri = getenv('API_BASE_URI') ? getenv('API_BASE_URI') : null;
    $client->AlQuranCloudApi = new \AlQuranCloud\ApiClient\Client($baseUri);

    return $client;
});

$container->set('renderer', function ($container) {
    $path = realpath(__DIR__ . '/../views/') . '/';
    return new \Slim\Views\PhpRenderer($path);
});

// Application middleware
$errorMiddleware = $app->addErrorMiddleware(false, true, true);

$callableResolver = $app->getCallableResolver();
$responseFactory = $app->getResponseFactory();
$errorHandler = new \AlQuranCloud\Handler\AlQuranExceptionHandler($callableResolver, $responseFactory);
$errorMiddleware->setDefaultErrorHandler($errorHandler);


