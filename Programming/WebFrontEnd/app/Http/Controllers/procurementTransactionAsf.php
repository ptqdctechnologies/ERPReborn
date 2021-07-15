<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class procurementTransactionAsf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Advance.Advance.Transactions.createASF');
    }

    public function indexOverhead()
    {
        return view('Advance.Advance.Transactions.createASFOverhead');
    }

    public function indexSales()
    {
        return view('Advance.Advance.Transactions.createASFSales');
    }
    public function indexPulsaVoucher()
    {
        return view('Advance.Advance.Transactions.createASFPulsaVoucher');
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
        //
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
    public function revisionAsfIndex(Request $request)
    {   
        // if ($request->searchArfNumberRevision == 'ARF-0001') {
        //     $arfNumberAsf = "ARF-0001";
        //     $requester = "Requester 1";
        //     $managerUid = "ManagerUid 1";
        //     $managerName = "Manager Asf Name 1";
        //     $currency = "Currency 1";
        //     $financeUid = "Finance Arf Uid 1";
        //     $financeName = "Finance Arf Name 1";
        //     $remark = "Remark 1";
        //     $total = "100001";
        //     $totalDetail = "IDR";
        // }
        // else if ($request->searchArfNumberRevision == 'ARF-0002') {
        //     $arfNumberAsf = "ARF-0002";
        //     $requester = "Requester 2";
        //     $managerUid = "ManagerUid 2";
        //     $managerName = "Manager Asf Name 2";
        //     $currency = "Currency 2";
        //     $financeUid = "Finance Arf Uid 2";
        //     $financeName = "Finance Arf Name 2";
        //     $remark = "Remark 2";
        //     $total = "100002";
        //     $totalDetail = "IDR";
        // }
        // else if ($request->searchArfNumberRevision == 'ARF-0003') {
        //     $arfNumberAsf = "ARF-0003";
        //     $requester = "Requester 3";
        //     $managerUid = "ManagerUid 3";
        //     $managerName = "Manager Asf Name 3";
        //     $currency = "Currency 3";
        //     $financeUid = "Finance Arf Uid 3";
        //     $financeName = "Finance Arf Name 3";
        //     $remark = "Remark 3";
        //     $total = "100003";
        //     $totalDetail = "IDR";
        // }
        // else if ($request->searchArfNumberRevision == 'ARF-0004') {
        //     $arfNumberAsf = "ARF-0004";
        //     $requester = "Requester 4";
        //     $managerUid = "ManagerUid 4";
        //     $managerName = "Manager Asf Name 4";
        //     $currency = "Currency 4";
        //     $financeUid = "Finance Arf Uid 4";
        //     $financeName = "Finance Arf Name 4";
        //     $remark = "Remark 4";
        //     $total = "100004";
        //     $totalDetail = "IDR";
        // }
        
        return view('Advance.Advance.Transactions.revisionASF');
        // return view('Advance.Advance.Transactions.revisionASF', compact('arfNumberAsf','requester','managerUid','managerName','currency','financeUid','financeName','remark','total','totalDetail'));
    }


    public function addListCartAsf(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $dataAll = array();

        foreach ($data as $i => $v) {

            array_push($dataAll, array(
                'trano' => $v['trano'],
                'productId' => $v['productId'],
                'nameMaterial' => $v['nameMaterial'],
                'uom' => $v['uom'],
                'unitPriceExpense' => $v['unitPriceExpense'],
                'qtyExpense' => $v['qtyExpense'],
                'totalExpense' => $v['totalExpense'],
                'unitPriceAmount' => $v['unitPriceAmount'],
                'qtyAmount' => $v['qtyAmount'],
                'totalAmount' => $v['totalAmount'],
                'description' => $v['description']

            ));
        }
        return response()->json($dataAll);
    }
}