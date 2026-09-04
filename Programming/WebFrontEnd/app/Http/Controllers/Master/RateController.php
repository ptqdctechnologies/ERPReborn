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
        try {
            $rateID = 63000000000005; // $request->input('modal_warehouse_id');
            $response = $this->rateService->detail($rateID);

            if (
                ($response['metadata']['HTTPStatusCode'] ?? 500) !== 200
            ) {
                throw new \Exception('Failed to fetch rate detail.');
            }

            $data = $response['data']['data'][0] ?? [];

            $compact = [
                'rateID' => $data['Sys_ID'],
                'currencyRefID' => $data['Currency_RefID'],
                'currencyCode' => $data['CurrencyISOCode'],
                'currencyName' => $data['CurrencyName'],
                'rate' => $data['Rate'],
                'startDate' => "",
                'endDate' => ""
            ];

            return view('Master.Rate.Transactions.revision', $compact);
        } catch (\Throwable $th) {
            Log::error('Revision Rate Index Error', [
                'message' => $th->getMessage(),
                'rateID' => ""
            ]);

            return redirect()
                ->route('Rate.index', ['var' => 1])
                ->with('NotFound', 'Data cannot be displayed at this time. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $response = $this->rateService->update($request->all(), $id);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Update Rate => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => $response['data'][0]['businessDocument']['documentNumber'] ?? '',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Update Rate Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function destroy($id)
    {
    }
}