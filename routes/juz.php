<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/juzs', function ($request, $response, $args) {
    return $this->get('renderer')->render($response, 'juz-list.php', [
        'pageTitle' => 'Quran Juz',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'juz'
    ]);
});

$app->get('/juz', function ($request, $response, $args) {
    return $this->get('renderer')->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz 1',
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $this->get('client')->AlQuranCloudApi->juz('1', 'quran-uthmani-quran-academy'),
		'editions' => [
			'editions' => $this->get('client')->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'juz'
    ]);
});

$app->get('/juz/{reference}', function ($request, $response, $args) {
	$reference = $request->getAttribute('reference');
	$juz = $this->get('client')->AlQuranCloudApi->juz($reference, 'quran-uthmani-quran-academy');
    return $this->get('renderer')->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz ' . $juz->data->number,
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $juz,
		'editions' => [
			'editions' => $this->get('client')->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'juz'
    ]);
});

$app->get('/juz/{reference}/{edition}', function ($request, $response, $args) {

	$reference = $request->getAttribute('reference');
	$edition = $request->getAttribute('edition');
	$juz = $this->get('client')->AlQuranCloudApi->juz($reference, 'quran-uthmani-quran-academy');
	$juzEdition = $this->get('client')->AlQuranCloudApi->juz($reference, $edition);
    return $this->get('renderer')->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz ' . $juz->data->number . ' - ' . $juzEdition->data->edition->name,
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $juz,
		'juzEdition' => $juzEdition,
		'editions' => [
			'editions' => $this->get('client')->AlQuranCloudApi->editions(null, null, 'text'),
		],
		'view' => 'juz'
    ]);
});
