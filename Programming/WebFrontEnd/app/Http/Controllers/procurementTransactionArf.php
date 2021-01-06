<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class procurementTransactionArf extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ProcurementAndCommercial.Transactions.ARF.createARF');
    }

    public function test()
    {
        return view('Authentication.login');
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
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIAuthentication(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $request->username,
            $request->password
        );

        return response()->json($varData['data']['optionList']);
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

        // $files = [];

        // if ($request->hasfile('filenames')) {

        //     foreach ($request->file('filenames') as $file) {

        //         $name = time() . rand(1, 100) . '.' . $file->extension();

        //         // $file->move(public_path('files'), $name);

        //         $files[] = $name;
        //     }
        // }

        // dd($files);

        // $file = new File();
        // $file->filenames = $files;
        // $file->save();

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
}
