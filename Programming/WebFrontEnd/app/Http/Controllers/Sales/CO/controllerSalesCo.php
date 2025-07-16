<?php

namespace App\Http\Controllers\Sales\CO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use PDO;

class controllerSalesCo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );

        
        return view('Sales.CO.Transactions.index', ['data' => $varDataProject['data']['data']]);
    }

    public function revisionCo(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        
        return view('Sales.CO.Transactions.revisionCo', ['data' => $varData['data']]);
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
                'filenames' => $v['filenames']

            ));
        }
        $data2 = json_decode($request->getContent(), true);
        $dataAll2 = array();

        foreach ($data2 as $i => $v) {

            array_push($dataAll2, array(
                'origin_budget' => $v['origin_budget'],
                'projectcode' => $v['projectcode'],
                'projectname' => $v['projectname'],
                'subprojectc' => $v['subprojectc'],
                'subprojectn' => $v['subprojectn'],
                'beneficiary' => $v['beneficiary'],
                'bank_name' => $v['bank_name'],
                'account_name' => $v['account_name'],
                'account_number' => $v['account_number'],
                'internal_notes' => $v['internal_notes'],
                'requestNameArf' => $v['requestNameArf'],
                'putWorkId' => $v['putWorkId'],
                'putWorkName' => $v['putWorkName'],
                'putProductId' => $v['putProductId'],
                'putProductName' => $v['putProductName'],
                'putQty' => $v['putQty'],
                'putQtys' => $v['putQtys'],
                'putUom' => $v['putUom'],
                'putPrice' => $v['putPrice'],
                'putCurrency' => $v['putCurrency'],
                'totalArfDetails' => $v['totalArfDetails'],
                'putRemark' => $v['putRemark'],

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
            if ($v['lastWorkId'] == "") {
                continue;
            }
            array_push($dataAll, array(
                'lastWorkId' => $v['lastWorkId'],
                'lastWorkName' => $v['lastWorkName'],
                'lastProductId' => $v['lastProductId'],
                'lastProductName' => $v['lastProductName'],
                'lastQty' => $v['lastQty'],
                'lastUom' => $v['lastUom'],
                'lastPrice' => $v['lastPrice'],
                'lastCurrency' => $v['lastCurrency'],
                'totalArfDetails' => $v['totalArfDetails'],
                'lastRemark' => $v['lastRemark'],

            ));
        }
        dd($dataAll);
        // return view('ProcurementAndCommercial.Transactions.ARF.createARF');
    }

    public function revisionArfIndex(Request $request)
    {
        if ($request->searchArfNumberRevision == 'Q000181') {
            $project = "Project Code 1";
            $projectDetail = "Project Detail 1";
            $site = "Site Code 1";
            $siteDetail = "Site Detail 1";
            $beneficary = "Beneficary ";
            $bank = "Bank Name 1";
            $accountName = "Account Name 1";
            $accountNumber = "Account Number 1";
            $internal = "Internal Notes 1";
            $requester = "Requester 1";
            $workId = "Work Id 1";
            $workIdDetail = "Work Id Detail 1";
            $productId = "Product Id 1";
            $productIdDetail = "Product Detail 1";
            $qty = "2";
            $qtyDetail = "IDR";
            $unitPrice = "500";
            $unitPriceDetail = "Rp";
            $total = "1000";
            $remark = "Remark";
            $totalBoq = "200000";
            $requestTotal = "200000";
            $balance = "200000";
        }
        else if ($request->searchArfNumberRevision == 'Q000182') {
            $project = "Project Code 2";
            $projectDetail = "Project Detail 2";
            $site = "Site Code 2";
            $siteDetail = "Site Detail 2";
            $beneficary = "Beneficary ";
            $bank = "Bank Name 2";
            $accountName = "Account Name 2";
            $accountNumber = "Account Number 2";
            $internal = "Internal Notes 2";
            $requester = "Requester 2";
            $workId = "Work Id 2";
            $workIdDetail = "Work Id Detail 2";
            $productId = "Product Id 2";
            $productIdDetail = "Product Detail 2";
            $qty = "2";
            $qtyDetail = "IDR";
            $unitPrice = "500";
            $unitPriceDetail = "Rp";
            $total = "1000";
            $remark = "Remark";
            $totalBoq = "200000";
            $requestTotal = "200000";
            $balance = "200000";
        }
        else if ($request->searchArfNumberRevision == 'Q000183') {
            $project = "Project Code 3";
            $projectDetail = "Project Detail 3";
            $site = "Site Code 3";
            $siteDetail = "Site Detail 3";
            $beneficary = "Beneficary ";
            $bank = "Bank Name 3";
            $accountName = "Account Name 3";
            $accountNumber = "Account Number 3";
            $internal = "Internal Notes 3";
            $requester = "Requester 3";
            $workId = "Work Id 3";
            $workIdDetail = "Work Id Detail 3";
            $productId = "Product Id 3";
            $productIdDetail = "Product Detail 3";
            $qty = "2";
            $qtyDetail = "IDR";
            $unitPrice = "500";
            $unitPriceDetail = "Rp";
            $total = "1000";
            $remark = "Remark";
            $totalBoq = "200000";
            $requestTotal = "200000";
            $balance = "200000";
        }



        return view('ProcurementAndCommercial.Transactions.ARF.revisionARF', compact('project', 'projectDetail', 'site', 'siteDetail', 'beneficary', 'bank', 'accountNumber', 'accountName', 'internal', 'requester', 'workId', 'productId', 'workIdDetail', 'productIdDetail', 'qty', 'qtyDetail', 'unitPrice', 'unitPriceDetail', 'total', 'remark', 'totalBoq', 'requestTotal', 'balance'));
    }
}
