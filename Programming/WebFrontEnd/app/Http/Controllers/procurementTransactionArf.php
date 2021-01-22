<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class procurementTransactionArf extends Controller
{

    public function teststores(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $dataAll = array();
        $files = [];
        foreach ($data as $i => $v) {

            foreach ($x as $file) {

                $name = time() . rand(1, 100) . '.' . $file->extension();

                // $file->move(public_path('files'), $name);

                $files[] = $name;
            }
        }

        dd($files);
 
        $data = json_decode($request->getContent(), true);
        $dataAll = array();
        $cek = [];
        foreach ($data as $i => $v) {

            $cek[] = $v['filenames'];

        }
        dd($cek);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ProcurementAndCommercial.Transactions.ARF.createARF');
    }
    public function arflistcancel()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'filenames'=>$v['filenames']

            ));
        }
        $data2 = json_decode($request->getContent(), true);
        $dataAll2 = array();

        foreach ($data2 as $i => $v) {

            array_push($dataAll2, array(
                'origin_budget'=>$v['origin_budget'],
                'projectcode'=>$v['projectcode'],
                'projectname'=>$v['projectname'],
                'subprojectc'=>$v['subprojectc'],
                'subprojectn'=>$v['subprojectn'],
                'beneficiary'=>$v['beneficiary'],
                'bank_name'=>$v['bank_name'],
                'account_name'=>$v['account_name'],
                'account_number'=>$v['account_number'],
                'internal_notes'=>$v['internal_notes'],
                'requestNameArf'=>$v['requestNameArf'],
                'putWorkId'=>$v['putWorkId'],
                'putWorkName'=>$v['putWorkName'],
                'putProductId'=>$v['putProductId'],
                'putProductName'=>$v['putProductName'],
                'putQty'=>$v['putQty'],
                'putQtys'=>$v['putQtys'],
                'putUom'=>$v['putUom'],
                'putPrice'=>$v['putPrice'],
                'putCurrency'=>$v['putCurrency'],
                'totalArfDetails'=>$v['totalArfDetails'],
                'putRemark'=>$v['putRemark'],

            ));
            break;
        }
        return response()->json($dataAll2);
    }

    public function teststore(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        dd($varData);
        return response()->json($varData['data']['optionList']);
    }

    public function teststore2(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $username,
            $password
        );
        return response()->json($varData['data']['optionList'][0]['userRole']);
        // if ($varData = "Array") {
        //     return response()->json(array(
        //         'code'      =>  404,
        //         'message'   =>  "hayyyy"
        //     ), 404);
        // } else {
        //     return response()->json($varData['data']['optionList']);
        // }

        // $this->validate($request, [

        //     'filenames' => 'required',

        //     'filenames.*' => 'required'

        // ]);



        // return back()->with('success', 'Data Your files has been successfully added');
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


    public function tests(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        
        $dataAll = array();

        foreach ($data as $i => $v) {
            if($v['lastWorkId'] == ""){
                continue;
            }
            array_push($dataAll, array(
                'lastWorkId'=>$v['lastWorkId'],
                'lastWorkName'=>$v['lastWorkName'],
                'lastProductId'=>$v['lastProductId'],
                'lastProductName'=>$v['lastProductName'],
                'lastQty'=>$v['lastQty'],
                'lastUom'=>$v['lastUom'],
                'lastPrice'=>$v['lastPrice'],
                'lastCurrency'=>$v['lastCurrency'],
                'totalArfDetails'=>$v['totalArfDetails'],
                'lastRemark'=>$v['lastRemark'],

            ));
        }
        dd($dataAll);
        // return view('ProcurementAndCommercial.Transactions.ARF.createARF');
    }
}
