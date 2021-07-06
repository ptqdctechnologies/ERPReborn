<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class masterDataBusinessDocumentVersion extends Controller
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
            'transaction.read.dataList.master.getBusinessDocumentVersion',
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
        dd($varData);
        return view('Master.BusinessDocumentType.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Master.BusinessDocumentType.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setBusinessDocumentVersion',
            'latest',
            [
                'entities' => [
                    'businessDocument_RefID' => 74000000000001,
                    'version' => 0,
                    'documentDateTimeTZ' => '2009-04-17 00:00:00+07',
                    'annotation' => NULL,
                    'documentOwner_RefID' => NULL
                ]
            ]
        );
        return redirect()->route('BusinessDocumentType.index');
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
            'transaction.read.dataRecord.master.getBusinessDocumentVersion',
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );
        // dd($varData);

        return view('Master.BusinessDocumentType.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setBusinessDocumentVersion',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [
                    'businessDocument_RefID' => 74000000000001,
                    'version' => 0,
                    'documentDateTimeTZ' => '2009-04-17 00:00:00+07',
                    'annotation' => NULL,
                    'documentOwner_RefID' => NULL
                ]
            ]
        );

        return redirect()->route('BusinessDocumentType.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setBusinessDocumentVersion',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('BusinessDocumentType.index');
    }
}
