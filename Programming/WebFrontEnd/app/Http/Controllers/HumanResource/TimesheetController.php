<?php

namespace App\Http\Controllers\HumanResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataPickList.project.getProject',
            'latest',
            [
                'parameter' => []
            ]
        );
        $varData2 = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'dataPickList.master.getPerson', 
            'latest',
            [
            'parameter' => [
                ]
            ]
            );
        $val = 0;
        if($request->test == '1'){
            $timesheet = (int) $request->timesheet;
            $FilterDocumentNumber = $request->FilterDocumentNumber;
            $FilterDate = $request->FilterDate;
            $FilterBehalfOf = (int) $request->FilterBehalfOf;
            if($request->timesheet == ""){
                $timesheet = null;
            }
            if($request->FilterDocumentNumber == ""){
                $FilterDocumentNumber = null;
            }
            if($request->FilterDate == ""){
                $FilterDate = null;
            }
            if($request->FilterBehalfOf == ""){
                $FilterBehalfOf = null;
            }
            $varData3 = Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'report.form.resume.humanResource.getPersonWorkTimeSheet', 
            'latest', 
            [
            'parameter' => [
                'personWorkTimeSheet_RefID' => $timesheet
                ],
            "dataFilter" =>
                [
                'documentNumber' => $FilterDocumentNumber,
                'eventDateTimeTZ' => $FilterDate,
                'person_RefID' => $FilterBehalfOf
                ]
            ]
            );
            // dd($varData3['data']['0']['details']);
            // dd($varData3);
            $val = 1 ;
        }

        $varData4 = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
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
            if($varData3['metadata']['HTTPStatusCode'] == "200"){
                $compact = [
                    'data' => $varData['data']['data'],
                    'data2' => $varData2['data'],
                    'varData' => $varData3['data'],
                    'varData2' => $varData3['data']['0']['details'],
                    'status' => $varData3['metadata']['HTTPStatusCode'],
                    'TimesheetData' => $varData4['data'],
                ];
            }
            else{
                $compact = [
                    'data' => $varData['data']['data'],
                    'data2' => $varData2['data'],
                    'varData' => $varData3['data'],
                    'varData2' => $varData3['data'],
                    'status' => $varData3['metadata']['HTTPStatusCode'],
                    'TimesheetData' => $varData4['data'],
                ];
            }
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

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.humanResource.setPersonWorkTimeSheet', 
        'latest', 
        [
        'entities' => [
            'documentDateTimeTZ' => $request->startDate,
            'person_RefID' => (int) $request->behalfOf,
            'startDateTimeTZ' => $request->startDate,
            'finishDateTimeTZ' => $request->finishDate,
            'project_RefID' => (int) $request->ProjectEvent,
            'colorText' => $request->textColor,
            'colorBackground' => $request->backgroundColor
            
            ]
        ]
        );
        return redirect()->route('Timesheet.index')->with('message', 'Timesheet successfully created ...');
        
    }
    public function storeActivity(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.create.humanResource.setPersonWorkTimeSheetActivity', 
        'latest', 
        [
        'entities' => [
            'personWorkTimeSheet_RefID' => (int) $request->timesheet2,
            'projectSectionItem_RefID' => (int) $request->timesheet2,
            'startDateTimeTZ' => $request->startDate3,
            'finishDateTimeTZ' => $request->finishDate3,
            'activity' => $request->activity3,
            'colorText' => $request->textColor3,
            'colorBackground' => $request->backgroundColor3

            ]
        ]
        );
        
        return redirect()->route('Timesheet.index')->with('message', 'Timesheet successfully created ...');
        
    }
    public function updates(Request $request)
    {
        // echo $request->backgroundColor2;die;
        $varAPIWebToken = $request->session()->get('SessionLogin');

        $varData = Helper_APICall::setCallAPIGateway(
        Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken, 
        'transaction.update.humanResource.setPersonWorkTimeSheet', 
        'latest', 
        [
        'recordID' => (int) $request->timesheetId,
        'entities' => [
            'documentDateTimeTZ' => $request->startDate2,
            'person_RefID' => (int) $request->behalfOf2,
            'startDateTimeTZ' => $request->startDate2,
            'finishDateTimeTZ' => $request->finishDate2,
            'project_RefID' => (int) $request->ProjectEvent2,
            'colorText' => $request->textColor2,
            'colorBackground' => $request->backgroundColor2
            ]
        ]
        );
        
        return redirect()->route('Timesheet.index')->with('message', 'Timesheet successfully updated ...');
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
