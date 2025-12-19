<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Services\Accounting\JournalService;

class JournalController extends Controller
{
    protected $journalService;

    public function __construct(JournalService $journalService)
    {
        $this->journalService = $journalService;
    }

    public function index(Request $request) 
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');

        return view('Finance.Journal.Transactions.CreateJournal', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->journalService->create($request);

            Log::error("request: ", [$request->all()]);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Journal');
            }

            $compact = [
                "documentNumber"    => $response['data']['businessDocument']['documentNumber'],
                "status"            => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Journal Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
        return response()->json($request->all());
    }

    public function ReportPaymentJournal(Request $request) 
    {
        return view('Finance.Journal.Reports.ReportJournalSummary');
    }
}