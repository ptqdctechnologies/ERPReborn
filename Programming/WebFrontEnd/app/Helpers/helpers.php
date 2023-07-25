<?php

use Illuminate\Support\Facades\Session;

function rupiah()
{
  // $cek = Session::get("SessionLogout");

  // if($cek >= 1){
  //   $tamp = 100;
  // }
  // else{
  //   $tamp = 200;
  // }

  // return $tamp;
  // // config(['session.lifetime' => 2]);

  return Session::get("SessionLogout");

}
