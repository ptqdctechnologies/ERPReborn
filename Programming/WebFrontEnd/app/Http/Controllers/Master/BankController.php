<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Services\Master\Bank\BankService;
use Illuminate\Support\Facades\Session;

class BankController extends Controller
{
    protected $bankService;

    public function __construct(BankService $bankService)
    {
        $this->bankService = $bankService;
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
    }

    public function revision(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function picklist(Request $request)
    {
        $start = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);

        $formatLimit = $length > 0 ? $length : null;

        $offset = $formatLimit
            ? (int) floor($start / $formatLimit) + 1
            : 1;

        // $code = $request->input('work_code');
        // $name = $request->input('work_name');
        $searchValue = $request->input('search.value');

        $formatted = [
            'pagination' => [
                'pageSize' => $formatLimit,
                'pageShow' => (int) $offset
            ],
            'dataFilter' => [
                'name' => NULL,
                'acronym' => $searchValue ? $searchValue : NULL
            ]
        ];

        $response = $this->bankService->picklist($formatted);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            ]);
        }

        $bankData = $response['data']['data'];

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $bankData['header']['dataCount'],
            'recordsFiltered' => $bankData['header']['dataCount'],
            'data' => $bankData['content']['itemList']
        ]);
    }

    public function accountPicklist(Request $request)
    {
        $start = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);

        $formatLimit = $length > 0 ? $length : null;

        $offset = $formatLimit
            ? (int) floor($start / $formatLimit) + 1
            : 1;

        $bankName = $request->input('bank_name');
        $fullBankAccountNumber = $request->input('account_number');
        $searchValue = $request->input('search.value');

        $formatted = [
            'pagination' => [
                'pageSize' => $formatLimit,
                'pageShow' => (int) $offset
            ],
            'dataFilter' => [
                'fullBankAccountNumber' => $searchValue ? $searchValue : $fullBankAccountNumber,
                'bankName' => $bankName
            ],
        ];

        $response = $this->bankService->accountPicklist($formatted);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            ]);
        }

        $bankData = $response['data']['data'];

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $bankData['header']['dataCount'],
            'recordsFiltered' => $bankData['header']['dataCount'],
            'data' => $bankData['content']['itemList']
        ]);
    }

    public function summary(Request $request)
    {
    }

    public function export(Request $request)
    {
    }
}