<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Services\Master\Work\WorkService;
use Illuminate\Support\Facades\Session;

class WorkController extends Controller
{
    protected $workService;

    public function __construct(WorkService $workService)
    {
        $this->workService = $workService;
    }

    public function index()
    {
        return view('Master.Work.Transactions.index');
    }

    public function create()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Master.Work.Transactions.create', $compact);
    }

    public function store(Request $request)
    {
        try {
            $response = $this->workService->create($request);

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Store Work => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Work Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function revision(Request $request)
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken,
            'workCode' => ''
        ];

        return view('Master.Work.Transactions.revision', $compact);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function picklist(Request $request)
    {
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $offset = floor($start / $length) + 1;
        $limit = $length;

        $searchValue = $request->input('search.value');

        $formatted = [
            'pagination' => [
                'pageSize' => (int) $limit,
                'pageShow' => (int) $offset
            ],
            'dataFilter' => [
                'name' => NULL,
                'code' => $searchValue
            ],
        ];

        $response = $this->workService->picklist($formatted);

        if ($response['metadata']['HTTPStatusCode'] !== 200) {
            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            ]);
        }

        $workData = $response['data']['data'];

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $workData['header']['dataCount'],
            'recordsFiltered' => $workData['header']['dataCount'],
            'data' => $workData['content']['itemList']
        ]);
    }

    public function summary(Request $request)
    {
    }

    public function export(Request $request)
    {
    }
}