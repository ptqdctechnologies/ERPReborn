<?php

namespace App\Http\Controllers\Register\OTHER;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CountryAdministrativeAreaLevel3Controller extends Controller
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
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataList.master.getCountryAdministrativeAreaLevel3',
            'latest',
            [
                'countryAdministrativeAreaLevel2_RefID' => 22000000000192,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return view('Register.CountryAdministrativeAreaLevel3.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Register.CountryAdministrativeAreaLevel3.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setCountryAdministrativeAreaLevel3',
            'latest',
            [
                'entities' => [
                    'countryAdministrativeAreaLevel2_RefID' => 22000000000192,
                    'name' => $request->CountryAdministrativeAreaLevel3_code
                ]
            ]
        );

        return redirect()->route('CountryAdministrativeAreaLevel3.index');
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
            'transaction.read.dataRecord.master.getCountryAdministrativeAreaLevel3',
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );

        return view('Register.CountryAdministrativeAreaLevel3.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setCountryAdministrativeAreaLevel3',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [
                    'countryAdministrativeAreaLevel2_RefID' => 22000000000192,
                    'name' => $request->CountryAdministrativeAreaLevel3_code
                ]
            ]
        );

        return redirect()->route('CountryAdministrativeAreaLevel3.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setCountryAdministrativeAreaLevel3',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('CountryAdministrativeAreaLevel3.index');
    }
}
