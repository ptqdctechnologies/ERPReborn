<?php

namespace App\Services\Accounting;

use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Services\Document\DocumentTypeMapper;

class JournalService
{
    public function picklist()
    {
        $sessionToken = Session::get('SessionLogin');

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $sessionToken,
            'dataPickList.accounting.getJournal',
            'latest',
            [
                'parameter' => [
                ]
            ]
        );
    }

    public function detailTransaction($documentType, $referenceId)
    {
        $token = Session::get('SessionLogin');

        $apiConfig = DocumentTypeMapper::getApiConfig($documentType, $referenceId);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            $apiConfig['key'],
            'latest',
            [
                'parameter' => $apiConfig['parameter'],
                'SQLStatement' => [
                    'pick' => null,
                    'sort' => null,
                    'filter' => null,
                    'paging' => null
                ]
            ],
            false
        );
    }

    public function create($request): mixed
    {
        $token = Session::get('SessionLogin');

        $journalDetails = $request->input('journal_details');
        $entities = json_decode($journalDetails, true);

        return Helper_APICall::setCallAPIGateway(
            Helper_Environment::getUserSessionID_System(),
            $token,
            'transaction.create.accounting.setJournal',
            'latest',
            [
                'entities' => $entities
            ]
        );
    }
}