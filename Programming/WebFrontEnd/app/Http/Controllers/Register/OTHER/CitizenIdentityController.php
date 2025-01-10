<?php

namespace App\Http\Controllers\Register\OTHER;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CitizenIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getCitizenIdentity',
            'latest',
            [
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return view('Register.CitizenIdentity.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Register.CitizenIdentity.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setCitizenIdentity',
            'latest',
            [
                'entities' => [
                    'ISOCode' => 'XYZ',
                    'name' => $request->CitizenIdentity_code,
                    'symbol' => 'xyz',
                ]
            ]
        );

        return redirect()->route('CitizenIdentity.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataRecord.master.getCitizenIdentity', 
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );
        return view('Register.CitizenIdentity.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setCitizenIdentity',
            'latest',
            [       
                'recordID' => (int)$id,
                'entities' => [
                    'ISOCode' => 'ABC',
                    'name' => $request->CitizenIdentity_code,
                    'symbol' => '$Abc'
                ]
            ]
        );

        return redirect()->route('CitizenIdentity.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setCitizenIdentity',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('CitizenIdentity.index');
    }
}
