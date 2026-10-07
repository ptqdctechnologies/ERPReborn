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
        return view('Finance.Journal.Transactions.index');
    }

    public function create()
    {
        $token = Session::get('SessionLogin');
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Journal Form');

        $compact = [
            'token' => $token,
            'documentTypeRefID' => $documentTypeRefID
        ];

        return view('Finance.Journal.Transactions.create', $compact);
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
                "documentNumber" => $response['data']['businessDocument']['documentNumber'],
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Journal Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function DataPickList(Request $request)
    {
        try {
            $response = $this->journalService->picklist();

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Journal');
            }

            $compact = [
                "data" => $response['data']['data'],
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("DataPickList Journal Function Error: " . $th->getMessage());

            $compact = [
                "data" => [],
                "status" => 500,
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
        $documentTypeRefID = $this->GetBusinessDocumentsTypeFromRedis('Person Business Trip Form');
        $sessionOrganizationalDepartmentName = Session::get('SessionOrganizationalDepartmentName');
        $sessionOrganizationalJobPositionName = Session::get('SessionOrganizationalJobPositionName');

        $compact = [
            'documentTypeRefID' => $documentTypeRefID,
            'sessionOrganizationalDepartmentName' => $sessionOrganizationalDepartmentName,
            'sessionOrganizationalJobPositionName' => $sessionOrganizationalJobPositionName
        ];

        return view('Finance.Journal.Reports.ReportJournalSummary', $compact);
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
                    "attachment" => "-",
                    "payment_date" => "2025-08-28"
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
                    "attachment" => "-",
                    "payment_date" => "2025-10-18"
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
                    "attachment" => "-",
                    "payment_date" => "2025-11-03"
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
                    "attachment" => "-",
                    "payment_date" => "2025-12-11"
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
                    "attachment" => "-",
                    "payment_date" => "2025-09-01"
                ]
            ];

            $compact = [
                'status' => 200,
                'data' => $dummyData
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Payment Journal Store Function Error:" . $th->getMessage());

            $compact = [
                'status' => 500,
                'message' => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }

    private function filteredResponse($key, $value)
    {
        $data = [];

        if ($key === "Advance Form") {
            $unpaidValue =
                (float) ($dataTransaction['totalTransactions'] ?? 0) -
                (float) ($dataTransaction['totalPayment'] ?? 0);

            $data = [
                'business_document_id' => $value['businessDocument_RefID'],
                'trans_number_preview' => $value['businessDocumentNumber'],
                'trans_number_id' => $value['advance_RefID'],
                'trans_number_quantity_unit_id' => $value['quantityUnit_RefID'],
                'trans_number_quantity' => $value['quantity'],
                'trans_number_currency_id' => $value['productUnitPriceCurrency_RefID'],
                'trans_number_currency_rate' => $value['productUnitPriceCurrencyExchangeRate'],
                'budget_preview' => $value['combinedBudgetCode'] . ' - ' . $value['combinedBudgetName'],
                'budget_id' => $value['combinedBudget_RefID'],
                'budget_code' => $value['combinedBudgetCode'],
                'budget_name' => $value['combinedBudgetName'],
                'trans_value' => $value['totalTransactions'],
                'unpaid_value' => $unpaidValue
            ];
        } else if ($key === "Person Business Trip Form") {
            $unpaidValue =
                (float) ($dataTransaction['TotalTransactions'] ?? 0) -
                (float) ($dataTransaction['TotalPayment'] ?? 0);

            $data = [
                'business_document_id' => $value['BusinessDocument_RefID'],
                'trans_number_preview' => $value['DocumentNumber'],
                'trans_number_id' => $value['PersonBusinessTrip_RefID'],
                'trans_number_quantity_unit_id' => 73000000000001,
                'trans_number_quantity' => 1,
                'trans_number_currency_id' => $value['AmountCurrency_RefID'],
                'trans_number_currency_rate' => $value['AmountCurrencyExchangeRate'],
                'budget_preview' => $value['CombinedBudgetCode'] . ' - ' . $value['CombinedBudgetName'],
                'budget_id' => $value['CombinedBudget_RefID'],
                'budget_code' => $value['CombinedBudgetCode'],
                'budget_name' => $value['CombinedBudgetName'],
                'trans_value' => $value['TotalTransactions'],
                'unpaid_value' => $unpaidValue
            ];
        }

        return $data;
    }

    public function detailTransactions(Request $request)
    {
        try {
            $documentType = $request->input('documentType');
            $referenceId = $request->input('referenceId');

            $response = $this->journalService->detailTransaction($documentType, $referenceId);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Detail Transaction');
            }

            $data = isset($response['data']['data']) ? $response['data']['data'] : $response['data'];
            $result = $this->filteredResponse($documentType, $data[0]);

            $compact = [
                "data" => $result,
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Detail Transaction Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }
}