<?php

namespace zhtSDK\Software\PDF\TCPDF
    {
    class zhtSDK extends \TCPDF
        {
        private $varUserSession;
        private $varTotalPages;
        private $varContentMargins;     // Content Margin diluar header dan footer
        private $varCurrentPosition;    // Save Last Coordinat
        private $varDocument;           // Document ID
        private $varAdditionalFonts;


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : __construct                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-08                                                                                           |
        | ▪ Description     : System's Default Constructor                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function __construct($varUserSession, $varQRCode, $orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false)
            {
            $this->varTotalPages = -1;
            $this->zhtInitContentMargins();

            $varIssuedDateTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getCurrentDateTimeString($varUserSession);
            $this->varDocument = [
                'IssuedDateTime' => $varIssuedDateTime,
                'Signature' => \App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(
                    $varUserSession,
                    $varUserSession.\App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($varUserSession, 'TAG_DATA_SEPARATOR').$varIssuedDateTime
                    ),
                'QRCode' => $varQRCode
                ];

            //parent::__construct(__CLASS__);
            parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

            $this->setAdditionalFonts();
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : setAdditionalFonts                                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-24                                                                                           |
        | ▪ Description     : Set Additional Fonts                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */            
        private function setAdditionalFonts()
            {
            try {
                $this->varAdditionalFonts = null;
                $this->setFontSubsetting(true);
                $this->varAdditionalFonts[] = \TCPDF_FONTS::addTTFfont(getcwd().'/fonts/ARIALUNI.TTF', 'TrueTypeUnicode', '', 32);                 
                } 
            catch (\Exception $ex) {
                }
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : AddPage (PARENT METHOD OVERIDE)                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Add Page                                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function AddPage($orientation='', $format='', $keepmargins=false, $tocpage=false) 
            {
            $this->varTotalPages++;
            parent::AddPage($orientation, $format, $keepmargins, $tocpage);
            $this->zhtSetContentCoordinate_CurrentPosition(($this->zhtGetUserSession())['UserSessionID']);
            }

            
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : Footer (PARENT METHOD OVERIDE)                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Page Footer                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function Footer() 
            {
            //---> Line
            $this->SetY(-16);
            $varLineStyle = [
                'width' => 0.5, 
                'cap' => 'butt', 
                'join' => 'miter', 
                'dash' => 0, 
                'color' => [0, 0, 0]
                ];
            $this->Line(($this->getMargins()['left']), ($this->GetY()), $this->getPageWidth()-($this->getMargins()['right']), ($this->GetY()), $varLineStyle);

            //---> Document Number
            $this->SetY(-18);
            $varDocumentPageNumber = ('Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages());
            $this->SetFont('helvetica', 'I', 8);
            $this->Cell('', 10, $varDocumentPageNumber, 0, false, 'R', 0, '', 0, false, 'T', 'M');
            
            $varIssuedDateTime = \App\Helpers\ZhtHelper\General\Helper_DateTime::getCurrentDateTimeString($this->varUserSession['UserSessionID']);
            $varDocumentSignature = \App\Helpers\ZhtHelper\General\Helper_Hash::getMD5(
                $this->varUserSession['UserSessionID'],
                $this->varUserSession['UserSessionID'].\App\Helpers\ZhtHelper\System\Helper_Environment::getBackEndConfigEnvironment($this->varUserSession['UserSessionID'], 'TAG_DATA_SEPARATOR').$varIssuedDateTime
                 );
            //---> Document Signature
            $this->SetFont('helvetica', 'I', 8);
            $this->SetY(-18);
            $this->Cell(0, 10, 'Document Signature : '. $this->varDocument['Signature'], 0, false, 'L', 0, '', 0, false, 'T', 'M');
            //$this->Cell(0, 10, 'Document Signature : '. $varDocumentSignature, 0, false, 'L', 0, '', 0, false, 'T', 'M');
            //---> Issued
            $this->SetY(-15);
            $this->Cell(0, 10, 'Issued date and time : '. $this->varDocument['IssuedDateTime'], 0, false, 'L', 0, '', 0, false, 'T', 'M');
            //$this->Cell(0, 10, 'Issued date and time : '.$varIssuedDateTime , 0, false, 'L', 0, '', 0, false, 'T', 'M');
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : Header (PARENT METHOD OVERIDE)                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Page Header                                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function Header() {
            //---> Init Content Margins
            $this->zhtInitContentMargins();
            //---> Kop Dokumen
            if (($this->PageNo())==1)
                {
                $this->zhtSetLetterHead(
                    $this->varUserSession['UserSessionID'], 
                    getcwd().'/images/Logo/AppObject_InstitutionBranch/Small/'.$this->varUserSession['InstitutionBranch']['ID'].'.png',
                    $this->varDocument['QRCode']
                    //'abcdefghijklmnopqrstuvwxyz1234567890abcdefghijklmnopqrstuvwxyz1234567890abcdefghijklmnopqrstuvwxyz1234567890'
                    );
                //---> Update Top Content Margins 
                $this->varContentMargins['top'] = ((int) ($this->GetY())) + 5;
                }
            else
                {
                //---> Update Top Content Margins 
                $this->varContentMargins['top'] = (int) $this->getMargins()['top'];              
                }
            //---> Background Image
            // Untuk sementara tanpa Background karena ada masalah dengan GD Library
            //$this->zhtSetBackgroundImage($this->varUserSession['UserSessionID'], 50, getcwd().'/images/Logo/AppObject_InstitutionBranch/Large/'.$this->varUserSession['InstitutionBranch']['ID'].'.png');
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtInitContentMargins                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi untuk menginisialisasi Content Margins                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private function zhtInitContentMargins()
            {
            $this->varContentMargins = [
                'top' => (int) $this->getMargins()['top'],
                'bottom' => (int) $this->getMargins()['bottom'],
                'right' => (int) $this->getMargins()['right'],
                'left' => (int) $this->getMargins()['left']
                ];            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtGetContentCoordinate_CurrentPosition                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-13                                                                                           |
        | ▪ Description     : Fungsi Pemanggilan Koordinat Saat Ini                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtGetContentCoordinate_CurrentPosition($varUserSession)
            {
            return $this->varCurrentPosition;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtGetUserSession                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-14                                                                                           |
        | ▪ Description     : Fungsi Pemanggilan User Session                                                                      |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtGetUserSession()
            {
            return $this->varUserSession;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtGetContentMargins                                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi untuk mendapatkan Content Margins                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtGetContentMargins($varUserSession)
            {
            //$this->SetXY($this->varContentMargins['left'], $this->varContentMargins['top']);
            //$this->Cell(0, 10, 'Top : '.$this->varContentMargins['top'].', Bottom : '.$this->varContentMargins['bottom'].', Left : '.$this->varContentMargins['left'].', Right : '.$this->varContentMargins['right']);
            return $this->varContentMargins;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetBackgroundImage                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan QRCode                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varDimension ► Dimension                                                                                 |
        |      ▪ (string) varPath_ImageFile ► Image File Path                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetBackgroundImage($varUserSession, int $varDimension = 50, string $varPath_ImageFile = null)
            {
            $this->SetAlpha(0.2);
            $this->Image($varPath_ImageFile, '', (($this->getPageHeight()-$varDimension)/2), '', $varDimension, 'PNG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);           
            $this->SetAlpha(1);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContentCoordinate_CurrentPosition                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-16                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Koordinat Saat Ini                                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContentCoordinate_CurrentPosition($varUserSession, int $varX = null, int $varY = null)
            {
            if(!$varX)
                {
                $varX = $this->GetX();
                }
            if(!$varY)
                {
                $varY = $this->GetY();
                }
            $this->varCurrentPosition = [
                'X' => $varX, 
                'Y' => $varY
                ];
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContentCoordinate_StartPoint                                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Koordinat Awal Content                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContentCoordinate_StartPoint($varUserSession)
            {
            $this->SetXY(($this->zhtGetContentMargins($varUserSession))['left'], ($this->zhtGetContentMargins($varUserSession))['top']);
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_CellContent                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000001                                                                                       |
        | ▪ Last Update     : 2021-07-15                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Cell Content                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varCaption ► Data                                                                                        |
        |      ▪ (int)    varCellWidth ► Cell Width                                                                                |
        |      ▪ (int)    varCellHeight ► Cell Height                                                                              |
        |      ▪ (int)    varX ► X                                                                                                 |
        |      ▪ (int)    varY ► Y                                                                                                 |
        |      ▪ (array)  varColor ► Color [R,G,B]                                                                                 |
        |      ▪ (array)  varFont ► Font [Family,Format,Size]                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_CellContent($varUserSession, string $varCaption = null, string $varAlign = null, int $varCellWidth = null, int $varCellHeight = null, int $varX = null, int $varY = null, array $varColor = null, array $varFont = null)
            {
            $this->SetXY(($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'], ($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']);
            if(!$varAlign)
                {
                $varAlign = 'L';
                }
            if(!$varCellWidth)
                {
                $varCellWidth = 10;
                }
            if(!$varCellHeight)
                {
                $varCellHeight = 5;
                }
            if(!$varColor)
                {
                $varColor = [230, 230, 230];
                }
            if(!$varFont)
                {
                $varFont = ['helvetica', '', 8];
                }
            $this->SetFont($varFont[0], $varFont[1], $varFont[2]);
            $this->SetFillColor($varColor[0], $varColor[1], $varColor[2]);

            $varCaption = <<<EOD
            $varCaption

            EOD;

            
            //$this->Cell($varCellWidth, $varCellHeight, $varCaption, 0, false, $varAlign, ($this->varSignTableContentRecord == 0 ? true : false), '', '', '', '', '', 'M');
            //$this->MultiCell($varCellWidth, $varCellHeight, $varCaption, 0, $varAlign, ($this->varSignTableContentRecord == 0 ? true : false), 0, $varX, $varY, true, 0, false, true, $varCellHeight, 'M');
            
            $this->MultiCell($varCellWidth, $varCellHeight, $varCaption, 0, $varAlign, false, 1, $varX, $varY, true, 0, false, true, $varCellHeight, 'M');
                       
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_CellTitle                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000002                                                                                       |
        | ▪ Last Update     : 2021-07-15                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Cell Title                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varCaption ► Data                                                                                        |
        |      ▪ (string) varAlign ► Align                                                                                         |
        |      ▪ (int)    varCellWidth ► Cell Width                                                                                |
        |      ▪ (int)    varCellHeight ► Cell Height                                                                              |
        |      ▪ (int)    varX ► X                                                                                                 |
        |      ▪ (int)    varY ► Y                                                                                                 |
        |      ▪ (array)  varColor ► Color [R,G,B]                                                                                 |
        |      ▪ (array)  varFont ► Font [Family,Format,Size]                                                                      |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_CellTitle($varUserSession, string $varCaption = null, string $varAlign = null, int $varCellWidth = null, int $varCellHeight = null, int $varX = null, int $varY = null, array $varColor = null, array $varFont = null)
            {
            $this->SetXY(($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'], ($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']);
            if(!$varAlign)
                {
                $varAlign = 'C';
                }
            if(!$varCellWidth)
                {
                $varCellWidth = 10;
                }
            if(!$varCellHeight)
                {
                $varCellHeight = 5;
                }
            if(!$varColor)
                {
                $varColor = [255, 255, 200];
                }
            if(!$varFont)
                {
                $varFont = ['helvetica', 'B', 8];
                }
            $this->SetFont($varFont[0], $varFont[1], $varFont[2]);
            $this->SetFillColor($varColor[0], $varColor[1], $varColor[2]);
            //$this->Cell($varCellWidth, $varCellHeight, $varCaption, 1, false, $varAlign, true, '', '', '', '', '', 'M');
            $this->MultiCell($varCellWidth, $varCellHeight, $varCaption, 1, $varAlign, true, 0, $varX, $varY, true, 0, false, true, $varCellHeight, 'M');

            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_HorizontalLine                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-14                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Horizontal Line                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_HorizontalLine($varUserSession)
            {
            $varLineStyle = [
                'width' => 0.1, 
                'cap' => 'butt', 
                'join' => 'miter', 
                'dash' => 0, 
                'color' => [0, 0, 0]
                ];
            $this->Line(($this->getMargins()['left']), ($this->GetY()+0), $this->getPageWidth()-($this->getMargins()['right']), ($this->GetY()+0), $varLineStyle);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_SubTitle                                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Sub Judul Content                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varTitle ► Title                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_SubTitle($varUserSession, string $varTitle = null)
            {
            if(!$varTitle)
                {
                $varTitle = '';
                }
            $varCellHeight = 6;
            $this->SetFont('helvetica', 'B', 12);
            $this->Cell(0, $varCellHeight, $varTitle, 0, false, 'C');

            $this->SetXY(($this->zhtGetContentMargins($varUserSession))['left'], $this->GetY()+$varCellHeight);
            //$this->Cell(0, 10, $varTitle, 1, false, 'C');
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_TableContent                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-14                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Table Content                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varTitle ► Title                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_TableContent($varUserSession, array $varData = null)
            {
            $this->varSignTableContentRecord = (($this->varSignTableContentRecord+1) % 2);
            
            $varDefaultCellHeight = 5;
            $varMaxY = 0;
            for($i=0; $i!=count($varData['Objects']); $i++)
                {
                //---> Inisiasi Koordinat Baris
                $this->SetXY(
                    $varData['Coordinat'][0] + $varData['Objects'][$i]['CoordinatOffset'][0], 
                    $varData['Coordinat'][1] + $varData['Objects'][$i]['CoordinatOffset'][1]
                    );
                $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
                //---> Pemrosesan Content Objects Cells
                for($j=0; $j!=count($varData['Objects'][$i]['Cells']); $j++)
                    {
                    //---> Jika Blank Cell
                    if(strcmp($varData['Objects'][$i]['Cells'][$j][0], '<BLANK_CELL>')==0)
                        {
                        $this->SetXY(
                            ($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'] + ((count($varData['Objects'][$i]['Cells'][$j]) >= 3) ?  $varData['Objects'][$i]['Cells'][$j][2] : 0), 
                            ($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']
                            );
                        $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
                        }
                    //---> Jika Bukan Blank Cell
                    else
                        {
                        //---> Call zhtSetContent_CellContent
                        $this->zhtSetContent_CellContent(
                            $varUserSession,
                            //$varData['Coordinat'][1] + $varData['Objects'][$i]['CoordinatOffset'][1],
                            //$this->varSignTableContentRecord,
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 1) ?  $varData['Objects'][$i]['Cells'][$j][0] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 2) ?  $varData['Objects'][$i]['Cells'][$j][1] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 3) ?  $varData['Objects'][$i]['Cells'][$j][2] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 4) ?  $varData['Objects'][$i]['Cells'][$j][3] : $varDefaultCellHeight),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 5) ?  $varData['Objects'][$i]['Cells'][$j][4] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 6) ?  $varData['Objects'][$i]['Cells'][$j][5] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 7) ?  $varData['Objects'][$i]['Cells'][$j][6] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 8) ?  $varData['Objects'][$i]['Cells'][$j][7] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 9) ?  $varData['Objects'][$i]['Cells'][$j][8] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 10) ?  $varData['Objects'][$i]['Cells'][$j][9] : null)
                            );

                        $varCurrentCellY = (
                            $varData['Coordinat'][1]
                            + $varData['Objects'][$i]['CoordinatOffset'][1]
                            + ((count($varData['Objects'][$i]['Cells'][$j]) >= 4) ?  $varData['Objects'][$i]['Cells'][$j][3] : $varDefaultCellHeight)
                            );

                        if($varMaxY < $varCurrentCellY)
                            {
                            $varMaxY = $varCurrentCellY;
                            }                        
                        }
                    }
                }
            $this->SetXY(($this->zhtGetContentMargins($varUserSession))['left'], $varMaxY);           
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            
            //$this->zhtSetLastMathodCall($varUserSession, __FUNCTION__);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_TableHead                                                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Table Head Content                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (array)  varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_TableHead($varUserSession, array $varData = null)
            {
            $this->varSignTableContentRecord = 0;

            $varDefaultCellHeight = 5;
            $varMaxY = 0;
            for($i=0; $i!=count($varData['Objects']); $i++)
                {
                //---> Inisiasi Koordinat Baris
                $this->SetXY(
                    $varData['Coordinat'][0] + $varData['Objects'][$i]['CoordinatOffset'][0], 
                    $varData['Coordinat'][1] + $varData['Objects'][$i]['CoordinatOffset'][1]
                    );
                $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
                //---> Pemrosesan Content Objects Cells
                for($j=0; $j!=count($varData['Objects'][$i]['Cells']); $j++)
                    {
                    //---> Jika Blank Cell
                    if(strcmp($varData['Objects'][$i]['Cells'][$j][0], '<BLANK_CELL>')==0)
                        {
                        $this->SetXY(
                            ($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'] + ((count($varData['Objects'][$i]['Cells'][$j]) >= 3) ?  $varData['Objects'][$i]['Cells'][$j][2] : 0), 
                            ($this->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']
                            );
                        $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
                        }
                    //---> Jika Bukan Blank Cell
                    else
                        {
                        //---> Call zhtSetContent_CellTitle
                        $this->zhtSetContent_CellTitle(
                            $varUserSession,
                            //$varData['Coordinat'][1] + $varData['Objects'][$i]['CoordinatOffset'][1],
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 1) ?  $varData['Objects'][$i]['Cells'][$j][0] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 2) ?  $varData['Objects'][$i]['Cells'][$j][1] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 3) ?  $varData['Objects'][$i]['Cells'][$j][2] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 4) ?  $varData['Objects'][$i]['Cells'][$j][3] : $varDefaultCellHeight),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 5) ?  $varData['Objects'][$i]['Cells'][$j][4] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 6) ?  $varData['Objects'][$i]['Cells'][$j][5] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 7) ?  $varData['Objects'][$i]['Cells'][$j][6] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 8) ?  $varData['Objects'][$i]['Cells'][$j][7] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 9) ?  $varData['Objects'][$i]['Cells'][$j][8] : null),
                            ((count($varData['Objects'][$i]['Cells'][$j]) >= 10) ?  $varData['Objects'][$i]['Cells'][$j][9] : null)
                            );

                        $varCurrentCellY = (
                            $varData['Coordinat'][1]
                            + $varData['Objects'][$i]['CoordinatOffset'][1]
                            + ((count($varData['Objects'][$i]['Cells'][$j]) >= 4) ?  $varData['Objects'][$i]['Cells'][$j][3] : $varDefaultCellHeight)
                            );

                        if($varMaxY < $varCurrentCellY)
                            {
                            $varMaxY = $varCurrentCellY;
                            }                        
                        }
                    }
                }
            $this->SetXY(($this->zhtGetContentMargins($varUserSession))['left'], $varMaxY);           
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }
        /*
        Contoh Pemanggilan Method :
        ----(START)----------------
            $ObjPDF->zhtSetContent_TableHead(
                $varUserSession,
                [
                'Coordinat' => [
                    ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['X'], 
                    ($ObjPDF->zhtGetContentCoordinate_CurrentPosition($varUserSession))['Y']
                    ],
                'Objects' =>
                    [
                        [
                        'CoordinatOffset' => [0, 0],
                        'Cells' => [
                            ['NO', 10],
                            ['ID', 30],
                            ['INDONESIAN NAME', 75, 30],
                            ['INTERNATIONAL NAME', 75, 20]                        
                            ]
                        ],
                        [
                        'CoordinatOffset' => [0, 5],
                        'Cells' => [
                            ['NO', 10],
                            ['<BLANK_CELL>', 30],
                            ['INDONESIAN NAME', 75, 30],
                            ['INTERNATIONAL NAME', 75, 20]                        
                            ]
                        ]
                    ]                    
                ]
                );
        ----( END )----------------
        */


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_Title                                                                                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan Content - Judul Content                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varTitle ► Title                                                                                         |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_Title($varUserSession, string $varTitle = '')
            {
            $varCellHeight = 10;
            $this->zhtSetContentCoordinate_StartPoint($varUserSession);
            $this->SetFont('helvetica', 'B', 22);
            $this->Cell(0, $varCellHeight, $varTitle, 0, false, 'C');

            $this->SetXY(($this->zhtGetContentMargins($varUserSession))['left'], $this->GetY()+$varCellHeight);
            //$this->Cell(0, 10, $varTitle, 1, false, 'C');
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetContent_VerticalSpace                                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-123                                                                                          |
        | ▪ Description     : Fungsi Pengesetan Content - Vertical Space Content                                                   |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varHeight ► Title                                                                                        |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetContent_VerticalSpace($varUserSession, int $varHeight = 5)
            {
            $this->SetXY(($this->zhtGetContentMargins($varUserSession))['left'], $this->GetY()+$varHeight);           
            $this->zhtSetContentCoordinate_CurrentPosition($varUserSession);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetLetterHead                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan QRCode                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varPath_ImageFile ► Image File Path                                                                      |
        |      ▪ (string) $varQRCodeData ► QR Code Data                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetLetterHead($varUserSession, string $varPath_ImageFile = null, string $varQRCodeData = null)
            {
            if(is_file($varPath_ImageFile))
                {
                $this->Image($varPath_ImageFile, '', ($this->getMargins()['left']), 30, '', '', '', '', false, 300);
                }

            $this->SetFont('helvetica', 'B', 10);
            $this->SetXY(($this->getMargins()['left']), 23);
            $this->Cell(0, 15, $this->varUserSession['InstitutionBranch']['Name'], 0, false, 'L', 0, '', 0, false, 'M', 'M');

            $this->SetXY(($this->getMargins()['left']), ($this->getY()+5));
            $this->SetFont('helvetica', '', 7);
            $this->MultiCell(150, '', $this->varUserSession['InstitutionBranch']['Address'], 0, '', 0, 1, '', '', true);
            $this->MultiCell(150, '', $this->varUserSession['InstitutionBranch']['Contact'], 0, '', 0, 1, '', '', true);
            $this->SetXY(($this->getMargins()['left']), ceil($this->GetY()));

            $this->zhtSetQRCode($this->varUserSession['UserSessionID'], 40, $varQRCodeData);

            $varLineStyle = [
                'width' => 0.5, 
                'cap' => 'butt', 
                'join' => 'miter', 
                'dash' => 0, 
                'color' => [0, 0, 0]
                ];
            $this->Line(($this->getMargins()['left']), ($this->GetY()+2), $this->getPageWidth()-($this->getMargins()['right']), ($this->GetY()+2), $varLineStyle);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetQRCode                                                                                         |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan QRCode                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (int)    varDimension ► Dimension                                                                                 |
        |      ▪ (string) varData ► Data                                                                                           |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetQRCode($varUserSession, int $varDimension = 40, string $varData = null)
            {
            $varStyle = [
                'border' => 1,
                'vpadding' => 1, //'auto',
                'hpadding' => 1, //'auto',
                'fgcolor' => array(0,0,0),
                'bgcolor' => false, //array(255,255,255)
                'module_width' => 1, // width of a single module in points
                'module_height' => 1 // height of a single module in points
                ];
            $this->write2DBarcode($varData, 'QRCODE,Q', ($this->getPageWidth()-$varDimension), 10, $varDimension, $varDimension, $varStyle, 'N');
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : zhtSetUserSession                                                                                    |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2021-07-12                                                                                           |
        | ▪ Description     : Fungsi Pengesetan User Session                                                                       |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (void)                                                                                                            |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public function zhtSetUserSession($varUserSession)
            {
            $this->varUserSession = [
                'ApplicationID' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('APP_NAME'),
                'UserSessionID' => $varUserSession,
                'InstitutionBranch' => [
                    'ID' => (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID'],
                    'Name' =>  'PT. QDC Technologies',
                    'Address' => 'Graha Sentra Mampang QDC, Jl. Mampang Prapatan Raya No. 28 Blok C Kelurahan Pela Mampang Kecamatan Mampang Prapatan Kota Jakarta Selatan 12790',
                    'Contact' => 'Telp : +62-21-79191234, Fax : +62-21-79193333'
                    ]
                ];
            $this->SetCreator(PDF_CREATOR);
            $this->SetAuthor($this->varUserSession['ApplicationID']);
            }
        }
    }