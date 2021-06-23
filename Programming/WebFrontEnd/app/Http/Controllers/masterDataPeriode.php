<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class masterDataPeriode extends Controller
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
            'transaction.read.master.getDataListPeriod',
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
        return view('Master.periode.Transactions.indexPeriode')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Master.periode.Transactions.addPeriode');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setPeriod',
            'latest',
            [
                'entities' => [
                    'name' => $request->periode_code
                ]
            ]
        );
        return redirect()->route('periode.index');
    }

    public function show($id)
    {
        //
    }

    public function ubah(Request $request)
    {
        $id = 59000000000010;
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.master.getDataListPeriod',
            'latest',
            [
                'recordID' => (int)$id,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        return view('Master.periode.Transactions.revisionPeriode', compact('id'))->with('data', $varData['data']);
    }

    public function edit(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.master.getDataListPeriod',
            'latest',
            [
                'recordID' => (int)$id,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );

        return view('Master.periode.Transactions.revisionPeriode', compact('id'))->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setPeriod',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [
                    'name' => $request->periode_code
                ]
            ]
        );

        return redirect()->route('periode.index');

    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setPeriod',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('periode.index');
    }
}
