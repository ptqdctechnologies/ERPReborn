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
            $sessionUserRefID   =  Session::get('SessionUser_RefID');

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'report.form.resume.master.getBusinessDocumentIssuanceDispositionCount',
                'latest',
                [
                    'parameter'     => [
                        'recordID'  => (int) $sessionUserRefID
                    ]
                ],
                false
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Business Document Issuance Disposition Count');
            }

            $compact = [
                'CountDocumentWorkflowComposer' => $response['data']['data']['document']['content']['businessDocumentFormCount']
            ];

            $view->with($compact);
        } catch (\Throwable $th) {
            Log::error("Document Workflow Composer Compose Function Error: " . $th->getMessage());

            $compact = [
                'CountDocumentWorkflowComposer' => '-'
            ];

            $view->with($compact);
        }
    }
}
