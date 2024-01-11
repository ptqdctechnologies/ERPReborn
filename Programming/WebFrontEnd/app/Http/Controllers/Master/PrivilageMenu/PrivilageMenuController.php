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
        if (Redis::get("Departement") == null) {

            $varAPIWebToken = Session::get('SessionLogin');
            $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken,
                'transaction.read.dataList.humanResource.getOrganizationalDepartment',
                'latest',
                [
                    'parameter' => [],
                    'SQLStatement' => [
                        'pick' => null,
                        'sort' => null,
                        'filter' => null,
                        'paging' => null
                    ]
                ],
                false
            );
        }

        $Departement = json_decode(
            \App\Helpers\ZhtHelper\Cache\Helper_Redis::getValue(
                \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                "Departement"
            ),
            true
        );

        return view('Master.PrivilageMenu.Transactions.index', compact('Departement'));
    }


    public function store(Request $request){
        dd($request->all());
    }

}
