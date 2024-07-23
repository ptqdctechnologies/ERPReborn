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
        <div style="text-align: right; font-size: 14px;">July 18, 2024</div>
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Order Detail Report</div>
        <div style="text-align: right; font-size: 14px;">11.58 AM</div>

        <!-- DISINI -->
        <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%; margin-top: 30px;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Transaction Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Date
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Supplier
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Total IDR
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    With PPN
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Without PPN
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Total Other Currency
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    With PPN
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Without PPN
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Currency
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        PIC
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Status
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-top: 4px;">
                        1
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataPDFReportPurchaseOrderDetail.number"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        <?= Session::get("dataPDFReportPurchaseOrderDetail.date"); ?>
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        Agape Biomedi Investama
                    </div>
                </td>
                <td>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <div style="margin-top: 4px;">
                                    9,00
                                </div>
                            </td>
                            <td>
                                <div style="margin-top: 4px;">
                                    2,00
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <div style="margin-top: 4px;">
                                    9,00
                                </div>
                            </td>
                            <td>
                                <div style="margin-top: 4px;">
                                    2,00
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        IDR
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        Icha Mailinda Syamsoedin
                    </div>
                </td>
                <td>
                    <div style="margin-top: 4px;">
                        Diproses
                    </div>
                </td>
            </tr>
        </table>
        <!-- DISINI -->
    </div>
</body>

</html>