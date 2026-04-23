<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        return view('Master.Supplier.Transactions.IndexSupplier');
    }

    public function create()
    {
        $varAPIWebToken = Session::get('SessionLogin');

        $compact = [
            'varAPIWebToken' => $varAPIWebToken
        ];

        return view('Master.Supplier.Transactions.CreateSupplier', $compact);
    }

    public function store(Request $request)
    {
        try {
            $token = Session::get('SessionLogin');
            $detailItems = json_decode($request->supplier_detail, true);

            $response = Helper_APICall::setCallAPIGateway(
                Helper_Environment::getUserSessionID_System(),
                $token,
                'transaction.create.supplyChain.setSupplier',
                'latest',
                [
                    'entities' => [
                        "supplierName" => $request->supplier_name,
                        "taxID" => $request->tax_id,
                        "phoneNumber" => $request->phone_number,
                        "email" => $request->email,
                        "country" => $request->country_name,
                        "province" => $request->province_name,
                        "city" => $request->city_name,
                        "address" => $request->address,
                        "contactPerson" => $request->contact_person,
                        "bank_RefID" => $request->bank_id,
                        "accountNumber" => $request->account_number,
                        "accountName" => $request->account_name,
                        "remark" => $request->remark,
                        "legalEntity" => $request->legal_entity,
                        "log_FileUpload_Pointer_RefID" => null,
                        "additionalData" => [
                            "itemList" => [
                                "items" => $detailItems
                            ]
                        ]
                    ]
                ]
            );

            if ($response['metadata']['HTTPStatusCode'] !== 200) {
                throw new \Exception('Failed to fetch Submit Supplier => ' . $response['data']['message']);
            }

            $compact = [
                "documentNumber" => '-',
                "status" => $response['metadata']['HTTPStatusCode'],
            ];

            return response()->json($compact);
        } catch (\Throwable $th) {
            Log::error("Store Supplier Function Error: " . $th->getMessage());

            return response()->json(["status" => 500]);
        }
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}