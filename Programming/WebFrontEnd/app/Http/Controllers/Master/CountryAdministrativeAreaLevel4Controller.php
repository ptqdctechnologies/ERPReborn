<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class CountryAdministrativeAreaLevel4Controller extends Controller
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
            'transaction.read.dataList.master.getCountryAdministrativeAreaLevel4',
            'latest',
            [
                'countryAdministrativeAreaLevel3_RefID' => 23000000002670,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return view('Master.CountryAdministrativeAreaLevel4.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Master.CountryAdministrativeAreaLevel4.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setCountryAdministrativeAreaLevel4',
            'latest',
            [
                'entities' => [
                    'countryAdministrativeAreaLevel3_RefID' => 23000000002670,
                    'name' => $request->CountryAdministrativeAreaLevel4_code
                ]
            ]
        );

        return redirect()->route('CountryAdministrativeAreaLevel4.index');
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
            'transaction.read.dataRecord.master.getCountryAdministrativeAreaLevel4',
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );

        return view('Master.CountryAdministrativeAreaLevel4.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setCountryAdministrativeAreaLevel4',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [
                    'countryAdministrativeAreaLevel3_RefID' => 23000000002670,
                    'name' => $request->CountryAdministrativeAreaLevel4_code
                ]
            ]
        );

        return redirect()->route('CountryAdministrativeAreaLevel4.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setCountryAdministrativeAreaLevel4',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('CountryAdministrativeAreaLevel4.index');
    }
}
