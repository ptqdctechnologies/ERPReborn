<?php

namespace App\Http\Controllers\Register\OTHER;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessDocumentVersionController extends Controller
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
            'transaction.read.dataList.master.getBusinessDocumentVersion',
            'latest',
            [
                'businessDocument_RefID' => 74000000000001,
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ]
        );
        return view('Register.BusinessDocumentVersion.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Register.BusinessDocumentVersion.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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
        return redirect()->route('BusinessDocumentVersion.index');
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
            'transaction.read.dataRecord.master.getBusinessDocumentVersion',
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );
        // dd($varData);

        return view('Register.BusinessDocumentVersion.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
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

        return redirect()->route('BusinessDocumentVersion.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setBusinessDocumentVersion',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('BusinessDocumentVersion.index');
    }
}
