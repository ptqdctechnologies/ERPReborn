<?php

header_remove('x-powered-by');

header('Content-Encoding: gzip');
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header('Pragma: no-cache');
header('Expires: 0');

header_remove('Server');

ob_start("ob_gzhandler");