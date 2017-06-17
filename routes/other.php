<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'home.php', [
        'pageTitle' => 'Al Quran Cloud',
		'metaDescription' => 'AlQuran Cloud - A resource to read, hear and progamatically interact with the Quran',
		'view' => 'home'
    ]);
});

$app->get('/arabic-fonts', function ($request, $response, $args) {
    return $this->view->render($response, 'arabic-fonts.php', [
        'pageTitle' => 'Arabic Fonts',
		'metaDescription' => 'Arabic Fonts',
		'view' => 'home'
    ]);
});

$app->get('/adhans', function ($request, $response, $args) {
    return $this->view->render($response, 'adhans.php', [
        'pageTitle' => 'Adhan Player',
		'metaDescription' => 'Listen to Adhans',
		'view' => 'adhans'
    ]);
});

$app->get('/api', function ($request, $response, $args) {
    return $this->view->render($response, 'api.php', [
        'pageTitle' => 'Quran API',
		'metaDescription' => 'A RESTful Quran API to retrieve an Ayah, Surah, Juz or the enitre Holy Quran',
		'view' => 'home'
    ]);
});

$app->get('/about', function ($request, $response, $args) {
    return $this->view->render($response, 'about.php', [
        'pageTitle' => 'About Al Quran Cloud',
		'metaDescription' => 'Al Quran Cloud is an online Quran resource',
		'view' => 'home'
    ]);
});


$app->get('/cdn', function ($request, $response, $args) {
    return $this->view->render($response, 'cdn.php', [
        'pageTitle' => 'Al Quran Cloud Content Delivery Network',
		'metaDescription' => 'The Al Quran Cloud Content Delivery Network for Quran Recitation Audio Files and Quran Ayah Images',
		'view' => 'home'
    ]);
});

$app->get('/api-clients', function ($request, $response, $args) {
    return $this->view->render($response, 'api-client.php', [
        'pageTitle' => 'Al Quran Cloud API Clients',
		'metaDescription' => 'API Clients and Code Samples to interact with the API',
		'view' => 'home'
    ]);
});

$app->get('/download-media', function ($request, $response, $args) {
    return $this->view->render($response, 'download-media.php', [
        'pageTitle' => 'Download Media',
		'metaDescription' => 'Download Audio Files and Quran Ayah Images',
		'view' => 'home'
    ]);
});

$app->get('/contact', function ($request, $response, $args) {
    return $this->view->render($response, 'contact.php', [
        'pageTitle' => 'Contact',
		'metaDescription' => 'Contact Information',
		'view' => 'home'
    ]);
});

$app->get('/terms-and-conditions', function ($request, $response, $args) {
    return $this->view->render($response, 'terms-and-conditions.php', [
        'pageTitle' => 'Terms and Conditions',
		'metaDescription' => 'Terms and Conditions',
		'view' => 'home'
    ]);
});

$app->get('/contributors', function ($request, $response, $args) {
    return $this->view->render($response, 'contributors.php', [
        'pageTitle' => 'Al Quran Cloud Contributors',
		'metaDescription' => 'Contributors to the Al Quran Cloud',
		'view' => 'home'
    ]);
});
