<?php

namespace App\Http\Controllers\Register;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class CountryAdministrativeAreaLevel1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getCountryAdministrativeAreaLevel1',
            'latest',
            [
                'country_RefID' => 20000000000078,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return view('Register.CountryAdministrativeAreaLevel1.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Register.CountryAdministrativeAreaLevel1.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setCountryAdministrativeAreaLevel1',
            'latest',
            [
                'entities' => [
                    'country_RefID' => 20000000000078,
                    'name' => $request->CountryAdministrativeAreaLevel1_code
                ]
            ]
        );

        return redirect()->route('CountryAdministrativeAreaLevel1.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {

        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataRecord.master.getCountryAdministrativeAreaLevel1',
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );

        return view('Register.CountryAdministrativeAreaLevel1.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setCountryAdministrativeAreaLevel1',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [
                    'country_RefID' => 20000000000078,
                    'name' => $request->CountryAdministrativeAreaLevel1_code
                ]
            ]
        );

        return redirect()->route('CountryAdministrativeAreaLevel1.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setCountryAdministrativeAreaLevel1',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('CountryAdministrativeAreaLevel1.index');
    }
}
