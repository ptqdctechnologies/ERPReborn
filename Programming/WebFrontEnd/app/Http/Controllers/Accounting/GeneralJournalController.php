<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class GeneralJournalController extends Controller
{
    public function index(Request $request) 
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');

        return view('Accounting.GeneralJournal.Transactions.CreateGeneralJournal', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function RevisionGeneralJournal(Request $request) 
    {
        $varAPIWebToken     = Session::get('SessionLogin');
        $generalJournalID   = $request->input('modal_general_journal_id');

        return view('Accounting.GeneralJournal.Transactions.RevisionGeneralJournal', [
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}

    // +--------------------------------------------------------------------------------------------------------------------------+
    // |                                        REPORTS                                                                           |
    // +--------------------------------------------------------------------------------------------------------------------------+

    public function ReportGeneralJournalSummary(Request $request)
    {
        return view('Accounting.GeneralJournal.Reports.ReportGeneralJournalSummary');
    }

    public function ReportGeneralJournalSummaryStore(Request $request)
    {
        try {
            $date           = $request->generalJournalDate;
            $type           = $request->generalJournalType;
            $budget         = [
                "id"        => $request->budget_id,
                "code"      => $request->budget_code,
            ];
            $subBudget      = [
                "id"        => $request->site_id,
                "code"      => $request->site_code,
            ];
            $data = [
                [
                    'date'          => '2026-01-05',
                    'budget_code'   => 'Q000062',
                    'budget_name'   => 'XL Microcell 2007',
                    'sub_budget'    => '235',
                    'sub_budget_name'=> 'Ampang Kuranji - Padang',
                    'type'          => 'SETTLEMENT',
                    'product_code'  => '2000059',
                    'product_name'  => 'PLN - Biaya Penyambungan',
                    'coa_code'      => '1-0000',
                    'coa_name'      => 'Aset',
                    'coa_status'    => 'Debit',
                    'amount'        => 15000000
                ],
                [
                    'date'          => '2026-01-06',
                    'budget_code'   => 'Q000062',
                    'budget_name'   => 'XL Microcell 2007',
                    'sub_budget'    => '248',
                    'sub_budget_name'=> 'Bukit Pakis Sby Infill',
                    'type'          => 'SETTLEMENT',
                    'product_code'  => '2000101',
                    'product_name'  => 'Sewa Lahan',
                    'coa_code'      => '2-1100',
                    'coa_name'      => 'Biaya Operasional',
                    'coa_status'    => 'Credit',
                    'amount'        => 8000000
                ],
                [
                    'date'          => '2026-01-07',
                    'budget_code'   => 'Q000062',
                    'budget_name'   => 'XL Microcell 2007',
                    'sub_budget'    => '240',
                    'sub_budget_name'=> 'Cendana Andalas',
                    'type'          => 'SETTLEMENT',
                    'product_code'  => '2000202',
                    'product_name'  => 'Material Instalasi',
                    'coa_code'      => '1-1200',
                    'coa_name'      => 'Persediaan',
                    'coa_status'    => 'Debit',
                    'amount'        => 12000000
                ],
                [
                    'date'          => '2026-01-08',
                    'budget_code'   => 'Q000062',
                    'budget_name'   => 'XL Microcell 2007',
                    'sub_budget'    => '221',
                    'sub_budget_name'=> 'Halat Medan',
                    'type'          => 'SETTLEMENT',
                    'product_code'  => '2000303',
                    'product_name'  => 'Jasa Konstruksi',
                    'coa_code'      => '5-0001',
                    'coa_name'      => 'Beban Proyek',
                    'coa_status'    => 'Debit',
                    'amount'        => 25000000
                ],
                [
                    'date'          => '2026-01-09',
                    'budget_code'   => 'Q000062',
                    'budget_name'   => 'XL Microcell 2007',
                    'sub_budget'    => '254',
                    'sub_budget_name'=> 'Jatiagung Sidoarjo Infill',
                    'type'          => 'SETTLEMENT',
                    'product_code'  => '2000404',
                    'product_name'  => 'Transportasi',
                    'coa_code'      => '5-0020',
                    'coa_name'      => 'Beban Transport',
                    'coa_status'    => 'Credit',
                    'amount'        => 4000000
                ],
                [
                    'date'          => '2026-01-10',
                    'budget_code'   =>'Q000062',
                    'budget_name'   =>'XL Microcell 2007',
                    'sub_budget'    =>'235',
                    'sub_budget_name'=>'Ampang Kuranji - Padang',
                    'type'          =>'SETTLEMENT',
                    'product_code'  =>'2000505',
                    'product_name'  =>'Sewa Alat',
                    'coa_code'      =>'2-2000',
                    'coa_name'      =>'Utang Usaha',
                    'coa_status'    =>'Credit',
                    'amount'        =>9000000
                ],
                [
                    'date'          => '2026-01-11',
                    'budget_code'   =>'Q000062',
                    'budget_name'   =>'XL Microcell 2007',
                    'sub_budget'    =>'248',
                    'sub_budget_name'=>'Bukit Pakis Sby Infill',
                    'type'          =>'SETTLEMENT',
                    'product_code'  =>'2000606',
                    'product_name'  =>'Maintenance',
                    'coa_code'      =>'5-0030',
                    'coa_name'      =>'Beban Maintenance',
                    'coa_status'    =>'Debit',
                    'amount'        =>6000000
                ],
                [
                    'date'          => '2026-01-12',
                    'budget_code'   =>'Q000062',
                    'budget_name'   =>'XL Microcell 2007',
                    'sub_budget'    =>'240',
                    'sub_budget_name'=>'Cendana Andalas',
                    'type'          =>'SETTLEMENT',
                    'product_code'  =>'2000707',
                    'product_name'  =>'Biaya Konsultan',
                    'coa_code'      =>'5-0040',
                    'coa_name'      =>'Beban Jasa',
                    'coa_status'    =>'Debit',
                    'amount'        =>11000000
                ],
                [
                    'date'          => '2026-01-13',
                    'budget_code'   =>'Q000062',
                    'budget_name'   =>'XL Microcell 2007',
                    'sub_budget'    =>'221',
                    'sub_budget_name'=>'Halat Medan',
                    'type'          =>'SETTLEMENT',
                    'product_code'  =>'2000808',
                    'product_name'  =>'Perizinan',
                    'coa_code'      =>'1-3000',
                    'coa_name'      =>'Aset Tak Berwujud',
                    'coa_status'    =>'Debit',
                    'amount'        =>7000000
                ],
                [
                    'date'          => '2026-01-14',
                    'budget_code'   =>'Q000062',
                    'budget_name'   =>'XL Microcell 2007',
                    'sub_budget'    =>'254',
                    'sub_budget_name'=>'Jatiagung Sidoarjo Infill',
                    'type'          =>'SETTLEMENT',
                    'product_code'  =>'2000909',
                    'product_name'  =>'Listrik Proyek',
                    'coa_code'      =>'5-0050',
                    'coa_name'      =>'Beban Utilitas',
                    'coa_status'    =>'Credit',
                    'amount'        =>3000000
                ]
            ];

            $collection = collect($data);

            // // FILTER DATE
            // if ($request->filled('generalJournalDateFrom') && $request->filled('generalJournalDateTo')) {
            //     $collection = $collection->whereBetween('date', [
            //         $request->generalJournalDateFrom,
            //         $request->generalJournalDateTo
            //     ]);
            // }

            // FILTER BUDGET
            if ($request->filled('budget')) {
                $collection = $collection->where('budget_code', $budget->code);
            }

            // // FILTER SUB BUDGET
            if ($request->filled('sub_budget')) {
                $collection = $collection->where('sub_budget', $subBudget->code);
            }

            // // FILTER TYPE
            if ($request->filled('type')) {
                $collection = $collection->where('type', $type);
            }

            // // FILTER COA STATUS
            // if ($request->filled('coa_status')) {
            //     $collection = $collection->where('coa_status', $request->coa_status);
            // }

            $compact = [
                'status'    => 200,
                'data'      => $collection->values()
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Report Advance Summary Store Function Error:" . $th->getMessage());

            $compact = [
                'status'    => 500,
                'message'   => $th->getMessage()
            ];

            return response()->json($compact);
        }
    }
}
