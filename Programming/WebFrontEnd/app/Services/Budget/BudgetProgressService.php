<?php

namespace App\Services\Budget;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BudgetProgressService
{
    public function detail($id): mixed
    {
        $compact = [
            'sys_id' => 309000000000008,
            'combinedBudgetRefID' => 46000000000033,
            'combinedBudgetCode' => 'Q000062',
            'combinedBudgetName' => 'XL Microcell 2007',
            'start_date' => '2026-09-29 00:00:00+07',
            'end_date' => '2026-09-29 00:00:00+07',
            'details' => [
                [
                    'record_id' => 310000000000013,
                    'projectProgress_RefID' => 309000000000008,
                    'sub_budget_id' => 143000000000305,
                    'progressCompletion' => 8,
                    'annotation' => null
                ]
            ]
        ];

        return $compact;
    }

    public function create($request): mixed
    {
        $token = Session::get('SessionLogin');

        $budgetRefId = $request->input('budget_id');
        $dateRange = $request->input('budget_progress_date_range');
        $budgetDetails = $request->input('additionalData', []);

        $dates = explode(' - ', $dateRange);
        $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');

        $items = collect($budgetDetails)
            ->filter(fn($entity) => filled($entity['entities']['progressCompletion'] ?? null))
            ->map(function ($entity) {
                return [
                    'entities' => [
                        'projectProgress_RefID' => $entity['entities']['projectProgress_RefID'] ? (int) $entity['entities']['projectProgress_RefID'] : null,
                        'projectSectionItem_RefID' => (int) $entity['entities']['projectSectionItem_RefID'],
                        'progressCompletion' => (float) number_format($entity['entities']['progressCompletion'], 2),
                        'annotation' => $entity['entities']['annotation'] ?? null,
                    ]
                ];
            })
            ->values()
            ->all();

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.project.setProjectProgress',
            'latest',
            [
                'entities' => [
                    "project_RefID" => (int) $budgetRefId,
                    "startDateTimeTZ" => $startDate,
                    "finishDateTimeTZ" => $endDate,
                    "annotation" => null,
                    "additionalData" => [
                        "itemList" => [
                            "items" => $items
                        ]
                    ]
                ]
            ]
        );
    }

    public function update($request, $id): mixed
    {
        $token = Session::get('SessionLogin');

        $budgetRefId = $request->input('budget_id');
        $dateRange = $request->input('budget_progress_date_range');
        $budgetDetails = $request->input('additionalData', []);

        $dates = explode(' - ', $dateRange);
        $startDate = Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay()->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay()->format('Y-m-d');

        $items = collect($budgetDetails)
            ->filter(fn($entity) => filled($entity['entities']['progressCompletion'] ?? null))
            ->map(function ($entity) {
                return [
                    'recordID' => $entity['entities']['recordID'] ? (int) $entity['entities']['recordID'] : null,
                    'entities' => [
                        'projectProgress_RefID' => $entity['entities']['projectProgress_RefID'] ? (int) $entity['entities']['projectProgress_RefID'] : null,
                        'projectSectionItem_RefID' => (int) $entity['entities']['projectSectionItem_RefID'],
                        'progressCompletion' => (float) number_format($entity['entities']['progressCompletion'], 2),
                        'annotation' => $entity['entities']['annotation'] ?? null,
                    ]
                ];
            })
            ->values()
            ->all();

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.update.project.setProjectProgress',
            'latest',
            [
                'recordID' => (int) $id,
                'entities' => [
                    "project_RefID" => (int) $budgetRefId,
                    "startDateTimeTZ" => $startDate,
                    "finishDateTimeTZ" => $endDate,
                    "annotation" => null,
                    "additionalData" => [
                        "itemList" => [
                            "items" => $items
                        ]
                    ]
                ]
            ]
        );
    }
}