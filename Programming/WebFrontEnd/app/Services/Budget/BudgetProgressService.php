<?php

namespace App\Services\Budget;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class BudgetProgressService
{
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
}