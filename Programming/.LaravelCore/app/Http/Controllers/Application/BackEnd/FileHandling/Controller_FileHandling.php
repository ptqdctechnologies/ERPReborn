<?php

namespace App\Http\Controllers\Application\BackEnd\FileHandling {

    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Redis;

    class Controller_FileHandling extends \App\Http\Controllers\Controller
        {
        public function __construct()
            {
            }

        public function FileDownload()
            {
$download_me = "download me...";
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=test.txt");
echo $download_me;
            }
        }
    }