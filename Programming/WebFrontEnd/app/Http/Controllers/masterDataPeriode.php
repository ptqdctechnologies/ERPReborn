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
    public function periode()
    {
        return view('Master.periode.Transactions.indexPeriode');
    }

    public function addPeriode()
    {
        return view('Master.periode.Transactions.addPeriode');
    }
    
    public function revisionPeriode(Request $request)
    {
        return view('Master.periode.Transactions.revisionPeriode');
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
