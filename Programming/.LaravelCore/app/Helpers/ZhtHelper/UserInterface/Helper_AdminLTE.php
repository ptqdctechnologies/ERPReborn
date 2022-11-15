<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\UserInterface                                                                              |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\UserInterface
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_AdminLTE                                                                                              |
    | ▪ Description : Menangani User Interface AdminLTE                                                                            |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_AdminLTE
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-07                                                                                           |
        | ▪ Creation Date   : 2022-11-07                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct()
            {
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __destruct                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-07                                                                                           |
        | ▪ Creation Date   : 2022-11-07                                                                                           |
        | ▪ Description     : System's Default Destructor                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __destruct()
            {
            }

        private static function htmlEmbeddedWrite($varData)
            {
            $varReturn = '';
            for($i=0, $iMax=count($varData); $i!=$iMax; $i++)
                {
                switch($varData[$i]['Type'])
                    {
                    case 'CSS':
                        {
                        $varReturn .= '<link rel="stylesheet" href="'.$varData[$i]['Data'].'">';                
                        break;
                        }
                    case 'JavaScript':
                        {
                        $varReturn .= '<script src="'.$varData[$i]['Data'].'"></script>';                
                        break;
                        }
                    case 'Comment':
                        {
                        $varReturn .= '<!-- '.$varData[$i]['Data'].' -->';                
                        break;
                        }
                    default:
                        {
                        break;
                        }
                    }
                }
            return $varReturn;
            }

        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : initBody_CSSAndJS                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-14                                                                                           |
        | ▪ Creation Date   : 2022-11-14                                                                                           |
        | ▪ Description     : Menghasilkan Literasi CSS dan JavaScript yang akan ditanam kedalam elemen BODY HTML                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function initBody_CSSAndJS()
            {
            $varReturn = '';
            $varData = [
            //---> Main
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/jquery/jquery.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/select2/js/select2.full.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/moment/moment.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/inputmask/jquery.inputmask.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bootstrap-switch/js/bootstrap-switch.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bs-stepper/js/bs-stepper.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/dropzone/min/dropzone.min.js')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/dist/js/adminlte.min.js?v=3.2.0')],
                ['Type' => 'JavaScript',    'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/dist/js/demo.js')],
                ];
            $varReturn .= self::htmlEmbeddedWrite($varData);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : initHead_CSSAndJS                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-14                                                                                           |
        | ▪ Creation Date   : 2022-11-14                                                                                           |
        | ▪ Description     : Menghasilkan Literasi CSS dan JavaScript yang akan ditanam kedalam elemen HEAD HTML                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function initHead_CSSAndJS()
            {
            $varReturn = '';
            $varData = [
                //---> Main
                    ['Type' => 'CSS',       'Data' => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback'],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/select2/css/select2.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/bs-stepper/css/bs-stepper.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/plugins/dropzone/min/dropzone.min.css')],
                    ['Type' => 'CSS',       'Data' => \Illuminate\Support\Facades\URL::asset('AdminLTE-master/dist/css/adminlte.min.css?v=3.2.0')],
                ];
            $varReturn =
                '<link rel="shortcut icon" href="'.\Illuminate\Support\Facades\URL::asset('AdminLTE-master/dist/img/favicon.ico').'">';
            $varReturn .= self::htmlEmbeddedWrite($varData);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setObject_Select                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-11-14                                                                                           |
        | ▪ Creation Date   : 2022-11-14                                                                                           |
        | ▪ Description     : Mengeset Objek Select                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
                 ------------------------------                                                                                    |
        |      ▪ (string) varID ► Object ID & Name                                                                                 |
        |      ▪ (string) varCaption ► Caption                                                                                     |
        |      ▪ (array)  varDataListValue ► Data List Value                                                                       |
                 ------------------------------                                                                                    |
        |      ▪ (string) varJSEvent ► JavaScript Event                                                                            |
        |      ▪ (string) varCSS ► CSS                                                                                             |
        |      ▪ (string) varExtraProperties ► Extra Properties                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (string) varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */ 
        public static function setObject_Select($varUserSession, 
            string $varID, string $varCaption = '', array $varDataListValue = [], 
            string $varJSEvent = '', string $varCSS = '', string $varExtraProperties = '')
            {
            $varArrayID = [];
            for($i=0, $iMax=count($varDataListValue); $i!=$iMax; $i++)
                {
                array_push($varArrayID, $varDataListValue[$i]['ID']);
                }

            $varReturn = 
                '
                <div class="form-group">
                    <label>xxxMinimal</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected="selected" data-select2-id="3">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                    <span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;">
                        <span class="selection">
                            <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0i64-container">
                            <span class="select2-selection__rendered" id="select2-0i64-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span>
                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true">
                        </span>
                    </span>
                </div>
                ';
            return $varReturn;
            }
            

        }
    }

?>