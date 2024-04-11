<?php

declare(strict_types=1);
// error_reporting(0);
// session_start();

require_once __DIR__ . '/vendor/autoload.php';

use App\Router\Router;
use App\View\View;

$router = new Router();

$router->addRoute('/explorer/', [View::class, 'explorer']);

$router->sendResponse();
