<?php

/*
+----------------------------------------------------------------------------------------------------------------------------------+
| ▪ Category   : Laravel Helpers                                                                                                   |
| ▪ Name Space : \App\Helpers\ZhtHelper\Database                                                                                   |
|                                                                                                                                  |
| ▪ Copyleft 🄯 2020 Zheta (teguhpjs@gmail.com)                                                                                     |
+----------------------------------------------------------------------------------------------------------------------------------+
*/
namespace App\Helpers\ZhtHelper\Database
    {
    /*
    +------------------------------------------------------------------------------------------------------------------------------+
    | ▪ Class Name  : Helper_SQLValidation                                                                                         |
    | ▪ Description : Menangani Validasi SQL                                                                                       |
    +------------------------------------------------------------------------------------------------------------------------------+
    */
    class Helper_SQLValidation
        {
        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isSecure_FilterStatement                                                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mengecek apakah Filter Statment aman dari SQL Injection                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        public static function isSecure_FilterStatement($varUserSession, string $varFilterStatement)
            {
            //$varReturn = ((self::isContain_SQLInjection_BatchStatements($varUserSession, $varFilterStatement) == TRUE) ?? ((self::isContain_SQLInjection_AlwaysTrueStatements($varUserSession, $varFilterStatement) == TRUE) ?? FALSE));
            //$varReturn = ((self::isContain_SQLInjection_BatchStatements($varUserSession, $varFilterStatement)==TRUE) ? FALSE : (self::isContain_SQLInjection_AlwaysTrueStatements($varUserSession, $varFilterStatement) ? FALSE : TRUE));
            $varReturn = !(self::isContain_SQLInjection_BatchStatements($varUserSession, $varFilterStatement));
            if($varReturn == TRUE)
                {
                $varReturn = !(self::isContain_SQLInjection_AlwaysTrueStatements($varUserSession, $varFilterStatement));
                }
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getBracketReduce                                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mendapatkan pengurangan notasi tanda kurung                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQLClause ► SQL Clause                                                                                |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getBracketReduce($varUserSession, $varSQLClause)
            {
            while(((strcmp(substr($varSQLClause, 0, 1), '(')==0) AND (strcmp(substr($varSQLClause, strlen($varSQLClause)-1, 1), ')')==0)))
                {
                $varSQLClause = substr($varSQLClause, 1, strlen($varSQLClause)-2);
                }  
            return $varSQLClause;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSQLClauseSplit_MathPattern                                                                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mendapatkan pemotongan SQL Clause berpola Matematika                                                 |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQLClause ► SQL Clause                                                                                |
        |      ▪ (string) varOperator ► Operator                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getSQLClauseSplit_MathPattern($varUserSession, $varSQLClause, $varOperator)
            {
            $varSQLClause = self::getBracketReduce($varUserSession, $varSQLClause);
            $varData = preg_split('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause);
            $varReturn[0] = $varData[0];
            $varReturn[1] = $varOperator;
            $varReturn[2] = $varData[1];
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : getSQLClauseSplit_NonMathPattern                                                                     |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mendapatkan pemotongan SQL Clause berpola Non Matematika                                             |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQLClause ► SQL Clause                                                                                |
        |      ▪ (string) varOperator ► Operator                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function getSQLClauseSplit_NonMathPattern($varUserSession, $varSQLClause, $varOperator)
            {
            $varOperatorSign = $varOperator;
            if((strcmp($varOperator, 'LIKE')==0) OR (strcmp($varOperator, 'ILIKE')==0))
                {
                $varOperator = '\b('.$varOperator.')\b';
                }
            elseif(strcmp($varOperator, 'NOT LIKE')==0) 
                {
                $varOperator = '\b(NOT)\b[[:space:]]{1,}\b(LIKE)\b';
                }
            elseif(strcmp($varOperator, 'NOT ILIKE')==0)
                {
                $varOperator = '\b(NOT)\b[[:space:]]{1,}\b(ILIKE)\b';
                }
            $varData = preg_split('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause);
            if(count($varData)==2)
                {
                $varReturn[0] = $varData[0];
                $varReturn[1] = $varOperatorSign;
                $varReturn[2] = $varData[1];
                }
            else
                {
                //---> Left Side
                if(preg_match('/(?i)(\'){1,}[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause) == TRUE)
                    {
                    $varData = preg_split('/(?i)(\')[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause);
                    $varReturn[0] = $varData[0].'\'';
                    $varReturn[1] = $varOperatorSign;
                    $varReturn[2] = $varData[1];
                    }
                elseif(preg_match('/(?i)("){1,}[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause) == TRUE)
                    {
                    $varData = preg_split('/(?i)(")[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause);
                    $varReturn[0] = $varData[0].'"';
                    $varReturn[1] = $varOperatorSign;
                    $varReturn[2] = $varData[1];
                    }
                elseif(preg_match('/(?i)(\)){1,}[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause) == TRUE)
                    {
                    $varData = preg_split('/(?i)(\))[[:space:]]*'.$varOperator.'[[:space:]]*(?-i)/', $varSQLClause);
                    $varReturn[0] = $varData[0].')';
                    $varReturn[1] = $varOperatorSign;
                    $varReturn[2] = $varData[1];
                    }
                //---> Right Side
                if(preg_match('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(\'){1,}(?-i)/', $varSQLClause) == TRUE)
                    {
                    $varData = preg_split('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(\')(?-i)/', $varSQLClause);
                    $varReturn[2] = '\''.$varData[1];
                    }
                elseif(preg_match('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*("){1,}(?-i)/', $varSQLClause) == TRUE)
                    {
                    $varData = preg_split('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(")(?-i)/', $varSQLClause);
                    $varReturn[2] = '"'.$varData[1];
                    }
                elseif(preg_match('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(\(){1,}(?-i)/', $varSQLClause) == TRUE)
                    {
                    $varData = preg_split('/(?i)[[:space:]]*'.$varOperator.'[[:space:]]*(\()(?-i)/', $varSQLClause);
                    $varReturn[2] = '('.$varData[1];
                    }
                }
            return $varReturn;            
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isContain_SQLInjection_AlwaysTrueStatements                                                          |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mengecek apakah Filter Statment aman dari SQL Injection tipe Always True Statements                  |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function isContain_SQLInjection_AlwaysTrueStatements($varUserSession, string $varFilterStatement)
            {
            $varData = explode('<ClauseOperator>', str_ireplace([' AND ', ' OR '], '<ClauseOperator>', str_ireplace('WHERE', '', str_replace(array("\n", "\t", "\r"), ' ', $varFilterStatement))));
            
            $varPotentialThreatCount = 0;
            
            for($i=0; $i!=count($varData); $i++)
                {
                $varOperatorType = null;
                $varOperatorSign = null;
                
                //---> Normalisasi Keseimbangan Nesting Kurung
                $varCountOpeningBracket = substr_count($varData[$i], '(');
                $varCountClosingBracket = substr_count($varData[$i], ')');
                
                if($varCountOpeningBracket == $varCountClosingBracket)
                    {
                    $varDataClause = trim($varData[$i]);
                    }
                else
                    {
                    $varCharPosition = ($varCountOpeningBracket > $varCountClosingBracket ? strpos($varData[$i], '(') : strpos($varData[$i], ')'));
                    $varDataClause = trim(substr($varData[$i], 0, $varCharPosition).substr($varData[$i], $varCharPosition+1, strlen($varData[$i])-$varCharPosition-1));
                    }
                //---> Normalisasi Operator
                if(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '=') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '=';
                    }
                elseif(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '<') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '<';
                    }
                elseif(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '>') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '>';
                    }
                elseif(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '<=') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '<=';
                    }
                elseif(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '>=') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '>=';
                    }
                elseif(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '!=') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '!=';
                    }
                elseif(self::isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varDataClause, '<>') == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '<>';
                    }
                else {
                    $varOperatorType = 'StringOperator';
                    if(self::isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern($varUserSession, $varDataClause, 'NOT LIKE') == TRUE)
                        {
                        $varOperatorSign = 'NOT LIKE';
                        }
                    elseif(self::isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern($varUserSession, $varDataClause, 'NOT ILIKE') == TRUE)
                        {
                        $varOperatorSign = 'NOT ILIKE';
                        }
                    elseif(self::isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern($varUserSession, $varDataClause, 'LIKE') == TRUE)
                        {
                        $varOperatorSign = 'LIKE';
                        }
                    elseif(self::isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern($varUserSession, $varDataClause, 'ILIKE') == TRUE)
                        {
                        $varOperatorSign = 'ILIKE';
                        }
                    elseif(self::isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern($varUserSession, $varDataClause, '=') == TRUE)
                        {
                        $varOperatorSign = '=';
                        }
                    }

                    
                //---> Jika MathOperator
                if(strcmp($varOperatorType, 'MathOperator')==0)
                    {
                    $varDataClausePart = self::getSQLClauseSplit_MathPattern($varUserSession, $varDataClause, $varOperatorSign);
                    //---> Inisialisasi
                    try {
                        eval('$varEvalResultLeftSide = ('.$varDataClausePart[0].');');
                        } 
                    catch (\Exception $ex) {
                        $varEvalResultLeftSide = $varDataClausePart[0];
                        }
                    try {
                        eval('$varEvalResultRightSide = ('.$varDataClausePart[2].');');
                        } 
                    catch (\Exception $ex) {
                        $varEvalResultRightSide = $varDataClausePart[2];
                        }
                    //---> Pengecekan
                    //---> Jika Kedua Sisinya adalah Numerik
                    if((is_numeric($varEvalResultLeftSide) == TRUE) AND ((is_numeric($varEvalResultRightSide) == TRUE)))
                        {
                        if(strcmp($varOperatorSign, '=') == 0)
                            {
                            if($varEvalResultLeftSide ==  $varEvalResultRightSide)
                                {$varPotentialThreatCount++;}
                            }
                        elseif(strcmp($varOperatorSign, '<') == 0)
                            {
                            if($varEvalResultLeftSide < $varEvalResultRightSide)
                                {$varPotentialThreatCount++;}
                            }
                        elseif(strcmp($varOperatorSign, '>') == 0)
                            {
                            if($varEvalResultLeftSide > $varEvalResultRightSide)
                                {$varPotentialThreatCount++;}
                            }
                        elseif(strcmp($varOperatorSign, '<=') == 0)
                            {
                            if($varEvalResultLeftSide <= $varEvalResultRightSide)
                                {$varPotentialThreatCount++;}
                            }
                        elseif(strcmp($varOperatorSign, '>=') == 0)
                            {
                            if($varEvalResultLeftSide >= $varEvalResultRightSide)
                                {$varPotentialThreatCount++;}
                            }
                        elseif((strcmp($varOperatorSign, '!=') == 0) OR (strcmp($varOperatorSign, '<>') == 0))
                            {
                            if($varEvalResultLeftSide != $varEvalResultRightSide)
                                {$varPotentialThreatCount++;}
                            }
                        }
                    //---> Jika Kedua Sisinya adalah Bukan Numerik    
                    elseif((is_numeric($varEvalResultLeftSide) == FALSE) AND ((is_numeric($varEvalResultRightSide) == FALSE)))
                        {
                        $varPotentialThreatCount++;
                        }                   
                    }
                //---> Jika StringOperator
                else
                    {
                    $varDataClausePart = self::getSQLClauseSplit_NonMathPattern($varUserSession, $varDataClause, $varOperatorSign);
                    
                    $varDataClausePart[0] = self::getBracketReduce($varUserSession, $varDataClausePart[0]);
                    $varDataClausePart[2] = self::getBracketReduce($varUserSession, $varDataClausePart[2]);

                    if((!strpos($varDataClausePart[0], ' ')) AND (strcmp(substr($varDataClausePart[0], 0, 1), '"')==0) AND (strcmp(substr($varDataClausePart[0], strlen($varDataClausePart[0])-1, 1), '"')==0))
                        {
                        $varEvalResultLeftSide = $varDataClausePart[0];
                        $varLeftSideType = 'StringVariable';
                        }
                    else
                        {
                        try
                            {
                            if((new \App\Models\Database\SchSysConfig\General())->isValid_SQLSyntax($varUserSession, 'SELECT '.$varDataClausePart[0]) == FALSE)
                                {
                                throw new \Exception("Error");
                                }
                            $varEvalResultLeftSide = '\''.((array) ((\Illuminate\Support\Facades\DB::select('SELECT '.$varDataClausePart[0].' AS "Check";')))[0])['Check'].'\'';
                            $varLeftSideType = 'StringValue';
                            }
                        catch (\Exception $ex) 
                            {
                            $varEvalResultLeftSide = $varDataClausePart[0];
                            $varLeftSideType = 'StringMixed';
                            }
                        }
                        
                        
                    if((!strpos($varDataClausePart[2], ' ')) AND (strcmp(substr($varDataClausePart[2], 0, 1), '"')==0) AND (strcmp(substr($varDataClausePart[2], strlen($varDataClausePart[2])-1, 1), '"')==0))
                        {
                        $varEvalResultRightSide = $varDataClausePart[2];
                        $varRightSideType = 'StringVariable';
                        }
                    else
                        {
                        try
                            {
                            if((new \App\Models\Database\SchSysConfig\General())->isValid_SQLSyntax($varUserSession, 'SELECT '.$varDataClausePart[2]) == FALSE)
                                {
                                throw new \Exception("Error");
                                }
                            $varEvalResultRightSide = '\''.((array) ((\Illuminate\Support\Facades\DB::select('SELECT '.$varDataClausePart[2].' AS "Check";')))[0])['Check'].'\'';
                            $varRightSideType = 'StringValue';
                            }
                        catch (\Exception $ex) 
                            {
                            $varEvalResultRightSide = $varDataClausePart[2];
                            $varRightSideType = 'StringMixed';
                            }
                        }
                    
//echo "<br>Left : ".$varDataClausePart[0].'--->'.$varEvalResultLeftSide;
//echo "<br>Right : ".$varDataClausePart[2].'--->'.$varEvalResultRightSide."<br>";

                    //---> Pencarian Potential Threat
                    if(((strcmp(strtoupper($varDataClausePart[1]), 'LIKE')==0) OR (strcmp(strtoupper($varDataClausePart[1]), 'ILIKE')==0)) AND (strcmp($varLeftSideType, 'StringVariable') == 0) AND (strcmp($varRightSideType, 'StringVariable') == 0) AND (strcmp($varEvalResultLeftSide, $varEvalResultRightSide) == 0))
                        {
                        $varPotentialThreatCount++;
                        }
                    elseif((strcmp(strtoupper($varDataClausePart[1]), 'LIKE')==0) AND (strcmp($varLeftSideType, 'StringValue') == 0) AND (strcmp($varRightSideType, 'StringValue') == 0) AND (strcmp($varLeftSideType, $varRightSideType) == 0) AND (strcmp($varEvalResultLeftSide, $varEvalResultRightSide) == 0))
                        {
                        $varPotentialThreatCount++;
                        }
                    elseif((strcmp(strtoupper($varDataClausePart[1]), 'ILIKE')==0) AND (strcmp($varLeftSideType, 'StringValue') == 0) AND (strcmp($varRightSideType, 'StringValue') == 0) AND (strcmp($varLeftSideType, $varRightSideType) == 0) AND (strcmp(strtoupper($varEvalResultLeftSide), strtoupper($varEvalResultRightSide)) == 0))
                        {
                        $varPotentialThreatCount++;
                        }
                    elseif(((strcmp(strtoupper($varDataClausePart[1]), 'NOT LIKE')==0) OR (strcmp(strtoupper($varDataClausePart[1]), 'NOT ILIKE')==0)) AND (strcmp($varLeftSideType, 'StringVariable') == 0) AND (strcmp($varRightSideType, 'StringVariable') == 0) AND (strcmp($varEvalResultLeftSide, $varEvalResultRightSide) != 0))
                        {
                        $varPotentialThreatCount++;                        
                        }
                    elseif((strcmp(strtoupper($varDataClausePart[1]), 'NOT LIKE')==0) AND (strcmp($varLeftSideType, 'StringValue') == 0) AND (strcmp($varRightSideType, 'StringValue') == 0) AND (strcmp($varLeftSideType, $varRightSideType) == 0) AND (strcmp($varEvalResultLeftSide, $varEvalResultRightSide) != 0))
                        {
                        $varPotentialThreatCount++;
                        }
                    elseif((strcmp(strtoupper($varDataClausePart[1]), 'NOT ILIKE')==0) AND (strcmp($varLeftSideType, 'StringValue') == 0) AND (strcmp($varRightSideType, 'StringValue') == 0) AND (strcmp($varLeftSideType, $varRightSideType) == 0) AND (strcmp(strtoupper($varEvalResultLeftSide), strtoupper($varEvalResultRightSide)) != 0))
                        {
                        $varPotentialThreatCount++;
                        }
                    }
//                var_dump($varDataClausePart);
//                echo '<br>Operator Type : '.$varOperatorType.', <br>Operator Sign : '.$varOperatorSign.', <br   >Syntax : ';
//                echo $varDataClause.'<br><br>';
                }
//          echo "<br><br>PotentialThreatCount----->>".$varPotentialThreatCount."<br><br>";
            return ($varPotentialThreatCount==0 ? FALSE : TRUE);
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isContain_SQLInjection_AlwaysTrueStatements_MathPattern                                              |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mengecek apakah Filter Statment aman dari SQL Injection tipe Always True Statements dengan pola      |
        |                     matematika                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQLClause ► SQL Clause                                                                                |
        |      ▪ (string) varOperator ► Operator                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function isContain_SQLInjection_AlwaysTrueStatements_MathPattern($varUserSession, $varSQLClause, $varOperator)
            {
            $varReturn = (
                (
                (preg_match('/(?i)(([0-9]|"|\))[[:space:]]*'.$varOperator.'[[:space:]]*([0-9]|"|\())(?-i)/', $varSQLClause) == TRUE)
                && (preg_match('/(?i)((\'){1,}(\))*[[:space:]]*'.$varOperator.'[[:space:]]*(\()*(\'){1,})(?-i)/', $varSQLClause) == FALSE)
                && (preg_match('/(?i)([[:space:]]*(LIKE)[[:space:]]*)(?-i)/', $varSQLClause) == FALSE)
                )
                ? TRUE : FALSE);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mengecek apakah Filter Statment aman dari SQL Injection tipe Always True Statements dengan pola non  |
        |                     matematika                                                                                           |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varSQLClause ► SQL Clause                                                                                |
        |      ▪ (string) varOperator ► Operator                                                                                   |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function isContain_SQLInjection_AlwaysTrueStatements_NonMathPattern($varUserSession, $varSQLClause, $varOperator)
            {
            if((strcmp($varOperator, 'LIKE')==0) OR (strcmp($varOperator, 'ILIKE')==0))
                {
                $varOperator = '\b('.$varOperator.')\b';
                }
            elseif(strcmp($varOperator, 'NOT LIKE')==0) 
                {
                $varOperator = '\b(NOT)\b[[:space:]]{1,}\b(LIKE)\b';
                }
            elseif(strcmp($varOperator, 'NOT ILIKE')==0)
                {
                $varOperator = '\b(NOT)\b[[:space:]]{1,}\b(ILIKE)\b';
                }
            
            $varReturn = (
                (
                (preg_match('/(?i)([[:space:]]*'.$varOperator.'[[:space:]]*)(?-i)/', $varSQLClause) == TRUE)
                )
                ? TRUE : FALSE);
            return $varReturn;
            }


        /*
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Method Name     : isContain_SQLInjection_BatchStatements                                                               |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Version         : 1.0000.0000000                                                                                       |
        | ▪ Last Update     : 2020-10-23                                                                                           |
        | ▪ Description     : Mengecek apakah Filter Statment aman dari SQL Injection tipe Batch Statements                        |
        +--------------------------------------------------------------------------------------------------------------------------+
        | ▪ Input Variable  :                                                                                                      |
        |      ▪ (mixed)  varUserSession ► User Session                                                                            |
        |      ▪ (string) varFilterStatement ► Filter Statement                                                                    |
        | ▪ Output Variable :                                                                                                      |
        |      ▪ (bool)   varReturn                                                                                                |
        +--------------------------------------------------------------------------------------------------------------------------+
        */
        private static function isContain_SQLInjection_BatchStatements($varUserSession, string $varFilterStatement)
            {
            $varRegEx = 
                '/(?i)'.
                    '([[:space:]]*)'.
                    '(;){1,}'.
                    '([[:space:]]*)'.
                    '('.
                        '(\b(ALTER)\b){1,1}'.
                            '|'.'(\b(CREATE)\b){1,1}'.
                            '|'.'(\b(DROP)\b){1,1}'.
                            '|'.'((\b(EXEC)((UTE){0,1})*\b){1,1})'.
                            '|'.'((\b(INSERT)([[:space:]]{1,}(INTO))*\b){1,1})'.
                            '|'.'(\b(MERGE)\b){1,1}'.
                            '|'.'(\b(SELECT)\b){1,1}'.
                            '|'.'(\b(TRUNCATE)\b){1,1}'.
                            '|'.'(\b(UPDATE)\b){1,1}'.
                            '|'.'((\b(UNION)([[:space:]]{1,}(ALL))*\b){1,1})'.
                    ')'.
                    '([[:space:]]{1,})'.
                '(?-i)/';
            
            $varReturn = ((preg_match($varRegEx, $varFilterStatement)==TRUE) ? TRUE : FALSE);
            return $varReturn;                        
            }
        }
    }