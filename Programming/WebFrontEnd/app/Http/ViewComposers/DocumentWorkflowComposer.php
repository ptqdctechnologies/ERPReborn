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
            'report.form.resume.master.getBusinessDocumentIssuanceDisposition',
            'latest',
            [
                'parameter' => [
                    'recordID' => (int)$SessionWorkerCareerInternal_RefID,
                    'dataFilter' => [
                        'businessDocumentNumber' => null,
                        'businessDocumentType_RefID' => null,
                        'combinedBudget_RefID' => null
                    ]
                ]
            ]
        );

        $CountDocumentWorkflowComposer = 0;

        if ($varData['metadata']['HTTPStatusCode'] == 200) {
            if ($varData['data'][0]['document']['content']['itemList']['ungrouped'] != null) {
                $CountDocumentWorkflowComposer = count($varData['data'][0]['document']['content']['itemList']['ungrouped']);
            }
        }

        // dd($CountDocumentWorkflowComposer);

        $compact = [
            'CountDocumentWorkflowComposer' => $CountDocumentWorkflowComposer,
        ];

        $view->with($compact);
    }
}
