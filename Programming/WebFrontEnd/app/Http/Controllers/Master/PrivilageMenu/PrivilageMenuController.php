<?php

namespace App\Http\Controllers\Master\PrivilageMenu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class PrivilageMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Master.PrivilageMenu.Transactions.index');
    }


    public function store(Request $request)
    {
        $userRole_RefID = $request->user_role_id;
        $menuAction_RefIDArray = $request->checkedValue;
        $varAPIWebToken = Session::get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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


        $compact = [
            "status" => $varData['metadata']['HTTPStatusCode'],
        ];


        // dd($compact);
        return response()->json($compact);
    }

    public function DataListPrivilageMenu(Request $request)
    {

        $sys_id_role = $request->input('sys_id_role');
        
        $varAPIWebToken = Session::get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
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

        $compact = [
            "data" => $varData['data'],
            "status" => $varData['metadata']['HTTPStatusCode']
        ];

        return response()->json($compact);
    }
}
