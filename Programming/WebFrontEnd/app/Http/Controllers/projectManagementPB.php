<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class projectManagementPB extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProject()
    {
        return view('ProjectManagement.Transactions.Budget.PB.createProject');
    }
    public function createSiteProject()
    {
        return view('ProjectManagement.Transactions.Budget.PB.createSiteProject');
    }    

    public function createProjectBudget()
    {
        
        return view('ProjectManagement.Transactions.Budget.PB.createProjectBudget');
    }
    public function createNonProjectOverheadBudget()
    {
        return view('ProjectManagement.Transactions.Budget.PB.createNonProjectOverheadBudget');
    }
    public function createBudgetPeriodeNonProject()
    {
        return view('ProjectManagement.Transactions.Budget.PB.createBudgetPeriodeNonProject');
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
}