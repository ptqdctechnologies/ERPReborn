<?php

namespace zhtSDK\Software\PDF\TCPDF
    {
    class zhtSDK extends \TCPDF
        {
        private $varUserSession;
        
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
        public function __construct()
            {
            parent::__construct(__CLASS__);
            }
            
        public function initUserSession($varUserSession)
            {
            $this->varUserSession = [
                'ApplicationID' => \App\Helpers\ZhtHelper\System\Helper_Environment::getLaravelEnvironment('APP_NAME'),
                'UserSessionID' => $varUserSession,
                'InstitutionBranchID' => (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession))['branchID']
                ];
            }

        //Page header override
        public function Header() {
            $varPath_ImageFile = getcwd().'/images/Logo/AppObject_InstitutionBranch/Small/'.$this->varUserSession['InstitutionBranchID'].'.png';

            $this->Image($varPath_ImageFile, '', '5', 30, '', '', 'http://www.tcpdf.org', '', false, 300);

            // Logo
            //$this->SetFont('helvetica', 'B', 20);
            $this->SetXY(10, 20);
            $this->SetFont('helvetica', 'B', 10);
            // Title
            //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Cell(0, 15, K_PATH_IMAGES, 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->SetXY(10, 24);
            
 //           $x = (\App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System()))['metadata'];
 //           $x = \App\Helpers\ZhtHelper\System\BackEnd\Helper_API::getUserLoginSessionEntityByAPIWebToken($varUserSession);
 
//            $this->Cell(0, 15, $this->varUserSession['ID'], 0, false, 'C', 0, '', 0, false, 'M', 'M');
//            $this->Cell(0, 15, $this->varUserSession['x'], 0, false, 'L', 0, '', 0, false, 'M', 'M');
            }

        // Page footer overide
        public function Footer() 
            {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            }
        }
    }