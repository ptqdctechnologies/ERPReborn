<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;
use Illuminate\Support\Facades\Log;

class DocumentWorkflowComposer
{
    public function compose(View $view)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $sessionUserRefID   = Session::get('SessionUser_RefID');
            $cacheKey           = 'BusinessDocumentType';
            $cacheTTL           = 86400; // 24 hrs

            $cachedData = Helper_Redis::getValue(Helper_Environment::getUserSessionID_System(), $cacheKey);

            if (!$cachedData) {
                $response = Helper_APICall::setCallAPIGateway(
                    Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'transaction.read.dataList.master.getBusinessDocumentType',
                    'latest',
                    [
                        'parameter'     => [],
                        'SQLStatement'  => [
                            'pick'      => null,
                            'sort'      => null,
                            'filter'    => null,
                            'paging'    => null
                        ]
                    ],
                    false
                );

                if ($response['metadata']['HTTPStatusCode'] !== 200) {
                    Helper_Redis::setValue($sessionUserRefID, $cacheKey, json_encode([]), $cacheTTL);

                    throw new \Exception('Failed to fetch Business Document Issuance Disposition Count');
                }

                Helper_Redis::setValue($sessionUserRefID, $cacheKey, json_encode($response['data']['data']), $cacheTTL);
            }
        } catch (\Throwable $th) {
            Log::error("Document Workflow Composer Compose Function Error: " . $th->getMessage());
        }
    }
}
