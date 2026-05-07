<?php

namespace App\Http\Controllers\Register\PrivilegeMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Http\Requests\Admin\PrivilegeMenu\StorePrivilegeMenu;
use Illuminate\Support\Facades\Log;

class PrivilegeMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(Session::get("PrivilageMenu"));

        return view('Register.PrivilegeMenu.Transactions.index');
    }


    public function store(StorePrivilegeMenu $request)
    {
        try {
            $token = Session::get('SessionLogin');
            $userRoleRefID = $request->role_id;
            $menuActionRefIDArray = $request->list_menu;

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $token,
                'transaction.create.sysConfig.setAppObject_UserRolePrivileges_BulkData',
                'latest',
                [
                    'entities' => [
                        'userRole_RefID' => (int) $userRoleRefID,
                        'menuAction_RefIDArray' => array_map('intval', $menuActionRefIDArray)
                    ]
                ]
            );

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Privilege Menu Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function DataListPrivilegeMenu(Request $request)
    {
        $sys_id_role = $request->input('sys_id_role') ?? 95000000000001;

        $varAPIWebToken = Session::get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.sysConfig.getAppObject_UserRolePrivileges',
            'latest',
            [
                'parameter' => [
                    'userRole_RefID' => (int) $sys_id_role
                ],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        // dd($varData);

        $compact = [
            "data" => $varData['data']['data'],
            "status" => $varData['metadata']['HTTPStatusCode']
        ];

        return response()->json($compact);
    }

    public function MenuManagement(Request $request)
    {
        return view('Register.PrivilegeMenu.Transactions.MenuManagement');
    }
}
