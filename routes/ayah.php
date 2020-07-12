<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/ayah', function ($request, $response, $args) {
	if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
		$reference = urldecode($request->getQueryParam('reference'));
	} else {
		$reference = '24:35';
	}
	$ayah = $this->client->AlQuranCloudApi->ayah($reference, 'quran-uthmani-quran-academy');

    return $this->view->render($response, 'ayah.php', [
        'pageTitle' => 'Quran - Surah ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
		'metaDescription' => 'AlQuran Cloud',
		'ayah' => $ayah,
		'reference' => $reference,
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'ayah'
    ]);
});

$app->get('/ayah/{reference}', function ($request, $response, $args) {

	$reference = urldecode($request->getAttribute('reference'));
	if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
		$reference = $request->getQueryParam('reference');
	}
	$ayah = $this->client->AlQuranCloudApi->ayah($reference, 'quran-uthmani-quran-academy');
    return $this->view->render($response, 'ayah.php', [
        'pageTitle' => 'Quran - Surah ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
		'metaDescription' => 'AlQuran Cloud',
		'ayah' => $ayah,
		'reference' => $reference,
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'ayah'
    ]);
});

$app->get('/ayah/{reference}/{edition}', function ($request, $response, $args) {

	$reference = urldecode($request->getAttribute('reference'));
	$edition = $request->getAttribute('edition');
	if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
		$reference = $request->getQueryParam('reference');
	}
	$ayah = $this->client->AlQuranCloudApi->ayah($reference, 'quran-uthmani-quran-academy');
    return $this->view->render($response, 'ayah.php', [
        'pageTitle' => 'Quran - Surah ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
		'metaDescription' => 'AlQuran Cloud',
		'ayah' => $ayah,
		'reference' => $reference,
		'ayahEdition' => $this->client->AlQuranCloudApi->ayah($reference, $edition),
		'editions' => [
			'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'ayah'
    ]);
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
