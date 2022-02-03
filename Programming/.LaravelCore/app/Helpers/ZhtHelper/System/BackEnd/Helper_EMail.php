<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\System\BackEnd                                                                             |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2022 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\System\BackEnd
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_EMail                                                                                                 |
    | ▪ Description : Menangani segala parameter yang terkait E-Mail                                                               |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_EMail
        {
        public static function Send($varUserSession, $varData)
            {
            try {
                $ObjMailer = new \Symfony\Component\Mailer\Mailer(
                    \Symfony\Component\Mailer\Transport::fromDsn($varData['SystemParameter']['DSN'])
                    );

                //---> General
                $ObjEMail = (new \Symfony\Component\Mime\Email())
                    ->subject($varData['Header']['Subject'])
                    ;
        
                //---> FROM
                for($i=0; $i!=count($varData['Header']['From']); $i++)
                    {
                    if($i==0) {
                        $ObjEMail->from($varData['Header']['From'][$i]);
                        }
                    else {
                        $ObjEMail->addFrom($varData['Header']['From'][$i]);
                        }
                    }

                //---> TO
                for($i=0; $i!=count($varData['Header']['To']); $i++)
                    {
                    if($i==0) {
                        $ObjEMail->to($varData['Header']['To'][$i]);
                        }
                    else {
                        $ObjEMail->addTo($varData['Header']['To'][$i]);
                        }
                    }

                //---> CC
                for($i=0; $i!=count($varData['Header']['CC']); $i++)
                    {
                    if($i==0) {
                        $ObjEMail->cc($varData['Header']['CC'][$i]);
                        }
                    else {
                        $ObjEMail->addCc($varData['Header']['CC'][$i]);
                        }
                    }

                //---> BCC
                for($i=0; $i!=count($varData['Header']['BCC']); $i++)
                    {
                    if($i==0) {
                        $ObjEMail->bcc($varData['Header']['BCC'][$i]);
                        }
                    else {
                        $ObjEMail->addBcc($varData['Header']['BCC'][$i]);
                        }
                    }
                
//                var_dump($varData);
                    

                //---> Content
                if($varData['SystemParameter']['HTMLContent'] == true)
                    {
                    $ObjEMail->html(base64_decode($varData['Body']['Content'], TRUE));
                    }
                else {
                    $ObjEMail->text(base64_decode($varData['Body']['Content'], TRUE));
                    }

                //var_dump($ObjEMail);
                    
                $ObjMailer->send($ObjEMail);

                //echo "xxxxxxx";
                } 
            catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $ex) {
                echo $ex;
                }
            }



        }
    }