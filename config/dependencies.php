<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Slim\Http\Request;
use Slim\Http\Response;
use Vesica\Slim\Middleware\Headers\Validate as HeaderValidationMiddleware;

$container = $app->getContainer();

$container['helper'] = function($c) {
    $helper = new \stdClass();
    // Create the logger
    $helper->logger = new Logger('QuranApp');
    // Now add some handlers
    $helper->logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));

    return $helper;
};

$container['model'] = function($c) {
    $model = new \stdClass();

    return $model;
};

$container['client'] = function($c) {
    $client = new \stdClass();
    $client->AlQuranCloudApi = new \AlQuranCloud\ApiClient\Client();

    return $client;
};

$container['view'] = function ($container) {
    $path = realpath(__DIR__ . '/../views/') . '/';
    return new \Slim\Views\PhpRenderer($path);
};

$container['errorHandler'] = function ($c) {
    return function (Request $request, Response $response, Exception $e) use ($c) {
        $c->helper->logger->error('Slim Error Handler Triggered', ['code' => $e->getCode(), 'message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
        return $c['response']->withStatus($e->getCode())
            ->withHeader('Content-Type', 'text/html')
            ->write($e->getMessage());
    };
};

$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Sorry, we could not find the URL you are after.');
    };
};

/** Invoke Middleware for Load Balancer Checks */
$app->add(new HeaderValidationMiddleware(
        (bool) getenv('LOAD_BALANCER_MODE'),
        'X-LOAD-BALANCER',
        getenv('LOAD_BALANCER_KEY'),
        'Invalid Load Balancer Key.'
    )
);


