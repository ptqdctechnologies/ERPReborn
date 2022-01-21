<?php

namespace zhtSDK\Software\Excel\Maatwebsite
    {
    class zhtSDK extends \Illuminate\Routing\Controller
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-21                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession)
            {
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : exportFromArray                                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-21                                                                                           |
        | ▪ Description     : Export From Array                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (string) varFileName ► File Name                                                                                  |
        |      ▪ (array)  varDataArray ► Data Array                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (object)                                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function exportFromArray($varFileName, array $varDataArray = [])
            {
            $varDataOutput = (
                new class($varDataArray) implements \Maatwebsite\Excel\Concerns\FromArray {
                    protected $ObjData;

                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : __construct                                                                              |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-21                                                                               |
                    | ▪ Description     : System's Default Constructor                                                             |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Input Variable  :                                                                                          |
                    |      ▪ (void)                                                                                                |
                    | ▪ Output Variable :                                                                                          |
                    |      ▪ (void)                                                                                                |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function __construct(array $ObjDataArray)
                        {
                        $this->ObjData = $ObjDataArray;
                        }

                    public function array(): array
                        {
                        return $this->ObjData;
                        }
                    }
                );
            return \Maatwebsite\Excel\Facades\Excel::download($varDataOutput, $varFileName);
            }            
        }
    }