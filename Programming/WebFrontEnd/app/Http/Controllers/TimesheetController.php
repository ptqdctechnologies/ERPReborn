<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index(Request $request)
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
        $val = 0;
        if($request->test == '1'){
            $varData3 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.humanResource.getPersonWorkTimeSheetActivity', 
            'latest', 
            [
            'parameter' => [
                'personWorkTimeSheet_RefID' => (int) $request->timesheet
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );
            dd($varData3);
            $val = 1 ;
        }

        $varData4 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.read.dataList.humanResource.getPersonWorkTimeSheet', 
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
        if($val == 1){
            $compact = [
                'data' => $varData['data']['data'],
                'data2' => $varData2['data'],
                'varData' => $varData3['data'],
                'status' => $varData3['metadata']['HTTPStatusCode'],
                'TimesheetData' => $varData4['data'],
            ];
        }
        else{
            $compact = [
                'data' => $varData['data']['data'],
                'data2' => $varData2['data'],
                'status' => "400",
                'TimesheetData' => $varData4['data'],
            ];
        }
        return view('HumanResources.Timesheet.Transactions.index', $compact);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.humanResource.setPersonWorkTimeSheet', 
        'latest', 
        [
        'entities' => [
            'documentDateTimeTZ' => $request->startDate,
            'person_RefID' => (int) $request->behalfOf,
            'colorText' => $request->textColor,
            'colorBackground' => $request->backgroundColor
            ]
        ]
        );
        $varData2 = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.humanResource.setPersonWorkTimeSheetActivity', 
        'latest', 
        [
        'entities' => [
            'personWorkTimeSheet_RefID' => (int) $varData['data']['recordID'],
            'projectSectionItem_RefID' => (int) $request->SelectSite,
            'startDateTimeTZ' => $request->startDate,
            'finishDateTimeTZ' => $request->finishDate,
            'activity' => $request->activity
            ]
        ]
        );
        
        return redirect()->route('Timesheet.index')->with('message', 'Project successfully created ...');
        
    }
    public function updates(Request $request)
    {
        echo $request->timesheetId;
        echo $request->timesheetActiviyId;die;
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.update.humanResource.setPersonWorkTimeSheet', 
            'latest', 
            [
            'recordID' => 48000000040220,
            'entities' => [
                'documentDateTimeTZ' => '2026-01-01 00:00:00 +07',
                'person_RefID' => 25000000000439,
                'colorText' => '#000000',
                'colorBackground' => '#ababab'
                ]
            ]
            );

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.update.humanResource.setPersonWorkTimeSheetActivity', 
        'latest', 
        [
        'recordID' => 50000000085287,
        'entities' => [
            'personWorkTimeSheet_RefID' => 48000000040220,
            'projectSectionItem_RefID' => null,
            'startDateTimeTZ' => '2026-01-01 07:00:00 +07',
            'finishDateTimeTZ' => '2026-01-01 13:00:00 +07',
            'activity' => 'Kegiatan ABCD dan EFGH'
            ]
        ]
        );
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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
