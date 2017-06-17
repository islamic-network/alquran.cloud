<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/read', function ($request, $response, $args) {
    return $this->view->render($response, 'read.php', [
        'pageTitle' => 'Read / Stream the Quran',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'read'
    ]);
});

$app->get('/quran', function ($request, $response, $args) {

    return $this->view->render($response, 'quran.php', [
        'pageTitle' => 'The Holy Quran',
		'metaDescription' => 'A Complete Rendering and Recitation of the Quran',
		'quran' => $this->client->AlQuranCloudApi->quran('quran-simple'),
		'suwar' => $this->client->AlQuranCloudApi->surahs(),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/quran/{edition}', function ($request, $response, $args) {

	$edition = $request->getAttribute('edition');
	
    return $this->view->render($response, 'quran.php', [
        'pageTitle' => 'Al Quran Cloud',
		'metaDescription' => 'AlQuran Cloud',
		'quran' => $this->client->AlQuranCloudApi->quran('quran-simple'),
		'suwar' => $this->client->AlQuranCloudApi->surahs(),
		'quranEdition' => $this->client->AlQuranCloudApi->quran($edition),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});
