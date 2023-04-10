<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestApiController extends Controller
{
    public function index(Request $request)
    {
        $varAPIWebToken = $request->session()->get('SessionLogin');
        //JURUSAN
            
        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.read.dataList.mulyadi.getJurusan', 
            'latest', 
            [
            'parameter' => [
                ],
            'SQLStatement' => [
                'pick' => null,
                'sort' => null,
                'filter' => null,
                'paging' => null
                ]
            ]
            );

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.create.mulyadi.setJurusan',
        //     'latest', 
        //     [
        //     'entities' => [
        //         "jurusan" => 'Bahasa',
        //         ]
        //     ]
        //     );

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.update.mulyadi.setJurusan', 
        //     'latest', 
        //     [
        //     'recordID' => 2,
        //     'entities' => [
        //         "jurusan" => 'Cina'
        //         ]
        //     ]
        //     );


        // MAHASISWA

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.read.dataList.mulyadi.getMahasiswa', 
        //     'latest', 
        //     [
        //     'parameter' => [
        //         ],
        //     'SQLStatement' => [
        //         'pick' => null,
        //         'sort' => null,
        //         'filter' => null,
        //         'paging' => null
        //         ]
        //     ]
        //     );

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.create.mulyadi.setMahasiswa',
        //     'latest', 
        //     [
        //     'entities' => [
        //         "nik" => '07171005',
        //         "nama" => 'Ato',
        //         "alamat" => 'Bandung'
        //         ]
        //     ]
        //     );

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.update.mulyadi.setMahasiswa', 
        //     'latest', 
        //     [
        //     'recordID' => 6,
        //     'entities' => [
        //         "nik" => '07171003',
        //         "nama" => 'Aldi Mulyadi',
        //         "alamat" => 'Banjar'   
        //         ]
        //     ]
        //     );

        dd($varData);

        
        
    }
    
}
