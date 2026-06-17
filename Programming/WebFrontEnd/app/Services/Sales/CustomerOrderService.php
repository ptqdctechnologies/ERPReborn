<?php

namespace App\Services\Sales;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class CustomerOrderService
{
    public function getPickList()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.customerRelation.getSalesContract',
            'latest',
            [
                'parameter' => null
            ],
            false
        );
    }

    public function create(Request $request): array
    {
        $sessionToken = Session::get('SessionLogin');
        $data = $request->storeData;
        $detailItems = json_decode($data['customerOrderDetail'], true);
        $fileID = isset($data['logFileUploadPointerRefID']) ? (int) $data['logFileUploadPointerRefID'] : null;

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'transaction.create.customerRelation.setSalesContract',
            'latest',
            [
                'entities' => [
                    "log_FileUpload_Pointer_RefID" => $fileID,
                    "combinedBudget_RefID" => $data['combinedBudgetRefID'],
                    "currency_RefID" => $data['currencyRefID'],
                    "documentDateTimeTZ" => date('Y-m-d'),
                    "additionalData" => [
                        "itemList" => [
                            "items" => $detailItems
                        ]
                    ]
                ]
            ]
        );
    }

    public function summaryReport($project, $site, $date): mixed
    {
        if ($date) {
            $dates = explode(' - ', $date);
            $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
            $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');
        }

        $dummyData = [
            [
                'sub_budget' => '235 - Bukit Pakis Sby Infill',
                'date' => '2025-11-25',
                'value' => 98237120,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000305'
            ],
            [
                'sub_budget' => '240 - Cendana Andalas',
                'date' => '2025-11-26',
                'value' => 4712983,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000307'
            ],
            [
                'sub_budget' => '221 - Halat Medan',
                'date' => '2025-11-26',
                'value' => 749208120,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000302'
            ],
            [
                'sub_budget' => '254 - Jatiagung Sidoarjo Infill',
                'date' => '2025-11-27',
                'value' => 294803,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000314'
            ],
            [
                'sub_budget' => '250 - Jemur Wonosari Sby Infill',
                'date' => '2025-11-28',
                'value' => 3948058,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000310'
            ],
            [
                'sub_budget' => '249 - Jetis Kulon Sby Infill',
                'date' => '2025-11-29',
                'value' => 492840872,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000309'
            ],
            [
                'sub_budget' => '219 - Karya Wisata Medan',
                'date' => '2025-11-30',
                'value' => 294830,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000301'
            ],
            [
                'sub_budget' => '253 - Kureksari Sby Infill',
                'date' => '2025-11-31',
                'value' => 6498123,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000313'
            ],
            [
                'sub_budget' => '217 - Mariendal Medan',
                'date' => '2025-11-25',
                'value' => 4761238,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000300'
            ],
            [
                'sub_budget' => '222 - Pancasila',
                'date' => '2025-11-26',
                'value' => 9538201,
                'notes' => '-',
                'project_id' => '46000000000033',
                'sub_id' => '143000000000303'
            ],
        ];

        $filtered = [];
        $totalIDR = 0;
        foreach ($dummyData as $data) {
            $dueDate = Carbon::parse($data['date']);

            if ($data['project_id'] != $project['id']) {
                continue; // skip jika tidak cocok
            }

            $isSiteMatch = isset($site['id']) ? $data['sub_id'] == $site['id'] : true;
            $isDateInRange = !empty($date) ? $dueDate->between($startDate, $endDate) : true;

            if ($isSiteMatch && $isDateInRange) {
                $filtered[] = $data;
            }

            $totalIDR += $data['value'];
        }

        $compact = [
            'project' => $project,
            'site' => $site,
            'date' => $date,
            'totalIDR' => $totalIDR,
            'data' => $filtered
        ];

        return $compact;
    }
}
