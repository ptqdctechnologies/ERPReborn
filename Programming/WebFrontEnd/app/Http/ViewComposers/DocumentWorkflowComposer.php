<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;

class DocumentWorkflowComposer
{
    public function compose(View $view)
    {
        $varAPIWebToken = Session::get('SessionLogin');
        $SessionWorkerCareerInternal_RefID =  Session::get('SessionWorkerCareerInternal_RefID');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'report.form.documentForm.master.getBusinessDocumentIssuanceDisposition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$SessionWorkerCareerInternal_RefID
                ]
            ]
        );

        if ($varData['metadata']['HTTPStatusCode'] != 200) {
            $CountDocumentWorkflowComposer = 0;
        } else {
            $CountDocumentWorkflowComposer = count($varData['data'][0]['document']['content']['itemList']['ungrouped']);
        }

        $compact = [
            'CountDocumentWorkflowComposer' => $CountDocumentWorkflowComposer
        ];

        $view->with($compact);
    }
}
