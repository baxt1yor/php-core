<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Website\Core\Application;

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__).'/.env');

$config = require dirname(__DIR__).'/config/config.php';

$application = new Application(dirname(__DIR__), $config);

$application->run();