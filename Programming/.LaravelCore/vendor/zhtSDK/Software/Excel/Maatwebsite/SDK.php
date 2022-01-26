<?php

namespace zhtSDK\Software\Excel\Maatwebsite
    {
    class zhtSDK extends \Illuminate\Routing\Controller
        {
        private $ObjDataUserSession;

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
            //$this->varUserSession = $varUserSession;
            $this->zhtSetDataUserSession($varUserSession);
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
                new class($this->ObjDataUserSession, $varDataArray) implements 
                    \Maatwebsite\Excel\Concerns\FromArray, 
                    \Maatwebsite\Excel\Concerns\ShouldAutoSize,
                    \Maatwebsite\Excel\Concerns\WithColumnFormatting,
                    \Maatwebsite\Excel\Concerns\WithDrawings,
                    \Maatwebsite\Excel\Concerns\WithEvents,
                    \Maatwebsite\Excel\Concerns\WithStyles
                    {
                    private $ObjSheet;
                    protected $ObjDataUserSession;
                    protected $ObjData;
                    protected $ObjStyle;
                    protected $ObjContentTitleCellRange;

                    public function __construct(array $varDataUserSessionArray, array $varDataArray)
                        {
                        $this->ObjDataUserSession = $varDataUserSessionArray;
                        $this->ObjData = $varDataArray;
                        $this->ObjContentTitleCellRange = $this->ObjData['Content']['Title'][0][0].':'.$this->ObjData['Content']['Title'][count($this->ObjData['Content']['Title'])-1][0];
                        }

                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : array                                                                                    |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\FromArray::array()                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function array(): array
                        {
                        return $this->zhtEngine_Content_Item();
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : columnFormats                                                                            |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\WithColumnFormatting::columnFormats()       |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function columnFormats(): array
                        {
                        return $this->zhtEngine_MainColumnFormats();
                        }
                        

                    public function drawings()
                        {
                        return $this->zhtEngine_Heading_Logo();
                        }

                    public function registerEvents(): array
                        {
                        return $this->zhtEngine_MainEvents();
                        }

                    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $ObjSheet)
                        {
                        $this->ObjSheet = &$ObjSheet;
                       
                        $this->zhtEngine_Heading_Institution();
                        $this->zhtEngine_Content_Title();
                        return $this->zhtEngine_MainStyles();
                        }

                    private function zhtEngine_MainColumnFormats()
                        {
                        $varReturn = [];
/*                        foreach ($this->ObjStyle as $ArrayKey => $ArrayValue)
                            {
                            $varArrayType = [
                                'General' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_GENERAL,
                                'Date_DDMMYYYY' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY,
                                'Number' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER,
                                'Text' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
                                ];
                            
                            array_push($varReturn, 
                                [
                                $ArrayKey => $varArrayType[$ArrayValue]
                                ]);
                            }*/
                        return $varReturn;
                        }

                    private function zhtEngine_MainStyles()
                        {
                        return [
                            'A1' => [
                                'font' => [
                                    'name' => 'Calibri',
                                    'size' => 15,
                                    'bold' => true
                                    ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFFFFFFF'
                                        ]
                                    ]
                                ],
                            'A2' => [
                                'font' => [
                                    'name' => 'Calibri',
                                    'size' => 15,
                                    'bold' => true
                                    ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFFFFFFF'
                                        ]
                                    ]
                                ],
                            'A3' => [
                                'font' => [
                                    'name' => 'helvetica',
                                    'size' => 6,
                                    'bold' => false
                                    ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFFFFFFF'
                                        ]
                                    ]
                                ],
                            'A4' => [
                                'font' => [
                                    'name' => 'helvetica',
                                    'size' => 6,
                                    'bold' => false
                                    ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFFFFFFF'
                                        ]
                                    ]
                                ],
/*
                            $this->ObjContentTitleCellRange => [
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFA6A6A6'
                                        ]
                                    ],
                                'borders' => [
                                    'top' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                        ],
                                    'bottom' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                        ],
                                    'left' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                        ],
                                    'right' => [
                                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                        ]
                                    ],
                                ],*/
                            ];
                        }

                    private function zhtEngine_MainEvents()
                        {
                        return [
                            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                                $ObjDelegate = $event->sheet->getDelegate();
                                $ObjDelegate->mergeCells('A1:F1');
                                $ObjDelegate->mergeCells('A2:F2');
                                $ObjDelegate->mergeCells('A3:F3');
                                $ObjDelegate->mergeCells('A4:F4');
                                $ObjDelegate->mergeCells('A5:F5');
                                $ObjDelegate->getRowDimension('1')->setRowHeight(30);

                                $ObjDelegate->getColumnDimension('A')->setWidth(10);
                                
                                
                                for($i=0; $i!=count($this->ObjData['Content']['Title']); $i++)
                                    {
                                    //---> Set Alignment
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getAlignment()
                                            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getAlignment()
                                            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                                    //---> Set Border
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getBorders()
                                            ->getTop()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getBorders()
                                            ->getBottom()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getBorders()
                                            ->getRight()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getBorders()
                                            ->getLeft()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                                    //---> Set Color
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                                ->getStartColor()->setARGB('ffffffc8');
                                    $ObjDelegate->getStyle($this->ObjData['Content']['Title'][$i][0])
                                        ->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                                ->getEndColor()->setARGB('ffffffc8');
                                    }
                                },
                            ];                        
                        }
                    
                    private function zhtEngine_Heading_Logo()
                        {
                        $ObjDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                        $ObjDrawing->setName('Logo');
                        $ObjDrawing->setDescription('Company logo');
                        $ObjDrawing->setPath(public_path('/images/Logo/AppObject_InstitutionBranch/Small/'.$this->ObjDataUserSession['InstitutionBranch']['ID'].'.png'));
                        $ObjDrawing->setHeight(30);
                        $ObjDrawing->setCoordinates('A1')->setOffsetX(5);
                        $ObjDrawing->setCoordinates('A1')->setOffsetY(5);
                        return $ObjDrawing;
                        }

                    private function zhtEngine_Heading_Institution()
                        {
                        $this->ObjSheet->setCellValue('A2', $this->ObjDataUserSession['InstitutionBranch']['Name']);
                        $this->ObjSheet->setCellValue('A3', $this->ObjDataUserSession['InstitutionBranch']['Address']);
                        $this->ObjSheet->setCellValue('A4', $this->ObjDataUserSession['InstitutionBranch']['Contact']);
                        }
                        
                    private function zhtEngine_Content_Title()
                        {
                        $varData = $this->ObjData['Content']['Title'];
                        for($i=0; $i!=count($varData); $i++)
                            {
                            $this->ObjSheet->getStyle($varData[$i][0])->getFont()->setBold(true);
                            //$this->ObjSheet->setAlignment('center');
                            $this->ObjSheet->setCellValue($varData[$i][0], $varData[$i][1]);
                            
                            //$this->ObjSheet->setBorder($varData[$i][0], 'solid');
                            
                            }
                        }
                        
                    private function zhtEngine_Content_Item()
                        {
                        $varReturn = [];
                        for($i=0; $i!=5; $i++)
                            {
                            array_push(
                                $varReturn,
                                ['']
                                );
                            }
                        array_push(
                            $varReturn,
                            $this->ObjData['Content']['Items']
                            );
                        return $varReturn;
                        }
                    }
                );
                
            //---> Return Value
            $varReturn = \Maatwebsite\Excel\Facades\Excel::raw($varDataOutput, \Maatwebsite\Excel\Excel::XLSX);
            return $varReturn;
            }

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

        public function exportFromArrayOLD($varFileName, array $varDataArray = [], array $varStyleArray = null)
            {
            if(!$varStyleArray)
                {
                $varStyleArray = [];
                }
                
            $varDataOutput = (
                new class($this->ObjDataUserSession, $varDataArray, $varStyleArray) implements 
                    \Maatwebsite\Excel\Concerns\FromArray, 
                    \Maatwebsite\Excel\Concerns\ShouldAutoSize,
                    \Maatwebsite\Excel\Concerns\WithColumnFormatting,
                    \Maatwebsite\Excel\Concerns\WithDrawings,
                    \Maatwebsite\Excel\Concerns\WithEvents,
                    \Maatwebsite\Excel\Concerns\WithStyles
                    {
                    protected $ObjDataUserSession;
                    protected $ObjData;
                    protected $ObjStyle;

                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : __construct                                                                              |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-21                                                                               |
                    | ▪ Description     : System's Default Constructor                                                             |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Input Variable  :                                                                                          |
                    |      ▪ (array)  varDataArray                                                                                 |
                    |      ▪ (array)  varStyleArray                                                                                |
                    | ▪ Output Variable :                                                                                          |
                    |      ▪ (void)                                                                                                |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function __construct(array $varDataUserSessionArray, array $varDataArray, array $varStyleArray)
                        {
                        $this->ObjDataUserSession = $varDataUserSessionArray;
                        $this->ObjData = $varDataArray;
                        $this->ObjStyle = $varStyleArray;
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : registerEvents                                                                           |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\WithEvents::registerEvents()                |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function registerEvents(): array
                        {
                        return [
                            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                                $event->sheet->getDelegate()->mergeCells('B1:F1');
                                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(50);
//                                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(350);
                                },
                            ];
                        }

    
                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : array                                                                                    |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\FromArray::array()                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function array(): array
                        {
                        return $this->ObjData;
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : columnFormats                                                                            |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\WithColumnFormatting::columnFormats()       |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function columnFormats(): array
                        {
                        $varReturn = [];
                        foreach ($this->ObjStyle as $ArrayKey => $ArrayValue)
                            {
                            $varArrayType = [
                                'General' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_GENERAL,
                                'Date_DDMMYYYY' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY,
                                'Number' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER,
                                'Text' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
                                ];
                            
                            array_push($varReturn, 
                                [
                                $ArrayKey => $varArrayType[$ArrayValue]
                                ]);
                            }
                        return $varReturn;
                        }
                    
                    
                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : drawings                                                                                 |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\WithDrawings::drawings()                    |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function drawings()
                        {
                        $ObjDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                        $ObjDrawing->setName('Logo');
                        $ObjDrawing->setDescription('Company logo');
                        $ObjDrawing->setPath(public_path('/images/Logo/AppObject_InstitutionBranch/Small/'.$this->ObjDataUserSession['InstitutionBranch']['ID'].'.png'));
                        $ObjDrawing->setHeight(30);
                        $ObjDrawing->setCoordinates('A1')->setOffsetX(10);
                        $ObjDrawing->setCoordinates('A1')->setOffsetY(10);
                        return $ObjDrawing;
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : styles                                                                                   |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-25                                                                               |
                    | ▪ Description     : Redeclare Method \Maatwebsite\Excel\Concerns\WithStyles::styles(                         |
                    |                     \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)                                    |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
                        {
                        //$this->ObjSheet = &$sheet;
                        return [
                            1 => [
                                'font' => [
                                    'name' => 'Calibri',
                                    'size' => 15,
                                    'bold' => true
                                    ]
                                ],
                            2 => [
                                'font' => [
                                    'name' => 'Calibri',
                                    'size' => 15,
                                    'bold' => true
                                    ]
                                ],
                            ];
                        }
                    }
                );
                
            //---> Return Value
            //return \Maatwebsite\Excel\Facades\Excel::download($varDataOutput, $varFileName);
            $varReturn = \Maatwebsite\Excel\Facades\Excel::raw($varDataOutput, \Maatwebsite\Excel\Excel::XLSX);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetUserSession                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2022-01-25                                                                                           |
        | ▪ Description     : Fungsi Pengesetan User Session                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function zhtSetDataUserSession($varUserSession)
            {
            $this->ObjDataUserSession = [
                'ApplicationID' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('APP_NAME'),
                'UserSessionID' => $varUserSession,
                'InstitutionBranch' => [
                    'ID' => (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                    'Name' =>  'PT. QDC Technologies',
                    'Address' => 'Graha Sentra Mampang QDC, Jl. Mampang Prapatan Raya No. 28 Blok C Kelurahan Pela Mampang Kecamatan Mampang Prapatan Kota Jakarta Selatan 12790',
                    'Contact' => 'Telp : +62-21-79191234, Fax : +62-21-79193333'
                    ]
                ];
            }
        }
    }