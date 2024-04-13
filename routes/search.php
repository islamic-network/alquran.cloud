<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/search', function ($request, $response, $args) {

    $keyword = isset($request->getQueryParams()['keyword']) ? $request->getQueryParams()['keyword'] : null;
    $language = isset($request->getQueryParams()['language']) ? $request->getQueryParams()['language'] : null;
    $edition = isset($request->getQueryParams()['edition']) ? $request->getQueryParams()['edition'] : null;
    $surah = isset($request->getQueryParams()['surah']) ? $request->getQueryParams()['surah'] : null;
    $res = [];
    $results = [];
    if ($keyword !== null && $keyword != '') {
        if ($surah !== null) {
            foreach ((array) $surah as $s) {
                if ((int)$s > 0 && (int)$s < 115) {
                    if ($language !== null || $edition !== null) {
                        // Get Language only if edition === null
                        if ($edition === null) {
                            foreach ((array) $language as $lang) {
                                try {
                                $results[] = $this->get('client')->AlQuranCloudApi->searchSurah($keyword, $s, $lang);
                                } catch (\Exception $e) {
                                    $this->get('helper')->logger->info($e->getMessage(), [$keyword, $surah, $edition, $language]);
                                }
                            }
                        } else {
                            foreach ((array) $edition as $ed) {
                                try {
                                $results[] = $this->get('client')->AlQuranCloudApi->searchSurah($keyword, $s, $ed);
                                } catch (\Exception $e) {
                                    $this->get('helper')->logger->info($e->getMessage(), [$keyword, $surah, $edition, $language]);
                                }
                            }
                        }
                    } else {
                        try {
                            $results[] = $this->get('client')->AlQuranCloudApi->searchSurah($keyword, $s, null);
                        } catch (\Exception $e) {
                            $this->get('helper')->logger->info($e->getMessage(), [$keyword, $surah, $edition, $language]);
                        }
                    }
                }
            }
        } else {
            if ($language !== null || $edition !== null) {
                // Get Language only if edition === null
                if ($edition === null) {
                    foreach ((array) $language as $lang) {
                        try {
                            $results[] = $this->get('client')->AlQuranCloudApi->searchSurah($keyword, null, $lang);
                        } catch (\Exception $e) {
                            $this->get('helper')->logger->info($e->getMessage(), [$keyword, $surah, $edition, $language]);
                        }
                    }
                } else {
                    foreach ((array) $edition as $ed) {
                        try {
                            $results[] = $this->get('client')->AlQuranCloudApi->searchSurah($keyword, null, $ed);
                        } catch (\Exception $e) {
                            $this->get('helper')->logger->info($e->getMessage(), [$keyword, $surah, $edition, $language]);
                        }
                    }
                }
            } else {
                try {
                    $results[] = $this->get('client')->AlQuranCloudApi->search($keyword, $surah, null);
                } catch (\Exception $e) {
                    $this->get('helper')->logger->info($e->getMessage(), [$keyword, $surah, $edition, $language]);
                }
            }
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

    return $this->get('renderer')->render($response, 'search.php', [
        'pageTitle' => 'Al Quran Cloud',
        'metaDescription' => 'AlQuran Cloud',
        'results' => $formatted,
        'keyword' => $keyword,
        'language' => $language,
        'surah' => $surah,
        'edition' => $edition,
        'suwar' => $this->get('client')->AlQuranCloudApi->surahs(),
        'editions' => [
            'editions' => $this->get('client')->AlQuranCloudApi->editions(null, null, 'text')
        ],
        'view' => 'search'
    ]);
});
