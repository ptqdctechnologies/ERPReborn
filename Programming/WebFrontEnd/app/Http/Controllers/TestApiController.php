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
            
        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.read.dataList.mulyadi.getJurusan', 
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
        //     'transaction.create.mulyadi.setJurusan',
        //     'latest', 
        //     [
        //     'entities' => [
        //         "jurusan" => 'Inggris',
        //         ]
        //     ]
        //     );

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.update.mulyadi.setJurusan', 
        //     'latest', 
        //     [
        //     'recordID' => 3,
        //     'entities' => [
        //         "jurusan" => 'Jerman'
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
        //         'Jurusan_RefID' => 2
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
        //         "Jurusan_RefID" => 1,
        //         "Nik" => '07171011',
        //         "Nama" => 'Amel',
        //         "Alamat" => 'Bandung Barat'
        //         ]
        //     ]
        //     );

        $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken, 
            'transaction.update.mulyadi.setMahasiswa', 
            'latest', 
            [
            'recordID' => 13,
            'entities' => [
                "Jurusan_RefID" => 1,
                "Nik" => '07171011',
                "Nama" => 'Amelia',
                "Alamat" => 'Banten'   
                ]
            ]
            );
        

        dd($varData);

        
        
    }
    
}
