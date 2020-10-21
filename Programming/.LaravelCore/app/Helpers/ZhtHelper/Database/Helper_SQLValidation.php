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
        public static function isSecure_FilterStatement($varUserSession, string $varFilterStatement)
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
                //---> Penghapusan Nesting Kurung
                while(((strcmp(substr($varDataClause, 0, 1), '(')==0) AND (strcmp(substr($varDataClause, strlen($varDataClause)-1, 1), ')')==0)))
                    {
                    $varDataClause = substr($varDataClause, 1, strlen($varDataClause)-2);
                    }
          
                //---> Normalisasi Operator
                if(is_numeric(strpos($varDataClause, '!=')) == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '!=';
                    }
                elseif(is_numeric(strpos($varDataClause, '<=')) == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '<=';
                    }
                elseif(is_numeric(strpos($varDataClause, '>=')) == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '>=';
                    }
                elseif(is_numeric(strpos($varDataClause, '=')) == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '=';
                    }
                elseif(is_numeric(strpos($varDataClause, '<')) == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '<';
                    }
                elseif(is_numeric(strpos($varDataClause, '>')) == TRUE)
                    {
                    $varOperatorType = 'MathOperator';
                    $varOperatorSign = '>';
                    }
                elseif(is_numeric(strpos(strtoupper($varDataClause), 'ILIKE')) == TRUE)
                    {
                    $varOperatorType = 'StringOperator';
                    $varOperatorSign = 'ILIKE';
                    }
                elseif(is_numeric(strpos(strtoupper($varDataClause), 'LIKE')) == TRUE)
                    {
                    $varOperatorType = 'StringOperator';
                    $varOperatorSign = 'LIKE';
                    }
                
                    
                echo $varOperatorType.'---'.$varOperatorSign.'---';
                    
/*                    
                        
                $varDataClause = str_replace(['<=', '>=', '!=', '=', '>', '<'], '{MathOperator}', $varDataClause);
                if(!strpos($varDataClause, '{MathOperator}'))
                    {
                    $varDataClause = str_ireplace([' ILIKE '], '{StringOperator_ILIKE}', $varDataClause);
                    if(!strpos($varDataClause, '{StringOperator_ILIKE}'))
                        {
                        $varDataClause = str_ireplace([' LIKE '], '{StringOperator_LIKE}', $varDataClause);
                        }
                    }
                
                //---> Cek Math Operator
                if(strpos($varDataClause, '{MathOperator}'))
                    {
                    $varDataClausePart = explode('{MathOperator}', $varDataClause);
                    eval( '$varEvalResultLeftSide = ('.$varDataClausePart[0].');');
                    eval( '$varEvalResultRightSide = ('.$varDataClausePart[1].');');
                    if((is_numeric($varEvalResultLeftSide) == TRUE) AND ((is_numeric($varEvalResultRightSide) == TRUE)))
                        {
                        $varPotentialThreatCount++;
                        }
                    }
                elseif(strpos($varDataClause, '{StringOperator_ILIKE}'))
                    {
                    $varDataClausePart = explode('{StringOperator_ILIKE}', $varDataClause);
                    $varEvalResultLeftSide = 'StringVariable';
                    $varEvalResultRightSide = 'StringVariable';
                    
                    if((strcmp(substr($varDataClausePart[0], 0, 1), '\'')==0) AND (strcmp(substr($varDataClausePart[0], strlen($varDataClausePart[0])-1, 1), '\'')==0))
                        {
                        $varEvalResultLeftSide = 'StringValue';
                        }
                    if((strcmp(substr($varDataClausePart[1], 0, 1), '\'')==0) AND (strcmp(substr($varDataClausePart[1], strlen($varDataClausePart[1])-1, 1), '\'')==0))
                        {
                        $varEvalResultRightSide = 'StringValue';
                        }
                    if((strcmp($varEvalResultLeftSide, 'StringValue') == 0) AND (strcmp($varEvalResultRightSide, 'StringValue') == 0) AND (strcmp($varEvalResultLeftSide, $varEvalResultRightSide) == 0) AND (strcmp(strtoupper($varDataClausePart[0]), strtoupper($varDataClausePart[1]))==0))
                        {
                        $varPotentialThreatCount++;
                        }
                    elseif((strcmp($varEvalResultLeftSide, 'StringVariable') == 0) AND (strcmp($varEvalResultRightSide, 'StringVariable') == 0) AND (strcmp($varEvalResultLeftSide, $varEvalResultRightSide) == 0) AND (strcmp($varDataClausePart[0], $varDataClausePart[1])==0))
                        {
                        $varPotentialThreatCount++;
                        }
                    }
                elseif(strpos($varDataClause, '{StringOperator_LIKE}'))
                    {
                    $varDataClausePart = explode('{StringOperator_LIKE}', $varDataClause);
                    $varEvalResultLeftSide = 'StringVariable';
                    $varEvalResultRightSide = 'StringVariable';
                    
                    if((strcmp(substr($varDataClausePart[0], 0, 1), '\'')==0) AND (strcmp(substr($varDataClausePart[0], strlen($varDataClausePart[0])-1, 1), '\'')==0))
                        {
                        $varEvalResultLeftSide = 'StringValue';
                        }
                    if((strcmp(substr($varDataClausePart[1], 0, 1), '\'')==0) AND (strcmp(substr($varDataClausePart[1], strlen($varDataClausePart[1])-1, 1), '\'')==0))
                        {
                        $varEvalResultRightSide = 'StringValue';
                        }
                    if((strcmp($varEvalResultLeftSide, $varEvalResultRightSide) == 0) AND (strcmp($varDataClausePart[0], $varDataClausePart[1])==0))
                        {
                        $varPotentialThreatCount++;
                        }
                    }
                    
                    
                
                //--->
//                if(strpos($varDataClause, ' ILIKE '))
  //                  {
    //            echo 'STRPOS : '.strpos('xxx', 'x');
                    
      //              }
                    
                    
                    
                    
                    
//                if((strcmp(substr($varDataClause, 0, 1), '(')==0) AND (strcmp(substr($varDataClause, strlen($varDataClause)-1, 1), ')')==0))
  //                  {
    //                echo "found";
      //              echo substr($varDataClause, 1, strlen($varDataClause)-2);
        //            }
*/                    
                echo $varDataClause.'<br><br>';
                }

echo "<br><br>PotentialThreatCount----->>".$varPotentialThreatCount."<br><br>";
            }
        }
    }