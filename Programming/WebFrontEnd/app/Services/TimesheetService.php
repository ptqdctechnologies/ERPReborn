<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
class TimesheetService
{
    public function create(Request $request): array
    {
        $sessionToken   = Session::get('SessionLogin');
        $data           = $request->storeData;
        $detailItems    = json_decode($data['timesheetDetail'], true);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken, 
            'transaction.create.humanResource.setPersonWorkTimeSheet', 
            'latest', 
            [
            'entities' => [
                'documentDateTimeTZ'    => date('Y-m-d'),
                'person_RefID'          => (int) $data['onBehalfSelect'],
                'combinedBudget_RefID'  => (int) $data['authorizedSelect'],
                'colorText'             => null,
                'colorBackground'       => null,
                'additionalData'    => [
                    'itemList'      => [
                        'items'     => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }
}