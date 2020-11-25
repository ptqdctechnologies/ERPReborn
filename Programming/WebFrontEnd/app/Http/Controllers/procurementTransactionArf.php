<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        // $this->validate($request, [

        //     'filename' => 'required',
        //     'filename.*' => 'mimes:doc,pdf,docx,zip'

        // ]);
        
        
        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $file)
            {
                echo $name=$file->getClientOriginalName();
                // $file->move(public_path().'/files/', $name);  
                $data[] = $name;
                  
            }
            die;
        }

        // $file= new File();
        // $file->filename=json_encode($data);
        
        
        // $file->save();

        // return back()->with('success', 'Your files has been successfully added');
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