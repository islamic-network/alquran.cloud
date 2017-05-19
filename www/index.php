<?php
require '../vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use AlQuranCloud\Renderer\Generic;

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$config = [
    'settings' => [
        'displayErrorDetails' => false
    ],
];

$app = new \Slim\App($config);

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logId = uniqid();
    $logStamp = time();
    $logFile = date('Y-m-d', $logStamp);
    // Create the logger
    $logger = new Logger('QuranApp');
    // Now add some handlers
    $logger->pushHandler(new StreamHandler(__DIR__.'/../logs/' . $logFile . '.log', Logger::DEBUG));
    return $logger;
};

$container['view'] = function ($container) {
    $path = realpath(__DIR__ . '/../views/') . '/';
    return new \Slim\Views\PhpRenderer($path);
};

/*** Main Site ***/

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


/**** QURAN ****/
$app->get('/quran', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	//$this->logger->info('test', ['1']);
    return $this->view->render($response, 'quran.php', [
        'pageTitle' => 'The Holy Quran',
		'metaDescription' => 'A Complete Rendering and Recitation of the Quran',
		'quran' => $aqc->quran('quran-simple'),
		'suwar' => $aqc->surahs(),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/quran/{edition}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$edition = $request->getAttribute('edition');
	//$this->logger->info('test', ['1']);
    return $this->view->render($response, 'quran.php', [
        'pageTitle' => 'Al Quran Cloud',
		'metaDescription' => 'AlQuran Cloud',
		'quran' => $aqc->quran('quran-simple'),
		'suwar' => $aqc->surahs(),
		'quranEdition' => $aqc->quran($edition),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

/**** SURAH ****/
$app->get('/surah', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$surah = $aqc->surah('1', 'quran-simple');
	//$this->logger->info('test', ['1']);
    return $this->view->render($response, 'surah.php', [
        'pageTitle' => 'Quran - Surah ' . $surah->data->englishName . ' (' . $surah->data->name. ')',
		'metaDescription' => 'AlQuran Cloud',
		'surah' => $surah,
		'suwar' => $aqc->surahs(),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/surah/{reference}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	//$this->logger->info('test', ['1']);
	$reference = $request->getAttribute('reference');
	$surah = $aqc->surah($reference, 'quran-simple');
    return $this->view->render($response, 'surah.php', [
        'pageTitle' => 'Quran - Surah ' . $surah->data->englishName . ' (' . $surah->data->name. ')',
		'metaDescription' => 'AlQuran Cloud',
		'surah' => $surah,
		'suwar' => $aqc->surahs(),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/surah/{reference}/{edition}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$reference = $request->getAttribute('reference');
	$edition = $request->getAttribute('edition');
	$surah = $aqc->surah($reference, 'quran-simple');
    return $this->view->render($response, 'surah.php', [
        'pageTitle' => 'Quran - Surah ' . $surah->data->englishName . ' (' . $surah->data->name. ')',
		'metaDescription' => 'AlQuran Cloud',
		'surah' => $surah,
		'surahEdition' => $aqc->surah($reference, $edition),
		'suwar' => $aqc->surahs(),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

/**** JUZ ****/
$app->get('/juz', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	//$this->logger->info('test', ['1']);
    return $this->view->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz 1',
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $aqc->juz('1', 'quran-simple'),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/juz/{reference}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	//$this->logger->info('test', ['1']);
	$reference = $request->getAttribute('reference');
	$juz = $aqc->juz($reference, 'quran-simple');
    return $this->view->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz ' . $juz->data->number,
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $juz,
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/juz/{reference}/{edition}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$reference = $request->getAttribute('reference');
	$edition = $request->getAttribute('edition');
	$juz = $aqc->juz($reference, 'quran-simple');
	$juzEdition = $aqc->juz($reference, $edition);
    return $this->view->render($response, 'juz.php', [
        'pageTitle' => 'Quran - Juz ' . $juz->data->number . ' - ' . $juzEdition->data->edition->name,
		'metaDescription' => 'AlQuran Cloud',
		'juz' => $juz,
		'juzEdition' => $juzEdition,
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

/**** AYAH *****/
$app->get('/ayah', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
		$reference = urldecode($request->getQueryParam('reference'));
	} else {
		$reference = '24:35';
	}
	$ayah = $aqc->ayah($reference, 'quran-simple');
	//$this->logger->info('test', ['1']);
    return $this->view->render($response, 'ayah.php', [
        'pageTitle' => 'Quran - Surah ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
		'metaDescription' => 'AlQuran Cloud',
		'ayah' => $ayah,
		'reference' => $reference,
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/ayah/{reference}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$reference = urldecode($request->getAttribute('reference'));
	if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
		$reference = $request->getQueryParam('reference');
	}
	$ayah = $aqc->ayah($reference, 'quran-simple');
    return $this->view->render($response, 'ayah.php', [
        'pageTitle' => 'Quran - Surah ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
		'metaDescription' => 'AlQuran Cloud',
		'ayah' => $ayah,
		'reference' => $reference,
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/ayah/{reference}/{edition}', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$reference = urldecode($request->getAttribute('reference'));
	$edition = $request->getAttribute('edition');
	if ($request->getQueryParam('reference') !== null && $request->getQueryParam('reference') != '') {
		$reference = $request->getQueryParam('reference');
	}
	$ayah = $aqc->ayah($reference, 'quran-simple');
    return $this->view->render($response, 'ayah.php', [
        'pageTitle' => 'Quran - Surah ' . $ayah->data->surah->englishName . ' Ayah ' . $ayah->data->numberInSurah . ' (' . $ayah->data->surah->number . ':' . $ayah->data->numberInSurah . ')',
		'metaDescription' => 'AlQuran Cloud',
		'ayah' => $ayah,
		'reference' => $reference,
		'ayahEdition' => $aqc->ayah($reference, $edition),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text'),
		],
		'view' => 'home'
    ]);
});

$app->get('/search', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
	$keyword = $request->getQueryParam('keyword');
	$language = $request->getQueryParam('language');
	$edition = $request->getQueryParam('edition');
	$surah = $request->getQueryParam('surah');
	$res = [];
	if ($keyword !== null && $keyword != '') {
		if ($surah !== null) {
			foreach ( (array) $surah as $s) {
				if ((int) $s > 0 && (int) $s < 115) {
					if ($language !== null || $edition !== null) {
						if (is_array($language)) {
							foreach ($language as $lang) {
								$results[] = $aqc->searchSurah($keyword, $s, $lang);
							}
						}
						if (is_array($edition)) {
							foreach ($edition as $ed) {
								$results[] = $aqc->searchSurah($keyword, $s, $ed);
							}
						}
                    } else {
						$results[] = $aqc->searchSurah($keyword, $s, null);
					}
				}
			}
		} else {
			if ($language !== null || $edition !== null) {
				if (is_array($language)) {
					foreach ($language as $lang) {
						$results[] = $aqc->searchSurah($keyword, null, $lang);
					}
				}
				if (is_array($edition)) {
					foreach ($edition as $ed) {
						$results[] = $aqc->searchSurah($keyword, null, $ed);
					}
				}
			} else {
				$results[] = $aqc->search($keyword, $surah, null);
			}
        }
			foreach ($results as $result) {
                if (isset($result->data->matches)) {
                    foreach ($result->data->matches as $ays) {
                        $res[] = $ays;
                    }
				}
			}
		$res = array_unique($res, SORT_REGULAR);
		
		$formatted = new \stdClass();
		$formatted->data = new \stdClass();
		$formatted->data->matches = $res;
		$formatted->data->count = count($res);

	} else {
		$results = [];
	}
	
	
	//echo json_encode($formatted);exit;
			
    return $this->view->render($response, 'search.php', [
        'pageTitle' => 'Al Quran Cloud',
		'metaDescription' => 'AlQuran Cloud',
		'results' => $formatted,
		'keyword' => $keyword,
		'language' => $language,
		'surah' => $surah,
		'edition' => $edition,
		'suwar' => $aqc->surahs(),
		'editions' => [
			'editions' => $aqc->editions(null, null, 'text')
		],
		'view' => 'home'
    ]);
});

$app->get('/read', function ($request, $response, $args) {
    return $this->view->render($response, 'read.php', [
        'pageTitle' => 'Read / Stream the Quran',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'read'
    ]);
});

$app->get('/surahs', function ($request, $response, $args) {
	$aqc = new \AlQuranCloud\ApiClient\Client;
    return $this->view->render($response, 'surah-list.php', [
        'pageTitle' => 'Surahs of the Quran',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'read',
		'suwar' => $aqc->surahs()
    ]);
});

$app->get('/juzs', function ($request, $response, $args) {
    return $this->view->render($response, 'juz-list.php', [
        'pageTitle' => 'Quran Juz',
		'metaDescription' => 'AlQuran Cloud',
		'view' => 'read'
    ]);
});



// Run app
$app->run();
