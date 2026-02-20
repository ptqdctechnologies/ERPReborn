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

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Journal');
            }

            $compact = [
                "documentJournalNumber" => $response['data']['businessDocument']['documentJournalNumber'],
                "documentNumber"        => $response['data']['businessDocument']['documentNumber'],
                "status"                => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Journal Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function DataPickList(Request $request)
    {
        try {
            $response = $this->journalService->picklist();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Journal');
            }

            $compact = [
                "data"      => $response['data']['data'],
                "status"    => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("DataPickList Journal Function Error: " . $th->getMessage());

            $compact = [
                "data"      => [],
                "status"    => 500,
            ];

            return response()->json($compact);
        }
    }

    public function RevisionJournal(Request $request)
    {
        return view('Finance.Journal.Transactions.RevisionJournal');
    }

    public function ReportPaymentJournal(Request $request) 
    {
        return view('Finance.Journal.Reports.ReportJournalSummary');
    }

    public function ReportPaymentJournalStore(Request $request) 
    {
        try {
            $dummyData = [
                [
                    "no" => 1,
                    "transaction_number" => "Adv/QDC/2025/000214",
                    "date" => "2025-07-12",
                    "type" => "Credit",
                    "budget" => "(Q000062) XL Microcell 2007",
                    "transaction_value" => 500000,
                    "payment_value" => 175000,
                    "balance" => 325000,
                    "from_to" => "(BCA) 5750423347 - Agus Salim",
                    "coa_code" => "1-1102 - Bank",
                    "attachment" => "-"
                ],
                [
                    "no" => 2,
                    "transaction_number" => "AP/QDC/2025/000211",
                    "date" => "2025-09-27",
                    "type" => "Debit",
                    "budget" => "(Q000062) XL Microcell 2007",
                    "transaction_value" => 325000,
                    "payment_value" => 125000,
                    "balance" => 200000,
                    "from_to" => "(BNI) 8995885888 - PT QDC Technologies",
                    "coa_code" => "2-3001 - Hutang Lain - Lain",
                    "attachment" => "-"
                ],
                [
                    "no" => 3,
                    "transaction_number" => "AP/QDC/2025/000211",
                    "date" => "2025-10-24",
                    "type" => "Debit",
                    "budget" => "(Q000062) XL Microcell 2007",
                    "transaction_value" => 200000,
                    "payment_value" => 150000,
                    "balance" => 50000,
                    "from_to" => "(BNI) 8995885888 - PT QDC Technologies",
                    "coa_code" => "2-3001 - Hutang Lain - Lain",
                    "attachment" => "-"
                ],
                [
                    "no" => 4,
                    "transaction_number" => "AP/QDC/2025/000212",
                    "date" => "2025-11-12",
                    "type" => "Credit",
                    "budget" => "(Q000063) XL Microcell 2008",
                    "transaction_value" => 450000,
                    "payment_value" => 200000,
                    "balance" => 250000,
                    "from_to" => "(BCA) 5750423348 - Agus Salim",
                    "coa_code" => "1-1103 - Bank",
                    "attachment" => "-"
                ],
                [
                    "no" => 5,
                    "transaction_number" => "Adv/QDC/2025/000215",
                    "date" => "2025-08-19",
                    "type" => "Credit",
                    "budget" => "(Q000064) XL Microcell 2009",
                    "transaction_value" => 500000,
                    "payment_value" => 200000,
                    "balance" => 300000,
                    "from_to" => "(BCA) 5750423349 - Agus Salim",
                    "coa_code" => "1-1104 - Bank",
                    "attachment" => "-"
                ]
            ];

            $compact = [
                'status'    => 200,
                'data'      => $dummyData
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Payment Journal Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }
}