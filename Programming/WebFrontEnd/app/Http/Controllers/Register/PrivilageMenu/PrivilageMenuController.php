<?php

namespace App\Http\Controllers\Register\PrivilageMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class PrivilageMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // dd(Session::get("PrivilageMenu"));

        return view('Register.PrivilageMenu.Transactions.index');
    }


    public function store(Request $request)
    {
        $userRole_RefID = $request->user_role_id;
        $menuAction_RefIDArray = $request->checkedValue;
        // dd($menuAction_RefIDArray);
        $varAPIWebToken = Session::get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.sysConfig.setAppObject_UserRolePrivileges_BulkData',
            'latest',
            [
                'entities' => [
                    'userRole_RefID' => (int) $userRole_RefID,
                    'menuAction_RefIDArray' => array_map('intval', $menuAction_RefIDArray)

                ]
            ]
        );

        // dd($varData);

        if($varData['metadata']['HTTPStatusCode'] == "200"){
            Redis::del("RedisSetMenu" . $userRole_RefID);
        }

        $compact = [
            "status" => $varData['metadata']['HTTPStatusCode'],
        ];

        // dd($compact);
        return response()->json($compact);
    }

    public function DataListPrivilageMenu(Request $request)
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
            "data"      => $varData['data']['data'],
            "status"    => $varData['metadata']['HTTPStatusCode']
        ];

        return response()->json($compact);
    }

    public function MenuManagement(Request $request) {
        return view('Register.PrivilageMenu.Transactions.MenuManagement');
    }
}
