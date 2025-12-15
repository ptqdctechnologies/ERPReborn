<?php

use Illuminate\Support\Facades\Facade;

$app = require __DIR__.'/../app/bootstrap/app.php';

// Preload Kernel dan Router
$app->make(Illuminate\Contracts\Http\Kernel::class);