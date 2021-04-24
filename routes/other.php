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
		'view' => 'api'
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
		'view' => 'api'
    ]);
});

$app->get('/api-clients', function ($request, $response, $args) {
    return $this->view->render($response, 'api-client.php', [
        'pageTitle' => 'Al Quran Cloud API Clients',
		'metaDescription' => 'API Clients and Code Samples to interact with the API',
		'view' => 'api'
    ]);
});

$app->get('/download-media', function ($request, $response, $args) {
    return $this->view->render($response, 'download-media.php', [
        'pageTitle' => 'Download Media',
		'metaDescription' => 'Download Audio Files and Quran Ayah Images',
		'view' => 'api'
    ]);
});

$app->get('/tajweed-guide', function ($request, $response, $args) {
    return $this->view->render($response, 'tajweed-guide.php', [
        'pageTitle' => 'Tajweed Guide',
		'metaDescription' => 'How to Parse and Dispaly Quran Tajweed text',
		'view' => 'api'
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

$app->get('/liveness', function (Request $request, Response $response) {
    return $response->withJson('OK', 200);
});

$app->get('/arabic-font-edition-tester', function ($request, $response, $args) {
    if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
        $reference = urldecode($request->getQueryParam('reference'));
    } else {
        $reference = '24:35';
    }
    $ayah = $this->client->AlQuranCloudApi->ayah($reference, 'quran-uthmani-quran-academy');

    return $this->view->render($response, 'arabic-script-checker.php', [
        'pageTitle' => 'Arabic Font Edition Tester - ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
        'metaDescription' => 'AlQuran Cloud',
        'ayah' => $ayah,
        'reference' => $reference,
        'editions' => [
            'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
        ],
        'view' => 'api'
    ]);

});
