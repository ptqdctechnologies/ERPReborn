<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Services\Budget\BudgetProgressService;
use App\Http\Requests\Budget\StoreBudgetProgress;

class BudgetProgressController extends Controller
{
    protected $budgetProgressService;

    public function __construct(BudgetProgressService $budgetProgressService)
    {
        $this->budgetProgressService = $budgetProgressService;
    }

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        TRANSACTIONS                                                                      |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function index(Request $request)
    {
        return view('Budget.BudgetProgress.Transactions.index');
    }

    public function create()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Budget.BudgetProgress.Transactions.create', $compact);
    }

    public function store(StoreBudgetProgress $request)
    {
        try {
            $response = $this->budgetProgressService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Budget Progress => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'] ?? '',
                "status" => $response['metadata']['HTTPStatusCode']
                // "status" => $responseWorkflow['metadata']['HTTPStatusCode']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Budget Progress Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function show($id)
    {
    }

    public function revision()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'combinedBudgetRefID' => '46000000000033',
            'combinedBudgetCode' => 'Q000062',
            'combinedBudgetName' => 'XL Microcell 2007'
        ];

        return view('Budget.BudgetProgress.Transactions.revision', $compact);
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
}