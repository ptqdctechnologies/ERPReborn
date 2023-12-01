<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class DocumentWorkflowComposer
{
    public function compose(View $view)
    {
        $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');

        if (Redis::get("RedisGetMyDocument" . $SessionWorkerCareerInternal_RefID) == null) {
            $varTTL = 86400; // 24 Jam

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.resume.master.getBusinessDocumentIssuanceDispositionCount',
                'latest',
                [
                    'parameter' => [
                        'recordID' => 0
                    ]
                ],
                false
            );
        }

        $CountDocumentWorkflowComposer = \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            "RedisGetMyDocument" . $SessionWorkerCareerInternal_RefID
        );

        $compact = [
            'CountDocumentWorkflowComposer' => $CountDocumentWorkflowComposer
        ];

        $view->with($compact);
    }
}
