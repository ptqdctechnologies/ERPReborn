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
        $workCode = $request->input('modal_work_id');
        $response = $this->workService->detail($workCode);

        $header = $response['data']['data']['document']['header'] ?? [];
        $record = $response['data']['data']['document']['content']['itemList']['ungrouped'][0] ?? null;

        if (
            ($response['metadata']['HTTPStatusCode'] ?? 500) !== 200 ||
            ($header['dataCount'] ?? 0) === 0 ||
            !$record
        ) {
            throw new \Exception('Failed to fetch work detail.');
        }

        $compact = [
            'varAPIWebToken' => Session::get('SessionLogin'),
            'workRefID' => $record['recordID'],
            'workCode' => $record['entities']['code'],
            'workName' => $record['entities']['name'],
            'workStatus' => $record['entities']['status'],
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
        $start = (int) $request->input('start', 0);
        $length = (int) $request->input('length', 10);

        $formatLimit = $length > 0 ? $length : null;

        $offset = $formatLimit
            ? (int) floor($start / $formatLimit) + 1
            : 1;

        $code = $request->input('work_code');
        $name = $request->input('work_name');
        $searchValue = $request->input('search.value');

        $formatted = [
            'pagination' => [
                'pageSize' => $formatLimit,
                'pageShow' => (int) $offset
            ],
            'dataFilter' => [
                'name' => $name,
                'code' => $code ? $code : $searchValue
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