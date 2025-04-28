<?php

namespace App\Http\Controllers\HumanResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        $var = 0;
        if (!empty($_GET['var'])) {
            $var =  $_GET['var'];
        }

        $compact = [
            'var'               => $var,
            'statusRevisi'      => 0,
            'varAPIWebToken'    => $varAPIWebToken
        ];

        // dump($compact);

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
        try {
            $varAPIWebToken = Session::get('SessionLogin');
            $timesheetData = $request->all();
            $timesheetDataDetail = json_decode($timesheetData['storeData']['timesheetDetail'], true);

            $transformedDetails = [];
            foreach ($timesheetDataDetail as $entity) {
                $transformedDetails[] = [
                    'entities' => [
                        'personWorkTimeSheet_RefID' => null,
                        'projectSectionItem_RefID'  => null,
                        'startDateTimeTZ'           => $entity['startDateTimeTZ'],
                        'finishDateTimeTZ'          => $entity['finishDateTimeTZ'],
                        'activity'                  => $entity['activity'],
                        'colorText'                 => null,
                        'colorBackground'           => null,
                    ]
                ];
            }

            $varData = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $varAPIWebToken, 
                'transaction.create.humanResource.setPersonWorkTimeSheet', 
                'latest', 
                [
                'entities' => [
                    'documentNumber'        => null,
                    'documentDateTimeTZ'    => date('Y-m-d H:i:s') . ' +07',
                    'person_RefID'          => (int) $timesheetDataDetail[0]['person_RefID'],
                    'startDateTimeTZ'       => $timesheetDataDetail[0]['startDateTimeTZ'],
                    'finishDateTimeTZ'      => $timesheetDataDetail[0]['finishDateTimeTZ'],
                    'project_RefID'         => (int) $timesheetDataDetail[0]['project_RefID'],
                    'colorText'             => null,
                    'colorBackground'       => null,
                    "additionalData"        => [
                        "itemList"          => [
                            "items"         => $transformedDetails
                            ]
                        ]
                    ]
                ]
            );

            if ($varData['metadata']['HTTPStatusCode'] !== 200) {
                return response()->json($varData);
            }

            $compact = [
                "documentNumber"    => "Timesheet/QDC/2025/000021",
                "status"            => $varData['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Error at store: " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
    // public function store(Request $request)
    // {
    //     $varAPIWebToken = $request->session()->get('SessionLogin');

    //     $varData = Helper_APICall::setCallAPIGateway(
    //     Helper_Environment::getUserSessionID_System(),
    //     $varAPIWebToken, 
    //     'transaction.create.humanResource.setPersonWorkTimeSheet', 
    //     'latest', 
    //     [
    //     'entities' => [
    //         'documentDateTimeTZ' => $request->startDate,
    //         'person_RefID' => (int) $request->behalfOf,
    //         'startDateTimeTZ' => $request->startDate,
    //         'finishDateTimeTZ' => $request->finishDate,
    //         'project_RefID' => (int) $request->ProjectEvent,
    //         'colorText' => $request->textColor,
    //         'colorBackground' => $request->backgroundColor
            
    //         ]
    //     ]
    //     );
    //     return redirect()->route('Timesheet.index')->with('message', 'Timesheet successfully created ...');
        
    // }

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

    public function RevisionTimesheet(Request $request)
    {
        try {
            $varAPIWebToken     = Session::get('SessionLogin');
            $timesheet_RefID    = $request->timesheet_RefID;

            return view('HumanResources.Timesheet.Transactions.RevisionTimesheet');
        } catch (\Throwable $th) {
            Log::error("RevisionTimesheet Function Error at " . $th->getMessage());
            return redirect()->back()->with('NotFound', 'Process Error');
        }
    }
}
