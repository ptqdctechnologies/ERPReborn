<?php

namespace zhtSDK\Software\PDF\TCPDF
    {
    class zhtSDK extends \TCPDF
        {
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

        //Page header override
        public function Header() {
            // Logo
            $image_file = K_PATH_IMAGES.'logo_example.jpg';
            $image_file = getcwd().'/images/Logo/AppObject_InstitutionBranch/Small/11000000000004.png';
            //$this->Image($image_file, 100, 100, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            //$this->Image($image_file, 100, 100, 15, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $this->Image($image_file, 50, 50, 100, '', '', 'http://www.tcpdf.org', '', false, 300);
            // // Set font
            //$this->SetFont('helvetica', 'B', 20);
            $this->SetXY(10, 20);
            $this->SetFont('helvetica', 'B', 10);
            // Title
            //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->Cell(0, 15, K_PATH_IMAGES, 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $this->SetXY(10, 24);
            $this->Cell(0, 15, $image_file, 0, false, 'C', 0, '', 0, false, 'M', 'M');
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