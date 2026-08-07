<?php

namespace App\Services\Master\Work;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class WorkService
{
    public function create($request)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.master.setWorkStructure',
            'latest',
            [
                'entities' => [
                    "code" => $request->work_code,
                    "name" => $request->work_name
                ]
            ]
        );
    }

    public function revision($request, $id)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.master.setWorkStructure',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "code" => $request->work_code,
                    "name" => $request->work_name,
                    "status" => (int) $request->work_status
                ]
            ]
        );
    }

    public function detail($workCode)
    {
        $token = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'report.form.dataList.master.getWorkStructure',
            'latest',
            [
                'parameter' => [
                    'pagination' => [
                        'pageSize' => 10,
                        'pageShow' => 1
                    ],
                    'dataFilter' => [
                        'name' => NULL,     //'Bank'
                        'code' => $workCode   //'BCA'
                    ],
                ]
            ]
        );
    }

    public function picklist($formatted)
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'report.form.dataPickList.master.getWorkStructure',
            'latest',
            [
                'parameter' => $formatted
            ]
        );
    }

    public function summary($search, $limit = 10, $offset = 0)
    {
    }
}