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
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$errorMiddleware->setErrorHandler(
    Slim\Exception\HttpNotFoundException::class,
    function (ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails) use ($container) {
        $response = new Response();
        $response->getBody()->write('Sorry, we could not find the URL you are after.');
        return $response->withStatus(404);
    });

$errorMiddleware->setErrorHandler(
    HttpMethodNotAllowedException::class,
    function (ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails) use ($container) {
        $logger = $containter->get('logger)');
        $logger->error('Slim Error Handler Triggered', ['code' => $exception->getCode(), 'message' => $exception->getMessage(), 'trace' => $exception->getTraceAsString()]);
        $response = new Response();
        $response->getBody()->write($exception->getMessage());
        return $response->withStatus($exception->getCode());
    });



