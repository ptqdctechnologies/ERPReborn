<?php

namespace App\Http\Controllers\Register\OTHER;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BloodAglutinogenTypeController extends Controller
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
            'transaction.read.dataList.master.getBloodAglutinogenType', 
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
        return view('Register.BloodAglutinogenType.Transactions.index')->with('data', $varData['data']);
    }

    public function create()
    {
        return view('Register.BloodAglutinogenType.Transactions.create');
    }

    public function store(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.create.master.setBloodAglutinogenType',
            'latest',
            [
                'entities' => [
                    'type' => $request->BloodAglutinogenType_code
                ]
            ]
        );
        return redirect()->route('BloodAglutinogenType.index');
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
            'transaction.read.dataRecord.master.getBloodAglutinogenType', 
            'latest',
            [
                'recordID' => (int)$id,
            ]
        );
        // dd($varData);

        return view('Register.BloodAglutinogenType.Transactions.edit')->with('data', $varData['data']);
    }

    public function update(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.update.master.setBloodAglutinogenType',
            'latest',
            [
                'recordID' => (int)$id,
                'entities' => [
                    'type' => $request->BloodAglutinogenType_code
                ]
            ]
        );

        return redirect()->route('BloodAglutinogenType.index');
    }

    public function destroy(Request $request, $id)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //---Core---
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'transaction.delete.master.setBloodAglutinogenType',
            'latest',
            [
                'recordID' => (int)$id
            ]
        );
        return redirect()->route('BloodAglutinogenType.index');
    }
}
