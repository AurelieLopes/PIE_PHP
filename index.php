<?php

//echo '<pre>', var_dump($_POST), '</pre>';
//echo '<pre>', var_dump($_GET), '</pre>';
//echo '<pre>', var_dump($_SERVER), '</pre>';

define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']);
$app = new Core\Core();
$app->run();