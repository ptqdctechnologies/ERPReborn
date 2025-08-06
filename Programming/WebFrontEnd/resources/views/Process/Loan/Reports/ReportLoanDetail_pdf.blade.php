<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
</head>

<body>
  <div class="card-body table-responsive p-0">
    <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Loan Detail Report</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER ONE -->
    <table style="margin: 30px 0px 15px 1px;">
        <tr>
            <!-- BRF NUMBER -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                            Loan Number 
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE END TRAVEL -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                            Bank
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :  
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- BRF NUMBER -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                            Loan Type
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE END TRAVEL -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Principal Loan
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :  
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- BRF NUMBER -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Loan Term
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE END TRAVEL -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Lending Rate
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :  
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- BRF NUMBER -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Creditors
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE END TRAVEL -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Total Loan
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :  
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- BRF NUMBER -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                            Debitors
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE END TRAVEL -->
            <td style=" width: 500px;">
                <table>
                    <tr>
                        <td style="width: 110px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                COA 
                            </div>
                        </td>
                        <td style="width: 5px;">
                            :  
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                            
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <!-- UNKNOWN -->
            <td style=" width: 350px;">
            <table>
                <tr>
                <td style="width: 110px; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; line-height: 14px;"></div>
                </td>
                <td style="width: 5px;"></td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; line-height: 14px;"></div>
                </td>
                </tr>
            </table>
            </td>


            <!-- UNKNOWN -->
            <td style=" width: 350px;">
            <table>
                <tr>
                <td style="width: 110px; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; line-height: 14px;"></div>
                </td>
                <td style="width: 5px;"></td>
                <td style="height: 20px;"></td>
                </tr>
            </table>
            </td>
        </tr>
    </table>

  </div>
</body>

</html>