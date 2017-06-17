<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/juzs', function ($request, $response, $args) {
    return $this->view->render($response, 'juz-list.php', [
        'pageTitle' => 'Quran Juz',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'read'
    ]);
});

$app->get('/juz', function ($request, $response, $args) {
	
	//$this->logger->info('test', ['1']);
    return $this->view->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz 1',
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $this->client->AlQuranCloudApi->juz('1', 'quran-simple'),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/juz/{reference}', function ($request, $response, $args) {
	
	//$this->logger->info('test', ['1']);
	$reference = $request->getAttribute('reference');
	$juz = $this->client->AlQuranCloudApi->juz($reference, 'quran-simple');
    return $this->view->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz ' . $juz->data->number,
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $juz,
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/juz/{reference}/{edition}', function ($request, $response, $args) {
	
	$reference = $request->getAttribute('reference');
	$edition = $request->getAttribute('edition');
	$juz = $this->client->AlQuranCloudApi->juz($reference, 'quran-simple');
	$juzEdition = $this->client->AlQuranCloudApi->juz($reference, $edition);
    return $this->view->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz ' . $juz->data->number . ' - ' . $juzEdition->data->edition->name,
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $juz,
		'juzEdition' => $juzEdition,
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});
