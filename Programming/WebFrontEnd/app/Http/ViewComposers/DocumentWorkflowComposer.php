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

class DocumentWorkflowComposer
{
    public function compose(View $view)
    {
        $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');

        if (Redis::get("RedisGetMyDocument" . $SessionWorkerCareerInternal_RefID) == null) {
            $redisTTL = 300; // 24 Jam

            $varAPIWebToken = Session::get('SessionLogin');

            $apiResponse = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.resume.master.getBusinessDocumentIssuanceDispositionCount',
                'latest',
                [
                    'parameter' => [
                        'recordID' => $SessionWorkerCareerInternal_RefID
                    ]
                ],
                false
            );

            if (isset($apiResponse['metadata']['HTTPStatusCode']) && $apiResponse['metadata']['HTTPStatusCode'] === 200) {
                //$dataAPIResponse = $apiResponse['data']['data'][0]['document']['content']['dataCount'];
                $dataAPIResponse = $apiResponse['data']['data']['document']['content']['businessDocumentFormCount'];

                Helper_Redis::setValue(
                    $varAPIWebToken, 
                    "RedisGetMyDocument" . $SessionWorkerCareerInternal_RefID, 
                    $dataAPIResponse,
                    $redisTTL
                );
            } else {
                return response()->json(['error' => 'Invalid API response'], 500);
            }
        }

        $CountDocumentWorkflowComposer = Helper_Redis::getValue(
            Helper_Environment::getUserSessionID_System(),
            "RedisGetMyDocument" . $SessionWorkerCareerInternal_RefID
        );

        $compact = [
            'CountDocumentWorkflowComposer' => $CountDocumentWorkflowComposer
        ];

        $view->with($compact);
    }
}
