<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class MaterialReturnController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $request->session()->forget("SessionMaterialReturn");

        $varDataProject = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        // dd($varData);

        $varData2 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getWorker', 
            'latest', 
            [
            'parameter' => null,
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
        );

        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'dataProject' => $varDataProject['data']['data'],
            'data2' => $varData2['data'],
            'var' => $var,
        ];

        return view('Inventory.MaterialReturn.Transactions.CreateMaterialReturn', $compact);
    }
    
    public function StoreValidateiMaterialReturn(Request $request)
    {
        $tamp = 0; $status = 200;
        $val = $request->input('ProductId');
        $data = $request->session()->get("SessionMaterialReturn");
        if($request->session()->has("SessionMaterialReturn")){
            for($i = 0; $i < count($data); $i++){
                if($data[$i] == $val){
                    $tamp = 1;
                }
            }
            if($tamp == 0){
                $request->session()->push("SessionMaterialReturn", $val);
            }
            else{
                $status = 500;
            }
        }
        else{
            $request->session()->push("SessionMaterialReturn", $val);
        }

        return response()->json($status);
    }

    public function StoreValidateiMaterialReturn2(Request $request)
    {
        $messages = $request->session()->get("SessionMaterialReturn");
        $val = $request->input('ProductId');
        if($request->session()->has("SessionMaterialReturn")){
            if (($key = array_search($val, $messages)) !== false) {
                unset($messages[$key]);
                $newClass = array_values($messages);
                $request->session()->put("SessionMaterialReturn", $newClass);
            }
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return response()->json();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function revisionMret(Request $request)
    {
        if ($request->codeMaterialReturn == 'Q000181') {
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
        else if ($request->codeMaterialReturn == 'Q000182') {
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
        else if ($request->codeMaterialReturn == 'Q000183') {
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
        return view('Inventory.MaterialReturn.Transactions.revisionMret', compact('project', 'projectDetail', 'site', 'siteDetail', 'beneficary', 'bank', 'accountNumber', 'accountName', 'internal', 'requester', 'workId', 'productId', 'workIdDetail', 'productIdDetail', 'qty', 'qtyDetail', 'unitPrice', 'unitPriceDetail', 'total', 'remark', 'totalBoq', 'requestTotal', 'balance'));
    }
}
