<?php
// Setup app.
require_once realpath(__DIR__) . '/../config/init.php';
require_once realpath(__DIR__) . '/../config/dependencies.php';

// Load routes
require_once realpath(__DIR__) . '/../routes/quran.php';
require_once realpath(__DIR__) . '/../routes/juz.php';
require_once realpath(__DIR__) . '/../routes/surah.php';
require_once realpath(__DIR__) . '/../routes/ayah.php';
require_once realpath(__DIR__) . '/../routes/search.php';
require_once realpath(__DIR__) . '/../routes/other.php';

// Run app
$app->run();
