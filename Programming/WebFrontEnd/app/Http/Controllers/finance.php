<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class finance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editApNumber()
    {
        return view('Finance.AP.editApNumber');
    }

    public function editApJournal()
    {
        return view('Finance.AP.editApJournal');
    }
    public function editApBankJournal()
    {
        return view('Finance.AP.editApBankJournal');
    }
    public function bankReceiveMoney()
    {
        return view('Finance.BankTransaction.bankReceiveMoney');
    }
    public function editBankReceiveMoney()
    {
        return view('Finance.BankTransaction.editBankReceiveMoney');
    }
    public function bankSpendMoney()
    {
        return view('Finance.BankTransaction.bankSpendMoney');
    }
    public function editBankSpendMoney()
    {
        return view('Finance.BankTransaction.editBankSpendMoney');
    }
    public function bankChargers()
    {
        return view('Finance.BankTransaction.bankChargers');
    }
    public function editBankChargers()
    {
        return view('Finance.BankTransaction.editBankChargers');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTranoType(Request $request)
    {
        
        $data = json_decode($request->getContent(), true);

        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'tranoType' => $v['tranoType'],
                'tranoPrefix' => $v['tranoPrefix'],
                'remark' => $v['remark'],
            ));
        }

        return response()->json($dataAll);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
