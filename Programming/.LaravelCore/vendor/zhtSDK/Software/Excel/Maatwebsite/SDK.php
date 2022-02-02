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
            //var_dump($varDataArray);

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

                    private $varLayoutParameter;


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : __construct                                                                              |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-21                                                                               |
                    | ▪ Description     : System's Default Constructor                                                             |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Input Variable  :                                                                                          |
                    |      ▪ (array)  varDataUserSessionArray                                                                      |
                    |      ▪ (array)  varDataArray                                                                                 |
                    | ▪ Output Variable :                                                                                          |
                    |      ▪ (void)                                                                                                |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    public function __construct(array $varDataUserSessionArray, array $varDataArray)
                        {
                        $this->ObjDataUserSession = $varDataUserSessionArray;
                        $this->ObjData = $varDataArray;
                        $this->ObjContentTitleCellRange = $this->ObjData['Content']['Title'][0][0].':'.$this->ObjData['Content']['Title'][count($this->ObjData['Content']['Title'])-1][0];

                        $this->varLayoutParameter['Content']['Items']['RowsOffset'] = 9;
                        $this->varLayoutParameter['Content']['Items']['ColumnsOffset'] = 0;

                        /*
                        //---> Reinitializing this->ObjData['Content']['Title']
                        $varDataArrayTemp = [];
                        for($i=0; $i!=($this->varLayoutParameter['Content']['Items']['ColumnsOffset'])-1; $i++)
                            {
                            array_push(
                                $varDataArrayTemp,
                                []
                                );
                            }
                        for($i=0; $i!=count($this->ObjData['Content']['Title']); $i++)
                            {
                            array_push(
                                $varDataArrayTemp,
                                $this->ObjData['Content']['Title'][$i]
                                ); 
                            }
                        $this->ObjData['Content']['Title'] = $varDataArrayTemp;
                        */
                        
                        //---> Reinitializing this->ObjData['Content']['Items']
                        $varDataArrayTemp = [];
                        for($i=0; $i!=($this->varLayoutParameter['Content']['Items']['RowsOffset'])-1; $i++)
                            {
                            array_push(
                                $varDataArrayTemp,
                                ['']
                                );
                            }
                        for($i=0; $i!=count($this->ObjData['Content']['Items']); $i++)
                            {
                            $varDataArrayTemp2 = [];
                            for($j=0; $j!=$this->varLayoutParameter['Content']['Items']['ColumnsOffset']; $j++)
                                {
                                array_push(
                                    $varDataArrayTemp2,
                                    ''
                                    );
                                }
                            for($j=0; $j!=count($this->ObjData['Content']['Items'][$i]); $j++)
                                {
                                array_push(
                                    $varDataArrayTemp2,
                                    $this->ObjData['Content']['Items'][$i][$j]
                                    );                                
                                }
                            array_push(
                                $varDataArrayTemp,
                                $varDataArrayTemp2
                                );
                            }

                        $this->ObjData['Content']['Items'] = $varDataArrayTemp;
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
                        return $this->zhtEngine_Heading_Logo();
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
                        return $this->zhtEngine_MainEvents();
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
                    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $ObjSheet)
                        {
                        $this->ObjSheet = &$ObjSheet;
                                              
                        $this->zhtEngine_Heading_Institution();
                        $this->zhtEngine_UpdateLayoutParameter();
                        $this->zhtEngine_Page();
                        $this->zhtEngine_Content_Title();
                        
                        
                        
                        
/*                        for($i=0; $i!=count($this->varLayoutParameter['Content']['Items']['ColumnArray']); $i++)
                            {
                            $this->ObjSheet->getColumnDimension($this->varLayoutParameter['Content']['Items']['ColumnArray'][$i])->setAutoSize(true);
                            }
*/
                        return $this->zhtEngine_MainStyles();
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_Content_Item                                                                   |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_Content_Item()
                        {
                        return $this->ObjData['Content']['Items'];
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_Content_Title                                                                  |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_Content_Title()
                        {
                        $varData = $this->ObjData['Content']['Title'];
                        for($i=0; $i!=count($varData); $i++)
                            {
                            $this->ObjSheet->getStyle($varData[$i][0])->getFont()->setBold(true);
                            $this->ObjSheet->setCellValue($varData[$i][0], $varData[$i][1]);
                            }
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_Heading_Institution                                                            |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_Heading_Institution()
                        {
                        $this->ObjSheet->setCellValue('A2', $this->ObjDataUserSession['InstitutionBranch']['Name']);
                        $this->ObjSheet->setCellValue('A3', $this->ObjDataUserSession['InstitutionBranch']['Address']);
                        $this->ObjSheet->setCellValue('A4', $this->ObjDataUserSession['InstitutionBranch']['Contact']);
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_Heading_Logo                                                                   |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
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


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_MainColumnFormats                                                              |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_MainColumnFormats()
                        {
                        $varReturn = [];
                        
                        $varArrayType = [
                            'General' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_GENERAL,
                            'Date_DDMMYYYY' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY,
                            'Number' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER,
                            'Text' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT,
                            ];
                        foreach ($this->ObjData['ColumnFormat'] as $ArrayKey => $ArrayValue)
                            {
                            $varReturn[$ArrayKey] = $varArrayType[$ArrayValue];
                            }
                        return $varReturn;
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_MainEvents                                                                     |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_MainEvents()
                        {
                        return [
                            \Maatwebsite\Excel\Events\AfterSheet::class => function(\Maatwebsite\Excel\Events\AfterSheet $event) {
                                $ObjDelegate = $event->sheet->getDelegate();
                                
                                //---> Set Merge Cell
                                for($i=0; $i!=$this->varLayoutParameter['Content']['Items']['RowsOffset']-1; $i++)
                                    {
                                    $ObjDelegate->mergeCells(
                                        'A'.($i+1).
                                        ':'.
                                        $this->varLayoutParameter['Content']['Items']['LastColumn'].($i+1)
                                        );
                                    }

                                if(count($this->ObjData['Page']['SubTitle']) == 0)
                                    {
                                    $ObjDelegate->mergeCells('A6:'.$this->varLayoutParameter['Content']['Items']['LastColumn'].'7');
                                    }

                                //$ObjDelegate->getStyle('A')->getFont()->setName('calibri');
                                $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])->getFont()->setName('Calibri');
                                $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])->getFont()->setSize(10);
                                
                                //---> Set Cell Height
                                $ObjDelegate->getRowDimension('1')->setRowHeight(30);
                                $ObjDelegate->getRowDimension('3')->setRowHeight(10);
                                $ObjDelegate->getRowDimension('4')->setRowHeight(10);
                                $ObjDelegate->getRowDimension('5')->setRowHeight(5);
                                $ObjDelegate->getRowDimension('6')->setRowHeight(20);
                                $ObjDelegate->getRowDimension('7')->setRowHeight(20);
                                $ObjDelegate->getRowDimension('8')->setRowHeight(5);

                                //---> Set Column Auto Width
                                for($i=0; $i!=count($this->varLayoutParameter['Content']['Items']['ColumnArray']); $i++)
                                    {
                                    //$this->ObjSheet->
                                    $ObjDelegate->getColumnDimension($this->varLayoutParameter['Content']['Items']['ColumnArray'][$i])->setAutoSize(true);
                                    }
                                    
                                //---> Set Cell Width
                                //$ObjDelegate->getColumnDimension('A')->setWidth(10);

                                //---> Set Page Title --> Alignment
                                $ObjDelegate->getStyle('A6')
                                    ->getAlignment()
                                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                                $ObjDelegate->getStyle('A6')
                                    ->getAlignment()
                                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                                $ObjDelegate->getStyle('A7')
                                    ->getAlignment()
                                        ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                                $ObjDelegate->getStyle('A7')
                                    ->getAlignment()
                                        ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                                //---> Set Page Title --> Border
                                for($i=0; $i!=count($this->varLayoutParameter['Content']['Items']['ColumnArray']); $i++)
                                    {
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['ColumnArray'][$i].'6')
                                        ->getBorders()
                                            ->getTop()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['ColumnArray'][$i].'7')
                                        ->getBorders()
                                            ->getBottom()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);                                    
                                    }
                                $ObjDelegate->getStyle('A6')
                                    ->getBorders()
                                        ->getLeft()
                                            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['LastColumn'].'6')
                                    ->getBorders()
                                        ->getRight()
                                            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                $ObjDelegate->getStyle('A7')
                                    ->getBorders()
                                        ->getLeft()
                                            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['LastColumn'].'7')
                                    ->getBorders()
                                        ->getRight()
                                            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                                //---> Set Page Title --> Color
                                $ObjDelegate->getStyle('A6')
                                    ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getStartColor()->setARGB('ffffffc8');
                                $ObjDelegate->getStyle('A6')
                                    ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getEndColor()->setARGB('ffffffc8');
                                $ObjDelegate->getStyle('A7')
                                    ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getStartColor()->setARGB('ffffffc8');
                                $ObjDelegate->getStyle('A7')
                                    ->getFill()
                                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getEndColor()->setARGB('ffffffc8');
                                
                                //---> Set Content Title Style
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
                                    
                                    //$ObjDelegate->getCell('A1');
                                    }

                                //---> Set Content Style
                                    //---> Set Border
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getBorders()
                                            ->getTop()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getBorders()
                                            ->getBottom()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getBorders()
                                            ->getRight()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getBorders()
                                            ->getLeft()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getBorders()
                                            ->getVertical()
                                                ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                                    //---> Set Color
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                                ->getStartColor()->setARGB('ffffffff');
                                    $ObjDelegate->getStyle($this->varLayoutParameter['Content']['Items']['Range'])
                                        ->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                                ->getEndColor()->setARGB('ffffffff');

 
                                },
                            ];                        
                        }


                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_MainStyles                                                                     |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
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
                            'A5' => [
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
                            'A6' => [
                                'font' => [
                                    'name' => 'helvetica',
                                    'size' => 12,
                                    'bold' => true
                                    ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFFFFFFF'
                                        ]
                                    ]
                                ],
                            'A7' => [
                                'font' => [
                                    'name' => 'helvetica',
                                    'size' => 10,
                                    'bold' => true
                                    ],
                                'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 
                                    'color' => [
                                        'argb' => 'FFFFFFFF'
                                        ]
                                    ]
                                ],
                            'A8' => [
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
/*                            $this->varLayoutParameter['Content']['Items']['Range'] => [
                                'font' => [
                                    'name' => 'helvetica',
                                    'size' => 8,
                                    'bold' => false
                                    ],                                
                                ],
*/
                            
                            
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

                        
                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_Page                                                                           |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_Page()
                        {
                        //---> Page Sub Title
                        if(count($this->ObjData['Page']['SubTitle']) > 0)
                            {                            
                            $this->ObjSheet->getStyle('A7')->getAlignment()->setWrapText(true);
                            $varSubTitle = '';
                            for($i=0; $i!=count($this->ObjData['Page']['SubTitle']); $i++)
                                {
                                if($i>0)
                                    {
                                    $varSubTitle .= "\r";
                                    }
                                $varSubTitle .= $this->ObjData['Page']['SubTitle'][$i];
                                }
                            $this->ObjSheet->setCellValue('A7', $varSubTitle);
                            }

                        //---> Page Title
                        $this->ObjSheet->setCellValue('A6', $this->ObjData['Page']['Title']);

//                        if(\App\Helpers\ZhtHelper\General\Helper_Array::isKeyExistOnSubArray($varUserSession, $this->ObjData, '::'))
                        
/*
//                        if($this->ObjData['Page']['SubTitle'])
                            {
                            //if(strcmp($this->ObjData['Page']['SubTitle'], '') != 0)
                            if(count($this->ObjData['Page']['SubTitle']) != 0)
                                {
                                for($i=0; $i!=$this->ObjData['Page']['SubTitle']; $i++)
                                    {
                                    $this->ObjSheet->setCellValue('A7', $this->ObjData['Page']['SubTitle'][$i]);
                                    }
                                }
                            }
//                        $this->ObjSheet->setCellValue('A6', $this->varLayoutParameter['Content']['Items']['ColumnArray']);
 */
                        }

                        
                    /*
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Method Name     : zhtEngine_UpdateLayoutParameter                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    | ▪ Version         : 1.0000.0000000                                                                           |
                    | ▪ Last Update     : 2022-01-26                                                                               |
                    | ▪ Description     :                                                                                          |
                    +--------------------------------------------------------------------------------------------------------------+
                    */
                    private function zhtEngine_UpdateLayoutParameter()
                        {                        
                        $this->varLayoutParameter['Content']['Items']['RowsOffset'] = 9;
                        $this->varLayoutParameter['Content']['Items']['ColumnsOffset'] = 0;

                        //---> Item : Top Left
                        $this->varLayoutParameter['Content']['Items']['FirstColumn'] = 
                            $this->ObjSheet->getCellByColumnAndRow(
                                $this->varLayoutParameter['Content']['Items']['ColumnsOffset']+1, 
                                $this->varLayoutParameter['Content']['Items']['RowsOffset']
                                )->getColumn();
                        $this->varLayoutParameter['Content']['Items']['FirstRow'] = 
                            $this->varLayoutParameter['Content']['Items']['RowsOffset']+1;
                        $this->varLayoutParameter['Content']['Items']['FirstCell'] = 
                            $this->varLayoutParameter['Content']['Items']['FirstColumn'].
                            $this->varLayoutParameter['Content']['Items']['FirstRow'];
                        
                        //---> Item : Bottom Right
                        $this->varLayoutParameter['Content']['Items']['LastColumn'] = 
                            $this->ObjSheet->getCellByColumnAndRow(
                                $this->varLayoutParameter['Content']['Items']['ColumnsOffset']+count($this->ObjData['Content']['Items'][$this->varLayoutParameter['Content']['Items']['RowsOffset']-1]),
                                $this->varLayoutParameter['Content']['Items']['RowsOffset']
                                )->getColumn();
                        $this->varLayoutParameter['Content']['Items']['LastRow'] = 
                            count($this->ObjData['Content']['Items'])+1;
                        $this->varLayoutParameter['Content']['Items']['LastCell'] = 
                            $this->varLayoutParameter['Content']['Items']['LastColumn'].
                            $this->varLayoutParameter['Content']['Items']['LastRow'];

                        //---> Item : Range                        
                        $this->varLayoutParameter['Content']['Items']['Range'] = 
                            $this->varLayoutParameter['Content']['Items']['FirstCell'].
                            ':'.
                            $this->varLayoutParameter['Content']['Items']['LastCell'];

                        //---> Item : Column Array
                        $varArrayDataTemp = [];
//                        for($i=$this->varLayoutParameter['Content']['Items']['ColumnsOffset']; $i!=count($this->ObjData['Content']['Items'][$this->varLayoutParameter['Content']['Items']['RowsOffset']]); $i++)
                        for($i=($this->varLayoutParameter['Content']['Items']['ColumnsOffset']+1); $i!=($this->varLayoutParameter['Content']['Items']['ColumnsOffset']+count($this->ObjData['Content']['Items'][$this->varLayoutParameter['Content']['Items']['RowsOffset']-1]))+1; $i++)
                            {
                            array_push(
                                $varArrayDataTemp,
                                $this->ObjSheet->getCellByColumnAndRow(
                                    $i, 
                                    $this->varLayoutParameter['Content']['Items']['RowsOffset']
                                    )->getColumn()
                                );
                            }
                        $this->varLayoutParameter['Content']['Items']['ColumnArray'] = $varArrayDataTemp;
                        
/*                        $this->ObjSheet->setCellValue('A7',
                            //($this->ObjData['Content']['Items'][$this->varLayoutParameter['Content']['Items']['RowsOffset']-1])
                            //$this->varLayoutParameter['Content']['Items']['Range']
                            $this->varLayoutParameter['Content']['Items']['ColumnArray']
                            );
*/                        
                        }
                    }
                );
                
            //---> Return Value
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