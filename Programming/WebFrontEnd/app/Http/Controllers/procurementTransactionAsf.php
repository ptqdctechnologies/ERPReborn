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

    public function editableAsf(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
              
    			$data = array(
    				'first_name'	=>	$request->first_name,
    				'last_name'		=>	$request->last_name,
    				'gender'		=>	$request->gender
    			);
    			DB::table('sample_datas')
    				->where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('sample_datas')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
    public function index()
    {
        return view('ProcurementAndCommercial.Transactions.ASF.createASF');
    }

    public function indexOverhead()
    {
        return view('ProcurementAndCommercial.Transactions.ASF.createASFOverhead');
    }

    public function indexSales()
    {
        return view('ProcurementAndCommercial.Transactions.ASF.createASFSales');
    }
    public function indexPulsaVoucher()
    {
        return view('ProcurementAndCommercial.Transactions.ASF.createASFPulsaVoucher');
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
        return view('ProcurementAndCommercial.Transactions.ASF.revisionASF');
    }
}