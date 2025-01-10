<?php

namespace App\Http\Controllers\Register\OTHER;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BusinessDocumentTypeController extends Controller
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
            'transaction.read.dataList.master.getBusinessDocumentType',
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
        return view('Register.BusinessDocumentType.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Register.BusinessDocumentType.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setBusinessDocumentType',
            'latest',
            [
                'entities' => [

                    'name' => $request->BusinessDocument_code
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

        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.read.dataRecord.master.getBusinessDocumentType',
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );
        // dd($varData);

        return view('Register.BusinessDocumentType.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setBusinessDocumentType',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [

                    'name' => $request->BusinessDocument_code
                ]
            ]
        );

        return redirect()->route('BusinessDocumentType.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setBusinessDocumentType',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('BusinessDocumentType.index');
    }
}
