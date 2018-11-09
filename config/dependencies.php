<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$container = $app->getContainer();

$container['helper'] = function($c) {
    $helper = new \stdClass();
    $logId = uniqid();
    $logStamp = time();
    $logFile = date('Y-m-d', $logStamp);
    // Create the logger
    $helper->logger = new Logger('QuranApp');
    // Now add some handlers
    //$helper->logger->pushHandler(new StreamHandler(__DIR__.'/../logs/' . $logFile . '.log', Logger::DEBUG));
    $helper->logger->pushHandler(new \Monolog\Handler\ErrorLogHandler());

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

/**
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $r = [
        'code' => 404,
        'status' => 'Not Found',
        'data' => 'Invalid endpoint or resource.'
        ];
        $resp = json_encode($r);

        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->write($resp);
    };

};

 */
