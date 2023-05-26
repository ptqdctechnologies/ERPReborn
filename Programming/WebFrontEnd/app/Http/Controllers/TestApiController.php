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

        // $varData = \App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall::setCallAPIGateway(
        //     \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        //     $varAPIWebToken, 
        //     'transaction.update.mulyadi.setMahasiswa', 
        //     'latest', 
        //     [
        //     'recordID' => 13,
        //     'entities' => [
        //         "Jurusan_RefID" => 1,
        //         "Nik" => '07171011',
        //         "Nama" => 'Amelia',
        //         "Alamat" => 'Banten'   
        //         ]
        //     ]
        //     );
        

        // dd($varData);


        // 1

        // $tinggi_awal = 250;
        // $lama_hari = 2;
        // $pertumbuhanHarian = 2;
        // return $this->solution1($tinggi_awal, $lama_hari, $pertumbuhanHarian);


        // 2
        // $tinggi = 5;
        // return $this->solution2($tinggi);


        // // 3
        $kata = "imagination";
        return $this->solution3($kata);

        // // 4
        // $HargaProduk = [2000,3000,100];
        // return $this->solution4($HargaProduk);


        // 5
        // $no_akun = ['111','211','401'];
        // $nominal = [200000,50000,150000];
        // return $this->solution5($no_akun, $nominal);
        
    }
    public function solution1($tinggi_awal, $lama_hari, $pertumbuhanHarian){
        $angkaPertumbuhanHarian = 0;
        for($i = 0; $i < $lama_hari; $i++){
            $angkaPertumbuhanHarian = $tinggi_awal * ($pertumbuhanHarian / 100);
            $tinggi_awal = $tinggi_awal + $angkaPertumbuhanHarian;
        }

        echo "Jawaban No 1: ". $tinggi_awal ."<br>";
    }
    
    public function solution2($tinggi){
        echo "Jawaban No 2: <br>";
        for($i = 0; $i < ($tinggi * 2) - 2 ; $i++){
            if($i == 0){
                echo "*"."<br>";
            }
            if($i % 2 == 0){
                echo "/";
                for($m = 0; $m < $i + 2; $m++){
                    echo "*";
                }
                echo "\\"."<br>";
            } 
        }  
    }

    public function solution3($kata){
        echo "Jawaban No 3: <br>";

        echo $result = count_chars( $kata, 3);

        // $y = [];
        // for($i = 0 ; $i < strlen($kata); $i++){
        //     for($m = 0 ; $m < strlen($kata); $m++){
        //         if($kata[$m] != $kata[$i] && $m != $i){
        //             // echo $kata[$i]."<br>";
        //             $y[] = $kata[$m];
        //             break;
        //         }
        //     }
        // }

        // dd($y);die;

    }

    public function solution4($HargaProduk){
        echo "Jawaban No 4: <br>";
        $TotalHarga = 0;
        for($i = 0 ; $i < count($HargaProduk); $i++){
            $TotalHarga += $HargaProduk[$i];
        }

        if($TotalHarga < 70000){
            echo "Total Harga : ". $TotalHarga."<br>";
            echo "Diskon : 0"."<br>";
            echo "Bonus : -"."<br>";
            echo "Harga Akhir : ". $TotalHarga."<br>";
        }
        else if($TotalHarga > 70000 && $TotalHarga <= 200000){
            echo "Total Harga : ". $TotalHarga."<br>";
            echo "Diskon : ". $TotalHarga * (5 / 100)."<br>";
            echo "Bonus : Topi"."<br>";
            echo "Harga Akhir : ". $TotalHarga - ($TotalHarga * (5 / 100))."<br>";
        }
        else if($TotalHarga >200000 && $TotalHarga <= 400000){
            echo "Total Harga : ". $TotalHarga."<br>";
            echo "Diskon : ". $TotalHarga * (7 / 100)."<br>";
            echo "Bonus : Payung"."<br>";
            echo "Harga Akhir : ". $TotalHarga - ($TotalHarga * (7 / 100))."<br>";
        }
        else if($TotalHarga > 400000){
            echo "Total Harga : ". $TotalHarga."<br>";
            echo "Diskon : ". $TotalHarga * (10 / 100)."<br>";
            echo "Bonus : Ransel"."<br>";
            echo "Harga Akhir : ". $TotalHarga - ($TotalHarga * (10 / 100))."<br>";
        }

    }

    public function solution5($no_akun, $nominal){
        echo "Jawaban No 3: <br>";
        echo "#Akun #Debi #Kredit <br>";
        $jum_debit = 0; $jum_kredit = 0;
        for($i = 0 ; $i < count($no_akun); $i++){
            $awalan = $no_akun[$i];
            if($awalan[0] == "1"){
                echo " ". $no_akun[$i]." - ";
                echo " ". $nominal[$i]." - ";
                echo " ". 0 ."<br>";
                $jum_debit += $nominal[$i];
            }
            else{
                echo " ". $no_akun[$i]." - ";
                echo " ". 0 ." - ";
                echo " ". $nominal[$i] ."<br>";
                $jum_kredit += $nominal[$i];
            }
        }
        $balance = "(Not Balance)";
        if($jum_debit == $jum_kredit){
            $balance = "(Balance)";
        }
        echo "#Total "."# ". $jum_debit. "# ". $jum_kredit." ".$balance." <br>";

    }
    
}
