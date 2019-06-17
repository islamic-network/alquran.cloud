<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/surahs', function ($request, $response, $args) {

    return $this->view->render($response, 'surah-list.php', [
        'pageTitle' => 'Surahs of the Quran',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'surah',
		'suwar' => $this->client->AlQuranCloudApi->surahs()
    ]);
});

$app->get('/surah', function ($request, $response, $args) {

	$surah = $this->client->AlQuranCloudApi->surah('1', 'quran-uthmani');

    return $this->view->render($response, 'surah.php', [
        'pageTitle' => 'Quran - Surah ' . $surah->data->englishName . ' (' . $surah->data->name. ')',
		'metaDescription' => 'AlQuran Cloud',
		'surah' => $surah,
		'suwar' => $this->client->AlQuranCloudApi->surahs(),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'surah'
    ]);
});

$app->get('/surah/{reference}', function ($request, $response, $args) {

	$reference = $request->getAttribute('reference');
	$surah = $this->client->AlQuranCloudApi->surah($reference, 'quran-uthmani');
    return $this->view->render($response, 'surah.php', [
        'pageTitle' => 'Quran - Surah ' . $surah->data->englishName . ' (' . $surah->data->name. ')',
		'metaDescription' => 'AlQuran Cloud',
		'surah' => $surah,
		'suwar' => $this->client->AlQuranCloudApi->surahs(),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'surah'
    ]);
});

$app->get('/surah/{reference}/{edition}', function ($request, $response, $args) {

	$reference = $request->getAttribute('reference');
	$edition = $request->getAttribute('edition');
	$surah = $this->client->AlQuranCloudApi->surah($reference, 'quran-uthmani');
    return $this->view->render($response, 'surah.php', [
        'pageTitle' => 'Quran - Surah ' . $surah->data->englishName . ' (' . $surah->data->name. ')',
		'metaDescription' => 'AlQuran Cloud',
		'surah' => $surah,
		'surahEdition' => $this->client->AlQuranCloudApi->surah($reference, $edition),
		'suwar' => $this->client->AlQuranCloudApi->surahs(),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'surah'
    ]);
});
