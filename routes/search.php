<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/search', function ($request, $response, $args) {

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
                                $results[] = $this->client->AlQuranCloudApi->searchSurah($keyword, $s, $lang);
                            }
                        }
                        if (is_array($edition)) {
                            foreach ($edition as $ed) {
                                $results[] = $this->client->AlQuranCloudApi->searchSurah($keyword, $s, $ed);
                            }
                        }
                    } else {
                        $results[] = $this->client->AlQuranCloudApi->searchSurah($keyword, $s, null);
                    }
                }
            }
        } else {
            if ($language !== null || $edition !== null) {
                if (is_array($language)) {
                    foreach ($language as $lang) {
                        $results[] = $this->client->AlQuranCloudApi->searchSurah($keyword, null, $lang);
                    }
                }
                if (is_array($edition)) {
                    foreach ($edition as $ed) {
                        $results[] = $this->client->AlQuranCloudApi->searchSurah($keyword, null, $ed);
                    }
                }
            } else {
                $results[] = $this->client->AlQuranCloudApi->search($keyword, $surah, null);
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
    }

    $formatted = new \stdClass();
    $formatted->data = new \stdClass();
    $formatted->data->matches = $res;
    $formatted->data->count = count($res);

    return $this->view->render($response, 'search.php', [
        'pageTitle' => 'Al Quran Cloud',
        'metaDescription' => 'AlQuran Cloud',
        'results' => $formatted,
        'keyword' => $keyword,
        'language' => $language,
        'surah' => $surah,
        'edition' => $edition,
        'suwar' => $this->client->AlQuranCloudApi->surahs(),
        'editions' => [
            'editions' => $this->client->AlQuranCloudApi->editions(null, null, 'text')
        ],
        'view' => 'search'
    ]);
});
