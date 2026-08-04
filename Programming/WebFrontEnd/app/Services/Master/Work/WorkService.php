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
    }

    public function detail($workID)
    {
    }

    public function picklist()
    {
    }

    public function summary($search, $limit = 10, $offset = 0)
    {
    }
}