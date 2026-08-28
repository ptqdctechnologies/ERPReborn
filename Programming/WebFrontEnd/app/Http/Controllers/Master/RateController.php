<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Finance\RateService;
use Illuminate\Support\Facades\Log;

class RateController extends Controller
{
    protected $rateService;

    public function __construct(RateService $rateService)
    {
        $this->rateService = $rateService;
    }

    public function index()
    {
        return view('Master.Rate.Transactions.index');
    }

    public function create()
    {
        return view('Master.Rate.Transactions.create');
    }

    public function store(Request $request)
    {
        try {
            $response = $this->rateService->create($request->all());

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Create Rate');
            }

            $compact = [
                "documentNumber" => $response['data']['businessDocument']['documentNumber'] ?? '',
                "status" => $response['metadata']['HTTPStatusCode']
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Rate Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function show($id)
    {
    }

    public function revision(Request $request)
    {
        $compact = [
            'currencyRefID' => '62000000000001',
            'currencyCode' => 'IDR',
            'currencyName' => 'Indonesian Rupiah',
            'rate' => 16000,
            'startDate' => '08/04/2026',
            'endDate' => '08/10/2026'
        ];

        return view('Master.Rate.Transactions.revision', $compact);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}