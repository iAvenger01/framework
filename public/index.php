<?php

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../routes/api.php';

use App\Core\Request;
use App\Kernel;

$request = Request::createFromGlobals();
$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();